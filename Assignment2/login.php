<?php

session_start();

require './vendor/autoload.php';

$OAuthApplication = new Facebook\Facebook([

'app_id' => '2275129156042506',
'app_secret' =>'b7dc65a5c96ea41995624c86bc77fd8b',
'default_graph_version' =>'v2.7'
]);


$helper = $OAuthApplication->getRedirectLoginHelper();
$OAuthLink = $helper->getLoginUrl("http://localhost/Assignment2/");

try{
	
	$accessToken = $helper->getAccessToken();
	if(isset($accessToken))
	{
		
		$_SESSION['access_token'] = (string)$accessToken;
		header("Location:index.php");
	}
}catch(Exception $exc){
	
	echo $exc->getTraceAsString();
}

	if(isset($_SESSION['access_token'])){
		try
		{
				$OAuthApplication->setDefaultAccessToken($_SESSION['access_token']);
				$res = $OAuthApplication->get('/me?locale=en_us&fields=name,email');
				$user = $res->getGraphUser();
			
		}catch(Exception $exc)
		{echo $exc->getTraceAsString();}
	}