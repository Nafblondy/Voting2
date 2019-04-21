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
<div class="container">
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
        <ul class="nav navbar-nav pull-right">
<li><a href="index.php" title="Home"><i class="fa fa-home" style="font-size:27px;"></i></a></li>
    </ul>
</div><!--class collapse-->
</div>
</nav>
<div class="jumbotron jumb"><!--jumbotron beginning-->
<div class="container">
 <div class="row">
<div class="clo-lg-2 clo-md-2 col-sm-2"></div><!--class cols-->
<div class="clo-lg-8 clo-md-8 col-sm-8" style="border:solid 1px #e8e8e8;">
 <?php
 echo "<h2>The election system is currently closed, click the link below to view the results.</h2>";?>
    <div class="btn btn-group"><a href="view_result.php" class="btn-lg btn-md btn-sm btn-primary">Election result</a></div>
    <?php
echo '<b>'.date("F, j, Y , g:i a").'</b>';?>
</div>
</div>
 </div>
</div>
<?php
require_once("patch/footer.php");
?>