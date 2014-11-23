<?php
/* 
 * @copyright jsmolka
 * @link https://github.com/onkelsmo/tut_DesignPatterns
 */
namespace RentalCompany;

interface Observable {
	public function attach(Observer $observer);
	public function detach(Observer $observer);
	public function notify();
}
