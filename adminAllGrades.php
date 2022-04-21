<?php
session_start();

include("connection.php");
include("functions.php");

if(isset($_POST['forMenu']))
{
    header('location:admin.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Grades!</title>
    <link rel="stylesheet" href="css/styleAdminAllGrades.css">
    <link rel="icon" href="images/javaIcon.png">
</head>
<body>

<div id="box">

    <form method="post">
        <h1>All Grades!</h1>

        <p>
            <?php

            $query = "SELECT user_id, email, quiz, grade FROM logs";
            $result = mysqli_query($con,$query);

            if($result -> num_rows > 0)
            {
                while($row = $result -> fetch_assoc())
                {
                    echo "User ID: ". $row["user_id"]."<br>". "Quiz Name: ". $row["quiz"]."<br>". "Grade: ". $row["grade"]."<br>"."<br>";
                }
            }

            ?>
        </p>

        <input id="button2" type="submit" name = "forMenu" value="Back to Admin">
    </form>


</body>
</html>
