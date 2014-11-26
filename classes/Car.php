<?php
/**
*
* Codebeispiele aus dem Buch 'PHP Design Patterns' aus dem O'Reilly Verlag
* Die Klasse Car zum Darstellen einer Autovermietung
*
* @author SmO
* @since 31.01.2013
*
**/
namespace RentalCompany;

class Car extends AbstractCar {
	protected function checkTires() {
		echo "&Uuml;berpr&uuml;fe Reifendruck, muss 2,0 bar sein.<br />";
	}

	protected function isOilLevelLow() {
		if ($this->oilLevel < 200) {
			return true;
		}
		return false;
	}

	protected function replaceSparkPlugs() {
		echo "Ersetze Z&uuml;ndkerzen durch Model AF34.<br />";
	}

}
