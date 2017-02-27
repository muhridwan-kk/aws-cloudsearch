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

	// search "Mercedes" faceted
	echo "search Mercedes milage faceted\n";
	$result=$cSearchDomainClient->search([
		'query'=>"Toyota",
		'facet'=>'{milage:{}}'
	]);	
	echo $result;


