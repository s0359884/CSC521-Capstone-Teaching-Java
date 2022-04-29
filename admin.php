<?php
session_start();

include("connection.php");
include("functions.php");
$user_data = check_login($con); //user data

    if(isset($_POST['forUsers']))  //Options for where to be redirected
    {
        header('location:adminAllUsers.php');
    }

    if(isset($_POST['forModules']))
    {
        header('location:adminViewModules.php');
    }

    if(isset($_POST['forEditingModules']))
    {
        header('location:createModules.php');
    }

    if(isset($_POST['allGrades']))
    {
        header('location:adminAllGrades.php');
    }


    if(isset($_POST['forLogout']))
    {
        header('location:logout.php');
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin!</title>
    <link rel="stylesheet" href="css/styleAdmin.css">
    <link rel="icon" href="images/javaIcon.png">
</head>
<body>
<div id = "box">



    <form method="post">            <!-- Options for where to be redirected -->
        <h1>The Java Toolbox</h1>
        <h2>Admin</h2>
        <input id="button" type="submit" name = "forUsers" value="All Users"><br><br>
        <input id="button" type="submit" name = "forModules" value="View Modules" ><br><br>

        <input id="button" type="submit" name = "forEditingModules" value="Create Module"><br><br>
        <input id="button" type="submit" name = "allGrades" value="All Grades"><br><br>
        <input id="button2" type="submit" name = "forLogout" value="Logout"><br><br>
    </form>


</div>



</body>
</html>
