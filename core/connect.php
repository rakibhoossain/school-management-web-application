<?php
require 'init.php';

//Database name
$dbname = "school";

// Create connection
$conn = new mysqli($servername, $username, $db_password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$conn_msg = "Connected successfully";
