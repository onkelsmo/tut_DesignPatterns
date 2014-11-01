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
	private static $instance = null;
	protected $logger;
	protected static $logFile;

	public function setLogger(ILogger $logger)
	{
		$this->logger = $logger;
	}
	
	public static function getInstance()
	{
		if (self::$instance == null)
		{
			self::$instance = new DebuggerLog();
			self::$logFile = func_get_args();
		}
		return self::$instance;
	}
	
	public function debug($message)
	{
		//$this->logger->logEntry(ILogger::LEVEL_INFO, $message);
		
		$handle = fopen(self::$logFile[0], 'a');
		fwrite($handle, $message . "\n");
		fclose($handle);
	}
}
?>