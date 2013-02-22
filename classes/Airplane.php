<?php
/**
*
* Klasse Airplane
*
* @author SmO
* @since 31.01.2013
*
**/
namespace RentalCompany;

class Airplane implements Vehicle
{
	protected $manufacturer;
	protected $altitude = 0;
	protected $milage = 0;
	protected $engineStarted = false;
	
	public function __construct($manufacturer)
	{
		$this->manufacturer = $manufacturer;
	}
	
	public function startEngine()
	{
		$this->engineStarted = true;
	}
	
	public function takeOff($feet = 5000)
	{
		if($this->engineStarted !== true)
		{
			$this->startEngine();
		}
		$this->altitude = $feet;
	}
	
	public function moveForward($miles)
	{
		if($this->altitude <= 0)
		{
			$this->takeOff();
		}
		$this->milage += $miles;
	}
	
	public function land()
	{
		$this->altitude = 0;
	}
	
	public function stopEngine()
	{
		if($this->altitude > 0)
		{
			$this->land();
		}
		$this->engineStarted = false;
	}
	
	public function __destruct()
	{
		$this->land();
		$this->stopEngine();
	}
	
	public function getMilage()
	{
		return $this->milage;
	}
}
?>