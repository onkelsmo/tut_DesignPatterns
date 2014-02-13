<?php
/**
*
* Manufacturer class from Factory-Pattern
*
* @author SmO
* @since 13.02.2014
*
**/
namespace RentalCompany;
use RentalCompany\Car;

class CarManufacturer extends AbstractManufacturer
{
	protected function manufactureVehicle($color)
	{
		$vehicle = new Car($this->name, $color);
		return $vehicle;
	}
}
?>