<?php
include 'config.php';
$id=$_GET['updateid'];
$sql="SELECT * FROM customers WHERE id=$id";
$result=mysqli_query($conn,$sql);
$row = $result->fetch_assoc();
$fname=$row['fullname'];
$uname=$row['username'];
$mail=$row['email'];
$gndr=$row['gender'];
$pswd=$row['passwd'];
$ustype=$row['user_type'];

if (isset($_POST['submit'])) {
    // Step 3: Process the form data
    $flname = $_POST["fullname"];
    $usname = $_POST["username"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $password = $_POST["password"];
    $usertype = $_POST["user_type"];

    $sql = "UPDATE customers SET id='$id', fullname='$flname', username='$usname', email='$email', gender='$gender', passwd='$password', user_type='$usertype' where id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully.";
        header('location: admin_page.php');
    } else {
        echo "Error updating record: " . $conn->error;
    }
    
}







?>
<!DOCTYPE html>
<html lang="en">
    <head>
      <title>Registration form</title>
      
    </head>
    <body>
        <div class="main">
            <div class="register">
                <h2>Registration Form</h2>
                <form  method="post">
                    <label for="fullname">FullName :</label><br>
                    <input type="text" name="fullname" placeholder="fullname" id="name" value=<?php echo $fname ?>><br>
                    <label for="username">Userame :</label><br>
                    <input type="text" name="username" placeholder="username" id="name" value=<?php echo $uname ?>><br>
                    <label for="email">Email :</label><br>
                    <input type="text" name="email" placeholder="email" id="name" value=<?php echo $mail ?>><br>
                    <label for="gender">Gender :</label><br>
                    <input type="radio" name="gender" value="Male" id="male" value=<?php echo $gndr ?>><span id="male">Male</span>
                    <input type="radio" name="gender" value="Female" id="female" value=<?php echo $gndr ?>><span id="female">Female</span><br>
                    <label for="password">Password :</label><br>
                    <input type="password" name="password" placeholder="password" id="name" value=<?php echo $pswd ?>><br>
                    <label for="repeat_password">Repeat password :</label><br>
                    <input type="password" name="repeat_password" placeholder="repeat_password" id="name" value=<?php echo $pswd ?>><br>
                    <label for="user_type">I'm :</label><br>
                    <input type="radio" name="user_type" value="user" id="user"><span id="user" value=<?php echo $ustype ?>>Customer</span>
                    <input type="radio" name="user_type" value="admin" id="user"><span id="user" value=<?php echo $ustype ?>>Admin</span><br>
                    <button type="submit" name="submit">Update</button><br>
                    
            </div>
            
        </div>

    </body>
</html>