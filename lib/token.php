<?php
class Token{
	static function add($service,$userid,$token)
	{
		global $db;
		$query=$db->prepare("INSERT INTO access_tokens (:userid,:service,:access_token)");
		$query->bindParam(':userid',$userid);
		$query->bindParam(':service',$service);
		$query->bindParam(':access_token',$token);
		return $query->execute();
	}
}
