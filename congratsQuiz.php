<?php
session_start();

include("connection.php");
include("functions.php");
$user_data = check_login($con);

if(isset($_POST['finish']))
{
    header('location: menu.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>You did it!</title>
    <link rel="stylesheet" href="css/styleCongratsQuiz.css">
    <link rel="icon" href="images/javaIcon.png">
</head>
<body>
<div id = "box">
    <form method = "post">
        <h1>Congratulations, you completed the "Variables" module!</h1>
        <input id="button2" type="submit" name = "finish" value="Finish"><br><br>

    </form>
</div>


</body>
</html>
