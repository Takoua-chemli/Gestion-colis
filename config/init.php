<?php
//Start Session
session_start();

//Autoloader-make sure all class names are the same spelling with file names
function __autoload($class_name){
	require_once 'classes/'.$class_name.'.php';
}
  
?>