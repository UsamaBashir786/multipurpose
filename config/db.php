<?php
/**
 * Database Configuration File
 * 
 * This file contains database connection parameters for the application.
 */

// Database credentials
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'lion');

// Attempt to connect to MySQL database
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($conn === false){
    die("ERROR: Could not connect to the database. " . mysqli_connect_error());
}

// Uncomment the following line for debugging connection issues
// echo "Database connection successful";

// Return the connection
return $conn;
?>