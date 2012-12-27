<?php
class Dropbox{
	const name="dropbox";
	public static function login()
    {
    	$db=new DropboxAPI(DROPBOX_APP_ID,DROPBOX_APP_SECRET);
    	$_SESSION['oauth_token']=$db->oAuthRequestToken();
    	$db->oAuthAuthorize($_SESSION['oauth_token']);
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