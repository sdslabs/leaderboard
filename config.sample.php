<?php

define('GITHUB_APP_ID', '');
define('GITHUB_APP_SECRET', '');
define('STACKEXCHANGE_KEY', '');
define('LASTFM_APP_ID', '');
define('FACEBOOK_APP_ID', '');
define('FACEBOOK_APP_SECRET', '');
define('KLOUT_APP_KEY', '');
$HTTP_CONFIG = [
        'proxy_host'                => '',
        'proxy_port'                => '',
        'ssl_capath'                => '/etc/ssl/certs/',
];
//Point this to your own organization
//Where you want to limit the login
//You can remove this line to make the app open to all (anyone with a github a/c can login)
define('GITHUB_ORGANIZATION', 'sdslabs');//case sensitive
$db = new PDO('mysql:dbname=leaderboard;host=127.0.0.1', 'root', 'password');
//These services are shown on the accounts mgt page
$SERVICES = ['askubuntu','codechef','facebook','github','hackernews','klout','lastfm','projecteuler','spoj','stackoverflow','twitter'];
