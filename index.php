<?php
/**
 * Filepanda index.php
 * This is the main router file
 */
require('lib/limonade.php');//Include the framework
require('lib/module.php');
require('config.php');//Configuration
require "HTTP/Request2.php";

ini_set('display_errors',1);
error_reporting(-1);
/**
 * This function is called before each 
 * route initialization
 */
function before($route)
{
	layout('layout.php');//default layout
	set('title','Leaderboard - SDSLabs');
	set('userid',@$_SESSION['userid']);
}

/** Autoloading class.php **/
spl_autoload_register(function ($class) {
    include 'lib/' . strtolower($class) . 'php';
});
/**
 * 404 error page
 */
function not_found($errno, $errstr, $errfile=null, $errline=null)
	//if there is a missing image
{
	if(strpos($errstr,"/public/soft_images/")!==false)
	{
		render_file('public/img/down.png');
		return;
	}
	before();
    set('errno', $errno);
    set('errstr', $errstr);
    set('errfile', $errfile);
    set('errline', $errline);
    layout('layout.php');
    return html("404.php");
}

/** Handle 500 errors */
function server_error($errno, $errstr, $errfile=null, $errline=null)
{
    $args = compact('errno', 'errstr', 'errfile', 'errline');
    return var_dump($args,true);
}
/**
 * Home page shows all scores
 * for all users
 */
dispatch('/','Score::view_all');

dispatch('/debug',function(){
    return json($_SESSION);
});

/** Authentication Related Stuff */
dispatch('/login/:service',function(){
	$serviceClassName=ucfirst(params('service'));
	return $obj=$serviceClassName::login();
});
dispatch('/login/:service/callback',function(){
	$serviceClassName=ucfirst(params('service'));
	return $serviceClassName::callback();
});
dispatch('/logout',function(){
    $_SESSION['userid']=false;
    redirect_to('/debug');
});

/**
 * Update score for a particular
 * user and service 
 */
dispatch('/update/:service/:userid',function(){
    $serviceClassName=ucfirst(params('service'));
    $obj=$serviceClassName::update(params('userid'));
});

//Start the app
run();
?>
