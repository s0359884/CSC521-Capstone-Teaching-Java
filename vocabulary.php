<?php
session_start();

include("connection.php");
include("functions.php");
$user_data = check_login($con); //Keeps user logged in

if(isset($_POST['forMenu'])) //Redirects to menu for lower button
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

            <!-- Radio buttons for lower labels  -->
<input type="radio" id="chk1" name="a1" style="display: none;">
<input type="radio" id="chk2" name="a1" style="display: none;">
<input type="radio" id="chk3" name="a1" style="display: none;">
<input type="radio" id="chk4" name="a1" style="display: none;">
<input type="radio" id="chk5" name="a1" style="display: none;">
<input type="radio" id="chk6" name="a1" style="display: none;">
<div class = "box">
    <div class = "a">
            <h6 class = "menuTitle" >VOCABULARY</h6><br>
        <?php
        //$query = "SELECT * FROM vocabulary";
        $query = "SELECT vocab_name,definition FROM vocabulary where vocab_name ='Variable'";
        $result = mysqli_query($con,$query);

        if($result -> num_rows > 0)
        {
            while($row = $result -> fetch_assoc())
            {
                echo $row["vocab_name"]."<br><br>".  $row["definition"]."<br>"."<br>";
            }
        }
        ?>

        <label for="chk1" id="supMenu">NEXT</label>

        <form method="post">
        <input id="testButton2" type="submit" name = "forMenu" value="Back to Menu"> <!-- Sends back to menu -->
        </form>

        <?php
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            if(isset($_POST['forMenu']))
            {
                header('location:menu.php');
            }
        }

        ?>
    </div>


    <div class = "b">
        <h6 class = "menuTitle" >VOCABULARY</h6><br>

        <?php
                        //Returns Boolean definition from database
        $query = "SELECT vocab_name,definition FROM vocabulary where vocab_name ='Variable: Boolean'";
        $result = mysqli_query($con,$query);

        if($result -> num_rows > 0)
        {
            while($row = $result -> fetch_assoc())
            {
                echo $row["vocab_name"]."<br><br>".  $row["definition"]."<br>"."<br>";
            }
        }
        ?>
        <br><br>

        <?php
                            //Returns char definition from database
        $query = "SELECT vocab_name,definition FROM vocabulary where vocab_name ='Variable: char'";
        $result = mysqli_query($con,$query);

        if($result -> num_rows > 0)
        {
            while($row = $result -> fetch_assoc())
            {
                echo $row["vocab_name"]."<br><br>".  $row["definition"]."<br>"."<br>";
            }
        }
        ?>



        <label for="chk2" id="supMenu3">BACK</label>
        <label for="chk3" id="supMenu4">NEXT</label>
        <form method="post">
        <input id="testButton3" type="submit" name = "forMenu" value="Back to Menu"> <!-- Sends back to menu -->
        </form>

    </div>
    <div class = "c">
        <h6 class = "menuTitle" >VOCABULARY</h6><br>
        <?php
                    //Returns float definition from database
        $query = "SELECT vocab_name,definition FROM vocabulary where vocab_name ='Variable: float'";
        $result = mysqli_query($con,$query);

        if($result -> num_rows > 0)
        {
            while($row = $result -> fetch_assoc())
            {
                echo $row["vocab_name"]."<br><br>".  $row["definition"]."<br>"."<br>";
            }
        }
        ?>
        <br>

        <?php
                        //Returns int definition from database
        $query = "SELECT vocab_name,definition FROM vocabulary where vocab_name ='Variable: int'";
        $result = mysqli_query($con,$query);

        if($result -> num_rows > 0)
        {
            while($row = $result -> fetch_assoc())
            {
                echo $row["vocab_name"]."<br><br>".  $row["definition"]."<br>"."<br>";
            }
        }
        ?>
        <label for="chk4" id="supMenu3">BACK</label>
        <label for="chk5" id="supMenu4">NEXT</label>
        <form method="post">
            <input id="testButton3" type="submit" name = "forMenu" value="Back to Menu"> <!-- Sends back to menu -->
        </form>
    </div>
    <div class = "d">
        <h6 class = "menuTitle" >VOCABULARY</h6><br>

        <?php
                        //Returns double definition from database
        $query = "SELECT vocab_name,definition FROM vocabulary where vocab_name ='Variable: double'";
        $result = mysqli_query($con,$query);

        if($result -> num_rows > 0)
        {
            while($row = $result -> fetch_assoc())
            {
                echo $row["vocab_name"]."<br><br>".  $row["definition"]."<br>"."<br>";
            }
        }
        ?>

        <?php
                        //Returns String definition from database
        $query = "SELECT vocab_name,definition FROM vocabulary where vocab_name ='Variable: String'";
        $result = mysqli_query($con,$query);

        if($result -> num_rows > 0)
        {
            while($row = $result -> fetch_assoc())
            {
                echo $row["vocab_name"]."<br><br>".  $row["definition"]."<br>"."<br>";
            }
        }
        ?>

        <label for="chk6" id="supMenu5">BACK</label>
        <form method="post">
            <input id="testButton4" type="submit" name = "forMenu" value="Back to Menu">  <!-- Sends back to menu -->
        </form>

    </div>
    <div class = "e"></div>

</div>

</body>
</html>
