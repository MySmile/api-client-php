<?php
/**
 * Test for Language
 * 
 * @link        https://github.com/MySmile/api-client-php
 * @license     http://opensource.org/licenses/BSD-3-Clause New BSD License
 */

use MySmile\ApiClient\Resource\Language;

class LanguageTest extends BaseTest
{
    public function testGetData()
    {
        $language = new Language($this->manager);
        $response = $language->getData();
        
        $this->assertTrue(is_array($response));
        $this->assertEquals(200, $response['code']);
    }
}
