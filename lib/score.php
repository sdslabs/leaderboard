<?php
class Score{
	static function update($service,$userid,$score)
	{
		global $db;
		$query=$db->prepare("DELETE FROM scores WHERE userid=:userid AND service=:service");
		$query->bindParam(':userid',$userid);
		$query->bindParam(':service',$service);
		$query->execute();
		$query=$db->prepare("INSERT INTO scores VALUES (:userid,:service,:score)");
		$query->bindParam(':userid',$userid);
		$query->bindParam(':service',$service);
		$query->bindParam(':score',$score);
		$result=$query->execute();
	}
}
