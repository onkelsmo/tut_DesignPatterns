<?php
/* 
 * @copyright jsmolka
 * @link https://github.com/onkelsmo/tut_DesignPatterns
 */
namespace RentalCompany;

use net\schst\Automobile;

class AutomobileAdapter implements Vehicle {
	protected $automobile;
	
	public function __construct(Automobile $automobile) {
		$this->automobile = $automobile;
	}

	public function __toString() {
		// not implemented
	}

	public function getDailyRate($days = 1) {
		return 75;
	}

	public function getMilage() {
		return $this->automobile->getMilesDriven();
	}

	public function moveForward($miles) {
		try {
			$this->automobile->drive(Automobile::DIRECTION_FORWARD, $miles);
		} catch (AutomobileException $e) {
			return false;
		}
		return true;
	}

	public function startEngine() {
		try {
			$this->automobile->pluginKey();
			$this->automobile->ignite();
		} catch (AutomobileException $e) {
			return false;
		}
		return true;
	}

	public function stopEngine() {
		$this->automobile->stopIgnition();
		$this->automobile->removeKey();
	}

	public function getManufacturer() {
		return $this->automobile->getInfo(Automobile::INFO_MANUFACTURER);
	}
	
	public function getColor() {
		return $this->automobile->getInfo(Automobile::INFO_COLOR);
	}

	public function getMaxSpeed() {
		return $this->automobile->getMaxSpeed();
	}

	public function inspect() {
		
	}

}

