<?php
session_start();
require_once 'config.php'; // Make sure this connects to DB ($conn)

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM customers WHERE username = ? AND pass_word = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    
    $result = $stmt->get_result();
    
    if ($result && $result->num_rows === 1) {
        $row = $result->fetch_assoc();

        $_SESSION['username'] = $username;

        if ($row['user_type'] === 'customer') {
            header("Location: user_page.html");
            exit();
        } elseif ($row['user_type'] === 'admin') {
            header("Location: admin_page.php");
            exit();
        }
    } else {
        // Redirect back with error message (optional)
        header("Location: login_form.html");
        exit();
    }

    $stmt->close();
} else {
    // If someone accesses directly
    header("Location: login_form.html");
    exit();
}

$conn->close();
?>
