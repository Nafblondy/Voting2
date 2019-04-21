<?php
  include 'conx.php'; 
function redirect_to($new_location) {
	  header("Location: " . $new_location);
	  exit;
}
function database_clean($var = ""){
    global $link;
    $var = htmlentities(trim(mb_strtolower($var)));
  $var = mysqli_real_escape_string($link,$var);
          return $var;
    
}
  function query($sql){
         global $link;
      return mysqli_query($link, $sql);
     }
function display_DB($var){
    global $link;
  $var = htmlentities(trim(strtoupper($var)));
  $var = mysqli_real_escape_string($link,$var);
          return $var;
}
function num_rows($sql){
        $sql = query($sql);
     $sql = mysqli_num_rows($sql);
          return $sql;
        
    }
 function endTime(){
       //time to end election
    $sql = "SELECT options FROM options WHERE  option_name = 'end_time'";

         $query = query($sql);
    $get = mysqli_fetch_array($query);
      $result = $get['options'];
     
         return $result;
    
}
function startTime(){
       //time to end election
    $sql = "SELECT options FROM options WHERE  option_name = 'start_time'";

         $query = query($sql);
    $get = mysqli_fetch_array($query);
      $result = $get['options'];
     
         return $result;
    
}

function check_user($search){
    
$lines = file('../super/roll/roll.dat');
// Store true when the text is found
$found = false;
foreach($lines as $line)
{
  if(strpos($line, $search) !== false)
  {
      $found = true;
     
  }
}
// If the text was not found, show a message
if(!$found)
{
    session_destroy();
    $token = 'invaildusers';
    $token = sha1($token);
    header('location:index.php?'.$token);
}
    
}

function show_clean($var){
   $var = htmlentities($var, ENT_QUOTES, "UTF-8");
       return $var = ucwords($var);
   }

function real_time_result_display(){
       //time to end election
    $sql = "SELECT options FROM options WHERE  option_name = 'real_time_result'";

         $query = query($sql);
    $get = mysqli_fetch_array($query);
      $result = $get['options'];
     
         return $result;
    
}
function detect_voted_user($user_id){
    $sql = "SELECT reg_id FROM voted WHERE reg_id = '$user_id'";
    return num_rows($sql);
}
////function for random numbers generation
 function keygen($format = 'u', $utimestamp = null) {
	if (is_null($utimestamp))
	$utimestamp = microtime(true);
			
	$timestamp = floor($utimestamp);
	$milliseconds = round(($utimestamp - $timestamp) * 10000000);
			
return date(preg_replace('`(?<!\\\\)u`', $milliseconds, $format), $timestamp);
 }
