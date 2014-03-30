<?php

namespace MySmile;

/**
 * Gets data from cache
 * 
 * @param string $key
 * @param \MySmile\Api\Client\Manager $manager
 * @param string $resource_name
 * @param array $params
 * @return array
 */
function getFromCache($key, \MySmile\Api\Client\Manager $manager, $resource_name, array $params = array())
{
    $result = (isset($_SESSION[$key]))? $_SESSION[$key]: false;
    if ($result === false) {
        $resource_name  = '\MySmile\Api\Client\Resource\\'.$resource_name;
        $resource       = new $resource_name($manager);
        $result         = $resource->getData($params);
           
        $_SESSION[$key] = $result;
    }
    
    return $result;
}

/**
 * Gets $_GET params
 * 
 * @param string $key
 * @param string $default
 * @return mix
 */
function getParam($key, $default = null) 
{
    return (isset($_GET[$key]))? $_GET[$key]: $default;
}
