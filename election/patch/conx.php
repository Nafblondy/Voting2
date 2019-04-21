<?php
//variables for establishing connection to the database
$host = "localhost";
$username = "root";
$password = "";
$db_name = "prymecoders";
//connection query
$link = @mysqli_connect($host , $username , $password);
//selecting the database
    $select = @mysqli_select_db($link,"prymecoders");


?>