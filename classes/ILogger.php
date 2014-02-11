<?php
/**
*
* Interface of the Logger class
*
* @author SmO
* @since 11.02.2014
*
**/
namespace RentalCompany;

interface ILogger
{
	const LEVEL_INFO = 1;
	const LEVEL_WARN = 2;
	const LEVEL_ERROR = 4;
	
	public function logEntry($level, $text);
}
?>