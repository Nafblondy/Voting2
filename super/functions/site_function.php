<?php
//establishing connections
require_once("conx.php");
//functions for the site created by jingis@Prymecoders.com
//beginning signup form function
function signUp(){
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
$insert = "INSERT INTO reg_voters(matric_no , phone_no ,gender,email,password,date_registered)
			   VALUES('$matric_no','$phone_no','$gender','$email','$password',NOW())";
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
if(empty($_POST['username'])){
echo'<span class="error">please enter a User Name.</span> <br />';
}	
else {
$username = mysqli_real_escape_string($link, strip_tags($_POST['username']));
} 		
//password
if(empty($_POST['password'])){
echo'<span class="error">please enter a password.</span>';
}	
else {
$upassword = md5($_POST['password']);
$password = mysqli_real_escape_string($link, $upassword);
}	
		
if (!empty($username)&& !empty($password)){
                    
                    
$sql = "SELECT * FROM reg_admin WHERE username ='$username' AND password='$password' LIMIT 1";
$result = mysqli_query($link,$sql);
             
if(mysqli_num_rows($result)==1){
$row = mysqli_fetch_array($result);
    $user_name = $row['username'];
    $password = $row['password'];
          $user_id = $row['a_id']; 
if(isset($user_name) && $password == 1){
    $_SESSION['a_id'] = $user_id; 
    $_SESSION['username'] =  $row['username'];
    header('location:dashboad.php');
    exit();
    }                              				
}else{
echo'<span class="error">Username or password is incorrect</span> <br /> <br />' ;
}
}
}
}//end the login function
//function for random numbers generation
 function keygen($format = 'u', $utimestamp = null) {
	if (is_null($utimestamp))
	$utimestamp = microtime(true);
			
	$timestamp = floor($utimestamp);
	$milliseconds = round(($utimestamp - $timestamp) * 10000000);
			
return date(preg_replace('`(?<!\\\\)u`', $milliseconds, $format), $timestamp);
				}
//function for updating firstname last name
function finishUp(){
if(isset($_POST['finishup'])){
global $link;
global $reg_id;
$pass_code = keygen();
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
$insert = "UPDATE reg_voters SET first_name = '$firstname',pass_code = '$pass_code', active = '1',last_name = '$lastname' WHERE reg_id = '$reg_id'";
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
$query = "UPDATE reg_voters SET voters_code = '$voters_code' WHERE reg_id ='$reg_id'";
$result = mysqli_query($link,$query);
if($result){
header("location:page_vote.php");
}
else{
echo "<span class='error'>Your pass code is not valid check and try again</span> &nbsp; $name";
}
}
/*
else{
echo "<span class='error'>You have already use your voter code thank you</span>";
}*/
}
$query;
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