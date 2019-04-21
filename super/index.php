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
<a href="home.php"></a>
<body>
<nav class=" navbar navbar-default navbar-fixed-top" id="my-navbar" >
<div class="container">
<div class="row">
<div class="col-lg-3 col-md-3 col-sm-3"></div>
<div class="col-lg-6 col-md-6 col-sm-6">
<div class="navbar-header marg">ADSU e-Voting System Admin Panel</div>
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
</div><!--end of the second col-->
<div class="col-lg-4 col-md-4 col-sm-4 form-container margin"><!--beginning of third col-->
<div class="form-header">
    <a href="home.php"></a>
    <i class="fa fa-user"></i>
    </div>
<?php logIn();?>
<form action="" method="post">
<div class="form-group"><!--beginning of form group-->
<b>User Name:</b><br>
<input type="text" name="username" id="username" class="form-control" placeholder="your User Name " />
</div><!--end of form group-->
<div class="form-group"><!--beginning of form group-->
<b>Password</b><br>
<input type="password" name="password" id="password" class="form-control" placeholder="your password please" />
</div><!--end of form group-->
<div class="form-group"><!--beginning of form group-->
<button name="submit" id="submit" type="submit" class="btn btn-block btn-primary">Log In</button>
</div><!--end of form group-->
</form>
<div class="form-footer footerf divider">

</div><!--footer-->
</div>
</div><!--end of the first col-->
<div class="col-lg-4 col-md-4 col-sm-"><!--beginning of third col-->
</div><!--end of the third col-->
</div><!--rows end-->
<?php require_once("patch/footer.php");?>