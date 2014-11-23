<?php
/* 
 * @copyright jsmolka
 * @link https://github.com/onkelsmo/tut_DesignPatterns
 */
namespace RentalCompany;

class InitialInspectionObserver implements Observer {
	private $inspectionMilage;
	
	public function __construct($milage = 1000) {
		$this->inspectionMilage = $milage;
	}
	
	public function update(Observable $vehicle) {
		if (!$vehicle instanceof Vehicle) {
			return;
		}
		
		if ($vehicle->getMilage() >= $this->inspectionMilage) {
			echo "Die Erstinspection ist f&auml;llig, da {$this->inspectionMilage}km &uuml;berschritten.<br />";
			$vehicle->detach($this);
		}
	}
}
