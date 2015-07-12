<?php
namespace io\filesystem;

/**
 * RenameFile
 */
class RenameFile implements FileOperationCommand {
	/**
	 * @var string
	 */
	protected $src;
	
	/**
	 * @var string
	 */
	protected $target;
	
	/**
	 * __construct
	 * 
	 * @param string $src
	 * @param string $target
	 */
	public function __construct($src, $target) {
		$this->src = $src;
		$this->target = $target;
	}

	/**
	 * execute
	 */
	public function execute() {
		rename($this->src, $this->target);
	}

	/**
	 * undo
	 */
	public function undo() {
		rename($this->target, $this->src);
	}
}
