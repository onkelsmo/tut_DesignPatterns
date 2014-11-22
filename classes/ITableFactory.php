<?php
/**
*
* TableFactory Interface
*
* @author SmO
* @since 13.02.2014
*
**/
namespace RentalCompany;

interface ITableFactory {
	public function createTable();
	public function createRow();
	public function createHeader();
	public function createCell();
}
