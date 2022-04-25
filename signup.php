<?php
session_start();

    include("connection.php");
    include("functions.php");


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Signup</title>
    <link rel="stylesheet" href="css/styleSignup.css">
    <link rel="icon" href="images/javaIcon.png">
</head>
<body>
<!--<div id="box">

    <form method="post">
        <h1>The Java Toolbox</h1>
        <h2>Signup</h2>

        <input id="text" type="text" name="email" placeholder="Email..."><br><br>
        <input id="text" type="password" name="password" placeholder="Password..."><br><br>
        <input id="text" type="text" name="first_name" placeholder="First name..."><br><br>
        <input id="text" type="text" name="last_name" placeholder="Last name..."><br><br>
        <input type="checkbox" name = "checkbox" id="check">
        <label class ="label-inline" id="checked" for="check">Are you human?</label><br><br>

        <input id="button" type="submit" value="Signup">

        <input id="button2" name="login" type="submit" value="Login">
    </form>-
    <?php/*
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //something was posted
        $email = $_POST['email'];
        $password = $_POST['password'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        if(isset($_POST['login']))
        {
            header('location: login.php');
        }

        if(!empty($email) && !empty($password) && !empty($first_name) && !empty($last_name) && !is_numeric($first_name) && !is_numeric($last_name) && isset($_POST["checkbox"]))
        {
            //save to database
            $query = "insert into users (first_name,last_name,email,password) values ('$first_name','$last_name','$email','$hashed_password')";
            mysqli_query($con,$query);

            header("Location: login.php");
            die;
        }else
        {
            echo "<p class ='error'>If you are human, please enter valid information!</p>";
        }
    }
    */?>
</div>-->

<input type="radio" id = "chk2" name = "a1" style = "display: none;">
<input type="radio" id = "chk3" name = "a1" style = "display: none;">

<div class = "box">
    <div class = "a">
        <h6 class = "firstTitle" >THE JAVA TOOLBOX</h6><br>
        <img src = "images/javaIcon.png" alt = "Image of coffee">
        <label for="chk2" id = "sup">Signup</label>
        <!--<button id ="button3" name = "forLoginPage" type="submit" >Login</button>-->

        <a href= "login.php"><button id = "button3">Login</button></a>
        <?php


        ?>
    </div>
    <div class = "b">
        <input type="radio" id = "chk4" name = "a1" style = "display: none;">
        <!--<form action="" class = "frm">-->
            <form method="post" class = "frm">

            <h6 class = "title">THE JAVA TOOLBOX</h6><br>
            <h7 class = "signup">SIGN UP</h7>
            <input type="text" name = "email" placeholder = "Email...">
            <input type="password" name = "password1" placeholder = "Password...">
            <input type="password" name = "password2" placeholder = "Confirm password...">
            <input type="text" name = "first_name" placeholder = "First name...">
            <input type="text" name = "last_name" placeholder = "last name...">

            <input type="checkbox" name = "checkbox" id="check"> <br>
            <label class ="label-inline" id="checks" for="check">Are you human?</label><br>
                <button id = "testButton" name = "pleaseWork">Create account</button>
                <label for="chk4"id = "logb">Login</label>





            <!--<label for="chk1" id = "btm1">Login here</label><br><br>-->




                <?php


                if ($_SERVER['REQUEST_METHOD'] === 'POST')
                {

                    if(isset($_POST['forLogin']))
                    {
                        header('location:login.php');
                    }
                    if(isset($_POST['pleaseWork']) && !isset($_POST['submitLogin']))
                    {

                        $email = $_POST['email'];
                        $password = $_POST['password1'];
                        $password2 = $_POST['password2'];
                        $first_name = $_POST['first_name'];
                        $last_name = $_POST['last_name'];
                        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                        if (!empty($email) && !empty($password) && !empty($first_name) &&
                            !empty($last_name) && !is_numeric($first_name) && !is_numeric($last_name) &&
                            isset($_POST["checkbox"]) && ($password === $password2)) {
                            $query = "insert into users (first_name,last_name,email,password) values ('$first_name','$last_name','$email','$hashed_password')";
                            mysqli_query($con, $query);
                            header("Location: signup.php");
                            die;


                        } else {
                            echo "<p class ='error'>     If you are human, please enter valid information.</p>";
                        }
                    }
                }

                ?>




        </form>
    </div>
    <div class = "c">
        <form action="" class = "frm">
            <br><br><br><br><br><br>
            <!--<h6 class = "title">LOGIN</h6>
            <input type="text" name = "emailLogin" placeholder = "Email...">
            <input type="password" name = "passwordLogin" placeholder = "Password..."><br><br>
            <input id="button" type="submit" name = "submitLogin" value="Login">
            <label for="chk2" id = "btm2">Signup here</label>


        </form>-->
    </div>
    <!--<div class = "d"></div>
    <div class = "e"></div>-->



</div>



</body>
</html>

