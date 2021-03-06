<?php

/**
 * Demo example of usage MySmile API REST Client
 * Mobile version of MySmile
 * 
 * This script is illustrative therefore it contains mix of php and html, functions and objective paradigms
 * 
 * @link        https://github.com/MySmile/api-client-php
 * @license     http://opensource.org/licenses/BSD-3-Clause New BSD License
 */

require_once ('./vendor/autoload.php');
require_once ('./library.php');

use MySmile\ApiClient\Manager;

// use session to cache language and menu list
session_start();

// prepare params
$lang = MySmile\getParam('lang', 'en');
$slug = MySmile\getParam('slug', 'index');

// init manager
$endpoint = 'http://demo.mysmile.com.ua/api';

$manager = Manager::getInstance()
    ->setEndpoint($endpoint);

// get lenguage
$language = MySmile\getFromCache('language', $manager, 'Language');
// get menu
$menu = MySmile\getFromCache('menu_'.$lang, $manager, 'Content', array('lang' => $lang));
// get contact
$contact = MySmile\getFromCache('contact', $manager, 'Contact');
// get content data
$content = MySmile\getFromCache('content_'.$lang.'_'.$slug, $manager, 'Content', array('lang' => $lang, 'slug' => $slug));
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
