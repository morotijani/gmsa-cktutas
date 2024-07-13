<?php

	// SIGN IN PAGE
	require_once ("./../db_connection/conn.php");

	$curl = curl_init();

	curl_setopt_array($curl, array(
		CURLOPT_URL => 'https://timeapi.io/api/Time/current/zone?timeZone=Africa%2FAccra',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'GET',
		CURLOPT_HTTPHEADER => array(
	    	'Access-Control-Allow-Headers: application/json',
	    	'Access-Control-Allow-Origin: *'
	  	),
	));

	$response = curl_exec($curl);

	curl_close($curl);
	echo $response;
