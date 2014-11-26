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

abstract class Convertible extends AbstractCar {
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
	
	protected function replaceSparkPlugs() {
		echo "Ersetze Z&uuml;ndkerzen durch Model BR76.<br />";
	}
	
	protected function checkTires() {
		echo "&Uuml;berpr&uuml;fe Reifendruck, muss 1,6 bar sein.<br />";
	}
	
	protected function isOilLevelLow() {
		if ($this->oilLevel < 80) {
			return true;
		}
		return false;
	}
}
