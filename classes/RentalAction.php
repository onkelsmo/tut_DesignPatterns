<?php
/**
*
* RentalAction Class 
*
* @author SmO
* @since 05.10.2013
*
**/
namespace RentalCompany;

class RentalAction
{
	protected $vehicle;
	protected $customer;
	protected $rentDate;
	protected $returnDate = null;	
	
	public function __construct(Vehicle $vehicle, Customer $customer, $date = null)
	{
		// Falls kein Datum übergeben wurde, den heutigen Tag nehmen
		if ($date === null)
		{
			$date = date('Y-m-d H:i:s');
		}
		$this->vehicle = $vehicle;
		$this->customer = $customer;
		$this->rentDate = $date;
	}
	
	public function getVehicle()
	{
		return $this->vehicle;
	}
	
	public function getCustomer()
	{
		return $this->customer;
	}
	
	public function getRentDate()
	{
		return $this->rentDate;
	}
	
	public function getReturnDate()
	{
		return $this->returnDate;
	}
	
	public function markVehicleReturned($date = null)
	{
		if ($date === null)
		{
			$date = date('Y-m-d H:i:s');
		}
		$this->returnDate = $date;
	}
	
	public function isReturned()
	{
		return $this->returnDate !== null;
	}
}
?>