<?php
namespace io\filesystem;

/**
 * CopyFile
 */
class CopyFile implements FileOperationCommand {
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
		copy($this->src, $this->target);
	}

	/**
	 * undo
	 */
	public function undo() {
		unlink($this->target);
	}
}
