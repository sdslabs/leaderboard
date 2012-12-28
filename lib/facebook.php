<?php
class Facebook{
	const name="facebook";
	public static function login()
    {
    	$state=$_SESSION['state']=uniqid();
    	$redirect_uri="http://".$_SERVER['HTTP_HOST'].'/login/facebook/callback';
    	redirect_to("https://www.facebook.com/dialog/oauth?client_id=".FACEBOOK_APP_ID."&state=$state&redirect_uri=$redirect_uri");
    }
    public static function update($userid)
    {
    	global $HTTP_CONFIG;
    	$access_token=Token::get(self::name,$userid);
		$request=new HTTP_Request2("https://graph.facebook.com/me/subscribers?access_token=$access_token");
		$request->setConfig($HTTP_CONFIG);
		$response = $request->send()->getBody();
		$subscribersCount=json_decode($response)->summary->total_count;
		Score::update(self::name,$userid,$subscribersCount);//Update in database
		redirect_to('/');
    }
	public static function callback()
	{
		global $HTTP_CONFIG;
		//Check state for csrf attack
		if($_SESSION['state']!=$_GET['state'])
			throw new Exception("Invalid Request. Please try again.");

		//Get the access code
		$redirect_uri="http://".$_SERVER['HTTP_HOST'].'/login/facebook/callback';
		$token_url = "https://graph.facebook.com/oauth/access_token?"
		. "client_id=" . FACEBOOK_APP_ID . "&redirect_uri=" . urlencode($redirect_uri)
		. "&client_secret=" . FACEBOOK_APP_SECRET . "&code=" . $_GET['code'];

		//Send the request
		$request=new HTTP_Request2($token_url);
		$request->setConfig($HTTP_CONFIG);
		$response = $request->send()->getBody();
		parse_str($response, $params);

		//Save it inside as an access_token
		Token::add(self::name,$_SESSION['userid'],$params['access_token']);
		redirect_to('/');
	}
}