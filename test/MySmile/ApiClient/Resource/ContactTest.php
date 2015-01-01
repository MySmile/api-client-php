<?php
/**
 * Test for Content
 * 
 * @link        https://github.com/MySmile/api-client-php
 * @license     http://opensource.org/licenses/BSD-3-Clause New BSD License
 */

use MySmile\ApiClient\Resource\Contact;

class ContactTest extends BaseTest
{
    public function testGetData()
    {
        $contact    = new Contact($this->manager);
        $response   = $contact->getData();
        
        $this->assertTrue(is_array($response));
        $this->assertEquals(200, $response['code']);
    }
}
