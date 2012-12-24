<?php
class Token{
	static function add($service,$userid,$token)
	{
		global $db;
		$query=$db->prepare("DELETE FROM access_tokens WHERE userid=:userid AND service=:service");
		$query->bindParam(':userid',$userid);
		$query->bindParam(':service',$service);
		$query->execute();
		$query=$db->prepare("INSERT INTO access_tokens VALUES (:userid,:service,:access_token)");
		$query->bindParam(':userid',$userid);
		$query->bindParam(':service',$service);
		$query->bindParam(':access_token',$token);
		$result=$query->execute();
	}
	static function get($service,$userid)
	{
		global $db;
		$query=$db->prepare("SELECT access_token FROM access_tokens WHERE service=:service AND userid=:userid");
		$query->bindParam(':userid',$userid);
		$query->bindParam(':service',$service);
		$query->execute();
		return $query->fetch(PDO::FETCH_ASSOC);
	}
}
