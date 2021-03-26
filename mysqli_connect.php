<?php # Script 9.2 - mysqli_connect.php

// This file contains the database access information.
// This file also establishes a connection to MySQL,
// selects the database, and sets the encoding.

// Set the database access information as constants:
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');
define('DB_NAME', 'help4all');

// Make the connection:
$mysqli = new MySqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

//errors in PHP OOPS
if($mysqli->connect_error){
    echo $mysqli->connect_error;
    unset($mysqli);
} else {
    $mysqli->set_charset('utf8'); // Set the encoding...
}

