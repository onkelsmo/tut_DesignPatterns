<?php
/**
*
* HtmlCell class
*
* @author SmO
* @since 13.02.2014
*
**/
namespace RentalCompany;

class HtmlCell extends Cell
{
	public function display()
	{
		echo "	<td>{$this->content}</td>";
	}
}
?>