<?php
/**
*
* Row class for Abstract Factory Pattern
*
* @author SmO
* @since 13.02.2014
*
**/
namespace RentalCompany;

abstract class Row {
	protected $cell;
	protected $cells = array();
	
	public function __construct(Cell $cell) {
		$this->cell = $cell;
	}
	
	public function addCell($cell) {
		$this->cells[] = $cell;
	}
	
	abstract public function display();
}
