<?php
/* 
 * @copyright jsmolka
 * @link https://github.com/onkelsmo/tut_DesignPatterns
 */
namespace RentalCompany;

use RentalCompany\Vehicle;

class VehicleProxy implements Vehicle {
	protected $vehicle;

	public function __construct(Vehicle $vehicle) {
		$this->vehicle = $vehicle;
	}
	
	public function __toString() {
		
	}

	public function getDailyRate($days = 1) {
		return $this->vehicle->getDailyRate($days);
	}

	public function getMaxSpeed() {
		return $this->vehicle->getMaxSpeed();
	}

	public function getMilage() {
		return $this->vehicle->getMilage();
	}

	public function moveForward($miles) {
		return $this->vehicle->moveForward($miles);
	}

	public function startEngine() {
		return $this->vehicle->startEngine();
	}

	public function stopEngine() {
		return $this->vehicle->stopEngine();
	}

}