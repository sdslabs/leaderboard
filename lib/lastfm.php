<?php
class Lastfm{
	const name="lastfm";
	public static function login()
    {
		set('service',self::name);
		return render('ask_username.php');
    }
    public static function update($userid)
    {
    	global $HTTP_CONFIG;
    	$lastFMUsername=Token::get(self::name,$userid);
		$request=new HTTP_Request2("http://ws.audioscrobbler.com/2.0/?method=user.getinfo&user=".$lastFMUsername."&api_key=".LASTFM_APP_ID."&format=json");
		$request->setConfig($HTTP_CONFIG);
		$response = $request->send()->getBody();
		$playcount=trim(json_decode($response)->user->playcount);
		Score::update(self::name,$userid,$playcount);//Update in database
		redirect_to('/');
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