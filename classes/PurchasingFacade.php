<?php
/* 
 * @copyright jsmolka
 * @link https://github.com/onkelsmo/tut_DesignPatterns
 */
namespace RentalCompany;

use RentalCompany\AbstractManufacturer;

class PurchasingFacade {
	protected $company = null;
	protected $manufacturers = array();
	
	public function __construct(RentalCompany $company) {
		$this->company = $company;
	}
	
	public function addManufacturers($id, AbstractManufacturer $manufacturer) {
		$this->manufacturers[$id] = $manufacturer;
	}
	
	public function purchase($manufacturer, $color) {
		if(!isset($this->manufacturers[$manufacturer])) {
			throw new UnknownManufacturerException("Der Hersteller ist nicht bekannt");
		}
		$vehicle = $this->manufacturers[$manufacturer]->sellVehicle($color);
		$id = IdCreator::getInstance()->getNextId();
		$this->company->addToFleet($id, $vehicle);
		
		return $vehicle;
	}
}
