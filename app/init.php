<?php 

// require 'core/App.php';
// require 'core/Controller.php';
// require 'core/Constant.php';

spl_autoload_register(function($class){
	require 'core/' . $class . '.php';
});