<?php
require_once("/patch/session_check.php");
require_once("patch/conx.php");
require_once("patch/function.php");
if(isset($_POST['action']) && $_POST['action'] == 'email_available'){ // Check for the username posted
	$email 		= htmlentities($_POST['email']); // Get the username values
	$check_query	= mysqli_query($link,'SELECT email FROM reg_voters WHERE email = "'.$email.'" '); // Check the database
	echo mysqli_num_rows($check_query); // echo the num or rows 0 or greater than 0
}
if(isset($_POST['action']) && $_POST['action'] == 'matric_no_available'){ // Check for the username posted
	$matric_no 		= htmlentities($_POST['matric_no']); // Get the username values
	$check_query	= mysqli_query($link,'SELECT email FROM reg_voters WHERE matric_no = "'.$matric_no.'" '); // Check the database
	echo mysqli_num_rows($check_query); // echo the num or rows 0 or greater than 0
}
if(isset($_POST['action']) && $_POST['action'] == 'phone_no_available'){ // Check for the username posted
	$phone_no 		= htmlentities($_POST['phone_no']); // Get the username values
	$check_query	= mysqli_query($link,'SELECT phone_no FROM reg_voters WHERE phone_no = "'.$phone_no.'" '); // Check the database
	echo mysqli_num_rows($check_query); // echo the num or rows 0 or greater than 0
}
if(isset($_POST['getcandidate'])){
$bid = preg_replace("#[^0-9]#", '' , $_POST['getcandidate']);
$input ="";
$inputs = "";
$query = "SELECT * FROM position INNER JOIN candidate ON position.pos_id = candidate.pos_id WHERE candidate.pos_id ='$bid'  ORDER BY RAND()";
$results =  mysqli_query($link, $query);
$num_check = mysqli_num_rows($results);
if($num_check != 0){
while($rows = mysqli_fetch_array($results)){
 $pos_id = database_clean($rows['pos_id']);
  $can_id = database_clean($rows['c_id']);
$first_name = show_clean($rows['first_name']);
$last_name = show_clean($rows['last_name']);
$positions = show_clean($rows['position']);
$image = $rows['image'];
$name = "$first_name $last_name";
$input .= "<form action=\"\" method=\"post\" onsubmit=\"return false\" name=\"vote\">
<div class=\"form-group\">
<table width='50%'>
<tr>
<td width='4%'>
<img src=\"../super/uploads/$image\" width=\"150\" height=\"150\"  class=\"img-circle imgborder\" />
    </td>
    <td width='3%'>
<input type=\"hidden\" name=\"pos_id\" id=\"posId\" class\"radio\" value=\"$pos_id\" />
<input type=\"hidden\" name=\"pos_id\" id=\"userId\" class\"radio\" value=\"$reg_id\" />
<input type=\"radio\" name=\"can_id\" id=\"cId\" class=\"radio\"  value=\"$can_id\" />"
        . "</td><td width='13%'>$name</td></tr></table></div>";
}
$input .= '<button class="btn btn-block btn-primary" id ="btn" name="vote" onClick="insertVote();">VOTE NOW!!!</button></form><span id="status"></span>';
echo "<h1>$positions</h1><br/>";
echo $input;
}
else{
$inputs = "There is no candidate to vote for";
echo $inputs;
}
}
if(isset($_POST['posid'])){
  $posId = preg_replace("#[^0-9]#", '' , $_POST['posid']);
$cId = preg_replace("#[^0-9]#", '' , $_POST['cid']);
$query = mysqli_query($link , "INSERT INTO votes(c_id,pos_id)VALUES('$cId','$posId')");
if($query){
echo "success";
}
else{
echo "failed";
exit;
}
}
?>