<?php

error_reporting(E_ALL & ~E_NOTICE);
 

define('DB_HOST', 'localhost');
define('DB_NAME', 'test');
define('DB_CHARSET', 'utf8');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

// FILE PATH
define('PATH_LIB', $absolute_path=realpath("file2b-lib-res"));
print "Absolute path is: ".$absolute_path;
?>