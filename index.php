<?php
namespace RentalCompany;

/**
*
* Codebeispiele aus dem Buch 'PHP Design Patterns' aus dem O'Reilly Verlag
*
* @author SmO
* @since 31.01.2013
*
**/
use ExceptionHandling\CSVFile;

use RentalCompany\persons\Driver;
use RentalCompany\displayCar;

include '../test/freaky_functions.php';
include 'classes/Vehicle.php';
include 'classes/Foo.php';
include 'classes/Car.php';
include 'classes/Convertible.php';
include 'classes/AutomaticConvertible.php';
include 'classes/Airplane.php';
include 'classes/Driver.php';

include 'classes/Math.php';
include 'classes/Invoke.php';
include 'classes/Debugger.php';

use MyNamespace\EmptyClass;

// Verwendung von Namespaces
use MyNamespace\Foo;

$foo = new Foo();

$foo->writeA();


// Verwendung von Closures
/*
function createDebugger($type)
{
	return function($message) use ($type)
	{
		echo "[{$type}] {$message}<br />";
	};
}

$infoDebugger = createDebugger("INFO");
$errorDebugger = createDebugger("ERROR");

$infoDebugger("Das ist ein Info-Eintrag");
$errorDebugger("Das ist ein Error-Eintrag");
*/

// Statische Eingeschaften und Methodenaufrufe
// NOT WORKING!!!
/*
EmptyClass::$dynamicProperty = 42;
echo EmptyClass::$dynamicProperty;
*/

nl();

// Grundlagen zur OOP
use RentalCompany\Car;
use RentalCompany\Convertible;
use RentalCompany\AutomaticConvertible;
use RentalCompany\Airplane;
use RentalCompany\Vehicle;

$bmw = new Car('BMW', 'red');
$vw = new Car('VW', 'blue', 10000);

$bmw->startEngine();
$bmw->moveForward(10);
$bmw->stopEngine();

$peugeot = new AutomaticConvertible('Peugeot', 'Yellow');
$peugeot->startIgnition();
$peugeot->openRoof();
$peugeot->startEngine();
$peugeot->moveForward(50);
$peugeot->stopEngine();

$airbus = new Airplane('Airbus');
$airbus->startEngine();
$airbus->moveForward(10000);
$airbus->stopEngine();

// MoveForward funktion für Vehicles (Entwicklung gegen das Interface 'Vehicle')
function moveForward(Vehicle $vehicle, $miles)
{
		$vehicle->startEngine();
		$vehicle->moveForward($miles);
		$vehicle->stopEngine();
}

moveForward($bmw, 500);
dump($bmw);
moveForward($airbus, 50000);
dump($airbus);

// Statische Methoden
echo Math::factorial(5);
nl();
echo Math::PI;
nl();
echo "5 + 3 = ".Math::add(5, 3);
nl();
echo "5 * 3 = ".Math::multiply(5, 3);
nl();
echo "BizarroMath";
nl();
echo "5 + 3 = ".BizarroMath::add(5, 3);
nl();
echo "5 * 3 = ".BizarroMath::multiply(5, 3);
nl();

// Referenzen und Klone
echo "Referenzen und Klone";
nl();
$bmw2 = clone $bmw;
dump($bmw2);

// Namespaces
$audi = new Car('Audi', 'black');

dump($audi);
nl();

$audi->displayCar($audi);
nl();

// Lambda Funktionen
$sorter = function($a, $b)
{
	if(strlen($a) < strlen($b))
	{
		return -1;	
	}
	if(strlen($a) > strlen($b))
	{
		return 1;
	}
	return 0;
};

$result = $sorter('Stephan', 'Gerd');
dump($result);

$arr = array('Stephan', 'Gerd', 'Frank');
usort($arr, $sorter);
dump($arr);

// Closures
use Debug\Debugger;

$debugger = new Debugger('Y-m-d H:i:s');
$infoDebugger = $debugger->createDebugger("INFO");
$infoDebugger("Dies ist ein Info-Eintrag!");

$errorDebugger = $debugger->createDebugger("ERROR");
unset($debugger);
$errorDebugger("Das ist ein Error-Eintrag!");

// NOT WORKING ?!?
/*
$warningDebugger = $debugger->createStaticDebugger("WARNING");
$warningDebugger("Dies ist ein Warning-Eintrag!");
*/

nl();

// Interzeptormethoden
$ford = new Car();
$ford->manufacturer = "Ford";
$color = $ford->color;

nl();

$bmw3 = new Car('BMW', 'blau', 0, 'bmw.ini');
echo "Maximale Geschwindigkeit: {$bmw3->maxSpeed}.<br />";
echo "Verbrauch : {$bmw3->consumption}.<br />";

$bmw3->maxSpeed = "250 km/h";
echo "Maximale Geschwindigkeit: {$bmw3->maxSpeed}.<br />";

$bmw3->openRoof();



printf("24 - 8 = %d\n", Math::substract(24,8));
nl();
printf("24 / 8 = %d\n", Math::divide(24,8));
nl();

// __toString()
echo $bmw3;

$bmw3->startEngine();
$bmw3->moveForward("100");
echo $bmw3;

// __invoke()
$multiply = new Multiply();
echo "6 * 7 * 3 = ".$multiply(6,7,3);
nl();
nl();

// Exceptions
use ExceptionHandling;
include 'classes/CSVFile.php';

try 
{
	$file = new CSVFile('users.csv');
	$file->open();
	$file->lock();
	while (!$file->endOfFile())
	{
		$fileds = $file->readLine();
		echo "{$fileds[0]} <{$fileds[1]}><br />";
	}
	$file->close();
}
catch (\Exception $e)
{
	$line = $e->getLine();
	$file = $e->getFile();
	echo "Es ist ein Fehler aufgetreten.<br />";
	echo $e->getMessage() . "<br />";
	echo "Zeile {$line} in {$file}<br />";
}









?>