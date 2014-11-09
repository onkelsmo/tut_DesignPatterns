<?php
/* 
 * @copyright jsmolka
 * @link https://github.com/onkelsmo/tut_DesignPatterns
 */
namespace RentalCompany;

class RateConverter {
	protected $rates = array(
		'usa'	=> 1.2,
		'uk'	=> 0.7
	);
	
	public function getRate($country) {
		if(!isset($this->rates[$country])) {
			throw new \Exception('Unbekanntes Zielland angegeben.');
		}
		return $this->rates[$country];
	}
}

