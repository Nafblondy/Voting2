<?php
require_once("conx.php");
//require_once("../patch/function.php");
// fetching function
function get_user(){
//get user function
$name = "";
global $reg_id;
global $link;
$query = "SELECT first_name,last_name,voters_code FROM reg_voters WHERE reg_id = '$reg_id'";
$result = query($query);
return $result;
}
//function for fetching position from the database
function get_position(){
global $link;
$query = "SELECT * FROM positions";
$result = query($query);
return $result;
}
//function for fetching position from the database
function get_positions(){
global $link;
$query = "SELECT pos_id FROM positions";
$result = query($query);
while($rows = mysqli_fetch_array($result)){
$pos_id = database_clean($rows['pos_id']);
}
return $result;
}
//function for fetching position from the database
function get_candidate(){
global $link;
global $pos_id;
$query = "SELECT * FROM positions INNER JOIN candidate ON positions.pos_id = candidate.pos_id"; 
$result = query($query);
return $result;
}
?>