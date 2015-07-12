<?php
namespace carwash;

use RentalCompany\Vehicle;

/**
 * CarDryingCommand
 */
class CarDryingCommand implements CarWashCommand {
	/**
	 * execute
	 * 
	 * @param Vehicle $vehicle
	 */
	public function execute(Vehicle $vehicle) {
		printf("Das Auto %s wird getrocknet.<br />", $vehicle->getManufacturer());
	}
}
