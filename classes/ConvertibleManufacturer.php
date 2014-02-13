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

class ConvertibleManufacturer extends AbstractManufacturer
{
	protected function manufactureVehicle($color)
	{
		$vehicle = new AutomaticConvertible($this->name, $color);
		return $vehicle;
	}
}
?>