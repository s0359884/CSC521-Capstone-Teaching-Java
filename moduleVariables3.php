<?php
session_start();

include("connection.php");
include("functions.php");
$user_data = check_login($con);


if(isset($_POST['finish']))
{
    header('location:congrats.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Module: Variables!</title>
    <link rel="stylesheet" href="css/styleModuleVariable3.css">
    <link rel="icon" href="images/javaIcon.png">
</head>
<body>
<div id = "box">
    <form method = "post">
        <p><?php

            $getThirdTeaching = $con->prepare("SELECT teaching_three as total FROM modules  WHERE module_name = 'Variables'");
            $getThirdTeaching->execute();
            $getThirdTeachingResult = $getThirdTeaching->get_result();

            while($selectModuleIDRow = $getThirdTeachingResult->fetch_array())
            {
                echo $selectModuleIDRow['total'];
            }

            ?></p>
        <input id="button2" type="submit" name = "finish" value="Finish"><br><br>

    </form>
</div>


</body>
</html>
