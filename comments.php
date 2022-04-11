<?php
session_start();

include("connection.php");
include("functions.php");
$user_data = check_login($con);

if(isset($_POST['forMenu']))
{
    header('location:menu.php');
}

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $comment = $_POST['commentsFromUser'];
    $user_id = $_SESSION['user_id'];
    $email = $user_data['email'];

    if(isset($_POST['postComment']) && !empty($comment))
    {
        //posts comments into logs
        $query = "insert into logs (comments,user_id,email) values ('$comment','$user_id','$email')";
        mysqli_query($con,$query);
        echo "Your comment has been sent! The response will be sent per email!";
    }

    if(isset($_POST['postComment']) && empty($comment))
    {
        echo "You must write something!";
    }
}




?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comments!</title>
    <link rel="stylesheet" href="styleComments.css">
</head>
<body>
<div id="box">

    <form method="post">
        <div style="font-size: 20px;margin: 10px;color: white;">Comments!</div>
        <textarea name="commentsFromUser" id="text" cols="10" rows="10" placeholder="Be specific..."></textarea>

        <input id="button1" type="submit" name = "postComment" value="Post Comment">
        <input id="button2" type="submit" name = "forMenu" value="Back to Menu">
    </form>



</body>
</html>
