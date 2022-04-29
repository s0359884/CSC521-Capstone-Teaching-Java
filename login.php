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
    <title>Login!</title>
    <link rel="stylesheet" href="css/styleLogin.css">
    <link rel="icon" href="images/javaIcon.png">
</head>
<body>              <!-- radio buttons for lower labels -->
    <input type="radio" id = "chk2" name = "a1" style = "display: none;">
    <input type="radio" id = "chk3" name = "a1" style = "display: none;">
    <div class = "box">
        <div class = "a">
            <h6 class = "firstTitle" >THE JAVA TOOLBOX</h6><br>
            <img src = "images/javaIcon.png" alt = "Image of coffee">
            <a href= "signup.php"><button id = "button3">Sign up</button></a> <!-- Redirects to signup page -->
            <label for="chk2" id = "sup">Login</label>  <!-- label sends to login portion of page -->
        </div>

        <div class = "b"></div> <!-- Empty side of box -->
        <div class = "c"></div>
            <div class = "d">       <!-- radio buttons for lower label -->
                <input type="radio" id = "chk4" name = "a1" style = "display: none;">
                <form method="post" class="frm">  <!-- Form for login -->
                    <input type="radio" id = "chk4" name = "a1" style = "display: none;">
                    <h6 class = "title">THE JAVA TOOLBOX</h6><br>
                    <h7 class = "signup">LOGIN</h7>
                    <input id="text" type="text" name="email" placeholder="Email..."><br><br>   <!-- Login credentials input by user-->
                    <input id="text" type="password" name="password" placeholder="Password..."><br><br>
                    <button type="submit" id = "testButton" name = "loginButton">Login</button>
                    <label for="chk4"id = "logb">Sign up</label> <!-- Sends back to first portion of box -->
                </form>
                <?php
                if($_SERVER['REQUEST_METHOD'] == "POST")  //posts login credentials given by user
                {
                    //something was posted
                    $email = $_POST['email'];         //User info input by user
                    $password = $_POST['password'];
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);  //Saves password in hashed format)

                    if(!empty($email) && !empty($password))
                    {
                        //read from database for login
                        $query = "select * from users where email = '$email' limit 1";
                        //$query = "insert into users (first_name,last_name,email,password) values ('$first_name','$last_name','$email','$password')";
                        $result = mysqli_query($con,$query);

                        if($result)
                        {
                            if($result && mysqli_num_rows($result)>0)
                            {
                                $user_data = mysqli_fetch_assoc($result);  //Verifies if user exists
                                if($user_data['user_id'] == 1 &&  password_verify($password,$user_data['password']))
                                {
                                    $_SESSION['user_id'] = $user_data['user_id'];
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
                        echo "<p class ='error'>Wrong email or password!</p>";
                    }else
                    {
                        echo "<p class ='error'>Wrong email or password!</p>";
                    }
                }
                ?>
        </div>
        <div class = "e"></div> <!-- Empty side of box -->
    </div>
    </div>
</body>
</html>
