<?php
/**
*
* EchoingRentalCompany 
*
* @author SmO
* @since 26.11.2013
*
**/
namespace RentalCompany;

use RentalCompany\RentalCompany;

class EchoingRentalCompany extends RentalCompany
{
	protected function debug($message)
	{
		$this->debugger->debug($message);
	}
}