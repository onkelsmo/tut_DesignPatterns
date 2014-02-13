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

class TextTableFactory implements ITableFactory
{
	public function createTable()
	{
		$table = new TextTable();
		return $table;
	}

	public function createRow()
	{
		$row = new TextRow();
		return $row;
	}

	public function createHeader()
	{
		$header = new TextHeader();
		return $header;
	}

	public function createCell($content)
	{
		$cell = new TextCell($content);
		return $cell;
	}
}
?>