# aws-cloudsearch

1. Run `composer install`
2. Request for `.env` file (not included in this repo)
3. Sample divided into 2 type
  1. Domain and Index creation
    * `cs-delete-domain.php`, be careful, it will delete entire index
    * `cs-create-domain.php`
    * `cs-describe-domain.php`
    * `cs-create-index.php`
    * `cs-describe-index.php`
  2. Index querying
    * `cs-upload.php`
    * `cs-search.php`
    * `cs-search2.php` --> faceting


Resource

1. http://docs.aws.amazon.com/cloudsearch/latest/developerguide/what-is-cloudsearch.html
2. http://docs.aws.amazon.com/aws-sdk-php/v2/api/namespace-Aws.CloudSearch.html
3. http://docs.aws.amazon.com/aws-sdk-php/v2/api/namespace-Aws.CloudSearchDomain.html