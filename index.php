<?php
session_start();

// include("db.php");
$con = mysqli_connect("localhost", "root", "", "register");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    // $Name = $_POST['name'];
    $Email = $_POST['email'];
    $Password = $_POST['pass'];

    if(!empty($Email) && !empty($Password) && !is_numeric($Email))
    {
        $sql = "select * from form where email = '$Email' limit 1";
        $result = mysqli_query($con, $sql);

        if($result)
        {
            if($result && mysqli_num_rows($result) > 0)
            {
                $user_data = mysqli_fetch_assoc($result);

                if($user_data['pass'] == $Password)
                {
                    header("location: home.html");
                }


            }
        }
    }
       
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body class="body">
    <div class="login">
        <h1>Login</h1>
        <form method="POST">
            <label>Email</label>
            <input type="email" name="email" required>
            <label>Password</label>
            <input type="password" name="pass" required>
            <input type="submit" name="" value="Submit"> 
        </form>
        <p class="para">Not have an account?<a href="signup.php">Sign Up here</a></p>
    </div>
    
</body>
</html>