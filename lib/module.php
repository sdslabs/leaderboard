<?php
abstract class Module{
	public function getValue($userid){
		$query=$this->db->prepare("SELECT value from scores WHERE userid=:userid AND service=:service");
		$query->bindParam(':userid',$userid);
		$query->bindParam(':service',$this->name);
		return $query->execute();
	}
	abstract static function login();
	function setValue(){
	}
}
