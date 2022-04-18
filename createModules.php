<?php
session_start();
include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $moduleName = $_POST['moduleName'];
    $firstTeaching = $_POST['firstTeaching'];
    $secondTeaching = $_POST['secondTeaching'];
    $thirdTeaching = $_POST['thirdTeaching'];

    if(isset($_POST['forAdminMenu']))
    {
        header('location:admin.php');
    }

    if(!empty($moduleName) && !empty($firstTeaching)
        && !empty($secondTeaching) && !empty($thirdTeaching))
    {
        //save to database
        $query = "insert into modules (module_name,teaching_one,teaching_two,teaching_three)
                    values ('$moduleName','$firstTeaching','$secondTeaching','$thirdTeaching')";
        mysqli_query($con,$query);
        echo "Module added successfully!";
    }else
    {
        echo "Please fully complete form!";
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
    <title>Module Creation!</title>
    <link rel="stylesheet" href="css/styleCreateModules.css">
    <link rel="icon" href="images/javaIcon.png">
</head>
<body>

<div id="box">

    <form method="post">
        <h1>Module Creation!</h1>

        <input id="text" type="text" name="moduleName" placeholder="Name of Module..."><br><br>
        <input id="text" type="text" name="firstTeaching" placeholder="First Teaching..."><br><br>
        <input id="text" type="text" name="secondTeaching" placeholder="Second Teaching..."><br><br>
        <input id="text" type="text" name="thirdTeaching" placeholder="Third Teaching..."><br><br>
        <input id="button" type="submit" name = "forAdminMenu" value="Back to Admin Menu">

        <input id="button2" type="submit" value="Create Module"><br><br>
    </form>
</div>


</body>
</html>
