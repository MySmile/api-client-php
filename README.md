MySmile API REST Client
=======================

[![Latest Stable Version](https://poser.pugx.org/mysmile/apiclient/v/stable.svg)](https://packagist.org/packages/mysmile/apiclient)
[![License](https://poser.pugx.org/mysmile/apiclient/license.svg)](https://packagist.org/packages/mysmile/apiclient)
[![Build Status](https://travis-ci.org/MySmile/api-client-php.svg)](https://travis-ci.org/MySmile/api-client-php)
[![Coverage Status](https://coveralls.io/repos/MySmile/api-client-php/badge.png)](https://coveralls.io/r/MySmile/api-client-php)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/2f1a7b84-3a25-4d0f-917c-31bc847a8be1/mini.png)](https://insight.sensiolabs.com/projects/2f1a7b84-3a25-4d0f-917c-31bc847a8be1)

Rest api client Client for MySmile CMS.

Requirements
------------
* PHP 5.3+
* Curl

Installation
------------
The best way to install MySmile Api Client is use composer:

1. Update your `composer.json`

```json
{
    "require": {
        "mysmile/apiclient": "dev-master"
    }
}
```

2. Run `composer update`

Usage
-----

### Manager configuration
``` php
    $endpoint   = 'http://demo.mysmile.com.ua/api'; // please set your endpoint instead of demo
    $manager    = Manager::getInstance()
        ->setEndpoint($endpoint);
```  

For developing purpose it's possible to configure proxy:
```
    $proxy   = 'http://127.0.0.1:8888';
    $manager = Manager::getInstance()
        ->setProxy();
```

### Get language list
``` php
    $language = new Language($manager);
    $response = $language->getData();
``` 

### Get contact
``` php
    $contact    = new Contact($manager);
    $response   = $contact->getData();
``` 

### Get content list
--------------------
``` php
   $params     = array('lang' => 'en');// list of available languages can be get using Language Resource 
   $content    = new Content($manager);
   $response   = $content->getData($params);
``` 

### Get content by slug 
``` php
   $params     = array('lang' => 'en', 'slug' => 'index'); // how to get list of available slugs is presented in the example above
   $content    = new Content($manager);
   $response   = $content->getData($params);
``` 

Example
-------
Mobile version of MySmile that is based on MySmile Api Client can be found here ``/doc/example``.

### Installation
Run ``composer update`` in ``/doc/example``.

License
-------
BSD-3-Clause
