<?php
/**
*
* Driver - der Fahrer 
*
* @author SmO
* @since 05.02.2013
*
**/
namespace RentalCompany\persons;

class Driver
{
	protected $name;
	
	public function __construct($name)
	{
		$this->name = $name;
	}
}

?>