<?php

include 'config.php';

session_start();

if(!isset($_SESSION['username'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   
   <title>admin page</title>

   <link rel="stylesheet" href="adminstyles.css">

</head>
<body>
   
<div class="container">

   <div class="content">
      <h3>hi, <span>admin</span></h3>
      <h1>welcome <span><?php echo $_SESSION['username'] ?></span></h1>
      
      <a href="logout.php" class="btn">logout</a>
   </div>
   <div class="bu">
      <class="button"><a href="user.php">Add user</a>

    </div>
    <div class="details">
    <table border="1">
      <thead>
    <tr>
        <th>ID</th>
        <th>Full Name</th>
        <th>Username</th>
        <th>Email</th>
        <th>Gender</th>
        <th>Password</th>
        <th>User Type</th>
        <th>operations</th>
    </tr>
      </thead>
      <tbody>
         <?php
           $sql = "SELECT * FROM customers";
           $result = $conn->query($sql);
           while ($row = $result->fetch_assoc()) {
               
               echo'<tr>';
               echo'<td>'.$row["id"].'</td>';
               echo'<td>'.$row["fullname"].'</td>';
               echo'<td>'.$row["username"].'</td>';
               echo'<td>'.$row["email"].'</td>';
               echo'<td>'.$row["gender"].'</td>';
               echo'<td>'.$row["pass_word"].'</td>';
               echo'<td>'.$row["user_type"].'</td>';
               echo'<td><button><a href="update.php?updateid='.$row["id"].'">update</a></button><button><a href="delete.php?deleteid='.$row["id"].'">Delete</a></button></td>';
               echo'</tr>';
               
           }
          
          

         ?>
      </tbody>
</table>
    </div>
    
</div>

</body>
</html>