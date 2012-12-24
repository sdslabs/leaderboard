<?php
define("GITHUB_APP_ID","b52094d38463b3377f8a");
define("GITHUB_APP_SECRET","8c0adb6264fe8dd9441ee78cc7c2da7520f17054");
$HTTP_CONFIG=array(
		'proxy_host'        => '10.42.0.2',
		'proxy_port'        => 8124,
		'ssl_capath'				=> '/etc/ssl/certs/',
);
//Point this to your own organization
//Where you want to limit the login
define("GITHUB_ORGANIZATION",'sdslabs');
$db=new PDO("mysql:dbname=leaderboard;host=127.0.0.1",'root','nemoabhay');
