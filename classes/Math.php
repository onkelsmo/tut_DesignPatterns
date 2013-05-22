<?php
namespace RentalCompany;
/**
*
* Mathematische berechnungen in einer statischen Klasse
*
* @author SmO
* @since 31.01.2013
*
**/

class Math
{
	const PI = 3.14159;
	
	public static function __callstatic($method, $args)
	{
		switch (strtolower($method))
		{
			case 'substract':
				return $args[0] - $args[1];
				break;
				
			default:
				trigger_error("Unbekannte Rechenoperation {$method}", E_USER_WARNING);
				return false;
		}
	}
	
	public static function factorial($number)
	{
		if($number === 1)
		{
			return 1;
		}
		return self::factorial($number - 1) * $number;
	}
	
	public static function add($a, $b)
	{
		return $a + $b;
	}
	
	public static function multiply($a, $b)
	{
		$result = 0;
		for ($i = 0; $i < $b; $i++)
		{
			$result = static::add($result, $a);
		}
		return $result;
	}
}

class BizarroMath extends Math
{
	public static function add($a, $b)
	{
		return $a - $b;
	}
}
?>