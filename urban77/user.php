<?php
include 'config.php';
if (isset($_POST['submit'])) {
    // Step 3: Process the form data
    $flname = $_POST["fullname"];
    $usname = $_POST["username"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $password = $_POST["password"];
    $usertype = $_POST["user_type"];

    // Step 4: Insert the data into the database
    $sql = "INSERT INTO customers (fullname,username,email,gender,passwd,user_type) VALUES ('$flname','$usname','$email','$gender','$password','$usertype')";

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully.";
        header('location: admin_page.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
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
                    <input type="text" name="fullname" placeholder="fullname" id="name"><br>
                    <label for="username">Userame :</label><br>
                    <input type="text" name="username" placeholder="username" id="name"><br>
                    <label for="email">Email :</label><br>
                    <input type="text" name="email" placeholder="email" id="name"><br>
                    <label for="gender">Gender :</label><br>
                    <input type="radio" name="gender" value="Male" id="male"><span id="male">Male</span>
                    <input type="radio" name="gender" value="Female" id="female"><span id="female">Female</span><br>
                    <label for="password">Password :</label><br>
                    <input type="password" name="password" placeholder="password" id="name"><br>
                    <label for="repeat_password">Repeat password :</label><br>
                    <input type="password" name="repeat_password" placeholder="repeat_password" id="name"><br>
                    <label for="user_type">I'm :</label><br>
                    <input type="radio" name="user_type" value="user" id="user"><span id="user">Customer</span>
                    <input type="radio" name="user_type" value="admin" id="user"><span id="user">Admin</span><br>
                    <button type="submit" name="submit">Submit</button><br>
                    
            </div>
            
        </div>

    </body>
</html>