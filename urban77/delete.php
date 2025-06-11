<?php
include 'config.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    $sql = "DELETE FROM customers WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully.";
    header('location:admin_page.php');
} 
}
?>