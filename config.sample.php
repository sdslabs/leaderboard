<?php
define("GITHUB_APP_ID","");
define("GITHUB_APP_SECRET","");
$HTTP_CONFIG=array(
		'proxy_host'        => '',
		'proxy_port'        => '',
		'ssl_capath'				=> '/etc/ssl/certs/',
);
//Point this to your own organization
//Where you want to limit the login
define("GITHUB_ORGANIZATION",'sdslabs');
$db=new PDO("mysql:dbname=leaderboard;host=127.0.0.1",'root','');
