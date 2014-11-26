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
	protected $maxSpeed = 1000;


	public function __construct($manufacturer)
	{
		$this->manufacturer = $manufacturer;
	}
	
	public function __toString()
	{
		$string = "Instanz der Klasse Airplane<br />";
		$string .= " +Hersteller: {$this->manufacturer}<br />";
		$string .= " +Tachostand: {$this->milage}<br />";
	
		if ($this->engineStarted === true)
		{
			$string .= " +Der Motor l�uft.<br />";
		}
		else
		{
			$string .= " +Der Motor l�uft nicht.<br />";
		}
	
		$string .= "<br />";
	
		return $string;
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
	
	public function getDailyRate($days = 1)
	{
		if ($days >= 7)
		{
			return 64.90;
		}
		return 75.50;
	}

	public function getMaxSpeed() {
		return $this->maxSpeed;
	}

	public function inspect() {
		
	}

}
