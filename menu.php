<?php
session_start();

include("connection.php");
include("functions.php");
$user_data = check_login($con);

    if(isset($_POST['forModules']))
    {
        header('location:modules.php');
    }

    if(isset($_POST['forQuizzes']))
    {
        header('location:quizzes.php');
    }

    if(isset($_POST['forGrades']))
    {
        header('location:grades.php');
    }

    if(isset($_POST['forVocab']))
    {
        header('location:vocabulary.php');
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
    <title>Let's get learning!</title>
    <link rel="stylesheet" href="styleMenu.css">
</head>
<body>



<div id = "box">



    <form method="post">
        <div style="font-size: 20px;margin: 10px;color: white;">The Java Toolbox</div>
        <input id="button" type="submit" name = "forModules" value="Modules"><br><br>
        <input id="button" type="submit" name = "forQuizzes" value="Quizzes"><br><br>
        <input id="button" type="submit" name = "forGrades" value="Grades"><br><br>
        <input id="button" type="submit" name = "forVocab" value="Vocabulary"><br><br>
        <input id="button" type="submit" name = "forLogout" value="Logout"><br><br>





    </form>


</div>



</body>
</html>
