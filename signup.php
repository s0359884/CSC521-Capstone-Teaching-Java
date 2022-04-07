<?php
session_start();

    include("connection.php");
    include("functions.php");
//Add encryption MD5

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //something was posted
        $email = $_POST['email'];
        $password = $_POST['password'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];

        if(!empty($email) && !empty($password) && !empty($first_name) && !empty($last_name) && !is_numeric($first_name) && !is_numeric($last_name))
        {
            //save to database
            $query = "insert into users (first_name,last_name,email,password) values ('$first_name','$last_name','$email','$password')";
            mysqli_query($con,$query);

            header("Location: login.php");
            die;


        }else
        {
            echo "Please enter valid information!";
        }



    }



?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Signup</title>
    <link rel="stylesheet" href="styleSignup.css">
</head>
<body>


<div id="box">

    <form method="post">
        <div style="font-size: 20px;margin: 10px;color: white;">Signup</div>

        <input id="text" type="text" name="email" placeholder="Email..."><br><br>
        <input id="text" type="password" name="password" placeholder="Password..."><br><br>
        <input id="text" type="text" name="first_name" placeholder="First name..."><br><br>
        <input id="text" type="text" name="last_name" placeholder="Last name..."><br><br>

        <input id="button" type="submit" value="Signup"><br><br>

        <a href="login.php">Click to Login</a><br><br>
    </form>
</div>
</body>
</html>

