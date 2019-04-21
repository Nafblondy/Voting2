<?php
require_once("/patch/function.php");
$result = real_time_result_display();
$ending_time = endTime();
if($result == 'no' && time() < $ending_time){
    header('location:result_close.php');
}



//index of the site
//require_once("processing/session.php");
require_once("functions/function_fetch.php");
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
<script src="js/insert.js" type="text/javascript"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script src="js/ajax_php.js" type="text/javascript"></script>

</head>
<body>
<nav class=" navbar navbar-default default" id="my-navbar" >
<div class="navbar-header margs">Electronic Voting System</div>
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
<div class="clo-lg-3 clo-md-3 col-sm-3">
<div class="row radius">
<div class="col-lg-11 col-md-11 col-sm-11 margin">
<div class="bottom"><b>List of Positions</b></div>
<div class="holder">
<?php
$position = get_position();
while($rows = mysqli_fetch_array($position)){
$positions = show_clean($rows['position']);
 $pos_id = database_clean($rows['pos_id']);

echo"<button class=\"btn btn-block btn-primary\"  id=\"tbl_'.$pos_id.'\" onClick=\"showresult(this.id)\">".$positions."</button>";
} ?>
</div>
</div><!--row-->
</div><!--col-11 inner-->
</div><!--class cols-->
<div class="clo-lg-8 clo-md-8 col-sm-8 form-container">
<div id="returnData" class="returnData">
<h2>
 click the button on the left side bar to view election results!! 

</h2>
</div>
    
</div><!--class cols-->
<?php require_once("patch/footer.php");?>