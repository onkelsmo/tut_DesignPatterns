<?php
/**
*
* DateTimeLogger
*
* @author SmO
* @since 11.02.2014
*
**/
namespace RentalCompany;

class DateTimeLogger implements ILogger
{
	public function logEntry($level, $text)
	{
		$date = date('Y-m-d');
		$dateTime = date('Y-m-d H:i:s');
		error_log("{$dateTime}|{$text}\n", 3, "./RentalCompany-{$date}.log");
	}
}
?>