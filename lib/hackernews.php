<?php
class Hackernews{
	const name="hackernews";
	public static function login()
    {
		set('service',self::name);
		return render('ask_username.php');
    }
    public static function update($userid)
    {
    	global $HTTP_CONFIG;
    	$username=Token::get(self::name,$userid);
		$request=new HTTP_Request2("http://open.dapper.net/transform.php?dappName=HackerNewsUserKarmaVersion2&transformer=JSON&v_username=".$username);
		$request->setConfig($HTTP_CONFIG);
		$response = $request->send()->getBody();
		$karma=json_decode($response)->fields->karma[0]->value;
		Score::update(self::name,$userid,$karma);
    }
	public static function callback()
	{		
		//Get the username
		$username=$_GET['username'];
		//Save it inside as an access_token
		Token::add(self::name,$_SESSION['userid'],$username);
		redirect_to('/');
	}
}