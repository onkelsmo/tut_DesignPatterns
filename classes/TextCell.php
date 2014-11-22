<?php
/**
*
* TextCell class
*
* @author SmO
* @since 13.02.2014
*
**/
namespace RentalCompany;

class TextCell extends Cell {
	public function display($data) {
		echo "|" . str_pad($data, 20);
	}
}
