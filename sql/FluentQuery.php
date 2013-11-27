<?php
/**
*
* FluentQuery
*
* @author SmO
* @since 27.11.2013
*
**/
namespace tut_DesignPatterns\sql;

class FluentQuery
{
	protected $table;
	protected $fields = "*";
	protected $clause;
	
	public function from($table)
	{
		$this->table = $table;
		return $this;
	}
	public function select($fields)
	{
		$this->fields = $fields;
		return $this;
	}
	public function where($clause)
	{
		$this->clause = $clause;
		return $this;
	}
	
	public function asString()
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