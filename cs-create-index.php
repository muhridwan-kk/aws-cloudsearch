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


    echo "create index in domain ".$CLOUDSEARCH_DOMAIN."\r\n";

	$result = $cSearchClient->defineIndexField(array(
    	'DomainName' => $CLOUDSEARCH_DOMAIN,
    	'IndexField' => array(
    		'IndexFieldName'=>'id',
    		'IndexFieldType'=>'literal',
	        'LiteralOptions' => array(
	            'ReturnEnabled' => true,
	            'SortEnabled' => true
	        )    	
	    ),
	));
	$result = $cSearchClient->defineIndexField(array(
    	'DomainName' => $CLOUDSEARCH_DOMAIN,
    	'IndexField' => array(
    		'IndexFieldName'=>'body',
    		'IndexFieldType'=>'literal-array',
    		'LiteralArrayOptions' => array(
	            'FacetEnabled' => true,
	            'SearchEnabled' => true,
	            'ReturnEnabled' => true
        	)
    	),
	));

	$result = $cSearchClient->defineIndexField(array(
    	'DomainName' => $CLOUDSEARCH_DOMAIN,
    	'IndexField' => array(
    		'IndexFieldName'=>'brand',
    		'IndexFieldType'=>'text',
	        'TextOptions' => array(
	            'ReturnEnabled' => true,
	            'SortEnabled' => true,
	            'HighlightEnabled' => true,
	            'AnalysisScheme' => '_en_default_'
	        )    	
	    ),
	));

	$result = $cSearchClient->defineIndexField(array(
    	'DomainName' => $CLOUDSEARCH_DOMAIN,
    	'IndexField' => array(
    		'IndexFieldName'=>'color',
    		'IndexFieldType'=>'int',
	        'IntOptions' => array(
	            'FacetEnabled' => true,
	            'SearchEnabled' => true,
	            'ReturnEnabled' => true,
	            'SortEnabled' => true
	        )
	    ),
	));
	$result = $cSearchClient->defineIndexField(array(
    	'DomainName' => $CLOUDSEARCH_DOMAIN,
    	'IndexField' => array(
    		'IndexFieldName'=>'condition',
    		'IndexFieldType'=>'int',
	        'IntOptions' => array(
	            'FacetEnabled' => true,
	            'SearchEnabled' => true,
	            'ReturnEnabled' => true,
	            'SortEnabled' => true
	        )
	    ),
	));
	$result = $cSearchClient->defineIndexField(array(
    	'DomainName' => $CLOUDSEARCH_DOMAIN,
    	'IndexField' => array(
    		'IndexFieldName'=>'created_date',
    		'IndexFieldType'=>'date',
	        'DateOptions' => array(
	            'FacetEnabled' => false,
	            'SearchEnabled' => true,
	            'ReturnEnabled' => true,
	            'SortEnabled' => true
	        )
	    ),
	));
	$result = $cSearchClient->defineIndexField(array(
    	'DomainName' => $CLOUDSEARCH_DOMAIN,
    	'IndexField' => array(
    		'IndexFieldName'=>'group',
    		'IndexFieldType'=>'text',
	        'TextOptions' => array(
	            'ReturnEnabled' => true,
	            'SortEnabled' => true,
	            'HighlightEnabled' => true,
	            'AnalysisScheme' => '_en_default_'
	        )    	
	    ),
	));
	$result = $cSearchClient->defineIndexField(array(
    	'DomainName' => $CLOUDSEARCH_DOMAIN,
    	'IndexField' => array(
    		'IndexFieldName'=>'item_price',
    		'IndexFieldType'=>'int',
	        'IntOptions' => array(
	            'FacetEnabled' => true,
	            'SearchEnabled' => true,
	            'ReturnEnabled' => true,
	            'SortEnabled' => true
	        )    	
	    ),
	));

	$result = $cSearchClient->defineIndexField(array(
    	'DomainName' => $CLOUDSEARCH_DOMAIN,
    	'IndexField' => array(
    		'IndexFieldName'=>'location',
    		'IndexFieldType'=>'text',
	        'TextOptions' => array(
	            'ReturnEnabled' => true,
	            'SortEnabled' => true,
	            'HighlightEnabled' => true,
	            'AnalysisScheme' => '_id_default_'
	        )    	
	    ),
	));

	$result = $cSearchClient->defineIndexField(array(
    	'DomainName' => $CLOUDSEARCH_DOMAIN,
    	'IndexField' => array(
    		'IndexFieldName'=>'milage',
    		'IndexFieldType'=>'int',
	        'IntOptions' => array(
	            'FacetEnabled' => true,
	            'SearchEnabled' => true,
	            'ReturnEnabled' => true,
	            'SortEnabled' => true
	        )    	
	    ),
	));
	$result = $cSearchClient->defineIndexField(array(
    	'DomainName' => $CLOUDSEARCH_DOMAIN,
    	'IndexField' => array(
    		'IndexFieldName'=>'title',
    		'IndexFieldType'=>'text',
	        'TextOptions' => array(
	            'ReturnEnabled' => true,
	            'SortEnabled' => true,
	            'HighlightEnabled' => true,
	            'AnalysisScheme' => '_id_default_'
	        )    	
	    ),
	));
	$result = $cSearchClient->defineIndexField(array(
    	'DomainName' => $CLOUDSEARCH_DOMAIN,
    	'IndexField' => array(
    		'IndexFieldName'=>'year',
    		'IndexFieldType'=>'int',
	        'IntOptions' => array(
	            'FacetEnabled' => true,
	            'SearchEnabled' => true,
	            'ReturnEnabled' => true,
	            'SortEnabled' => true
	        )    	
	    ),
	));
	$result = $cSearchClient->defineIndexField(array(
    	'DomainName' => $CLOUDSEARCH_DOMAIN,
    	'IndexField' => array(
    		'IndexFieldName'=>'transmission',
    		'IndexFieldType'=>'int',
	        'IntOptions' => array(
	            'FacetEnabled' => true,
	            'SearchEnabled' => true,
	            'ReturnEnabled' => true,
	            'SortEnabled' => true
	        )    	
	    ),
	));
	// print it
	echo $result;
	echo "Reindexing\r\n";
	$result = $cSearchClient->indexDocuments(array(
    	'DomainName' => $CLOUDSEARCH_DOMAIN
	));
	echo $result;

