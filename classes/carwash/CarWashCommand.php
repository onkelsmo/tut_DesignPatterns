<?php
namespace carwash;

use RentalCompany\Vehicle;

/**
 * CarWashCommand
 */
interface CarWashCommand {
	/**
	 * execute
	 * 
	 * @param Vehicle $vehicle
	 */
	public function execute(Vehicle $vehicle);
}
