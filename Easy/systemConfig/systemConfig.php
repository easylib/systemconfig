<?php
namespace Easy\userManagment;
class systemConfig extends Easy\PDOW\PDOW
{}
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

}
?>