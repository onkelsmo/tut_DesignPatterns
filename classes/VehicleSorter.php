<?php
use RentalCompany\Vehicle;

/**
 * VehicleSorter
 */
class VehicleSorter {
	/**
	 * sortByMilage
	 * 
	 * @param Vehicle $carA
	 * @param Vehicle $carB
	 * 
	 * @return int
	 */
	public static function sortByMilage(Vehicle $carA, Vehicle $carB) {
		if ($carA->getMilage() === $carB->getMilage()) {
			return 0;
		} elseif ($carA->getMilage() > $carB->getMilage()) {
			return 1;
		} elseif ($carA->getMilage() < $carB->getMilage()) {
			return -1;
		}
	}
}
