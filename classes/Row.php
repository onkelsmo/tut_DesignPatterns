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

abstract class Row
{
	protected $cells = array();
	
	public function addCell(Cell $cell)
	{
		$this->cells[] = $cell;
	}
	
	abstract public function display();
}
?>