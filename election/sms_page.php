<?php
require_once 'patch/function.php';
session_start();
if(isset($_SESSION['email'])){
$reg_id = database_clean($_SESSION['reg_id']);
}
else{
header("location:index.php");
}
//index of the site
require_once("functions/function_fetch.php");
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
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/ajax.js" type="text/javascript"></script>

</head>
<body>
<nav class=" navbar navbar-default navbar-fixed-top pad menu" id="my-navbar" >
<div class="container">
<div class="row">
<div class="col-lg-3 col-md-3 col-sm-3"></div>
<div class="col-lg-6 col-md-6 col-sm-6">
<div class="navbar-header marg">Electronic Voting System</div>
</div>
<div class="col-lg-3 col-md-3 col-sm-3"></div>
</div>
</div>
<button type="button" title="Menu Bar" class="navbar-toggle menu" data-toggle="collapse" data-target="#navbar-collapse">
<span class="icon-bar color"></span>
<span class="icon-bar color"></span>
<span class="icon-bar color"></span>
<span class="icon-bar color"></span>
</button>
</div><!--navbar header-->
<div class="collapse navbar-collapse" id="navbar-collapse">
</div><!--class collapse-->
</div>
</nav>
<div class="jumbotron jum"><!--jumbotron beginning-->
<div class="container">
<div class="clo-lg-2 clo-md-2 col-sm-2"></div><!--class cols-->
<div class="clo-lg-8 clo-md-8 col-sm-8 form-container">
 OK <span style="color:#4071a9;"><?php get_user(); ?></span>&nbsp;&nbsp;,thank you for Creating 
 account with us please check your Message Box of your phone to get your voting code in a moment to complete  your voting process by not getting your voters code. 
 You will not be able to vote on the site until you successfully get a voters code.<b>Noted:</b> by independent Student Electrical Commission<b>(ISEC)</b> Chairman. thank you once more.
</div><!--class cols-->
<div class="clo-lg-2 clo-md-2 col-sm-2"></div><!--class cols-->
<?php require_once("patch/footer.php");?>