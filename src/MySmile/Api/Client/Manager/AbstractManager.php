<?php
/**
 * Abstract Http Manager
 * 
 * @link https://github.com/MySmile/api-client-php
 */

namespace MySmile\Api\Client\Manager;
use MySmile\Api\Client\Exception;

abstract class AbstractManager implements ManagerInterface
{
    /**
     * Endpoint
     *
     * @var string 
     */
    protected $endpoint = 'http:\\mysmile.com.ua\api';
    
    /**
     * Proxy
     * 
     * @var string
     */
    protected $proxy;
    
    /**
     * Raw response data
     * 
     * @var string 
     */
    protected $raw;
    
    /**
     * Curl Options
     * 
     * @var array
     */
    protected $curlOptions = array(
        CURLOPT_CONNECTTIMEOUT  => 5, // timeout on connect 
        CURLOPT_TIMEOUT         => 5  // timeout on response 
    );
    
    /**
     * Current obj
     * 
     * @var self 
     */
    static protected $obj = null;
    
    protected function __construct() 
    {
    }
    
    protected function __clone() 
    {
    }
    
    /**
     * Gets current instance
     * 
     * @return self
     */
    abstract static public function getInstance();
    
    /**
     * Sets  Endpoint
     * 
     * @param string $endpoint
     * @return self
     */
    public function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;
        
        return $this;
    }
    
    /**
     * Sets  Endpoint
     * 
     * @param string $proxy
     * @return self
     */
    public function setProxy($proxy)
    {
        $this->proxy = $proxy;
        
        return $this;
    }
        
    /**
     * Sets Curl Options
     * 
     * @param array $curlOptions
     * @return self
     */
    public function setCurlOptions(array $curlOptions) 
    {
        $this->curlOptions = array_merge($this->curlOptions , $curlOptions);
        
        return $this;
    }
    
    /**
     * Send response to API Server
     * 
     * @param string $resource
     * @param array $params
     * @return array
     * @throws Exception
     */
    public function execute($resource, array $params)
    {
        // create curl resource
        $ch = \curl_init();
        
        // set url with resourse
        \curl_setopt($ch, CURLOPT_URL, $this->endpoint.'/'.$resource);

        // set configurable curl options
        \curl_setopt_array($ch, $this->curlOptions);
        
        // get response string
        \curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        
        // get response
        $this->raw = curl_exec($ch);
                
        // handle curl errors
        if(\curl_errno($ch) !== 0) {
            throw new Exception('Curl error ['.\curl_error($ch).']', 500);
        }
        
        // close curl
        \curl_close($ch); 
        
        // response
        $response = json_decode($this->raw, true);
        
        // parce error
        if($response === false) {
            throw new Exception('Json parce error ['.$this->raw.']', 500);
        }
        
        // response error
        if (isset($response['msg'])) {
            throw new Exception($response['msg'], $response['code']);
        }
        
        return $response;
    }
    
    /**
     * Gets raw data
     * 
     * @return string
     */
    public function getRaw()
    {
        return $this->raw;
    }
}