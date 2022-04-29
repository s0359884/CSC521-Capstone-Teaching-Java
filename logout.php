<?php
session_start();
                                    //Logs out user and unsets user_id from global variable
if(isset($_SESSION['user_id']))
{
    unset($_SESSION['user_id']);
}

header("Location:login.php");  //Redirects to login page
die;
