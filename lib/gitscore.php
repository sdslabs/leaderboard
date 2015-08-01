<?php

class gitscore
{
    const name = 'gitscore';
    public static function update($userid)
    {
        global $HTTP_CONFIG;
        $request = new HTTP_Request2('http://gitscore.com/user/'.$userid.'/calculate');
        $request->setConfig($HTTP_CONFIG);
        $response = $request->send()->getBody();
        $score = json_decode($response)->scores->total;
        if (!$score) {
            echo("User not in gitscore, try a little later\n");

            return false;
        }
        Score::update(self::name, $userid, $score);//Update in database
    }
    //Just a dummy function, so as to avoid some errors
    public static function login()
    {
        redirect_to('/');
    }
}
