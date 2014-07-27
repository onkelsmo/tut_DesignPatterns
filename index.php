<?php
namespace RentalCompany;
use RentalCompany\RentalCompany;


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

include 'classes/freaky_functions.php';
include 'classes/Vehicle.php';
include 'classes/Foo.php';
include 'classes/Car.php';
include 'classes/Convertible.php';
include 'classes/AutomaticConvertible.php';
include 'classes/Airplane.php';
include 'classes/Driver.php';
include 'classes/Customer.php';
include 'classes/RentalCompany.php';
include 'classes/RentalAction.php';
include 'classes/EchoingRentalCompany.php';
include 'classes/LogginRentalCompany.php';

include 'classes/Math.php';
include 'classes/Invoke.php';
include 'classes/Debugger.php';
include 'classes/IDebugger.php';
include 'classes/DebuggerEcho.php';
include 'classes/DebuggerLog.php';
include 'classes/DebuggerVoid.php';
include 'classes/ILogger.php';
include 'classes/DateTimeLogger.php';

include 'classes/AbstractManufacturer.php';
include 'classes/CarManufacturer.php';
include 'classes/ConvertibleManufacturer.php';

use MyNamespace\EmptyClass;

define('DEBUG_MODE', 'echo');


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

// MoveForward funktion f�r Vehicles (Entwicklung gegen das Interface 'Vehicle')
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
//echo "Referenzen und Klone";
//nl();
//$bmw2 = clone $bmw;
//dump($bmw2);

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
//printf("24 / 8 = %d\n", Math::divide(24,8));
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
include 'classes/Exceptions.php';
include 'classes/CSVFile.php';
/*
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
catch (\IOException $e)
{
	// Nur IOExceptions abfangen!
	die('Es liegt ein Dateifehler vor, bitte informieren Sie den Administrator');
}
catch (\CSVException $e)
{
	// Nur CSVExceptions abfangen!
	die('Das Format ist nicht korrekt!');
}
catch (\Exception $e)
{
	$line = $e->getLine();
	$file = $e->getFile();
	echo "Es ist ein Fehler aufgetreten.<br />";
	echo $e->getMessage() . "<br />";
	echo "Zeile {$line} in {$file}<br />";
}
*/
nl();

// Implementierung des ArrayAccess Interface
$toyota = new Car('Toyota', 'Dunkelblau', 0, 'toyota.ini');

// Gewicht ausgeben
echo "Der Toyota wiegt {$toyota['weight']}.";
nl();
echo count($toyota);
nl();

nl("Objekte als Arrays");
// Objects as Arrays
$mazda = new Car('Mazda', 'Gelb', 0);
foreach ($mazda as $key => $value)
{
	echo "{$key} => {$value}";
	nl();
}

// IterratorAggregate
nl();
nl("IteratorAggregate-Interface");
$opel = new Car('Opel', 'Schwarz', 0);
foreach ($opel as $key => $value)
{
	echo "{$key} => {$value}";
	nl();
}

// Iterator-Funktionen der SPL
nl('Iterator-Funktionen der SPL');
$dir = new \DirectoryIterator('./');
$elements = 0;
foreach ($dir as $entry)
{
	$elements++;
}
echo 'Elemente im \DirectoryIterator = ' . $elements;
nl();

echo 'Elemente im \DirectoryIterator mit iterator_count = ' . iterator_count($dir);
nl();
// iterator_to_array
nl('iterator_to_array');
// Daten f�r den Iterator
$opel2 = array
		(
			'manufacturer'	=>	'Opel',
			'color'			=>	'schwarz',
			'mileage'		=>	'0',
		);
// Iterator erstellen
$opelObj = new \ArrayObject($opel2);
$opelArray = iterator_to_array($opelObj);
dump($opelArray);

// iterator_apply
nl('iterator_apply');
// Callback funktion erstellen
function callback()
{
	echo "Callback aufgerufen!";
	return true;
}

//$opelIterator = new \ArrayIterator($opel2);
//iterator_apply($opelObj, callback(), array($opelObj));

// Vordefinierte Exceptions der SPL
nl('Vordefinierte Exceptions der SPL');
//$car = new Car('Audi', 0.0, 'blau');

// Autoloading mit der SPL
nl('Autoloading mit der SPL');
echo spl_autoload_extensions();
nl();

//echo XML_Util::createTag('BMW', array('color' => 'blue'));

dump(spl_autoload_functions());

// Klassen der SPL ermitteln
nl('Klassen der SPL ermitteln');
$classes = spl_classes();
echo "SPL Klassen in Ihrer PHP-Version: ";
nl();
foreach ($classes as $class)
{
	echo " * {$class}";
	nl();
}


// Superklassen und Interfaces ermitteln
nl('Superklassen und Interfaces ermitteln');
echo "Parent Klassen:";
nl();

//dump(class_parents('AutomaticConvertible', false));

echo "Interfaces:";
nl();
dump(class_implements('RecursiveDirectoryIterator'));

