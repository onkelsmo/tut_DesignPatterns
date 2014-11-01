<?php
/* 
 * @copyright jsmolka
 * @link https://github.com/onkelsmo/tut_DesignPatterns
 */
namespace Debug;

use \RentalCompany\IDebugger;

class DebuggerComposite implements IDebugger{
	protected $debuggers = array();
	
	public function addDebugger(IDebugger $debugger) {
		$this->debuggers[] = $debugger;
	}

	public function debug($message) {
		foreach ($this->debuggers as $debugger) {
			$debugger->debug($message);
		}
	}

	public function removeDebugger(IDebugger $debugger) {
		$key = array_search($debugger, $this->debuggers);
		if($key === false) {
			return false;
		}
		unset($this->debuggers[$key]);
		return true;
	}
	
	/**
	 * not implemented
	 */
	public static function getInstance() {
		
	}
}
