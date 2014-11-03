<?php
/* 
 * @copyright jsmolka
 * @link https://github.com/onkelsmo/tut_DesignPatterns
 */
namespace RentalCompany;

class Spoiler implements CarExtra {
	public function getAdditionalRate() {
		return 15;
	}

	public function getAdditionalSpeed() {
		return 10;
	}
}
