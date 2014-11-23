<?php
/**
*
* HtmlRow class
*
* @author SmO
* @since 13.02.2014
*
**/
namespace RentalCompany;

class HtmlRow extends Row
{
	public function display()
	{
		echo "	<tr>";
		foreach ($this->cells as $cell)
		{
			$this->cell->display($cell);
		}
		echo "	</tr>";
	}
}
?>