<?php
/* 
 * @copyright jsmolka
 * @link https://github.com/onkelsmo/tut_DesignPatterns
 */
namespace RentalCompany;

class SpecialEditionManufacturer {
	protected $prototypes;
	
	public function addSpecialEdition($edition, Vehicle $prototype) {
		$this->prototypes[$edition] = $prototype;
	}
	
	public function manufactureVehicle($edition) {
		if(!isset($this->prototypes[$edition])) {
			throw new \Exception('No prototype for special edition '. $edition . ' registered.');
		}
		return clone $this->prototypes[$edition];
	}
}

