<?php
namespace io\filesystem;

/**
 * Batch
 */
class Batch implements FileOperationCommand {
	/**
	 * @var array
	 */
	protected $commands = array();
	
	/**
	 * add
	 * 
	 * @param \io\filesystem\FileOperationCommand $command
	 */
	public function add(FileOperationCommand $command) {
		$this->commands[] = $command;
	}
	
	/**
	 * execute
	 */
	public function execute() {
		for ($i = 0; $i < count($this->commands); $i++) {
			$this->commands[$i]->execute();
		}
	}
	
	/**
	 * undo
	 */
	public function undo() {
		for ($i = count($this->commands)-1; $i >= 0; $i--) {
			$this->commands[$i]->undo();
		}
	}
}
