<?php
session_start();

include("connection.php");
include("functions.php");


if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //something was posted
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    if(isset($_POST['signup']))
    {
        header('location: signup.php');
    }

    if(!empty($email) && !empty($password))
    {
        //read from database
        $query = "select * from users where email = '$email' limit 1";
        //$query = "insert into users (first_name,last_name,email,password) values ('$first_name','$last_name','$email','$password')";
        $result = mysqli_query($con,$query);

        if($result)
        {
            if($result && mysqli_num_rows($result)>0)
            {
                $user_data = mysqli_fetch_assoc($result);
                if($user_data['user_id'] == 1 &&  password_verify($password,$user_data['password']))
                {
                    header("Location:admin.php");
                    die;
                }elseif (password_verify($password,$user_data['password']))
                {


                        $_SESSION['user_id'] = $user_data['user_id'];
                        header("Location:menu.php");
                        die;

                }
            }

        }

        echo "Wrong email or password!";
    }else
    {
        echo "Wrong email or password!";
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
    <title>Login!</title>
    <link rel="stylesheet" href="css/styleLogin.css">
    <link rel="icon" href="images/javaIcon.png">
</head>
<body>



<div id="box">

    <form method="post">
        <h1>The Java Toolbox</h1>
        <h2>login</h2>

        <input id="text" type="text" name="email" placeholder="Email..."><br><br>
        <input id="text" type="password" name="password" placeholder="Password..."><br><br>

        <input id="button" type="submit" value="Login">

        <input id="button2" name="signup" type="submit" value="Signup">
    </form>
</div>
</body>
</html>
