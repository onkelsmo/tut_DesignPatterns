<?php
/**
*
* LogginRentalCompany
*
* @author SmO
* @since 26.11.2013
*
**/
use RentalCompany\RentalCompany;

class LoggingRentalCompany extends RentalCompany
{
	protected function debug($message)
	{
		$this->debugger->debug($message);
	}
}

?>