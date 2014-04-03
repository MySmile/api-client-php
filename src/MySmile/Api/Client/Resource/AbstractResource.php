<?php
/**
 * Resource Interface
 * 
 * @link        https://github.com/MySmile/api-client-php
 * @license     http://opensource.org/licenses/BSD-3-Clause New BSD License
 */

namespace MySmile\Api\Client\Resource;
use MySmile\Api\Client\Manager;
use MySmile\Api\Client\Exception;

abstract class AbstractResource  implements ResourceInterface 
{   
    /**
     * Format
     * 
     * @var string
     */
    const FORMAT = 'json';
    
    /**
     * Http Manager
     * 
     * @var MySmile\Api\Client\Manager 
     */
    protected $manager;
    
    /**
     * Default params
     *  
     * @var type 
     */
    protected $params = array(
        'format' => self::FORMAT
    );
    
    /**
     * Required params
     * 
     * @var array 
     */
    protected $requiredParams = array();
    
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
        $params = \array_merge($this->params, $params);
        $this->checkRequiredParams($params);
        
        return $this->manager->execute($this->resourceName, $params);
    }
    
    /**
     * Check required params
     * 
     * @throws MySmile\Api\Client\Exception
     */
    protected function checkRequiredParams(array $params) 
    {        
        $invalid = array();
        foreach ($this->requiredParams as $item) {
            if (empty($params[$item])) {
                $invalid[] = $item;
            }
        }
        
        if (!empty($invalid)) {
            throw new Exception('Error: required parameters not set or empty "'.\implode(', ', $invalid).'". Please set parameters and try again.');
        }
    }
}