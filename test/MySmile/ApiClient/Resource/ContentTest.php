<?php
/**
 * Test for Content
 * 
 * @link        https://github.com/MySmile/api-client-php
 * @license     http://opensource.org/licenses/BSD-3-Clause New BSD License
 */

use MySmile\ApiClient\Resource\Content;

class ContentTest extends BaseTest
{
    /**
     * @dataProvider providerGetDataValid
     * @param array $params
     */
    public function testGetDataValid(array $params)
    {
        $content    = new Content($this->manager);
        $response   = $content->getData($params);
        
        $this->assertTrue(is_array($response));
        $this->assertEquals(200, $response['code']);
    }
    
    /**
     * @expectedException \MySmile\ApiClient\Exception
     * @expectedExceptionCode 404
     * @dataProvider providerGetDataInValid
     * @param array $params
     */
    public function testGetDataInValid(array $params)
    {
        $content = new Content($this->manager);
        $content->getData($params);
    }
    
    public function providerGetDataValid()
    {
        return array(
            array(array('lang' => 'uk')),
            array(array('lang' => 'uk', 'slug' => 'index'))
        );
    }
    
    public function providerGetDataInValid()
    {
        return array(
            array(array('lang' => 'um')),
            array(array('lang' => 'uk', 'slug' => 'test'))
        );
    }
}
