<?php
/**
*
* DebuggerEcho
*
* @author SmO
* @since 26.11.2013
*
**/
namespace RentalCompany;

class DebuggerEcho implements IDebugger 
{
	public function debug($message)
	{
		echo "{$message}<br />";
	}
}
?>