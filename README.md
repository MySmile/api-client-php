MySmile API REST Client
=======================

Objective
---------
This project provides Client for MySmile REST API.

Examples
--------
  * Example can be found in ``/docs/examples``.
  * unitTests can be found here ``/tests/src/MySmile/Api/Client``
  * For more information about MySmile REST API please look into MySmile documentation.


Manager initiate
----------------
Before start of using MySmile REST API Client it is essential to configurate Manager:
```
    $endpoint   = 'http://127.0.0.1:8000/api'; // please set your endpoint instead of localhost
    $manager    = Manager::getInstance()
        ->setEndpoint($endpoint);
``` 

Language Resource
-----------------
To get list of available languages it is need:
```
    $language = new Language($manager);
    $response = $language->getData();
``` 

Contact Resource
-----------------
To get contacts:
```
    $contact    = new Contact($manager);
    $response   = $contact->getData();
``` 

Content Resource
----------------
For construction menu it is need to send those request:
```
   $params     = array('lang' => 'en');// list of available languages can be get using Language Resource 
   $content    = new Content($manager);
   $response   = $content->getData($params);
``` 

To get page by slug: 
```
   $params     = array('lang' => 'en', 'slug' => 'index'); // how to get list of available slugs is presented in the example above
   $content    = new Content($manager);
   $response   = $content->getData($params);
``` 

Set Proxy
---------
It is helpful to see request/response using proxy. Code bellow show how to set proxy to Manager
```
    $proxy   = 'http://127.0.0.1:8888';
    $manager = Manager::getInstance()
        ->setProxy();
```

Requirement
-----------
  * PHP 5.3
  * Apache
  * phpUnit for unit tests 
