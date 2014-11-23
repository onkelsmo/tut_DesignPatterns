<?php
/**
*
* VehicleList class
*
* @author SmO
* @since 13.02.2014
*
**/
namespace RentalCompany;

class VehicleList {
	protected $tableFactory = null;
	
	public function __construct(ITableFactory $tableFactory) {
		$this->tableFactory = $tableFactory;
	}
	
	public function showTable($data) {
		$table = $this->tableFactory->createTable();
		$header = $this->tableFactory->createHeader();
		$header->addCell('Hersteller');
		$header->addCell('Farbe');
		
		$table->setHeader($header);
		
		foreach ($data as $line) {
			$row = $this->tableFactory->createRow();
			$table->addRow($row);
			foreach ($line as $field) {
				$row->addCell($field);
			}
		}
		$table->display();
	}
}