// Eindeutige Obejkt ID's erzeugen
nl('Eindeutige Obejkt ID\'s erzeugen');

$status = array();
$status[spl_object_hash($bmw)] = 'verliehen';

echo $status[spl_object_hash($bmw)];
nl();
nl();

// 
echo $bmw->__toString() . "DailyRate = " . $bmw->getDailyRate();
nl();
nl();
echo $airbus->__toString() . "DailyRate = " . $airbus->getDailyRate(3);
nl();
nl();
echo $mazda->__toString() . "DailyRate = " . $mazda->getDailyRate(8);
nl();
nl();
nl();

// neuer Mietvorgang
$bmw4 = new Car('BMW', 'blau');
$jan = new Customer(1, 'Jan Smolka');
$rental = new RentalAction($bmw4, $jan, '2013-10-05 17:00:00');

$rental->markVehicleReturned();

//dump($rental);

if ($rental->isReturned())
{
	echo "Mietvorgang abgeschlossen";
}

// nl("renting");
// $company = new RentalCompany();
// $bmw5 = new Car('BMW', 'gruen');
// $stephan = new Customer(1, 'Stephan Schmidt');
// $gerd = new Customer(2, 'Gerd Schaufelberger');

// $company->addToFleet('bmw5', $bmw5);
// $company->rentVehicle($bmw5, $stephan);
// $company->returnVehicle($bmw5);
// $company->rentVehicle($bmw5, $gerd);

nl("Added Debug modes");
$debugger = DebuggerEcho::getInstance();
//$debugger = new DebuggerVoid();

switch (DEBUG_MODE)
{
	case 'echo':
		$company = new \EchoingRentalCompany($debugger);
		break;
		case 'log':
		$company = new \LoggingRentalCompany($debugger);
		break;
}

$bmw5 = new Car('BMW', 'gruen');
$stephan = new Customer(1, 'Stephan Schmidt');
$gerd = new Customer(2, 'Gerd Schaufelberger');



$company->addToFleet('bmw5', $bmw5);
$company->rentVehicle($bmw5, $stephan);
$company->returnVehicle($bmw5);
$company->rentVehicle($bmw5, $gerd);

// nl("Debugger class");
// $debugger = new DebuggerEcho();

// $debugger->debug("Danger, Will Robinson");
nl();
nl("SQL - Classes");
use tut_DesignPatterns\sql\Query;
use tut_DesignPatterns\sql\FluentQuery;
include 'sql/Query.php';
include 'sql/FluentQuery.php';


$query = new Query();
$query->setTable('myTable');
$query->setFields(array('id', 'name'));
$query->setClause('id = 42');

echo $query->buildQuery();
nl();

$query2 = new FluentQuery();
$query2->from('myTable')->select(array('id', 'name'))->where('id = 42');

echo $query2->asString();
nl();

$query3 = new FluentQuery();
echo $query3->select(array('id', 'name'))->from('myTable')->where('id = 42')->asString();
nl();

// Dependency injection & Inversion of Control
$debugger2 = new DebuggerLog();
$company2 = new \EchoingRentalCompany($debugger2);

// used the company from row 434
$logger = new DateTimeLogger();
$company->setLogger($logger);

nl();

// Singleton Pattern
$debugger3 = DebuggerEcho::getInstance();
$debugger3->debug("Singleton Pattern Debugger");

$debugger4 = DebuggerEcho::getInstance();
$debugger4->debug("Singleton Pattern Debugger 2!");

if ($debugger3 === $debugger4)
{
	echo "Die beiden Debugger sind dasselbe Objekt!";
	nl();
}
else 
{
	echo "Die beiden Debugger sind nicht dasselbe Objekt!";
	nl();
}
//dump($debugger3);
nl();

// Factory Pattern
$bmwManufacturer = new CarManufacturer('BMW');
$bmw6 = $bmwManufacturer->sellVehicle('blau');

echo "Neues Fahrzeug gekauft:";
nl();
echo "Fahrzeugtyp: " . get_class($bmw6);
nl();
echo "Hersteller: " . $bmw6->manufacturer;
nl();
echo "Farbe: " . $bmw6->color;
nl();
nl();

$peugeorManufacturer = new ConvertibleManufacturer('Peugeot');
$peugeot2 = $peugeorManufacturer->sellVehicle('rot');

echo "Neues Fahrzeug gekauft:";
nl();
echo "Fahrzeugtyp: " . get_class($peugeot2);
nl();
echo "Hersteller: " . $peugeot2->manufacturer;
nl();
echo "Farbe: " . $peugeot2->color;
nl();
nl();

// Abstract Factory Pattern
include 'classes/Table.php';
include 'classes/Row.php';
include 'classes/Header.php';
include 'classes/Cell.php';
include 'classes/ITableFactory.php';
include 'classes/HtmlTableFactory.php';
include 'classes/HtmlCell.php';
include 'classes/HtmlRow.php';
include 'classes/HtmlHeader.php';
include 'classes/HtmlTable.php';

