<?php
/**
 * Http Manager
 * 
 * @link https://github.com/MySmile/api-client-php
 */

namespace MySmile\Api\Client;
use MySmile\Api\Client\Manager\AbstractManager;

class Manager extends AbstractManager
{
    /**
     * Gets current instance
     * 
     * @return self
     */
    static public function getInstance()
    {
        if(is_null(self::$obj)) {
            self::$obj = new self();
        }
        
        return self::$obj;
    }
}