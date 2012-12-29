<?php
class Euler{
	const name="euler";
	public static function login()
    {
		set('service',self::name);
		return render('ask_username.php');
    }
    public static function update($userid)
    {
    	global $HTTP_CONFIG;
    	$username=Token::get(self::name,$userid);
    	//More information at http://geekraj.com/wordpress/?p=278
    	//see http://geekraj.com/euler/euler.js
		$request=new HTTP_Request2("http://www.geekraj.com/euler/getscore.php?id=".$username);
		$request->setConfig($HTTP_CONFIG);
		$response = $request->send()->getBody();
		$score=json_decode(str_replace("'",'"',substr($response,12,-2)))->score;
		$score=substr($score,7);
		Score::update(self::name,$userid,$score);
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