<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "urban77";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully..."."<br>";
    ?>