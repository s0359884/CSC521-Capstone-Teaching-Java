<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "javatoolbox";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
    die("Failed to connect");
}

