<?php
class Spoj{
	const name="spoj";
	public static function login()
    {
		set('service',self::name);
		return render('ask_username.php');
    }
    public static function update($userid)
    {
    	global $HTTP_CONFIG;
    	$username=Token::get(self::name,$userid);
		$request=new HTTP_Request2("http://open.dapper.net/transform.php?dappName=ScoreFromSpoj&transformer=JSON&v_username=".$username);
		$request->setConfig($HTTP_CONFIG);
		$response = $request->send()->getBody();
		$score=json_decode($response)->fields->score[0]->value;
		/**
		 * The score is formatted as 
		 * (n points)
		 */
		$spacePosition=strpos($score,' ');
		$score=(int)substr($score,1,$spacePosition-1);
		Score::update(self::name,$userid,$score);
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