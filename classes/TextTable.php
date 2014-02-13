<?php
/**
*
* TextTable class
*
* @author SmO
* @since 13.02.2014
*
**/
namespace RentalCompany;

class TextTable extends Table
{
	public function display()
	{
		$this->header->display();
		foreach ($this->rows as $row)
		{
			$row->display();
		}
	}
}
?>