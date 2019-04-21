<?php
session_start();
//index of the site
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
<link href="css/font-awesome.min.css" rel="stylesheet">
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/ajax.js" type="text/javascript"></script>

</head>
<body>
<nav class=" navbar navbar-default default" id="my-navbar" >
<div class="navbar-header margs">Adamawa State University S.U.G E-Voting System</div>
<button type="button" title="Menu Bar" class="navbar-toggle menu" data-toggle="collapse" data-target="#navbar-collapse">
<span class="icon-bar color"></span>
<span class="icon-bar color"></span>
<span class="icon-bar color"></span>
<span class="icon-bar color"></span>
</button>
</div><!--navbar header-->
<div class="collapse navbar-collapse" id="navbar-collapse">
    <ul class="nav navbar-nav pull-right">
<li><a href="view_result.php" title="View Result">View Election Result</a></li>

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
<?php logIn(); 

$token = 'invaildusers';
  $token = sha1($token);
if(isset($_GET[$token])){
    
    echo"<span class='error'>sorry you are not an eligible voter</span>";
  
}
 $token2 = 'voted';
  $token2 = sha1($token2);
if(isset($_GET[$token2])){
    
    echo"<span class='error'>we detected that you have voted already so you can not login</span>";
  
}
?>
  
<form action="" method="post">
<div class="form-group"><!--beginning of form group-->
<b>Email or ID No:</b><br>
<input type="text" name="matric_no" id="email" class="form-control" placeholder="your ID number " />
</div><!--end of form group-->
<div class="form-group"><!--beginning of form group-->
<b>Password</b><br>
<input type="password" name="password" id="password" class="form-control" placeholder="your password please" />
</div><!--end of form group-->
<div class="form-group"><!--beginning of form group-->
<button name="submit" id="submit" type="submit" class="btn btn-block btn-primary">Log IN</button>
</div><!--end of form group-->
</form>
<div class="form-footer footerf divider">
<div class="row">
<div class="col--7 col-sm-7 col-md-7 link">
<i class="fa fa-lock"></i>
<a href="forget_password.php"> Forgot password? </a>
</div><!--div col-->
<div class="col--5 col-sm-5 col-md-5 link">
<i class="fa fa-user"></i>
<a href="create_account.php"> SignUp </a>
</div><!--div col-->
</div><!--inner rows-->
</div><!--footer-->
</div>
</div><!--end of the first col-->
<div class="col-lg-4 col-md-4 col-sm-"><!--beginning of third col-->
</div><!--end of the third col-->
</div><!--rows end-->
<?php require_once("patch/footer.php");?>