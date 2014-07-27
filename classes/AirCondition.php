<?php
/* 
 * @copyright jsmolka
 * @link https://github.com/onkelsmo/tut_DesignPatterns
 */
namespace RentalCompany;

class AirCondition {
	protected $degrees = 20;
	
	public function setDegrees($degrees) {
		$this->degrees = $degrees;
	}
	
	public function getDegrees() {
		return $this->degrees;
	}
}

