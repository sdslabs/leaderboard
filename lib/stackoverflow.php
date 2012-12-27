<?php
/**
 * Required Configuration
 * STACKEXCHANGE_KEY : Key of your SE App
 */
class Stackoverflow{
	const name="stackoverflow";
	public static function login()
    {
		set('service',self::name);
		set('hint',"Enter your numeric userid (http://stackoverflow.com/users/<strong>368328</strong>/capt-nemo). <br>Just the number is needed");
		return render('ask_username.php');
    }
    public static function update($userid)
    {
    	global $HTTP_CONFIG;
    	$id=Token::get(self::name,$userid);
		$request=new HTTP_Request2("https://api.stackexchange.com/2.1/users/".$id."?site=stackoverflow&key=".STACKEXCHANGE_KEY);
		$request->setConfig($HTTP_CONFIG);
		$response = $request->send()->getBody();
		$reputation=json_decode($response)->items[0]->reputation;
		Score::update(self::name,$userid,$reputation);//Update in database
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