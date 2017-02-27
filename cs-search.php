<?php
	/**
	 *	Sample to use CloudSearchDomainClient.
	 *
	 **/
	require 'vendor/autoload.php';

	$dotenv = new Dotenv\Dotenv(__DIR__);
	$dotenv->load();

	// somehow need to set timezone first
	date_default_timezone_set('Asia/Jakarta');
	$CLOUDSEARCH_ENDPOINT=getenv('CLOUDSEARCH_ENDPOINT');
	$cSearchDomainClient=new Aws\CloudSearchDomain\CloudSearchDomainClient([
		'endpoint' => $CLOUDSEARCH_ENDPOINT,
		'version' => 'latest'
	]);

	// search "Mercedes"
	$result=$cSearchDomainClient->search([
		'query'=>"Mercedes"
	]);	
	echo $result;

	// search "Merc"
	$result=$cSearchDomainClient->search([
		'query'=>"Merc*"
	]);	
	echo $result;

	//
	// search "Wagon" from body type, case sensitif
	$result=$cSearchDomainClient->search([
		'query'=>"Wagon",
		'options'=>['body']
	]);	


	// print it
	echo $result;
