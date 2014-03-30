<?php
/**
 * Test for Content
 * 
 * @link https://github.com/MySmile/api-client-php
 */

namespace MySmile\Api\Client\Resource;
use MySmile\BaseTest;
use MySmile\Api\Client\Resource\Contact;

class ContactTest extends BaseTest
{
    public function testGetData()
    {
        $contact    = new Contact($this->manager);
        $response   = $contact->getData();
        
        //        var_dump($response);
        $this->assertTrue(is_array($response));
        $this->assertEquals(200, $response['code']);
    }
}
