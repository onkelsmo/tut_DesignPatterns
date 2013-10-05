<?php
/**
*
* Ableitung der Klasse Car 
*
* @author SmO
* @since 31.01.2013
*
**/
namespace RentalCompany;

abstract class Convertible extends Car
{
	public $roofOpen = false;

	abstract public function openRoof();
	
	abstract public function closeRoof();
	
	final public function stopEngine()
	{
		if($this->roofOpen)
		{
			$this->closeRoof();
		}
		parent::stopEngine();
	}
	
	public function getDailyRate($days = 1)
	{
		if ($days >= 7)
		{
			return 65.90;
		}
		return 75.50;
	}
}
?>