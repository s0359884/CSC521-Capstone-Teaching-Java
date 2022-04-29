<?php
session_start();

include("connection.php");
include("functions.php");
$user_data = check_login($con); //Global variable that keeps user logged in
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Module: Variables!</title>
    <link rel="stylesheet" href="css/styleModuleVariable1.css">
    <link rel="icon" href="images/javaIcon.png">
</head>
<body>

    <input type="radio" id="chk1" name="a1" style="display: none;">
    <input type="radio" id="chk2" name="a1" style="display: none;">
    <input type="radio" id="chk3" name="a1" style="display: none;">
    <div class ="box">
        <div class="a">
            <h6 class = "menuTitle" >TEACHING: Variables</h6><br>
            <p><?php
                            //Returns first teaching from database
                        $getFirstTeaching = $con->prepare("SELECT teaching_one as total FROM modules  WHERE module_name = 'Variables'");
                        $getFirstTeaching->execute();
                        $getFirstTeachingResult = $getFirstTeaching->get_result();

                        while($selectModuleIDRow = $getFirstTeachingResult->fetch_array())
                        {
                            echo $selectModuleIDRow['total'];
                        }

            ?></p>
            <label for="chk1" id="supMenu">NEXT</label> <!-- Rotates box to next side -->
        </div>

        <div class="b">
            <h6 class = "menuTitle" >TEACHING: Variables</h6><br>
            <p><?php
                //Returns second teaching from database
            $getFirstTeaching = $con->prepare("SELECT teaching_two as total FROM modules  WHERE module_name = 'Variables'");
            $getFirstTeaching->execute();
            $getFirstTeachingResult = $getFirstTeaching->get_result();

            while($selectModuleIDRow = $getFirstTeachingResult->fetch_array())
            {
                echo $selectModuleIDRow['total'];
            }

            ?></p>
            <label for="chk2" id="supMenu">NEXT</label> <!-- Rotates box to next side -->
        </div>

        <div class="c">
            <h6 class = "menuTitle" >TEACHING: Variables</h6><br>
            <p><?php
                //Returns third teaching from database
            $getFirstTeaching = $con->prepare("SELECT teaching_three as total FROM modules  WHERE module_name = 'Variables'");
            $getFirstTeaching->execute();
            $getFirstTeachingResult = $getFirstTeaching->get_result();

            while($selectModuleIDRow = $getFirstTeachingResult->fetch_array())
            {
                echo $selectModuleIDRow['total'];
            }

            ?></p>
            <label for="chk3" id="supMenu">NEXT</label> <!-- Rotates box to next side -->
        </div>

        <div class="d">
            <form action="" method="post" class="frm">
            <h6 class = "menuTitle" >CONGRATULATIONS</h6><br><br><br><br>
            <p>Be sure to check the "vocabulary" tab that is in the menu for more information!</p>
            <input id="buttonMod1" type="submit" name = "menu" value="BACK TO MENU">
            </form>
            <?php
            if(isset($_POST['menu'])) //Redirects use to menu
            {
                header('location:menu.php');
            }
            ?>
        </div>

    </div>

</body>
</html>
