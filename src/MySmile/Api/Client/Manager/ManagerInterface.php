<?php
/**
 * Http Manager Interface
 * 
 * @link        https://github.com/MySmile/api-client-php
 * @license     http://opensource.org/licenses/BSD-3-Clause New BSD License
 */

namespace MySmile\Api\Client\Manager;

interface ManagerInterface  
{
    /**
     * Gets current instance
     * 
     * @return self
     */
    static public function getInstance();
    
    /**
     * Sets  Endpoint
     * 
     * @param string $endpoint
     * @return self
     */
    public function setEndpoint($endpoint);
    
    /**
     * Sets  Endpoint
     * 
     * @param string $proxy
     * @return self
     */
    public function setProxy($proxy);
    
    /**
     * Sets Curl Options
     * 
     * @param array $curlOptions
     * @return self
     */
    public function setCurlOptions(array $curlOptions);
    
    /**
     * Send response to API Server
     * 
     * @param string $resource
     * @param array $params
     * @return array
     * @throws Exception
     */
    public function execute($resource, array $params);
    
    /**
     * Gets raw data
     * 
     * @return string
     */
    public function getRaw();
}