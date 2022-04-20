<?php
session_start();
include("connection.php");
include("functions.php");
$user_data = check_login($con);

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $user_id = $_SESSION['user_id'];
    if (isset($_POST['wrong']))
    {

        header('location:quizVariables3.php');
    } elseif (isset($_POST['correct']))
    {
        $query = "SELECT * FROM logs WHERE user_id = $user_id AND  quiz = 'Variables'";
        $result = mysqli_query($con,$query);
        if($result)
        {
            if(mysqli_num_rows($result)>0)
            {
                $query = "UPDATE logs SET grade = grade + 1 WHERE user_id = $user_id AND quiz = 'Variables'";
                $result = mysqli_query($con,$query);
                header('location:quizVariables3.php');
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
    <link rel="stylesheet" href="css/styleQuizVariables2.css">
    <link rel="icon" href="images/javaIcon.png">
</head>
<body>

<div id = "box">
    <form method="post">
        <h1>Question 2:</h1>
        <h2>For a T or F question, which variable type would you use?</h2>
        <input id="button" type="submit" name = "wrong" value="char"><br><br>
        <input id="button" type="submit" name = "correct" value="boolean"><br><br>
        <input id="button" type="submit" name = "wrong" value="String"><br><br>
        <input id="button" type="submit" name = "wrong" value="int"><br><br>

    </form>

</div>
</body>
</html>