<?php
session_start();
include("connection.php");
include("functions.php");
$user_data = check_login($con);

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
    <title>View Modules!</title>
    <link rel="stylesheet" href="css/styleAdminViewModules.css">
    <link rel="icon" href="images/javaIcon.png">
</head>
<body>
<div id="box">

    <form method="post">
        <h1>All Modules!</h1>

        <p>
            <?php

            $query = "SELECT module_name FROM modules";
            $result = mysqli_query($con,$query);

            if($result -> num_rows > 0)
            {
                while($row = $result -> fetch_assoc())
                {
                    echo "Module Name: ". $row["module_name"]. "<br>"."<br>";
                }
            }

            ?>
        </p>

        <input id="button2" type="submit" name = "forMenu" value="Back to Menu">
    </form>


</body>
</html>
