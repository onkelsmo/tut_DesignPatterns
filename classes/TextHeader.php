<?php
/**
*
* TextHeader class
*
* @author SmO
* @since 13.02.2014
*
**/
namespace RentalCompany;

class TextHeader extends Header {
	public function display() {
		echo "+" . str_repeat("-", (count($this->cells) * 21) -1 ) . "+<br />";
		foreach ($this->cells as $cell) {
			$cell->display();
		}
		echo "|<br />";
		echo "+" . str_repeat("-", (count($this->cells) * 21) -1 ) . "+<br />";
	}
}
