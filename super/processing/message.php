<?php

//index of the site
require_once("session.php");
require_once 'patch/function.php';
require_once("../functions/function_fetch.php");
require_once("../functions/site_function.php");
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
<script src="js/ajax_php.js" type="text/javascript"></script>
<script src="js/insert.js" type="text/javascript"></script>
<script type="text/javascript" src="greybox/AJS.js"></script>
<script type="text/javascript" src="greybox/AJS_fx.js"></script>
<script type="text/javascript" src="greybox/gb_scripts.js"></script>
<link href="greybox/gb_styles.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
    var GB_ROOT_DIR = "http://mydomain.com/greybox/";
</script>
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
$positions = $rows['position'];
 $pos_id = $rows['pos_id'];

echo"<button class=\"btn btn-block btn-primary\"  id=\"tbl_'.$pos_id.'\" onClick=\"showresult(this.id)\">".$positions."</button>";
} ?>
</div>
</div><!--row-->
</div><!--col-11 inner-->
</div><!--class cols-->
<div class="clo-lg-8 clo-md-8 col-sm-8 form-container">
<div id="returnData" class="returnData">
<b>
Okay! you are already there. Just clink the on button at the left side bar to cast your vote now!! 

</b>
</div>
    
</div><!--class cols-->
<?php require_once("../patch/footer.php");?>

