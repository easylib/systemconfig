<?php
namespace Easy\systemConfig;
class systemConfig extends Easy\PDOW\PDOW
{
	public function set($name, $value)
	{
		$id = $this->insertID("INSERT INTO `systemconfig`(`name`, `value`) VALUES (?, ?)", array($name, $value));
		return $id;
	}
	public function get($name)
	{
		$r = $this->fetchOneEntry("SELECT `value` FROM `systemconfig` WHERE `name` = ?", array($name));
		if($r>0)
		{
			return $r;
		}
		return false; 
	}
	public function getArray()
	{
		$r = $this->query("SELECT * FROM `systemconfig`");
		$re = array();
		foreach($r as $res)
		{
			$re[$res["name"]]=$res["value"];
		}
		return $re;
	}

}
?>