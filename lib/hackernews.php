<?php

class hackernews
{
    const name = 'hackernews';
    public static function login()
    {
        set('service', self::name);
        set('prepend', 'news.ycombinator.com/user?id=');

        return render('ask_username.php');
    }
    public static function update($userid)
    {
        global $HTTP_CONFIG;
        $username = Token::get(self::name, $userid);
        $request = new HTTP_Request2('https://hacker-news.firebaseio.com/v0/user/'.$username.'.json');
        $request->setConfig($HTTP_CONFIG);
        $response = $request->send()->getBody();
        $karma = json_decode($response)->karma;
        Score::update(self::name, $userid, $karma);
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
