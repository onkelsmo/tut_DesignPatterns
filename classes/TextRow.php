<?php
/**
*
* TextRow class
*
* @author SmO
* @since 13.02.2014
*
**/
namespace RentalCompany;

class TextRow extends Row {
	public function display() {
		foreach ($this->cells as $data) {
			$this->cell->display($data);
		}
		echo "|<br />";
		echo "+" . str_repeat("-", (count($this->cells) * 21) -1 ) . "+<br />";
	}
}
