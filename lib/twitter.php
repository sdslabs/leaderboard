<?php
class Twitter{
	const name="twitter";
	public static function login()
    {
		set('service',self::name);
		return render('ask_username.php');
    }
    public static function update($userid)
    {
    	global $HTTP_CONFIG;
    	$twitterScreenName=Token::get(self::name,$userid);
		$request=new HTTP_Request2("https://api.twitter.com/1/users/show.json?screen_name=".$twitterScreenName);
		$request->setConfig($HTTP_CONFIG);
		$response = $request->send()->getBody();
		$followers_count=json_decode($response)->followers_count;
		Score::update(self::name,$userid,$followers_count);//Update in database
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