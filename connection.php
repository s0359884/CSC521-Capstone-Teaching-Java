<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "javatoolbox";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname)) //connection to the database
{
    die("Failed to connect");
}

