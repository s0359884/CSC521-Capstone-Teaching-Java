<?php
session_start();

include("connection.php");
include("functions.php");
$user_data = check_login($con);



if(isset($_POST['nextPartOfTeaching']))
{
    header('location:moduleVariables2.php');
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
    <link rel="stylesheet" href="styleModuleVariable1.css">
</head>
<body>
<div id = "box">
    <form method = "post">

        <p><?php

            $getFirstTeaching = $con->prepare("SELECT teaching_one as total FROM modules  WHERE module_name = 'Variables'");
            $getFirstTeaching->execute();
            $getFirstTeachingResult = $getFirstTeaching->get_result();

            while($selectModuleIDRow = $getFirstTeachingResult->fetch_array())
            {
                echo $selectModuleIDRow['total'];
            }

            ?></p>
        <input id="button2" type="submit" name = "nextPartOfTeaching" value="Next"><br><br>





    </form>
</div>



</body>
</html>
