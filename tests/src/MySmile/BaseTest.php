<?php
/**
 * Base MySmile UnitTest
 * 
 * @link https://github.com/MySmile/api-client-php
 */

namespace MySmile;

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
    protected $proxy = '127.0.0.1:8888';
    
    /**
     * Template methods runs once for each test method
     * of the test case class 
     */
    protected function setUp()
    {
        
    }
}