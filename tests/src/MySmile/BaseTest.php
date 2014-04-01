<?php
/**
 * Base MySmile UnitTest
 * 
 * @link        https://github.com/MySmile/api-client-php
 * @license     http://opensource.org/licenses/BSD-3-Clause New BSD License
 */

namespace MySmile;
use MySmile\Api\Client\Manager;

class BaseTest extends \PHPUnit_Framework_TestCase 
{
    /**
     * Endpoint
     *
     * @var string
     */
    protected $endpoint = 'http://127.0.0.1:8000/api';
    
    /**
     * Proxy
     * 
     * @var string 
     */
    protected $proxy = 'http://127.0.0.1:8888';
    
    /**
     * Manager
     * 
     * @var MySmile\Api\Clien\Manager 
     */
    protected $manager;
    
    /**
     * Template methods runs once for each test method
     * of the test case class 
     */
    protected function setUp()
    {
        $this->manager = Manager::getInstance()
                ->setEndpoint($this->endpoint)
                ->setProxy($this->proxy);
    }
}