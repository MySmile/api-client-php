<?php
/**
 * Resource Interface
 * 
 * @link        https://github.com/MySmile/api-client-php
 * @license     http://opensource.org/licenses/BSD-3-Clause New BSD License
 */

namespace MySmile\Api\Client\Resource;
use MySmile\Api\Client\Manager;

abstract class AbstractResource  implements ResourceInterface 
{
    /**
     * Default language
     * 
     * @var string 
     */
    static public $language = 'en';
    
    /**
     * Http Manager
     * 
     * @var MySmile\Api\Client\Manager 
     */
    protected $manager;
    
    /**
     * @param MySmile\Api\Client\Manager $manager
     */
    public function __construct(Manager $manager) 
    {
        $this->manager = $manager;
    }
    
    /**
     * Sets Manager
     * 
     * @param MySmile\Api\Client\Manager $manager
     * @return self
     */
    public function setManager(Manager $manager)
    {
        $this->manager = $manager;
        
        return $this;
    }
    
    /**
     * Gets Manager
     * 
     * @return MySmile\Api\Client\Manager
     */
    public function getManager()
    {
        return $this->manager;
    }
    
    /**
     * Gets Data
     * 
     * @param array $params
     * @return array
     */
    public function getData(array $params = array())
    {
        $param['lang'] = (isset($param['lang']))? $param['lang']: self::$language;
        
        return $this->manager->execute($this->resourceName, $params);
    }
}