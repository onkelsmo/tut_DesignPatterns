<?php
/**
*
* HtmlTableFactory class
*
* @author SmO
* @since 13.02.2014
*
**/
namespace RentalCompany;

class HtmlTableFactory implements ITableFactory  {
	private $cell = null;
	
	public function createTable() {
		$table = new HtmlTable();
		return $table;
	}
	
	public function createRow() {
		$row = new HtmlRow($this->createCell());
		return $row;
	}
	
	public function createHeader() {
		$header = new HtmlHeader($this->createCell());
		return $header;
	}
	
	public function createCell() {
		if ($this->cell == null) {
			$this->cell = new HtmlCell();
		}
		return $this->cell;
	}
}
