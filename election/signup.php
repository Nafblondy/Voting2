<?php
session_start();
if(isset($_SESSION['email'])){
$reg_id = $_SESSION['reg_id'];
}
//index of the site
require_once("functions/site_function.php");
?>
<a href="signup.php"></a>

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

</head>
<body>
<nav class=" navbar navbar-default navbar-fixed-top" id="my-navbar" >
<div class="container">
<div class="row">
<div class="col-lg-3 col-md-3 col-sm-3"></div>
<div class="col-lg-6 col-md-6 col-sm-6">
<div class="navbar-header margs">Electronic Voting System</div>
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
<div class="container"><!--container bengin-->
<div class="row"><!--rows begin-->

<div class="col-lg-4 col-md-4 col-sm-4"><!--beginning of second col-->
<div class="row">
<div class="col-lg-4 col-md-4 col-sm-4"><!--beginning of inner second col-->
<img src="images/political.gif" width="100" height="100" />
</div><!--end of inner second col-->
</div><!--end of inner second col-->
<br>
<div class="row">
<div class="col-lg-4 col-md-4 col-sm-4"><!--beginning of inner second col-->
<img src="images/checklist4.gif" width="100" height="100" />
</div><!--end of inner second col-->
</div><!--end of inner second col-->
<br>
<div class="row">
<div class="col-lg-4 col-md-4 col-sm-4"><!--beginning of inner second col-->
<img src="images/verified10.gif" width="100" height="100" />
</div><!--end of inner second col-->
</div><!--end of inner second col-->
</div><!--end of the second col-->
<div class="col-lg-4 col-md-4 col-sm-4 form-container margin"><!--beginning of third col-->
<div class="form-header">
    <i class="fa fa-user"></i>
    </div>
<?php signUp(); ?>
 <form action="" onsubmit="return false;" id="signupform">
<div class="form-group"><!--beginning of form group-->
<b>Email:</b><br>
<div class="input-group">
<input type="email" name="email" id="email_addr" class="form-control" onfocus="emptystatus('status')" placeholder=" your  Email Address Please" required />
<span class="input-group-addon" id="email_avail_result"></span>
</div>
</div><!--end of form group-->
<div class="form-group"><!--beginning of form group-->
<b>Matric No:</b><br>
<div class="input-group">
<input type="text" name="matric_no" id="matric_no" class="form-control"onblur=" check()" onfocus="emptystatus('status')" placeholder="your Matric number please" />
<span class="input-group-addon" id="matric_avail_result"></span>
</div>
</div><!--end of form group-->
<div class="form-group"><!--beginning of form group-->
<b>Gender:</b><br>
<select name="gender" id="gender" class="form-control">
<option>Your gender Please</option>
<option>Male</option>
<option>Female</option>
</select>
</div><!--end of form group-->
<div class="form-group"><!--beginning of form group-->
<b>Phone Number:</b><br>
<div class="input-group">
<input type="text" name="phone_no" id="phone_no" class="form-control" onfocus="emptystatus('status')" placeholder="your Phone Number please" />
<span class="input-group-addon" id="phone_avail_result"></span>
</div>
</div><!--end of form group-->
<div class="form-group"><!--beginning of form group-->
<b>Password:</b><br>
 <div class="input-group">
<input type="password" name="pass1" id="pass1" class="form-control" onfocus="emptystatus('status')" placeholder="your password please" />
<span class="input-group-addon" id="email_avail_result"></span>
</div>
</div><!--end of form group-->
<div class="form-group"><!--beginning of form group-->
<b>Confirm Password:</b><br>
<div class="input-group">
<input type="password" name="pass2" id="pass2" class="form-control" onfocus="emptystatus('status')" placeholder="your confirm password please" />
    <span class="input-group-addon" id="email_avail_result"></span>
</div>
</div><!--end of form group-->
<div class="form-group"><!--beginning of form group-->
<button id="subtn" onclick="signup()" type="submit" class="btn btn-block btn-primary">Sign Up</button>
</div><!--end of form group-->
</form>
</div>
</div><!--end of the third col-->
<div class="col-lg-4 col-md-4 col-sm-4"><!--beginning of third col-->
</div><!--end of the first col-->
</div><!--rows end-->
<?php require_once("patch/footer.php");?>