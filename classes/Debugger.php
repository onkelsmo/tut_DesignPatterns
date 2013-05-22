<?php
namespace Debug;

class Debugger
{
	protected $dateFormat;
	
	public function __construct($dateFormat)
	{
		$this->dateFormat = $dateFormat;
	}
	
	function createDebugger($type)
	{
		return function ($message) use ($type)
		{
			//$dateTime = date($this->dateFormat, time()); //NOT WORKING!!?!
			$dateTime = date('Y-m-d H:i:s', time());
			echo "[{$type}][{$dateTime}] {$message}<br />";
		};
	}
	
	/*
	function createStaticDebugger($type)
	{
		return static function ($message) use ($type)
		{
			echo "[{$type}] {$message}<br />";
		};
	}
	*/
}