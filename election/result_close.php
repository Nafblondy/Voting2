<?php 
require_once("/patch/function.php");
//require_once("/patch/header.php");
$ending_time = endTime();



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
<div class="container">
<div class="row">
<div class="col-lg-3 col-md-3 col-sm-3"></div>
<div class="col-lg-6 col-md-6 col-sm-6">
<div class="navbar-header margs">
NACOSS e-Voting System


</div>
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
<div class="jumbotron jumb"><!--jumbotron beginning-->
<div class="container">
 <div class="row">
<div class="clo-lg-2 clo-md-2 col-sm-2"></div><!--class cols-->
<div class="clo-lg-8 clo-md-8 col-sm-8" style="border:solid 1px #e8e8e8;">
 <?php
 echo "<h2>The Election result will be display by:</h2>";?>
    <?php
echo '<b>'.date("F, j, Y , g:i a",$ending_time).'</b>';
?>
     <div class="btn btn-group"><a href="view_result.php" class="btn-lg btn-md btn-sm btn-primary">Election result</a></div>
</div>
</div>
 </div>
</div>
<?php
require_once("patch/footer.php");
?>