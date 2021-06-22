<?php 
// require 'core/App.php';
// require 'core/Controller.php';
// var_dump(__DIR__);
spl_autoload_register(function($class){
	$file = __DIR__ . '\\core\\' . $class . '.php';
	if (file_exists($file)) {
		require 'core/' . $class . '.php';
	}
});