// nicht sch�n keine factory
$table = new HtmlTable();
$header = new HtmlHeader();
$header->addCell(new HtmlCell("Spalte 1"));
$header->addCell(new HtmlCell("Spalte 2"));
$table->setHeader($header);

$row = new HtmlRow();
$row->addCell(new HtmlCell("Zeile 1 / Spalte 1"));
$row->addCell(new HtmlCell("Zeile 1 / Spalte 2"));
$table->addRow($row);

$table->display();

// sch�n! Factory genutzt;)
$factory = new HtmlTableFactory();

$table2 = $factory->createTable();
$header2 = $factory->createHeader();
$header2->addCell($factory->createCell("Spalte 1"));
$header2->addCell($factory->createCell("Spalte 2"));
$table2->setHeader($header2);

$row2 = $factory->createRow();
$row2->addCell($factory->createCell("Zeile 1 / Spalte 1"));
$row2->addCell($factory->createCell("Zeile 1 / Spalte 2"));
$table2->addRow($row2);

$table2->display();

include 'classes/VehicleList.php';

$data = array
(
	array('BMW', 'blau'),
	array('Peugeot', 'rot'),
	array('VW', 'schwarz'),
);

$list = new VehicleList(new HtmlTableFactory());
$list->showTable($data);

// TextTableFactory
include 'classes/TextTableFactory.php';
include 'classes/TextCell.php';
include 'classes/TextRow.php';
include 'classes/TextHeader.php';
include 'classes/TextTable.php';

$list = new VehicleList(new TextTableFactory());
$list->showTable($data);


// Prototype Pattern
nl("Prototype Pattern");
nl();
include './classes/SpecialEditionManufacturer.php';

$manufacturer = new SpecialEditionManufacturer();

$golfElvis = new Car('VW', 'silber');
$golfElvis->setAirConditioned(true);
$golfElvis->setGraphics('Gitarre');

var_dump($golfElvis);

//$manufacturer->addSpecialEdition('Golf Elvis Presley Edition', $golfElvis);
//
//$mygolf1 = $manufacturer->manufactureVehicle('Golf Elvis Presley Edition');
//echo "Typ		: ", get_class($mygolf1), "<br />";
//echo "Hersteller: {$mygolf1->getManufacturer()}<br />";
//echo "Farbe		: {$mygolf1->getColor()}<br />";
//echo "Grafiken	: {$mygolf1->getGraphics()}<br />";
//echo "Klima		: ", $mygolf1->hasAirCondition() ? "ja" : "nein", "<br />";
//
//$golfStones = new AutomaticConvertible('VW', 'rot');
//$golfStones->setAirConditioned(false);
//$golfStones->setGraphics('Zunge');
//
//nl();
//
//$manufacturer->addSpecialEdition('Golf Rolling Stones Edition', $golfStones);
//$mygolf2 = $manufacturer->manufactureVehicle('Golf Rolling Stones Edition');
//echo "Typ		: ", get_class($mygolf2), "<br />";
//echo "Hersteller: {$mygolf2->getManufacturer()}<br />";
//echo "Farbe		: {$mygolf2->getColor()}<br />";
//echo "Grafiken	: {$mygolf2->getGraphics()}<br />";
//echo "Klima		: ", $mygolf2->hasAirCondition() ? "ja" : "nein", "<br />";
//
//$mygolf3 = $manufacturer->manufactureVehicle('Golf Rolling Stones Edition');
//nl();
//if($mygolf2 !== $mygolf3) {
//	echo "\$mygolf2 ist nicht identisch mit \$mygolf3";
//}
//nl();
//
//try {
//	$golf4 = $manufacturer->manufactureVehicle('Golf Ray Charles Edition');
//} catch (\Exception $e) {
//	echo $e->getMessage();
//}
//nl();

include './classes/AirCondition.php';

$manufacturer2 = new SpecialEditionManufacturer();

$golfElvis = new Car('VW', 'silber');
$golfElvis->setAirCondition(new AirCondition());
$golfElvis->setGraphics('Gitarre');

$manufacturer2->addSpecialEdition('Golf Elvis Edition', $golfElvis);

$golf1 = $manufacturer2->manufactureVehicle('Golf Elvis Edition');
$golf2 = $manufacturer2->manufactureVehicle('Golf Elvis Edition');

nl();
echo "Einstellung in \$golf1: ", $golf1->getAirCondition()->getDegrees(), "<br />";
echo "Einstellung in \$golf2: ", $golf2->getAirCondition()->getDegrees(), "<br />";

$golf1->getAirCondition()->setDegrees(16);

echo "Einstellung in \$golf1: ", $golf1->getAirCondition()->getDegrees(), "<br />";
echo "Einstellung in \$golf2: ", $golf2->getAirCondition()->getDegrees(), "<br />";

echo spl_object_hash($golf1->getAirCondition());
nl();
echo spl_object_hash($golf2->getAirCondition());
