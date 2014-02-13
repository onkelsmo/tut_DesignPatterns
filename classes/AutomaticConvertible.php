<?php
/**
*
* Ableitung der abstrakten Klasse Convertible 
*
* @author SmO
* @since 31.01.2013
*
**/
namespace RentalCompany;

class AutomaticConvertible extends Convertible
{
	public $ignited = false;
	
	public function startIgnition()
	{
		$this->ignited = true;
	}
	
	public function stopIgnition()
	{
		$this->ignited = false;
	}
	
	public function openRoof()
	{
		if($this->ignited === true)
		{
			$this->roofOpen = true;
		}
	}
	
	public  function closeRoof()
	{
		if($this->ignited === true)
		{
			$this->roofOpen = false;
		}
	}
	
	public function __destruct()
	{
		parent::__destruct();
		if($this->ignited === true)
		{
			$this->stopIgnition();
		}
	}
}

?>