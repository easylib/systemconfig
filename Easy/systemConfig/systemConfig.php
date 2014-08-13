<?php
namespace Easy\systemConfig;
class systemConfig 
{
	static private $ar = array();
	public function __construct()
	{
		$this->pdo = new \Easy\PDOW\PDOW();
	}
	public function set($name, $value)
	{
		$id = $this->pdo->insertID("INSERT INTO `systemconfig`(`name`, `value`) VALUES (?, ?)", array($name, $value));
		return $id;
	}
	public function get($name)
	{
		if(isset(self::$ar[$name]))
		{
			return self::$ar[$name];
		}
		$r = $this->pdo->fetchOneEntry("SELECT `value` FROM `systemconfig` WHERE `name` = ?", array($name));
		if($r>0)
		{
			return $r;
		}
		return false; 
	}
	public function getArray()
	{
		$r = $this->pdo->query("SELECT * FROM `systemconfig`");
		$re = array();
		foreach($r as $res)
		{
			$re[$res["name"]]=$res["value"];
		}
		self::$ar = $re;
		return $re;
	}

}
?>