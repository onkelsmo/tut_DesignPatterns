<?php
namespace carwash;

use RentalCompany\Vehicle;

/**
 * CarWash
 */
class CarWash {
	/**
	 * @var array 
	 */
	protected $programms = array();
	
	/**
	 * addProgramm
	 * 
	 * @param string $name
	 * @param array $commands
	 */
	public function addProgramm($name, $commands) {
		$this->programms[$name] = $commands;
	}
	
	/**
	 * wash
	 * 
	 * @param string $programme
	 * @param Vehicle $vehicle
	 * 
	 * @throws CarWashException
	 */
	public function wash($programme, Vehicle $vehicle) {
		if (!isset($this->programms[$programme])) {
			throw new CarWashException("Das Washprogramm {$programme} existiert nicht.");
		}
		echo "Waschprogramm {$programme} wird gestartet.<br />";
		foreach ($this->programms[$programme] as $command) {
			$command->execute($vehicle);
		}
	}
}