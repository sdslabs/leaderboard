<?php

class codecademy
{
    const name = 'codecademy';
    public static function login()
    {
        set('service', self::name);
        set('prepend', 'codecademy.com/users/');

        return render('ask_username.php');
    }
    public static function update($userid)
    {
        global $HTTP_CONFIG;
        $username = Token::get(self::name, $userid);
        $request = new HTTP_Request2('http://open.dapper.net/transform.php?dappName=CodecademyScore&transformer=JSON&v_username='.$username);
        $request->setConfig($HTTP_CONFIG);
        $response = $request->send()->getBody();
        $score = json_decode($response)->fields->score[0]->value;
        Score::update(self::name, $userid, $score);
    }
    public static function callback()
    {
        //Get the username
        $username = $_GET['username'];
        //Save it inside as an access_token
        Token::add(self::name, $_SESSION['userid'], $username);
        redirect_to('/');
    }
}
