<?php
	/**
	 *	Sample to use CloudSearchClient.
	 *
	 **/
	require 'vendor/autoload.php';

	$dotenv = new Dotenv\Dotenv(__DIR__);
	$dotenv->load();

	// somehow need to set timezone first
	date_default_timezone_set('Asia/Jakarta');
	$CLOUDSEARCH_DOMAIN=getenv('CLOUDSEARCH_DOMAIN');
	$cSearchClient=new Aws\CloudSearch\CloudSearchClient([
		'region' => 'ap-southeast-1',
		'version' => 'latest'
	]);

	// getting the index sructured
	$result=$cSearchClient->describeIndexFields([
		'Deployed'=>true,
		'DomainName'=>$CLOUDSEARCH_DOMAIN]
	);	
	// print it
	echo $result;
