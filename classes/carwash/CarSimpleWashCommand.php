<?php
namespace carwash;

use RentalCompany\Vehicle;

/**
 * CarSimpleWashCommand
 */
class CarSimpleWashCommand implements CarWashCommand {
	/**
	 * execute
	 * 
	 * @param Vehicle $vehicle
	 */
	public function execute(Vehicle $vehicle) {
		printf("Das Auto %s wird gewaschen.<br />", $vehicle->getManufacturer());
	}
}