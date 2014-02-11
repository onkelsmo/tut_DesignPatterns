<?php
/**
*
* IDebugger 
*
* @author SmO
* @since 26.11.2013
*
**/
namespace RentalCompany;

interface IDebugger
{
	public static function getInstance();
	public function debug($message);
}
?>