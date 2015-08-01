<?php

/**
 * Filepanda index.php
 * This is the main router file.
 */
require 'lib/limonade.php';//Include the framework
require 'config.php';//Configuration
require 'HTTP/Request2.php';

/**
 * This function is called before each
 * route initialization.
 */
function before($route)
{
    layout('layout.php');//default layout
    set('userid', @$_SESSION['userid']);
}

/* Autoloading class.php **/
spl_autoload_register(function ($class) {
    include 'lib/'.strtolower($class).'php';
});
/**
 * 404 error page.
 */
function not_found($errno, $errstr, $errfile = null, $errline = null)
    //if there is a missing image
{
    if (strpos($errstr, '/public/soft_images/') !== false) {
        render_file('public/img/down.png');

        return;
    }
    before();
    set('errno', $errno);
    set('errstr', $errstr);
    set('errfile', $errfile);
    set('errline', $errline);
    layout('layout.php');

    return html('404.php');
}

/** Handle 500 errors */
function server_error($errno, $errstr, $errfile = null, $errline = null)
{
    $args = compact('errno', 'errstr', 'errfile', 'errline');

    return var_dump($args, true);
}
/*
 * Home page shows all scores
 * for all users
 */
dispatch('/', 'Score::view_all');

dispatch('/debug', function () {
    return json($_SESSION);
});

/* Authentication Related Stuff */
dispatch('/login/:service', function () {
    $serviceClassName = ucfirst(params('service'));
    //since github is our main authentication method
    //we allow that to run unauthenticated
    if (!@$_SESSION['userid'] && $serviceClassName != 'Github') {
        throw new Exception('You need to be logged in');
    }
    set('username', Token::get(params('service'), $_SESSION['userid']));

    return $obj = $serviceClassName::login();
});
dispatch('/login/:service/callback', function () {
    $serviceClassName = ucfirst(params('service'));
    if (!@$_SESSION['userid'] && $serviceClassName != 'Github') {
        throw new Exception('You need to be logged in');
    }

    return $serviceClassName::callback();
});
dispatch('/logout', function () {
    unset($_SESSION['userid']);
    redirect_to('/');
});

/*
 * Update score for a particular
 * user and service
 */
dispatch('/update/:service/:userid', function () {
    $serviceClassName = ucfirst(params('service'));
    $serviceClassName::update(params('userid'));
    flash('message', 'Your score for '.params('service').' has been updated');
    redirect_to('/accounts');
});

//Management of linked accounts
dispatch('/accounts', function () {
    if (!@$_SESSION['userid']) {
        throw new Exception('You need to be logged in');
    }
    global $db;
    $userid = $_SESSION['userid'];

    return html('accounts.php');
});

//Static pages
dispatch('/page/:page', function () {
    return html('pages/'.params('page').'.html');
});

//Start the app
run();
