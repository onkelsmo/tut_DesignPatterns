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
	protected $driver;
	
	protected $manufacturer;
	protected $color;
	protected $milage;
	protected $engineStartet = false;
	
	
	public function __construct($manufacturer, $color, $milage = 0)
	{
		$this->manufacturer = $manufacturer;
		$this->color = $color;
		$this->milage = $milage;
		
		$this->driver = new Driver('Stephan');
	}
	
	public function __destruct()
	{
		if($this->engineStartet)
		{
			$this->stopEngine();
		}
	}
	
	public function __clone()
	{
		$this->milage = 0;
	}
	
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
}


?>