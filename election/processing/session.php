<?php

session_start();
if(isset($_SESSION['email'])){
 $reg_id = $_SESSION['reg_id'];
}
else{
header("location:index.php");
}

