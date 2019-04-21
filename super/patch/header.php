<?php
session_start();
if(isset($_SESSION['username'])){
    $id = $_SESSION['a_id'];
}
else{
    header("location:index.php");
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Independent students electrical commission</title>
<link href="css/bootstrap.css" rel="stylesheet"> 
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-theme.css" rel="stylesheet">
<link href="css/bootstrap-theme.min.css" rel="stylesheet">
<link href="css/main.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/ajax.js" type="text/javascript"></script>
<script src="js/ajax.js"></script>
<script src="js/ajax_php.js" type="text/javascript"></script>
<script src="js/insert.js" type="text/javascript"></script>

<script src="js/wordCounter.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script src="https://jonthornton.github.io/jquery-timepicker/jquery.timepicker.js"></script>
<link rel="stylesheet" type="text/css" href="https://jonthornton.github.io/jquery-timepicker/jquery.timepicker.css" />

<script src="lib/bootstrap-datepicker.js"></script>
<link rel="stylesheet" type="text/css" href="lib/bootstrap-datepicker.css" />

<script src="lib/pikaday.js"></script>
<link rel="stylesheet" type="text/css" href="lib/pikaday.css" />

<script src="lib/jquery.ptTimeSelect.js"></script>
<link rel="stylesheet" type="text/css" href="lib/jquery.ptTimeSelect.css" />
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/ui-lightness/jquery-ui.css" type="text/css" media="all" />

<script src="dist/datepair.js"></script>
<script src="dist/jquery.datepair.js"></script>


<script>

 function fetch_users(){
         $("#fetch_users").load("processor/load_user_drop_down.php");
      }


$(document).ready(function(){
$("#fetch_users").load("processor/load_user_drop_down.php"); 


});


function fetch_position(){
$("#dropPos").load("processor/load_into_drop_down.php");
}

$(document).ready(function(){
$("#load").load("processor/displayPosition.php"); 


});

function loadIn(){
$("#load").fadeIn(3000).load("processor/displayPosition.php");
}

function changeDetails(){
var p =  _("password").value;
var p2 =  _("Cpassword").value;
var status = _("status");
var username = _("username").value;

if(p == "" || p2 == ""){

status.innerHTML = "password field  must not be empty";

}
else{
_("stb").style.display = "none";
status.innerHTML = "<img src='images/loading.gif' alt='loading.......'>";
var ajax = AjaxObject("POST", "processor/change_password.php");
ajax.onreadystatechange = function() {
if(ajaxReturn(ajax) == true) {
if(ajax.responseText != "success"){
status.innerHTML = ajax.responseText;
_("stb").style.display = "block";

} else {
window.scrollTo(0,0);

_("status").innerHTML = "password has been change successfully";
}
}
}
ajax.send("p="+p+"&p2="+p2+"&user="+username);
}

}

function set_title(){
var title =   _("elect_title").value;
var desc =   _("elect_desc").value;
var title_status  = _("title_status");

if(title == "" || desc == ""){
title_status.innerHTML = "title and description can't be empty";  
}
else{
_("stb").style.display = "none";
title_status.innerHTML = "<img src='images/loading.gif' alt='loading.......'>";
var ajax = AjaxObject("POST", "processor/changeTitle.php");
ajax.onreadystatechange = function() {
if(ajaxReturn(ajax) == true) {
if(ajax.responseText != "success"){
title_status.innerHTML = ajax.responseText;
_("stb").style.display = "block";

} else {
window.scrollTo(0,0);

title_status.innerHTML = "Title and Description has being entered successfully";
}
}
}
ajax.send("title="+title+"&desc="+desc);
}

}


function setPosition(){
var rank =  _("rank").value;
var posName =  _("positionname").value;
var pos_status = _("pos_status");
var loadPage = _("load");

if(posName == "" || rank == "" || rank <= 0){
alert("The position or rank field must not be empty");
//pos_status.innerHTML = "The position or rank field must not be empty";

}
else{
_("pos_stb").style.display = "none";
pos_status.innerHTML = "<img src='images/loading.gif' alt='loading.......'>";
var ajax = AjaxObject("POST", "processor/position.php");
ajax.onreadystatechange = function() {
if(ajaxReturn(ajax) == true) {
if(ajax.responseText != "success"){
pos_status.innerHTML = ajax.responseText;
_("pos_stb").style.display = "block";

} else {

_("pos_status").innerHTML = "position has been entered successfully";
loadIn()

}
}
}
}
ajax.send("rank="+rank+"&posName="+posName);

}

function candidateDetails(){
var drop =  _("dropPos").value;
var ln =  _("lname").value;
var fn = _("fname").value;
var cand_stb = _("cand_stb");
var candi_status = _("candi_status");

if(drop == "" || lname == "" || fname == ""){
alert("fill up all the fields");

}
else {
_("cand_stb").style.display = "none";
candi_status.innerHTML = "<img src='images/loading.gif' alt='loading.......'>";;
var ajax = AjaxObject("POST", "processor/candi_data.php");
ajax.onreadystatechange = function() {
if(ajaxReturn(ajax) == true) {
if(ajax.responseText != "success"){
candi_status.innerHTML = ajax.responseText;
_("cand_stb").style.display = "block";

} else {
_("cand_stb").style.display = "block";

_("candi_status").innerHTML = "cndidate details has been entered successfully";		

}
}
}
ajax.send("fn="+fn+"&drop="+drop+"&ln="+ln);
}



}           

function display(){
var date_start = _("date_start").value;
var time_start = _("time_start").value;
var time_end =  _("time_end").value;
var date_end =  _("date_end").value;
var date_status =  _("date_status");
//checks
if(date_start == "" || time_start == "" || time_end == "" || date_end == ""){
alert("All fields are required to set date");
}
else{
_("date_stb").style.display = "none";
date_status.innerHTML = "<img src='images/loading.gif' alt='loading.......'>";
var ajax = AjaxObject("POST", "processor/setDate.php");
ajax.onreadystatechange = function() {
if(ajaxReturn(ajax) == true) {
if(ajax.responseText != "success"){
date_status.innerHTML = ajax.responseText;
_("date_stb").style.display = "block";

} else {

_("date_stb").style.display = "block";
_("date_status").innerHTML = "password has been change successfully";
}
}
}
ajax.send("date_start="+date_start+"&time_start="+time_start+"&time_end="+time_end+"&date_end="+date_end);
}
}

function realTime(){
var realDrop =  _("real_time").value;
var real_status =  _("real_status");
if(realDrop == ""){
alert("SHOW RESULT SETTING MUST BE SET!!");
}
else{ 
_("real_btn").style.display = "none";
real_status.innerHTML = "<img src='images/loading.gif' alt='loading.......'>";
var ajax = AjaxObject("POST", "processor/realtime.php");
ajax.onreadystatechange = function() {
if(ajaxReturn(ajax) == true) {
if(ajax.responseText != "success"){
date_status.innerHTML = ajax.responseText;
_("real_btn").style.display = "block";

} else {

_("real_btn").style.display = "block";
real_status.innerHTML = "Realtime settings was successfully set";
}
}
}
ajax.send("realDrop="+realDrop);
}

//alert("real time voting setting MUST be set");
}





</script>

</head>
<body>
<nav class=" navbar navbar-default" id="my-navbar" >
<div class="navbar-header marg">ADSU e-Voting system (Admin Panel)</div>
<button type="button" title="Menu Bar" class="navbar-toggle menu" data-toggle="collapse" data-target="#navbar-collapse">
<span class="icon-bar color"></span>
<span class="icon-bar color"></span>
<span class="icon-bar color"></span>
<span class="icon-bar color"></span>
</button>
</div><!--navbar header-->
<div class="collapse navbar-collapse" id="navbar-collapse">
<ul class="nav navbar-nav pull-right">
<li><a href="dashboad.php" title="Home">Home</a></li>
<li><a href="view_result.php" title="View Result">Result</a></li>
<li><a href="display_voters.php" title="Display Voters">Voters List</a></li>
<li><a href="pass_code.php" title="pass code">Pass Code</a></li>
<li><a href="home.php" title="Settings">Settings</a></li>
<li><a href="change_password.php" title="Change Password">Change Password</a></li>
<li><a href="logout.php" title="Logout">Logout</a></li>
        </ul>
</div><!--class collapse-->
</div>
</nav>