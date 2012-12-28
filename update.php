<?php
require('config.php');//Configuration
require "HTTP/Request2.php";
/** Autoloading class.php **/
spl_autoload_register(function ($class) {
    include 'lib/' . strtolower($class) . '.php';
});
$tokens=Token::getAll();
foreach($tokens as $row)
{
	echo $row['service']."::".$row['userid']."\n";
	$className=ucfirst($row['service']);
	$className::update($row['userid']);
	if($row['service']=='github')
	{
		//perform a gitscore update as well
		//since we don't store a token for it
		Gitscore::update($row['userid']);
		echo "gitscore::".$row['userid']."\n";
	}
}