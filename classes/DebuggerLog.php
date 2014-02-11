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
	protected $logger;
	
	public function setLogger(ILogger $logger)
	{
		$this->logger = $logger;
	}
	
	public static function getInstance()
	{
		
	}
	
	public function debug($message)
	{
		$this->logger->logEntry(ILogger::LEVEL_INFO, $message);
	}
}
?>