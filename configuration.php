<?php

	require_once __DIR__ . '/vendor/autoload.php';

	session_start();

	$app_id = '309876893301693';
	$app_secret = '4f72ab39d063fa78f84846c5f632f5f9';
	$account_id = "act_164151083703983";

	$fb = new \Facebook\Facebook([
			'app_id' => $app_id,
			'app_secret' => $app_secret,
			'graph_api_version' => 'v5.0',
	]);

?>