<?php

/**
 * Demo example of usage MySmile API REST Client
 * Mobile version of MySmile
 * 
 * This script is illustrative therefore it contains mix of php and html, functions and objective paradigms
 */

namespace MySmile;
use MySmile\Api\Client\Manager;
use MySmile\Api\Client\Exception;

// init client
$path = array(
    realpath('./../../')
);
set_include_path(get_include_path() . PATH_SEPARATOR . implode(PATH_SEPARATOR, $path));

require_once ('./../../src/Autoload.php');
require_once ('./library.php');

// use session to cache language and menu list
session_start();

// prepere params
$lang = getParam('lang', 'en');
$slug = getParam('slug', 'index');

// init manager
$endpoint = 'http://127.0.0.1:8000/api';
$proxy    = 'http://127.0.0.1:8888';

$manager = Manager::getInstance()
    ->setEndpoint($endpoint)
    ->setProxy($proxy);
try {
    // get lenguage
    $language = getFromCache('language_'.$lang, $manager, 'Language');

    // get menu
    $menu = getFromCache('menu_'.$lang, $manager, 'Content', array('lang' => $lang));

    // get contact
    $contact = getFromCache('contact_'.$lang, $manager, 'Contact');

    // get content data
    $content = getFromCache('content_'.$lang.'_'.$slug, $manager, 'Content', array('lang' => $lang, 'slug' => $slug));
} catch (Exception $e) {
    echo '500 Internal Server Error';
    die;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>MySmile</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=2, maximum-scale=5">
        <link rel="shortcut icon" href="./images/favicon.ico" />
   		<link rel="stylesheet" media="screen" href="./css/main.css">
    </head>
    <body>
        <div id="carrier">
            <header>
                <div id="logo">
                   <a href="?<?php echo http_build_query(array('lang' => $lang)); ?>"><img src="./images/logo.png"  width="108" height="115" alt="" /></a>
                </div>
                
                <ul id="contact">
                    <?php foreach ($contact['data'] as $key => $value): ?>
                    <li><img src="./images/<?php echo $key; ?>.png" alt="<?php echo $key; ?>" /><?php echo $value; ?></li>
                    <?php endforeach; ?>
                </ul>  
                <div class="clear"></div>
                
                <ul id="lang">
                  <?php foreach ($language['data'] as $item): ?>
                      <li>
                          <a href="?<?php echo http_build_query(array('slug' => $slug, 'lang' => $item)); ?>">
                              <img src="./images/lang/<?php echo $item; ?>.png" alt="<?php echo $item; ?>" />
                          </a>
                      </li>
                  <?php endforeach; ?>
                 </ul> 
                
                <div class="clear"></div>
                
                <nav>
                    <ul id="menu">
                        <?php \ksort($menu['data']); ?>
                        <?php foreach ($menu['data'] as $item): ?>
                            <?php $key = key($item); $value = current($item); ?>
                            <li>
                                <a href="?<?php echo http_build_query(array('slug' => $key, 'lang' => $lang)); ?>" 
                                    <?php echo ($key == $slug)? 'class="active"':""; ?>>
                                    <?php echo $value; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>        
                    </ul>
                    <div class="clear"></div>
                </nav>
            </header> 
            
            <article>
                <h1><a id="top"><?php echo $content['data']['name']; ?></a></h1>
                <div class="section">
                    <?php echo $content['data']['col_central']; ?>
                    <div class="nav_top">
                        <a href="#top"><img src="./images/top.png" width="25" height="25" alt="top" /></a>
                    </div>  
                    <div class="clear"></div>
                </div>
                
                <?php if(!empty($content['data']['col_right'])): ?>
                    <div class="section"> 
                        <?php if(!empty($content['data']['youtube'])): ?>
                        <iframe src="<?php echo $content['data']['youtube']; ?>"></iframe>
                        <?php elseif(!empty($content['data']['photo'])): ?>
                            <figure>
                                <img src="<?php echo $content['data']['photo']['src']; ?>" alt="<?php echo $content['data']['photo']['alt']; ?>">
                                <figcaption><?php echo $content['data']['photo']['description']; ?></figcaption>
                            </figure>
                        <?php endif; ?>
                        <?php echo $content['data']['col_right']; ?>
                        
                        <div class="nav_top">
                            <a href="#top"><img src="./images/top.png" width="25" height="25" alt="top" /></a>
                        </div> 
                        <div class="clear"></div>
                    </div>
                <?php endif; ?>  
                
                <?php if(!empty($content['data']['col_bottom'])): ?>
                    <?php foreach($content['data']['col_bottom'] as $item): ?>
                        <div class="section buttom">
                            <?php echo $item; ?>
                            
                            <div class="nav_top">
                                <a href="#top"><img src="./images/top.png" width="25" height="25" alt="top" /></a>
                            </div> 
                            <div class="clear"></div>
                        </div>     
                    <?php endforeach; ?>
                <?php endif; ?>
                
            </article>
            
            <footer>
                <div id="copyright">© copyright 2012–<?php echo date('Y'); ?> </div>
                <div class="clear"></div>
            </footer>
            
            
        </div>    
    </body>
</html>    
    