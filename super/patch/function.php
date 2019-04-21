<?php
  include 'db.inc.php'; 
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
    function show_clean($var){
   $var = htmlentities($var, ENT_QUOTES, "UTF-8");
       return $var = ucwords($var);
   }