<?php
/* 
 * @copyright jsmolka
 * @link https://github.com/onkelsmo/tut_DesignPatterns
 */
namespace RentalCompany;

use RentalCompany\VehicleDecorator;

class VehicleDecoratorSpoiler extends VehicleDecorator {
	public function getMaxSpeed() {
		$speed = $this->vehicle->getMaxSpeed();
		return $speed + 15;
	}
	
	public function getDailyRate($days = 1) {
		$rate = $this->vehicle->getDailyRate($days);
		return $rate + 10;
	}

	public function inspect() {
		
	}

}
