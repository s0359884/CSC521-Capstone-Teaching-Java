<?php
session_start();

include("connection.php");
include("functions.php");
$user_data = check_login($con);
$user_id = $_SESSION['user_id'];  //Global variable to keep user logged in


if(isset($_POST['forLogout']))  //Redirects to login page and logs out user
{
    header('location:logout.php');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Let's get learning!</title>
    <link rel="stylesheet" href="css/styleMenu.css">
    <link rel="icon" href="images/javaIcon.png">
</head>
<body>
            <!-- Radio buttons for labels lower in page -->
    <input type="radio" id="chk1" name="a1" style="display: none;">
    <input type="radio" id="chk2" name="a1" style="display: none;">
    <input type="radio" id="chk3" name="a1" style="display: none;">
    <input type="radio" id="chk4" name="a1" style="display: none;">

    <input type="radio" id="chk5" name="a1" style="display: none;">
    <input type="radio" id="chk6" name="a1" style="display: none;">
    <input type="radio" id="chk7" name="a1" style="display: none;">
    <input type="radio" id="chk8" name="a1" style="display: none;">
    <input type="radio" id="chk9" name="a1" style="display: none;">
    <div class = "box">
        <div class = "a">
            <form  method="post" class="frm">
            <h6 class = "menuTitle" >THE JAVA TOOLBOX</h6><br>
            <label for="chk1" id="supMenu">Modules</label>   <!-- spins box depending on which label is pressed -->
            <label for="chk2" id="supMenu">Quizzes</label>
            <label for="chk3" id="supMenu1">Grades</label>

                <input id="buttonMod3" type="submit" name = "vocabulary" value="Vocabulary">  <!-- Redirects to Vocab page -->
                <input id="buttonMod2" type="submit" name = "forLogout" value="Logout">       <!-- Redirects to login page and logs user out -->
                <input id="buttonMod5" type="submit" name = "QandA" value="Q & A">            <!-- Redirects to comment page -->

            </form>
            <?php                                                   //Redirects based on upper buttons (logout and Q and A) if pressed
            if(isset($_POST['vocabulary']))
            {
                header('location:vocabulary.php');
            }

            if(isset($_POST['QandA']))
            {
                header('location:comments.php');
            }
            ?>
        </div>


        <div class = "b">
            <form action=""method="post"class="frm">
            <h6 class = "moduleTitle" >MODULES</h6><br>
                <form method="post">
                    <input id="buttonMod1" type="submit" name = "variables" value="Variables">
                    <input id="buttonMod1" type="submit" name = "arrays" value="Arrays">
                    <input id="buttonMod1" type="submit" name = "dataStructures" value="Data Structures">
                    <input id="buttonMod1" type="submit" name = "ifStatements" value="If-Statements">
                </form>
            <label for="chk6" id="moduleSup">Back to menu</label>
            </form>

            <?php
            if(isset($_POST['variables']))
            {
                header('location:moduleVariables.php');
            }
            ?>
        </div>
        <div class = "c">
                <h6 class = "moduleTitle" >QUIZZES</h6><br>
                <form method="post"> <!-- post method for redirection to selected quiz page -->
                    <input id="buttonMod4" type="submit" name = "variablesQuiz" value="Variables">
                    <input id="buttonMod4" type="submit" name = "arrays" value="Arrays">                    <!-- Not created yet  -->
                    <input id="buttonMod4" type="submit" name = "dataStructures" value="Data Structures">   <!-- Not created yet  -->
                    <input id="buttonMod4" type="submit" name = "ifStatements" value="If-Statements">       <!-- Not created yet  -->

                <label for="chk7" id="moduleSup1">Back to menu</label>  <!-- Rotates box back to first portion of box -->
                <?php
                if(isset($_POST['variablesQuiz']))      //Redirects based on if variablesQuiz button is pressed
                {
                    header('location:quizVariables1.php');
                }
                ?>
            </form>
        </div>

        <div class = "d">
            <h6 class = "firstTitle" >GRADES</h6><br>
            <p>
            <?php               //Posts all logged in user's grades
            $query = "SELECT quiz, grade FROM logs WHERE $user_id = user_id and comments = ''";
            $result = mysqli_query($con,$query);

            if($result -> num_rows > 0)
            {
                while($row = $result -> fetch_assoc())
                {
                    echo "Quiz: ". $row["quiz"]."<br>". "Grade: ". $row["grade"]." out of 3"."<br>"."<br>";
                }
            }else
                echo "You have not taken any quizzes!"
            ?></p>
            <label for="chk8" id="sup">Back to menu</label>  <!-- Sends to first side of box -->
        </div>
        <div class = "e"></div>
    </div>
</body>
</html>
