<?php
session_start();
include("connection.php");
include("functions.php");
$user_data = check_login($con);

if(isset($_POST['forMenu']))
{
    header('location:menu.php');
}

if(isset($_POST['variables']))
{
    header('location: moduleVariables1.php');
}





?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modules!</title>
    <link rel="stylesheet" href="styleModules.css">
</head>
<body>
<div id = "box">
    <form method="post">
        <div style="font-size: 20px;margin: 10px;color: white;">Modules!</div>
        <input id="button" type="submit" name = "variables" value="Variables"><br><br>
        <input id="button" type="submit" name = "arrays" value="Arrays"><br><br>
        <input id="button" type="submit" name = "dataStructures" value="Data Structures"><br><br>
        <input id="button" type="submit" name = "ifStatements" value="If-Statements"><br><br>
        <input id="button2" type="submit" name = "forMenu" value="Back to Menu">

    </form>

</div>



</body>
</html>
