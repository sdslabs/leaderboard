<?php
abstract class Module{
	public $name;
	public function __construct($name,$appid,$secret,$db){
		$this->appid=$appid;
		$this->secret=$secret;
		$this->db=$db;
		$this->name=$name;
	}
	public function getValue($userid){
		$query=$this->db->prepare("SELECT value from scores WHERE userid=:userid");
		$query->bindParam(':name',$name);
		$query->bindParam(':userid',$userid);
		return $query->execute();
	};

	//public abstract function login();

	function setValue(){

	}

	abstract public function update();

	private function _createTable(){
		$this->db->query("CREATE TABLE {$this->name} (
		  userid varchar(100) NOT NULL,
		  access_token varchar(255) NOT NULL,
		  `value` int(11) NOT NULL,
		  meta int(11) NOT NULL
		  ) DEFAULT CHARSET=utf8;
		");
	}
}