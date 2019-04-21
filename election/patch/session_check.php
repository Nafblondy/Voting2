<?php
session_start();
if(isset($_SESSION['matric_no'])){
    require_once("function.php");
  $matric_no = database_clean($_SESSION['matric_no']);
 $reg_id = database_clean($_SESSION['reg_id']);

}
else{
  header("location:index.php");
}
 //textpad checker for vaild voters
  check_user($matric_no);
  
  //this function check if tuser already voted 
  
  //starting time for election
 $starting_time = startTime();//ending time of the election
 $ending_time = endTime();
 
 if(time() <  $starting_time){
     
    header("location:close.php");
      exit();
     
 }
 elseif(time() > $ending_time) {
  header("location:close.php");
     exit();
}
