<?php

	require_once('configuration.php');

	// $id = $_SESSION['id'];

	// Add to header of your file
	// use FacebookAds\Object\AdAccountActivity;
	use FacebookAds\Object\User;
	use FacebookAds\Object\AdAccount;
	use FacebookAds\Api;
	use FacebookAds\Logger\CurlLogger;


	$requestUrl = @file_get_contents("https://graph.facebook.com/v6.0/me/adaccounts?access_token=" . $_SESSION['fb_access_token']);

	$urlResponse = @json_decode($requestUrl, true);

	if(isset($urlResponse) && !empty($urlResponse) && isset($urlResponse['data']) && sizeof($urlResponse['data']) > 0)
	{
		foreach ($urlResponse['data'] as $keyUR => $valueUR) 
		{
			$account_id = $valueUR['id'];
		}
	}

	// Add after echo "You are logged in "

	// Initialize a new Session and instantiate an API object
	$api = Api::init(
		$app_id, // App ID
		$app_secret,
		$_SESSION['fb_access_token'] // Your user access token
	);

	$api->setLogger(new CurlLogger());

	$fields = array(
	);
	$params = array(
	);
	

	echo json_encode((new User($_SESSION['id']))->getAdAccounts(
	  $fields,
	  $params
	)->getResponse()->getContent(), JSON_PRETTY_PRINT);
