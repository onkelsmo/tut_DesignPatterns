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
	protected $rentalActions = array();
	
	public function addToFleet($id, Vehicle $vehicle)
	{
		$this->fleet[$id] = $vehicle;
	
		$this->debug("Neues Auto im Fuhrpark: " . $vehicle->manufacturer);
	}
	
	public function rentVehicle(Vehicle $vehicle, Customer $customer)
	{
		$vehicleId = array_search($vehicle, $this->fleet);
		if ($vehicleId === false)
		{
			throw new \UnknownVehicleException();
		}
		if (!$this->isVehicleAvailable($vehicle))
		{
			throw new \VehicleNotAvailableException();
		}
		$rentalAction = new RentalAction($vehicle, $customer);
		$this->rentalActions[] = $rentalAction;

		$this->debug("Neuer Mietvorgang: " . $customer->getName() . " leiht " . $vehicle->manufacturer);
				
		return $rentalAction;
	}
	
	public function isVehicleAvailable(Vehicle $vehicle)
	{
		foreach ($this->rentalActions as $rentalAction)
		{
			if ($rentalAction->getVehicle() !== $vehicle)
			{
				continue;
			}
			if ($rentalAction->isReturned())
			{
				continue;
			}
			return false;
		}
		return true;
	}
	
	public function returnVehicle(Vehicle $vehicle)
	{
		foreach ($this->rentalActions as $rentalAction)
		{
			if ($rentalAction->getVehicle() !== $vehicle)
			{
				continue;
			}
			if ($rentalAction->isReturned())
			{
				continue;
			}
			$rentalAction->markVehicleReturned();
			$this->debug("Rückgabe: " . $rentalAction->getCustomer()->getName() . " gibt " . $vehicle->manufacturer. " zur&uuml;ck.");
			return true;
		}
		return false;
	}
	
	public function debug($message)
	{
		switch (DEBUG_MODE)
		{
			case 'echo':
				echo "{$message}<br />";
				break;
			case 'log':
				error_log("{$message}\n", 3, './RentalCompany.log');
				break;
		}
	}
}
?>