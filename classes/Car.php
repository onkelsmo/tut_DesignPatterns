<?php
/**
*
* Codebeispiele aus dem Buch 'PHP Design Patterns' aus dem O'Reilly Verlag
* Die Klasse Car zum Darstellen einer Autovermietung
*
* @author SmO
* @since 31.01.2013
*
**/
namespace RentalCompany;

use RentalCompany\persons\Driver;

class Car implements Vehicle
{
	// Attributes
	protected $driver;
	
	protected $manufacturer;
	protected $color;
	protected $milage;
	protected $engineStartet = false;
	
	protected $propFile = null;
	protected $techDetails = null;
	
	// Properties
	public function __get($property)
	{
		//print "Die Eigenschaft {$property} soll ausgelesen werden.<br />";
		// Technische Daten laden
		if ($this->techDetails === null)
		{
			$this->loadTechnicalDetails();
		}
		// Überprüfen, ob das technische Detail in der INI-Datei spezifiziert wurde.
		if (isset($this->techDetails[$property]))
		{
			return $this->techDetails[$property];
		}
	}
	
	public function __set($property, $value)
	{
		//print "Die Eigenschaft {$property} soll auf den Wert {$value} gesetzt werden.<br />";
		// Technische Daten laden
		if ($this->techDetails === null)
		{
			$this->loadTechnicalDetails();
		}
		$this->techDetails[$property] = $value;
		//$this->saveTechnicalDetails();
	}
	
	// Constructor
	public function __construct($manufacturer = '', $color = '', $milage = 0, $propFile = null)
	{
		$this->manufacturer = $manufacturer;
		$this->color = $color;
		$this->milage = $milage;
		$this->propFile = $propFile;
		
		$this->driver = new Driver('Stephan');
	}
	
	// Destructor
	public function __destruct()
	{
		if($this->engineStartet)
		{
			$this->stopEngine();
		}
		
		$this->saveTechnicalDetails();
	}
	
	public function __clone()
	{
		$this->milage = 0;
	}
	
	// Interceptors
	public function __call($method, $args)
	{
		echo "Die Methode {$method} wurde aufgerufen.<br />";
		// Überprüfen, ob Argumente ausgegeben wurden.
		if (empty($args))
		{
			echo "Es wurden keine Argumente übergeben.<br />";
			return;
		}
		echo "Übergebene Argumente:<br />";
		$no = 1;
		foreach ($args as $arg)
		{
			echo "{$no}. {$arg}<br />";
			$no++;
		}
	}
	
	public function __toString()
	{
		$string = "Instanz der Klasse Car<br />";
		$string .= " +Hersteller: {$this->manufacturer}<br />";
		$string .= " +Farbe: {$this->color}<br />";
		$string .= " +Tachostand: {$this->milage}<br />";
		
		if ($this->engineStartet === true)
		{
			$string .= " +Der Motor läuft.<br />";
		}
		else 
		{
			$string .= " +Der Motor läuft nicht.<br />";
		}
		
		$string .= "<br />";
		
		return $string;
	}
	
	// Methods
	public function startEngine()
	{
		$this->engineStartet = true;
	}
	
	public function moveForward($miles)
	{
		if($this->engineStartet !== true)
		{
			return false;
		}
		$this->milage += $miles;
		return true;
	}
	
	public function stopEngine()
	{
		$this->engineStartet = false;
	}
	
	public function isEngineStarted()
	{
		return $this->engineStartet;
	}
	
	public function getMilage()
	{
		return $this->milage;
	}
	
	public function displayCar(\RentalCompany\Car $car)
	{
		print_r($car);
	}
	
	protected function loadTechnicalDetails()
	{
		// Es existiert keine Datei.
		if ($this->propFile === null)
		{
			$this->techDetails = array();
		}
		else 
		{
			// INI-Datei laden
			$this->techDetails = parse_ini_file($this->propFile);
		}
	}
	
	protected function saveTechnicalDetails()
	{
		// Keine Datei definiert.
		if ($this->propFile === null)
		{
			return;
		}
		// Keine technischen Daten vorhanden.
		if ($this->techDetails === null)
		{
			return;
		}
		// Geänderten Inhalt der INI-Datei erzeugen.
		$ini = "; Technische Details für {$this->manufacturer}\n";
		foreach ($this->techDetails as $property => $value)
		{
			$ini .= "{$property} = \"{$value}\"\n";
		}
		$result = file_put_contents(dirname(__FILE__)."/".$this->propFile, $ini);
	}
}









?>