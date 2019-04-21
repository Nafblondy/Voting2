<?php
//establishing connections
require_once("conx.php");
require_once("patch/function.php");
//functions for the site created by jingis@Prymecoders.com
////function for random numbers generation
// function keygen($format = 'u', $utimestamp = null) {
//	if (is_null($utimestamp))
//	$utimestamp = microtime(true);
//			
//	$timestamp = floor($utimestamp);
//	$milliseconds = round(($utimestamp - $timestamp) * 10000000);
//			
//return date(preg_replace('`(?<!\\\\)u`', $milliseconds, $format), $timestamp);
//				}
//beginning signup form function
function signUp(){
  $pass_code = keygen();
  $vote_code = keygen();
global $link;
if(isset($_POST['signup'])){
$matric_no = preg_replace("#[^0-9a-z /]#", '' , $_POST['matric_no']);
$phone_no = preg_replace("#[^0-9]#", '' , $_POST['phone_no']);
$email = preg_replace("#[^0-9a-zA-Z@.]#", '' ,$_POST['email']);
$gender = mysqli_real_escape_string($link, $_POST['gender']);
$pass1 = preg_replace("#[^0-9a-zA-Z /\*.]#", '' , $_POST['pass1']);
$pass2 = preg_replace("#[^0-9a-zA-Z /\*.]#", '' , $_POST['pass2']);
$password = md5($pass1);
//checking to if the form was submitted empty
if(empty($matric_no) && empty($phone_no) && empty($email) && empty($pass1) && empty($pass2)){
echo "<span class='error'>All field are required</span>";
}
//if matric number is empty
elseif(empty($matric_no)){
echo "<span class='error'>matric number field is required</span>";
}
//if gender is empty
elseif(empty($gender)){
echo "<span class='error'>gender field is required</span>";
}
//if phone number is empty
elseif(empty($phone_no)){
echo "<span class='error'>phone number field is required</span>";
}
//if email address is empty
elseif(empty($email)){
echo"<span class='error'>email field is required</span>";
}
//if password field is empty
elseif(empty($pass1)){
echo"<span class='error'>password field is required</span>";
}
//if password doesn't match confirm password
elseif($pass1 != $pass2){
echo "<span class='error'>password does not match</span>";
}
//if no error then insert into the database
else{
$insert = "INSERT INTO reg_voters(matric_no , phone_no ,gender,email,pass_code,voters_code,password,date_registered)
VALUES('$matric_no','$phone_no','$gender','$email',' $pass_code', '$vote_code','$password',NOW())";
	//querying the insertion
$query = mysqli_query($link,$insert);
//checking for insertion success
if($query){
    header("location:thanks.php");
exit;
}
//if field to insert to the database
else{
echo"<span class='error'>sorry we unable to save your data into our database</span>";
exit;
}
return $query;
}
}
}
//end the signup function
//begin the login function
function logIn(){
if(isset($_POST['submit'])){
	global $link;	
//email id		
if(empty($_POST['matric_no'])){
echo'<span class="error">please enter a matric no.</span> <br />';
}	
else {
$matric_no = mysqli_real_escape_string($link, strip_tags($_POST['matric_no']));
} 		
//password
if(empty($_POST['password'])){
echo'<span class="error">please enter a password.</span>';
}	
else {
$upassword = md5($_POST['password']);
$password = mysqli_real_escape_string($link, $upassword);
}	
		
if (!empty($matric_no)&& !empty($password)){
                    
$sql = "SELECT * FROM reg_voters WHERE matric_no ='$matric_no' AND password='$password' LIMIT 1";
$result = mysqli_query($link,$sql);
             
if(mysqli_num_rows($result)==1){
$row = mysqli_fetch_array($result);
    $login_matric_no = $row['matric_no'];
    $active = $row['active'];
          $user_id = $row['reg_id']; 
if(isset($login_matric_no) && $active == 0){
    $_SESSION['reg_id'] = $row['reg_id']; 
    $_SESSION['matric_no'] =  $row['matric_no'];
    header('location:personal.php');
    exit();
    }
elseif(isset($login_matric_no ) && $active == 1){
    $_SESSION['reg_id'] = $row['reg_id']; 
    $_SESSION['matric_no'] =  $row['matric_no'];
        header('location:home.php');
        exit();
                                            
}   	                                				
}else{
echo'<span class="error">matric no ID or password is incorrect</span> <br /> <br />' ;
}
}
}
}//end the login function
//function for updating firstname last name
function finishUp(){
if(isset($_POST['finishup'])){
global $link;
global $reg_id;
$lastname = preg_replace("#[^a-z]#i", '' , $_POST['lastname']);
$firstname = preg_replace("#[^a-z]#i", '' , $_POST['firstname']);
//checking to if the form was submitted empty
if(empty($firstname) && empty($lastname)){
echo "<span class='error'>All field are required</span>";
}
//if matric number is empty
elseif(empty($firstname)){
echo "<span class='error'>first name field is required</span>";
}
//if gender is empty
elseif(empty($lastname)){
echo "<span class='error'>last name field is required</span>";
}
else{
$insert = "UPDATE reg_voters SET first_name = '$firstname',last_name = '$lastname',active = '1' WHERE reg_id = '$reg_id'";
	//querying the insertion
$query = mysqli_query($link,$insert);
//checking for insertion success
if($query){
header("location:home.php");
exit;
}
//if field to insert to the database
else{
echo"<span class='error'>sorry we unable to save your data into our database</span>";
exit;
}
return $query;
}
}

}
//function for verifying voter 
function get_pass_code(){
if(isset($_POST['verify'])){
global $reg_id;
global $link;
$voters_code = keygen();
//select the pass code field from the database to see if the code match
$sql = "SELECT * FROM reg_voters WHERE reg_id = '$reg_id'";
$query = mysqli_query($link,$sql);
//
$rows = mysqli_fetch_array($query);
$pass_code = $rows['pass_code'];
$first_name = $rows['first_name'];
$last_name = $rows['last_name'];
$name = "$first_name $last_name";
//creating variable and sanitizing pass_code field
$pass = mysqli_real_escape_string($link,$_POST['pass_code']);
//checking if the field is empty
if(empty($pass)){
echo "<span class='error'>please enter you pass code to continuer!!!</span> &nbsp; $name";
}
elseif( $pass != $pass_code){
echo "<span class='error'>Your pass code is not valid check and try again</span> &nbsp; $name";
}
else{
header("location:page_vote.php");
exit;
}
}
}
function get_voters_code(){
if(isset($_POST['voter'])){
global $reg_id;
global $link;
global $name;
//select the pass code field from the database to see if the code match
$sql = "SELECT * FROM reg_voters WHERE reg_id = '$reg_id'";
$query = mysqli_query($link,$sql);
//
$rows = mysqli_fetch_array($query);
$voters_code = $rows['voters_code'];
//creating variable and sanitizing pass_code field
$pass = mysqli_real_escape_string($link,$_POST['voters_code']);
//checking if the field is empty
if(empty($pass)){
echo "<span class='error'>please enter you voters code to continuer!!!</span> &nbsp; $name";
}
elseif( $pass != $voters_code){
echo "<span class='error'>Your voters code is not valid check and try again</span> &nbsp; $name";
}
else{
header("location:display_page.php");
}
}
}

?>