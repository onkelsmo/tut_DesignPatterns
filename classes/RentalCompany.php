<?php
/**
*
* RentalCompany Class
*
* @author SmO
* @since 05.10.2013
*
**/
namespace RentalCompany;

class RentalCompany
{
	protected $fleet = array();
	
	public function addToFleet($id, Vehicle $vehicle)
	{
		$this->fleet[$id] = $vehicle;
	}
	
	public function rentVehicle(Vehicle $vehicle, Customer $customer)
	{
		
	}
	
	public function returnVehicle(Vehicle $vehicle)
	{
		
	}
}
?>