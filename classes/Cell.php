<?php
/**
*
* Cell class of Abstract Factory Pattern
*
* @author SmO
* @since 13.02.2014
*
**/
namespace RentalCompany;

abstract class Cell
{
	protected $content = null;
	
	public function __construct($content)
	{
		$this->content = $content;
	}
	
	abstract public function display();
}
?>