<?php
//database_connection.php

//$connect = new PDO('mysql:host=localhost;dbname=testing2', 'root', 'root1987');
 $servername = "localhost";
$username = "eitccomn_eitcuser";
$password = "eitccon231027";
$dbname = "eitccomn_eitc";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}
//session_start();

?>