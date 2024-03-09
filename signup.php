<?php
    session_start();

    // include("db.php");
    $con = mysqli_connect("localhost", "root", "", "register");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $Name = $_POST['name'];
        $Email = $_POST['email'];
        $Password = $_POST['pass'];

        if(!empty($Email) && !empty($Password) && !is_numeric($Email))
        {
            $sql = "INSERT INTO form (name, email, pass)VALUES ('$Name', '$Email', '$Password')";

            if ($con->query($sql) === TRUE) {
                // echo "New record created successfully";
                echo "<script type='text/javascript'> alert('signup completed sucessfully')</script>";
                header("Location: index.php");
            } else {
            echo "Error: " . $sql . "<br>" . $con->error;
            }
        }else
        {
            echo "<script type='text/javascript'> alert('Please Enter some valid information')</script>";
        }
        
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body class="body">
    <div class="signup">
        <h1>Sign Up</h1>
        <form method="POST">
            <label>Name</label>
            <input type="text" name="name" required>
            <label>Email</label>
            <input type="email" name="email" required>
            <label>Password</label>
            <input type="password" name="pass" required>
            <input type="submit" name="" value="Submit">
            <p>Alredy have an account? <a href="index.php"> Login Here</a>  </p>
        </form>
    </div>
</body>
</html>