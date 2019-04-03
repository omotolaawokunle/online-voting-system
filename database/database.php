<?php
// Create connection credentials
$servername = "localhost";
$username = "blazy";
$password = "omotola";
$dbname = "voting";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>