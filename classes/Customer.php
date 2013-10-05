<?php
/**
*
* Customer Class
*
* @author SmO
* @since 05.10.2013
*
**/
namespace RentalCompany;

class Customer
{
	protected $id;
	protected $name;
	
	public function __construct($id, $name)
	{
		$this->id = $id;
		$this->name = $name;
	}
	
	public function getId()
	{
		return $this->id;
	}
	
	public function getName()
	{
		return $this->name;
	}
}
?>