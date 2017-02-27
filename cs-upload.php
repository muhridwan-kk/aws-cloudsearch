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

	// input/upload
	echo "upload\n";
	$result=$cSearchDomainClient->uploadDocuments([
		'documents'=>
		'[
		 {"type": "add",
		  "id":   "7",
		  "fields": {
		    "id":   "7",
		    "brand": "Toyota",
		    "group" : "Corolla",
		    "title": "Corolla Altis",
		    "condition": "2",
		    "body": ["Sedan"],
		    "color": "3",
		    "item_price": 350000000,
		    "location": "Jakarta",
		    "milage": 75000,
		    "transmission" : "2",
		    "year" : 2011,
		    "created_date" : "2017-02-17T14:45:00Z"
		  }
		 },
		 {"type": "add",
		  "id":   "8",
		  "fields": {
		    "id":   "8",
		    "brand": "Toyota",
		    "title": "Corona 98",
		    "group" : "Corona",
		    "condition": "2",
		    "body": ["Sedan"],
		    "color": "1",
		    "item_price": 75000000,
		    "location": "Jakarta",
		    "milage": 300000,
		    "transmission" : "2",
		    "year" : 1998,
		    "created_date" : "2017-02-17T14:45:00Z"
		  }
		 }
		]'
		,	'contentType'=>'application/json'
	]);	
	echo $result;


