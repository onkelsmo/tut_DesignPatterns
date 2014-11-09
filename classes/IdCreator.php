<?php
/* 
 * @copyright jsmolka
 * @link https://github.com/onkelsmo/tut_DesignPatterns
 */
namespace RentalCompany;

class IdCreator {
	protected static $instance = null;
	private $currentId = 0;
	
	public static function getInstance() {
		if(self::$instance == null) {
			self::$instance = new IdCreator();
		}
		return self::$instance;
	}
	
	protected function __construct() {
		
	}
	
	private function __clone() {
		
	}
	
	public function getNextId() {
		return "Car-" . $this->currentId++;
	}
}
