<?php
session_start();

include("connection.php");
include("functions.php");
$user_data = check_login($con);

if(isset($_POST['forMenu']))
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
    <title>Vocabulary!</title>
    <link rel="stylesheet" href="css/styleVocabulary.css">
    <link rel="icon" href="images/javaIcon.png">
</head>
<body>

<div id="box">

    <form method="post">
        <h1>Vocabulary!</h1>

        <p>
            <?php

            $query = "SELECT * FROM vocabulary";
            $result = mysqli_query($con,$query);

            if($result -> num_rows > 0)
            {
                while($row = $result -> fetch_assoc())
                {
                    echo $row["vocab_name"]."<br>".  $row["definition"]."<br>"."<br>";
                }
            }



            ?>
        </p>

        <input id="button2" type="submit" name = "forMenu" value="Back to Menu">
    </form>

</body>
</html>
