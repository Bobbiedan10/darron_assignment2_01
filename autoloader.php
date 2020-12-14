<?php
  spl_autoload_register(function($class_name)
  {
    if(file_exists('classes/'. $class_name . '.php'))
    {
      require 'classes/'.$class_name . '.php';
    }
    elseif(file_exists('classes/'.$class_name.'Interface.php'))
    {
      require 'classes/'.$class_name.'Interface.php';
    }
    elseif(file_exists('controllers/'.$class_name.'.php'))
    {
      require 'controllers/'.$class_name.'.php';
    }
    elseif(file_exists('models/'.$class_name.'.php'))
    {
      require 'models/'.$class_name.'.php';
    }
    else{
      trigger_error('Cannot find class/interface/abstract class: ' .$class_name, E_USER_WARNING);
      debug_print_backtrace();
    }
  });