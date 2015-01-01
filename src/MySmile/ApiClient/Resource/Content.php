<?php
/**
 * Content Resource
 * 
 * @link        https://github.com/MySmile/api-client-php
 * @license     http://opensource.org/licenses/BSD-3-Clause New BSD License
 */

namespace MySmile\ApiClient\Resource;

class Content extends AbstractResource 
{
    /**
     * Resource name
     * 
     * @var string 
     */
    protected $resourceName = 'content';
    
    /**
     * Required params
     * 
     * @var array 
     */
    protected $requiredParams = array('lang');
}
