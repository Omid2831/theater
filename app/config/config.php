<?php

$dbName = 'Aurora';
$urlRoot = 'http://theater';

/**
 * De database verbindingsgegevens
 */
define('DB_HOST', 'localhost');
define('DB_NAME', $dbName); // de naam van de database bij odi is Aurora 
define('DB_USER', 'root');
define('DB_PASS', '');


/**
 * De naam van de virtualhost
 */
define('URLROOT', $urlRoot);  // De naam van de virtualhost define('URLROOT', 'http://theater/'); bij odi
 


/**
 * Het pad naar de folder app
 */
define('APPROOT', dirname(dirname(__FILE__)));

