<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "urban77";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully..."."<br>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $flname = $_POST["fullname"];
    $usname = $_POST["username"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $password = $_POST["pass_word"];
    $repeat_password = $_POST["repeat_password"];
    $usertype = $_POST["user_type"];

    if ($password !== $repeat_password) {
        die("Passwords do not match.");
    }

    $stmt = $conn->prepare("INSERT INTO customers (fullname, username, email, gender, pass_word, user_type) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $flname, $usname, $email, $gender, $password, $usertype);

    if ($stmt->execute()) {
        echo "Data inserted successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
