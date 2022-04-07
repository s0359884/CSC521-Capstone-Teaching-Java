<?php
session_start();

include("connection.php");
include("functions.php");

    if(isset($_POST['forUsers']))
    {
        header('location:adminAllUsers.php');
    }

    if(isset($_POST['forQuizzes']))
    {
        header('location:quizzes.php');
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
    <link rel="stylesheet" href="styleAdmin.css">
</head>
<body>
<div id = "box">



    <form method="post">
        <div style="font-size: 20px;margin: 10px;color: white;">The Java Toolbox</div>
        <input id="button" type="submit" name = "forUsers" value="All Users"><br><br>
        <input id="button" type="submit" name = "forQuizzes" value="Number of Modules: <?php

        $getMaxModuleIDs = $con->prepare("SELECT count(module_id) as total FROM modules");
        $getMaxModuleIDs->execute();
        $getMaxModuleIDsResult = $getMaxModuleIDs->get_result();

        while($selectModuleIDRow = $getMaxModuleIDsResult->fetch_array())
        {
            echo $selectModuleIDRow['total'];
        }



        ?>" ><br><br>
        <input id="button" type="submit" name = "allGrades" value="All Grades"><br><br>
        <input id="button" type="submit" name = "forLogout" value="Logout"><br><br>







    </form>


</div>



</body>
</html>
