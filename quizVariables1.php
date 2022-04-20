<?php
session_start();
include("connection.php");
include("functions.php");
$user_data = check_login($con);

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $user_id = $_SESSION['user_id'];
    $email = $user_data['email'];
    if (isset($_POST['wrong']))
    {
        $query = "SELECT * FROM logs WHERE user_id = $user_id AND  quiz = 'Variables'";
        $result = mysqli_query($con,$query);
        if($result)
        {
            if(mysqli_num_rows($result) > 0)
            {
                $query = "UPDATE logs set grade = 0 WHERE user_id = $user_id AND quiz = 'Variables'";
                mysqli_query($con,$query);
                header('location:quizVariables2.php');
            }else
            {
                $query = "insert into logs (comments,user_id,email,quiz, grade) values ('','$user_id','$email','Variables',0)";
                mysqli_query($con,$query);
                header('location:quizVariables2.php');
            }
        }
    } elseif (isset($_POST['correct']))
    {
        $query = "SELECT * FROM logs WHERE user_id = $user_id AND  quiz = 'Variables'";
        $result = mysqli_query($con,$query);
        if($result)
        {
            if(mysqli_num_rows($result) > 0)
            {
                $query = "UPDATE logs set grade = 1 WHERE user_id = $user_id AND quiz = 'Variables'";
                mysqli_query($con,$query);
                header('location:quizVariables2.php');
            }else
            {
                $query = "insert into logs (comments,user_id,email,quiz, grade) values ('','$user_id','$email','Variables',1)";
                mysqli_query($con,$query);
                header('location:quizVariables2.php');
            }
        }
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
    <title>Quiz: Variables!</title>
    <link rel="stylesheet" href="css/styleQuizVariables1.css">
    <link rel="icon" href="images/javaIcon.png">
</head>
<body>
<div id = "box">
    <form method="post">
        <h1>Question 1:</h1>
        <h2>Which of the following is not a variable?</h2>
        <input id="button" type="submit" name = "wrong" value="String"><br><br>
        <input id="button" type="submit" name = "wrong" value="float"><br><br>
        <input id="button" type="submit" name = "correct" value="number"><br><br>
        <input id="button" type="submit" name = "wrong" value="boolean"><br><br>

    </form>

</div>


</body>
</html>
