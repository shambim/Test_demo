<?php
include_once(dirname(__FILE__).'/constants.php');
spl_autoload_register('autoloadClass');

function autoloadClass($className){
    $path=BASE_PATH.'classes/';
    $extension='.class.php';

    $fullPath=$path.$className.$extension;
    
    if(file_exists($fullPath)) require_once($fullPath);
    else return false;
}
