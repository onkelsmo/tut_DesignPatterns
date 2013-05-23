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
}
?>