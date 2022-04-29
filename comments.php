<?php
session_start();

include("connection.php");
include("functions.php");
$user_data = check_login($con);

if(isset($_POST['forMenu']))  //Redirects back to menu
{
    header('location:menu.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Q & A!</title>
    <link rel="stylesheet" href="css/styleComments.css">
    <link rel="icon" href="images/javaIcon.png">
</head>
<body>
<div class = "box">
    <div class = "a">
        <form method="post">            <!-- form for comments along with two buttons for post comment and menu  -->
        <h6 class = "menuTitle" >Q & A</h6><br>
        <textarea name="commentsFromUser" id="text" cols="40" rows="10" placeholder="Be specific..." maxlength="1000" autofocus></textarea>

        <input id="testButton" type="submit" name = "postComment" value="Post Comment">
        <input id="testButton2" type="submit" name = "forMenu" value="Back to Menu">
        </form>
        <?php
        if($_SERVER['REQUEST_METHOD'] == "POST")  //Posts comment into logs
        {
            $comment = $_POST['commentsFromUser']; //Logged in user comment and data
            $user_id = $_SESSION['user_id'];
            $email = $user_data['email'];
            if(isset($_POST['postComment']) && !empty($comment))
            {

                $query = "insert into logs (comments,user_id,email) values ('$comment','$user_id','$email')";
                mysqli_query($con,$query);
                echo "Your comment has been sent! The response will be sent per email!";
            }

            if(isset($_POST['postComment']) && empty($comment))  //lets user know to not try to post without writing something
            {
                echo "You must write something!";
            }
        }
        ?>
    </div>


    <div class = "b"></div>
    <div class = "c"></div>
    <div class = "d"></div>
    <div class = "e"></div>

</div>


</body>
</html>
