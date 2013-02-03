<?php
/**
 * Required Configuration
 * KLOUT_APP_KEY
 */
class Klout{
  const name="klout";
  public static function login()
    {
    set('service',self::name);
    set('hint','Please enter your twitter handle');
    set('prepend','@');
    return render('ask_username.php');
    }
    public static function update($userid)
    {
		global $HTTP_CONFIG;
		$id=Token::get(self::name,$userid);
		$request=new HTTP_Request2("http://api.klout.com/v2/identity.json/twitter?screenName=".$id."&key=".KLOUT_APP_KEY);
		$request->setConfig($HTTP_CONFIG);
		$response = $request->send()->getBody();
		
		$id = json_decode($response)->id;
		$request=new HTTP_Request2("http://api.klout.com/v2/user.json/".$id."/score?key=".KLOUT_APP_KEY);
		$request->setConfig($HTTP_CONFIG);
		$response = $request->send()->getBody();
		$score=(int)json_decode($response)->score;
		Score::update(self::name,$userid,$score);//Update in database
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
