<?php

require_once 'define.php';

function myAutoloader($clasName)
{
	require_once LIBRARY_PATH . "{$clasName}.php";
}

spl_autoload_register('myAutoloader');


error_reporting(E_ALL);
ini_set('display_errors', 0);

Session::init();

$bootstrap = new Bootstrap();
$bootstrap->init();
