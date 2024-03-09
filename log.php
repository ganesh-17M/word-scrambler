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