<?php
/* 
 * @copyright jsmolka
 * @link https://github.com/onkelsmo/tut_DesignPatterns
 */
namespace RentalCompany;

class RegularInspectionObserver implements Observer {
	private $nextInspection = null;
	private $interval;
	
	public function __construct($startAt, $interval) {
		$this->nextInspection = $startAt;
		$this->interval = $interval;
	}
	
	public function update(Observable $vehicle) {
		if (!$vehicle instanceof Vehicle) {
			return;
		}
		
		if ($vehicle->getMilage() >= $this->nextInspection) {
			echo "Die regelm&auml;&szlig;ige Inspektion ist f&auml;llig "
			. "({$this->nextInspection}km).<br />";
			$vehicle->inspect();
			$this->nextInspection = $this->nextInspection + $this->interval;
		}
	}
}
