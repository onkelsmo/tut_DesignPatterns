<?php
namespace carwash;

use RentalCompany\Vehicle;

/**
 * CarMotorWashCommand
 */
class CarMotorWashCommand implements CarWashCommand {
	/**
	 * execute
	 * 
	 * @param Vehicle $vehicle
	 */
	public function execute(Vehicle $vehicle) {
		printf("Das Auto %s bekommt eine Motorwäsche.<br />", $vehicle->getManufacturer());
	}
}
