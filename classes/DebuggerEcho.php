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
	private static $instance = null;
	
	public static function getInstance()
	{
		if (self::$instance == null)
		{
			self::$instance = new DebuggerEcho();
		}
		return self::$instance;
	}
	
	// prevent construction and cloning because of Singleton Pattern
	protected function __construct(){}
	private function __clone(){}
	
	public function debug($message)
	{
		echo "{$message}<br />";
	}
}
?>