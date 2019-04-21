<?php
session_start();
if(isset($_SESSION['matric_no'])){
$reg_id = $_SESSION['reg_id'];
}
else{
header("location:index.php");
}
require_once("functions/site_function.php");
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
<nav class=" navbar navbar-default default" id="my-navbar" >
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
<div class="col-lg-4 col-md-4 col-sm-4"><!--beginning of first col-->
</div><!--end of the first col-->
<div class="col-lg-4 col-md-4 col-sm-4 form-container margin"><!--beginning of third col-->
<div class="bottom"><b>complete your Registration</b></div>
<div class="holder">
<?php finishUp(); ?>
<form action="" method="post">
<div class="form-group"><!--beginning of form group-->
<b>First Name:</b><br>
<div class="input-group">
<input type="text" name="firstname" id="firstname" class="form-control" placeholder=" your First Name Please" required />
<span class="input-group-addon" id="email_avail_result"></span>
</div>
</div><!--end of form group-->
<div class="form-group"><!--beginning of form group-->
<b>Last Name:</b><br>
<div class="input-group">
<input type="text" name="lastname" id="lastname" class="form-control" placeholder="your Last Name please" />
<span class="input-group-addon" id="matric_avail_result"></span>
</div>
</div><!--end of form group-->
<div class="form-group"><!--beginning of form group-->
<button name="finishup" id="finishup" type="submit" class="btn btn-lg btn-md btn-sm btn-primary">Finish Up</button>
</div><!--end of form group-->
</form>
</div>
</div><!--end of the third col-->
<div class="col-lg-4 col-md-4 col-sm-4"><!--beginning of second col-->
<div class="row"><!--beginning of inner row-->
<div class="col-lg-3 col-md-3 col-sm-3"><!--beginning of inner first col-->
</div><!--end of inner first col-->
<div class="col-lg-4 col-md-4 col-sm-4"><!--beginning of inner second col-->
<!--<img src="images/pryme.png" width="150" height="150">-->
</div><!--end of inner second col-->
<div class="col-lg-4 col-md-4 col-sm-4"><!--beginning of inner third col-->
</div><!--end of inner third col-->
</div><!--end of inner row-->
</div><!--end of the second col-->
</div><!--rows end-->
<?php require_once("patch/footer.php");?>