<?php
spl_autoload_register(function($class){

    if (!defined('APP_DIR')){
        define("ROOT_DIR", 'C:\wamp64\www\FrameworkAssignment');
        defined("APP_DIR", ROOT_DIR . "\app");
        defined("FRAMEWORK_DIR", ROOT_DIR . '\framework');
        defined('TPL_DIR', ROOT_DIR . '\tpl');
        defined('DATA_DIR', ROOT_DIR . '\data');

    }
    if (file_exists(FRAMEWORK_DIR . "/" . $class . '.php')){
        require FRAMEWORK_DIR . "/" . $class . '.php';
    }
    elseif (file_exists(APP_DIR . "/" . $class . '.php')){
        require APP_DIR . "/" . $class . '.php';
    }
    elseif (file_exists(TPL_DIR . '/' . $class . '.php')){
        require TPL_DIR . '/' . $class . '.php';
    }
    elseif (file_exists(DATA_DIR . '/' . $class . '.php')){
        require DATA_DIR . '/' . $class . '.php';
    }
   
    else {
        trigger_error('Cannot find class/interface/abstract class: ' . $class, E_USER_WARNING);
        debug_print_backtrace();
    }
    
});

?>