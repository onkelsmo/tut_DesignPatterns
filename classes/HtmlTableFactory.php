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

class HtmlTableFactory implements ITableFactory
{
	public function createTable()
	{
		$table = new HtmlTable();
		return $table;
	}
	
	public function createRow()
	{
		$row = new HtmlRow();
		return $row;
	}
	
	public function createHeader()
	{
		$header = new HtmlHeader();
		return $header;
	}
	
	public function createCell($content)
	{
		$cell = new HtmlCell($content);
		return $cell;
	}
}
?>