<?php
/**
 * Resource Interface
 * 
 * @link        https://github.com/MySmile/api-client-php
 * @license     http://opensource.org/licenses/BSD-3-Clause New BSD License
 */

namespace MySmile\ApiClient\Resource;
use MySmile\ApiClient\Manager;

interface ResourceInterface  
{   
    /**
     * @param MySmile\ApiClient\Manager $manager
     */
    public function __construct(Manager $manager);
    
    /**
     * Sets Manager
     * 
     * @param MySmile\ApiClient\Manager $manager
     * @return self
     */
    public function setManager(Manager $manager);
    
    /**
     * Gets Manager
     * 
     * @return MySmile\ApiClient\Manager
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
