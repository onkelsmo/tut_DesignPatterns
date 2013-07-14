<?php
/**
*
* Interface Vehicle
*
* @author SmO
* @since 31.01.2013
*
**/
namespace RentalCompany;

interface Vehicle
{
	public function startEngine();
	public function moveForward($miles);
	public function stopEngine();
	public function getMilage();
}
?>