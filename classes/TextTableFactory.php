<?php
/**
*
* TextTableFactory class
*
* @author SmO
* @since 13.02.2014
*
**/
namespace RentalCompany;

class TextTableFactory implements ITableFactory {
	private $cell = null;

	public function createTable() {
		$table = new TextTable();
		return $table;
	}

	public function createRow() {
		$row = new TextRow($this->createCell());
		return $row;
	}

	public function createHeader() {
		$header = new TextHeader($this->createCell());
		return $header;
	}

	public function createCell() {
		if ($this->cell == null) {
			$this->cell = new TextCell();
		}
		return $this->cell;
	}
}
