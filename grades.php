<?php
session_start();

include("connection.php");
include("functions.php");
$user_data = check_login($con);
$user_id = $_SESSION['user_id'];

if(isset($_POST['forMenu'])) //redirects back to menu
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
    <title>Grades!</title>
    <link rel="stylesheet" href="css/styleGrades.css">
    <link rel="icon" href="images/javaIcon.png">
</head>
<body>
<div id="box">

    <form method="post">
        <h1>All Grades!</h1>

        <p>
            <?php           //Shows logged-in user's grades
                $query = "SELECT quiz, grade FROM logs WHERE $user_id = user_id";
                $result = mysqli_query($con,$query);

                if($result -> num_rows > 0)
                {
                    while($row = $result -> fetch_assoc())
                    {
                        echo "Quiz: ". $row["quiz"]."<br>". "Grade: ". $row["grade"]." out of 3"."<br>"."<br>";
                    }
                }
            ?>
        </p>
                            <!-- Redirects to main menu -->
        <input id="button2" type="submit" name = "forMenu" value="Back to Menu">
    </form>


</body>
</html>
