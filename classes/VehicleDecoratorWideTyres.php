<?php
/* 
 * @copyright jsmolka
 * @link https://github.com/onkelsmo/tut_DesignPatterns
 */
namespace RentalCompany;

use RentalCompany\VehicleDecorator;

class VehicleDecoratorWideTyres extends VehicleDecorator {
	public function getMaxSpeed() {
		$speed = $this->vehicle->getMaxSpeed();
		return round($speed * 0.95);
	}
	
	public function getDailyRate($days = 1) {
		$rate = $this->vehicle->getDailyRate($days);
		return $rate + 5;
	}

	public function inspect() {
		
	}

}
