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
        <!-- Radio buttons for labels lower in page -->
<input type="radio" id = "chk2" name = "a1" style = "display: none;">
<input type="radio" id = "chk3" name = "a1" style = "display: none;">

<div class = "box">
    <div class = "a">
        <h6 class = "firstTitle" >THE JAVA TOOLBOX</h6><br>
        <img src = "images/javaIcon.png" alt = "Image of coffee">
        <label for="chk2" id = "sup">Sign up</label>

        <a href= "login.php"><button id = "button3">Login</button></a>  <!-- Redirects to login page -->

    </div>
    <div class = "b">
        <input type="radio" id = "chk4" name = "a1" style = "display: none;">
            <form method="post" class = "frm">
            <h6 class = "title">THE JAVA TOOLBOX</h6><br>
            <h7 class = "signup">SIGN UP</h7>
            <input type="text" name = "email" placeholder = "Email...">                      <!-- All info needed to create new user in database -->
            <input type="password" name = "password1" placeholder = "Password...">
            <input type="password" name = "password2" placeholder = "Confirm password...">
            <input type="text" name = "first_name" placeholder = "First name...">
            <input type="text" name = "last_name" placeholder = "Last name...">

            <input type="checkbox" name = "checkbox" id="check"> <br>
            <label class ="label-inline" id="checks" for="check">Are you human?</label><br>
                <button id = "testButton" name = "pleaseWork">Create account</button>   <!-- Creates new account if all text fields and box is checked -->
                <label for="chk4"id = "logb">Login</label> <!-- Sends user back to first portion of box -->

                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST')
                {

                    if(isset($_POST['forLogin']))
                    {
                        header('location:login.php');
                    }
                    if(isset($_POST['pleaseWork']) && !isset($_POST['submitLogin']))
                    {

                        $email = $_POST['email'];                       //All info input for account creation attempt
                        $password = $_POST['password1'];
                        $password2 = $_POST['password2'];
                        $first_name = $_POST['first_name'];
                        $last_name = $_POST['last_name'];
                        $hashed_password = password_hash($password, PASSWORD_DEFAULT);  //Hashes password user put in
                        if (!empty($email) && !empty($password) && !empty($first_name) &&    //Makes sure all fields are filled and box is checked
                            !empty($last_name) && !is_numeric($first_name) && !is_numeric($last_name) &&
                            isset($_POST["checkbox"]) && ($password === $password2)) {
                            $query = "insert into users (first_name,last_name,email,password) values ('$first_name','$last_name','$email','$hashed_password')";
                            mysqli_query($con, $query);
                            header("Location: signup.php");  //Redirects signup page
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
    </div>
</div>
</body>
</html>

