<?php
namespace ExceptionHandling;

class CSVFile
{
	protected $filename;
	protected $fp;
	
	public function __construct($filename)
	{
		$this->filename = $filename;
	}
	
	public function open($mode = 'r')
	{
		$this->fp = fopen($this->filename, $mode);
		
		if ($this->fp === false)
		{
			throw new \Exception('Konnte Datei nicht öffnen');
		}
	}
	
	public function lock($mode = LOCK_SH)
	{
		if (flock($this->fp, $mode) === false)
		{
			throw new \Exception('Konnte Datei-Lock nicht erhalten');
		}
	}
	
	public function endOfFile()
	{
		return feof($this->fp);
	}
	
	public function readLine()
	{
		$line = fgets($this->fp, 1024);
		if ($line === false)
		{
			throw new \Exception('Konnte Zeile nicht auslesen');
		}
		$fields = explode(',', trim($line));
		
		if (count($fields) !== 2)
		{
			throw new \Exception('Zeile hat ein ungültiges Format');
		}
		return $fields;
	}
	
	public function close()
	{
		fclose($this->fp);
	}
}