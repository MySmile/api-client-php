<?php
/**
 * Resource Interface
 * 
 * @link        https://github.com/MySmile/api-client-php
 * @license     http://opensource.org/licenses/BSD-3-Clause New BSD License
 */

namespace MySmile\Api\Client\Resource;
use MySmile\Api\Client\Manager;

interface ResourceInterface  
{   
    /**
     * @param MySmile\Api\Client\Manager $manager
     */
    public function __construct(Manager $manager);
    
    /**
     * Sets Manager
     * 
     * @param MySmile\Api\Client\Manager $manager
     * @return self
     */
    public function setManager(Manager $manager);
    
    /**
     * Gets Manager
     * 
     * @return MySmile\Api\Client\Manager
     */
    public function getManager();
    
    /**
     * Gets Data
     * 
     * @param array $params
     * @return array
     */
    public function getData(array $params = array());
}