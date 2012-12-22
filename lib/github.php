<?php
/** Required configuration 
 * GITHUB_APP_ID (application id)
 * GITHUB_APP_SECRET (application secret)
*/

class Github extends Module{
	const ACCESS_TOKEN_URL='https://github.com/login/oauth/access_token';
	public function update()
	{

	}
	public static function login()
	{
		header("Location: https://github.com/login/oauth/authorize?client_id=".GITHUB_APP_ID);
	}
	public static function callback()
	{
		//exchange the code you get for a access_token
		$code=$_GET['code'];
		require "HTTP/Request2.php";
		$request = new HTTP_Request2(self::ACCESS_TOKEN_URL);
		$request->setConfig(array(
		    'proxy_host'        => 'http://10.42.0.2/',
		    'proxy_port'        => 8124
		));
		$request->setMethod(HTTP_Request2::METHOD_POST);
		$request->addPostParameter(array(
			'client_id'=>GITHUB_APP_ID,
			'client_secret'=>GITHUB_APP_SECRET,
			'code'=>$code
		));
		$response = $request->send()->getBody();
		return $response;
	}
}