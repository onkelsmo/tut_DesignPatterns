<?php
namespace carwash;

use RentalCompany\Vehicle;

/**
 * CarPreWashCommand
 */
class CarPreWashCommand implements CarWashCommand {
	/**
	 * execute
	 * 
	 * @param Vehicle $vehicle
	 */
	public function execute(Vehicle $vehicle) {
		printf("Das Auto %s wird vorgewaschen.<br />", $vehicle->getManufacturer());
	}
}
