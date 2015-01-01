<?php
/**
 * Http Manager
 * 
 * @link        https://github.com/MySmile/api-client-php
 * @license     http://opensource.org/licenses/BSD-3-Clause New BSD License
 */

namespace MySmile\ApiClient;
use MySmile\ApiClient\Manager\AbstractManager;

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
