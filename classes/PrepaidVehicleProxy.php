<?php
/* 
 * @copyright jsmolka
 * @link https://github.com/onkelsmo/tut_DesignPatterns
 */
namespace RentalCompany;

use RentalCompany\Vehicle;
use RentalCompany\MilageLimitExceededException;

class PrepaidVehicleProxy extends VehicleProxy {
	protected $maxMileage;
	protected $milesDriven = 0;
	
	public function __construct(Vehicle $vehicle, $maxMileage) {
		parent::__construct($vehicle);
		$this->maxMileage = $maxMileage;
	}
	
	public function moveForward($miles) {
		if(($this->milesDriven + $miles) > $this->maxMileage) {
			$exceeded = $miles - ($this->maxMileage - $this->milesDriven);
			throw new MilageLimitExceededException($this->maxMileage, $exceeded);
		}
		$this->milesDriven = $this->milesDriven + $miles;
		return $this->vehicle->moveForward($miles);
	}
}

