<?php
/* 
 * @copyright jsmolka
 * @link https://github.com/onkelsmo/tut_DesignPatterns
 */
namespace net\schst;

class Automobile {
	protected $ignited = false;
	protected $keyPluggedIn = false;
	protected $info = array();
	protected $milesDriven = 0;
	
	const DIRECTION_FORWARD = 0;
	const DIRECTION_BACKWARD = 1;
	
	const INFO_MANUFACTURER = 'manufacturer';
	const INFO_COLOR = 'color';
	
	public function __construct($color, $manufacturer) {
		$this->info[self::INFO_COLOR] = $color;
		$this->info[self::INFO_MANUFACTURER] = $manufacturer;
	}
	
	public function pluginKey() {
		$this->keyPluggedIn = true;
	}
	
	public function ignite() {
		if($this->keyPluggedIn !== true) {
			throw new IgniteException('Schlüssel steckt nicht.');
		}
		$this->ignited = true;
	}
	
	public function drive($direction, $miles) {
		if($this->ignited !== true) {
			throw new AutomobileException('Zündung ist nicht an.');
		}
		$this->milesDriven = $this->milesDriven + $miles;
	}
	
	public function stopIgnition() {
		$this->ignited = false;
	}
	
	public function removeKey() {
		if($this->ignited === true) {
			$this->stopIgnition();
		}
		$this->keyPluggedIn = false;
	}
	
	public function getMilesDriven() {
		return $this->milesDriven;
	}
	
	public function getInfo($name) {
		if(isset($this->info[$name])) {
			return $this->info[$name];
		}
	}
}
