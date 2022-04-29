<?php
session_start();

include("connection.php");
include("functions.php");
$user_data = check_login($con);




if(isset($_POST['forMenu']))    //Redirects to admin menu
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
    <title>All Users!</title>
    <link rel="stylesheet" href="css/styleAdminAllUsers.css">
    <link rel="icon" href="images/javaIcon.png">
</head>
<body>

<div id="box">

    <form method="post">
        <h1>All Users!</h1>

        <p>
            <?php           //Shows list of all users

            $query = "SELECT first_name, last_name, email FROM users";
            $result = mysqli_query($con,$query);

            if($result -> num_rows > 0)
            {
                while($row = $result -> fetch_assoc())
                {
                    echo "First Name: ". $row["first_name"]."<br>". "Last Name: ". $row["last_name"]."<br>". "Email: ". $row["email"]. "<br>"."<br>";
                }
            }

            ?>
        </p>
                                <!-- Redirects back to admin menu  -->
        <input id="button2" type="submit" name = "forMenu" value="Back to Menu">
    </form>

</body>
</html>
