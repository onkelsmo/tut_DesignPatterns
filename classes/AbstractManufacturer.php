<?php
/**
*
* Abstract Factory class
*
* @author SmO
* @since 13.02.2014
*
**/
namespace RentalCompany;

abstract class AbstractManufacturer
{
	protected $name;
	
	public function __construct($name)
	{
		$this->name = $name;
	}
	
	public function sellVehicle($color)
	{
		$vehicle = $this->manufactureVehicle($color);
		$vehicle->startEngine();
		$vehicle->moveForward(1);
		$vehicle->stopEngine();
		
		return $vehicle;
	}
	
	abstract protected function manufactureVehicle($color);
} 
?>