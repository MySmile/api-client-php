<?php
/**
 * Test for Language
 * 
 * @link        https://github.com/MySmile/api-client-php
 * @license     http://opensource.org/licenses/BSD-3-Clause New BSD License
 */

namespace MySmile\Api\Client\Resource;
use MySmile\BaseTest;
use MySmile\Api\Client\Resource\Language;

class LanguageTest extends BaseTest
{
    public function testGetData()
    {
        $language = new Language($this->manager);
        $response = $language->getData();
        
//        var_dump($response);
        $this->assertTrue(is_array($response));
        $this->assertEquals(200, $response['code']);
    }
}