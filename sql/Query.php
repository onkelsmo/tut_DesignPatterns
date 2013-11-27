<?php
/**
*
* Query
*
* @author SmO
* @since 27.11.2013
*
**/
namespace tut_DesignPatterns\sql;

class Query
{
	protected $table;
	protected $fields = "*";
	protected $clause;
	
	public function setTable($table)
	{
		$this->table = $table;
	}
	public function setFields($fields)
	{
		$this->fields = $fields;
	}
	public function setClause($clause)
	{
		$this->clause = $clause;
	}
	
	public function buildQuery()
	{
		$query = "SELECT ";
		
		if (is_array($this->fields))
		{
			$query .= implode(',', $this->fields);
		}
		else
		{
			$query .= $this->fields;
		}
		
		$query .= " FROM " . $this->table;
		$query .= " WHERE " . $this->clause;
		
		return $query;
	}
}
?>