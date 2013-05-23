<?php
namespace RentalCompany;

class Multiply
{
	/*
	public function __invoke($a, $b)
	{
		return $a * $b;
	}
	*/
	
	public function __invoke()
	{
		$args = func_get_args();
		$result = 1;
		
		foreach ($args as $arg)
		{
			$result = $result * $arg;
		}
		
		return $result;
	}
}