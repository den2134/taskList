<?php

function classLoad($class_name){
    $class_name = strtolower($class_name);
    $file_name = 'lib/'.$class_name.'class.php';
    if(file_exists($file_name)){
        require $file_name;
    }else{
        die('Error');
    }
}

spl_autoload_register('classLoad');
