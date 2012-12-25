<?php
class Lastfm{
	const name="lastfm";
	public static function login()
    {
		set('service',self::name);
		return render('ask_username.php');
    }
	public static function callback()
	{
      //Get the username
      $username=$_POST['username'];
      //Save it inside as an access_token
      Token::add(self::name,$_SESSION['userid'],$username);
      return "saved";
	}
}