<?php
/**
*
* HtmlHeader class
*
* @author SmO
* @since 13.02.2014
*
**/
namespace RentalCompany;

class HtmlHeader extends Header
{
	public function display()
	{
		echo "	<tr style=\"font-weight: bold;\">";
		foreach ($this->cells as $cell)
		{
			$this->cell->display($cell);
		}
		echo "	</tr>";
	}
}
?>