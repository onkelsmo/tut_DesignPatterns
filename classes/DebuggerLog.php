<?php
/**
*
* DebuggerLog 
*
* @author SmO
* @since 26.11.2013
*
**/
namespace RentalCompany;

class DebuggerLog implements IDebugger
{
	public function debug($message)
	{
		error_log("{$message}\n", 3, './RentalCompany.log');
	}
}
?>