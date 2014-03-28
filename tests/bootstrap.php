<?php
$path = array(
    realpath('./../../'),
    realpath('./src/')
);
set_include_path(get_include_path() . PATH_SEPARATOR . implode(PATH_SEPARATOR, $path));

require_once ('PHPUnit/Autoload.php');
require_once ('./../src/Autoload.php');