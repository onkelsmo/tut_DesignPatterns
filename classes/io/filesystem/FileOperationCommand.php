<?php
namespace io\filesystem;

/**
 * FileOperationCommand
 */
interface FileOperationCommand {
	public function execute();
	public function undo();
}
