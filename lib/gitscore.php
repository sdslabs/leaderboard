<?php
class Gitscore {
	const name="gitscore";
    public static function update($userid)
    {
    	global $HTTP_CONFIG;
		$request=new HTTP_Request2("http://gitscore.com/user/".$userid."/calculate");
		$request->setConfig($HTTP_CONFIG);
		$response = $request->send()->getBody();
		$score=json_decode($response)->scores->total;
		Score::update(self::name,$userid,$score);//Update in database
		redirect_to('/');
		
    }
}