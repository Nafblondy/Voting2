<?php 
$token = 'view';
$token = md5($token);
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
<script src="js/ajax_php.js" type="text/javascript"></script>
<script src="js/insert.js" type="text/javascript"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>
<nav class=" navbar navbar-default default" id="my-navbar" >
     <div class="navbar-header margs">NACOSS e-Voting System</div>
<button type="button" title="Menu Bar" class="navbar-toggle menu" data-toggle="collapse" data-target="#navbar-collapse">
<span class="icon-bar color"></span>
<span class="icon-bar color"></span>
<span class="icon-bar color"></span>
<span class="icon-bar color"></span>
</button>
</div><!--navbar header-->
<div class="collapse navbar-collapse" id="navbar-collapse">
    <div class="btn-group pull-right" style="margin-top:8px; margin-right:60px;">
<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
Account
<span class="caret"></span>
</button>
<ul class="dropdown-menu" role="menu">
<li><a href="logout.php" onclick="return confirm('NOT?')";>Logout</a></li>
</ul>
</div>
<ul class="nav navbar-nav pull-right">
<li><a href="display_page.php" title="Home"><i class="fa fa-home" style="font-size:27px;"></i></a></li>
<li><a href="display_election.php?<?php echo $token;?>" title="View Result"><i class="fa fa-eye" style="font-size:27px;"></i></a></li>
<li><a href="logout.php" title="Logout"></a></li>
        </ul>
</div><!--class collapse-->
</div>
</nav>