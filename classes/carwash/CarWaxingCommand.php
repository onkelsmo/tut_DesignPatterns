<?php
namespace carwash;

use RentalCompany\Vehicle;

/**
 * CarWaxingCommand
 */
class CarWaxingCommand implements CarWashCommand {
	/**
	 * execute
	 * 
	 * @param Vehicle $vehicle
	 */
	public function execute(Vehicle $vehicle) {
		printf("Das Auto %s wird gewachst.<br />", $vehicle->getManufacturer());
	}
}
