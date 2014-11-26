<?php
/* 
 * @copyright jsmolka
 * @link https://github.com/onkelsmo/tut_DesignPatterns
 */
namespace RentalCompany;

use RentalCompany\persons\Driver;

abstract class AbstractCar implements Vehicle, Observable {
	// Attributes
	protected $driver;
	
	public $manufacturer;
	public $color;
	protected $milage;
	protected $engineStartet = false;
	
	protected $propFile = null;
	protected $techDetails = null;
	
	private $iterableProperties = array
	(
		'manufacturer',
		'color',
		'milage'
	);
	private $position = 0;
	
	protected $airConditioned = false;
	protected $graphics = null;
	protected $airCondition;
	
	protected $maxSpeed;
	protected $extras = array();
	
	protected $observers = array();

	protected $oilLevel = 100;

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
	
	public function setGraphics($graphics) {
		$this->graphics = $graphics;
	}
	
	public function setAirConditioned($airConditioned) {
		$this->airConditioned = $airConditioned;
	}
	
	public function getGraphics() {
		return $this->graphics;
	}

	public function hasAirCondition() {
		return $this->airConditioned;
	}
	
	public function getManufacturer() {
		return $this->manufacturer;
	}
	
	public function getColor() {
		return $this->color;
	}
	
	public function setAirCondition(AirCondition $airCondition) {
		$this->airCondition = $airCondition;
	}
	
	public function getAirCondition() {
		return $this->airCondition;
	}

	// Constructor
	public function __construct($manufacturer = '', $color = '', $milage = 0, $propFile = null, $maxSpeed = 100)
	{
		if (!is_int($milage))
		{
			throw new \InvalidArgumentException('Milage must be an integer.');
		}
		
		$this->manufacturer = $manufacturer;
		$this->color = $color;
		$this->milage = $milage;
		$this->propFile = $propFile;
		$this->maxSpeed = $maxSpeed;
		
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
		$this->setAirCondition(clone $this->getAirCondition());
	}
	
	// Interceptors
	public function __call($method, $args)
	{
		echo "Die Methode {$method} wurde aufgerufen.<br />";
		// Überprüfen, ob Argumente ausgegeben wurden.
		if (empty($args))
		{
			echo "Es wurden keine Argumente &uuml;bergeben.<br />";
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
		$this->notify();
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
	
	// ArrayAccess Methods
	public function offsetExists($offset)
	{
		// Technische Daten laden.
		if ($this->techDetails === null)
		{
			$this->loadTechnicalDetails();
		}
		// Überprüfen, ob der Wert vorhanden ist.
		return isset($this->techDetails[$offset]);
	}
	
	public function offsetGet($offset)
	{
		// Technische Daten laden.
		if ($this->techDetails === null)
		{
			$this->loadTechnicalDetails();
		}
		// Wert zurück geben
		return $this->techDetails[$offset];
	}
	
	public function offsetSet($offset, $value)
	{
		// Technische Daten laden.
		if ($this->techDetails === null)
		{
			$this->loadTechnicalDetails();
		}
		// Wert im Array ändern.
		$this->techDetails[$offset] = $value;
	}
	
	public function offsetUnset($offset)
	{
		// Technische Daten laden.
		if ($this->techDetails === null)
		{
			$this->loadTechnicalDetails();
		}
		// Wert aus dem Array löschen
		unset($this->techDetails[$offset]);
	}
	
	// Methods from \Countable
	public function count()
	{
		// Technische Daten laden.
		if ($this->techDetails === null)
		{
			$this->loadTechnicalDetails();
		}
		return count($this->techDetails);
	}
	
	// Methods from \Iterator
	public function rewind()
	{
		$this->position = 0;
	}
	
	public function next()
	{
		$this->position++;
	}
	
	public function key()
	{
		return $this->iterableProperties[$this->position];
	}
	
	public function current()
	{
		$key = $this->key();
		return $this->$key;
	}
	
	public function valid()
	{
		if ($this->position < count($this->iterableProperties))
		{
			return true;
		}
		return false;
	}
	
	// Methods from \IteratorAggregate
	public function getIterator()
	{
		$props = array();
		foreach ($this->iterableProperties as $propName)
		{
			$props[$propName] = $this->$propName;
		}
		$iterator = new \ArrayIterator($props);
		return $iterator;
	} 
	
	public function getDailyRate($days = 1)
	{
		if ($days >= 7)
		{
			$rate = 65.90;
		}
		$rate = 75.50;
		foreach ($this->extras as $extra) {
			$rate = $rate + $extra->getAdditionalRate();
		}
		return $rate;
	}

	public function getMaxSpeed() {
		$speed = $this->maxSpeed;
		foreach ($this->extras as $extra) {
			$speed = $speed + $extra->getAdditionalSpeed();
		}
		return $speed;
	}
	
	public function addExtra(CarExtra $extra) {
		$this->extras[] = $extra;
	}
	
	public function attach(Observer $observer) {
		$this->observers[] = $observer;
	}
	
	public function detach(Observer $observer) {
		// not working because array_diff cant handle Objects
		// $this->observers = array_diff($this->observers, array($observer));
		
		$newObservers = array();
		
		foreach ($this->observers as $oldObserver) {
			if ($oldObserver === $observer) {
				continue;
			}
			$newObservers[] = $oldObserver;
		}
		$this->observers = $newObservers;		
	}
	
	public function notify() {
		foreach ($this->observers as $observer) {
			$observer->update($this);
		}
	}
	
	final public function inspect() {
		echo "F&uuml;hre Inspection f&uuml;r {$this->manufacturer} durch:<br />";
		$this->replaceSparkPlugs();
		$this->checkTires();
		if ($this->isOilLevelLow()) {
			$this->refillOil();
		} else {
			echo "&Ouml;l ist noch ausreichend.<br />";
		}
	}
	
	abstract protected function replaceSparkPlugs();
	abstract protected function checkTires();
	abstract protected function isOilLevelLow();
	
	protected function refillOil() {
		echo "F&uuml;lle " . (300 - $this->oilLevel) . "ml &Ouml;l nach<br />";
		$this->oilLevel = 300;
	}
}

