<?php
session_start();
include("connection.php");
include("functions.php");
$user_data = check_login($con); //Global variable that keeps user logged in

$user_id = $_SESSION['user_id']; //User data needed for database logging
$email = $user_data['email'];

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quiz: Variables!</title>
    <link rel="stylesheet" href="css/styleQuizVariables3.css">
    <link rel="icon" href="images/javaIcon.png">
</head>
<body>

<div class = "box">
    <div class = "a">
        <form  method="post" class="frm">
            <h6 class = "menuTitle" >QUIZ: Variables</h6><br>

            <p><?php  //Shows third quiz question from database
                $getThirdQuestionQuiz = $con->prepare("SELECT teaching_three as total FROM modules  WHERE module_name = 'QUIZ: Variables'");
                $getThirdQuestionQuiz->execute();
                $getThirdQuestionQuizResult = $getThirdQuestionQuiz->get_result();

                while($selectModuleIDRow = $getThirdQuestionQuizResult->fetch_array())
                {
                    echo $selectModuleIDRow['total'];
                }
                ?></p>

            <input id="buttonMod2" type="submit" name="wrong" value="int">  <!-- user's choices for what is the correct answer -->
            <input id="buttonMod2" type="submit" name="wrong" value="String">
            <input id="buttonMod2" type="submit" name="wrong" value="double">
            <input id="buttonMod2" type="submit" name="correct" value="float">
        </form>

        <?php
        if($_SERVER['REQUEST_METHOD'] == "POST")  //Logs if the user put correct or incorrect answer and updates  into logs accordingly
        {
            if (isset($_POST['wrong']))
            {

                header('location:menu.php');
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
                        header('location:menu.php'); //Redirects back to menu
                    }
                }
            }
        } ?>
    </div>

    <div class = "b"></div>

    <div class = "c"></div>

    <div class = "d"></div>

    <div class = "e"></div>
</div>


</body>
</html>
