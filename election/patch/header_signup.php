<html>
    <head>
        <meta charset="UTF-8">
<title>Independent students electrical commission</title>
<link href="css/bootstrap.css" rel="stylesheet"> 
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-theme.css" rel="stylesheet">
<link href="css/bootstrap-theme.min.css" rel="stylesheet">
<link href="css/main.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/ajax.js" type="text/javascript"></script>
        <script src="js/ajax.js"></script>
        <script>
        function check(){
     var m = _("matric").value;
        
        	if(m != ""){
		_("matric_status").innerHTML = 'checking ...';
		var ajax = AjaxObject("POST", "patch/vote_ajax.php");
           ajax.onreadystatechange = function() {
	       if(ajaxReturn(ajax) == true) {
	           _("matric_status").innerHTML = ajax.responseText;
	       }
        }
            ajax.send("mc="+m);
	}
        } 
        
         function signup(){
	var m = _("matric").value;
	var p1 = _("pass").value;
	var p2 = _("Vpass").value;
	var e = _("email").value;
	var g = _("gender").value;
	var ph = _("phone_no").value;
	var status = _("status");
	if( e == "" || p1 == "" || p2 == "" || m =="" || g == "" || ph == ""){
		status.innerHTML = "Fill out all of the form data";
	} else if(p1 != p2){
		status.innerHTML = "Your password fields do not match";
	} else {
		_("subtn").style.display = "none";
		status.innerHTML = 'please wait ...';
		var ajax = AjaxObject("POST", "patch/vote_ajax.php");
        ajax.onreadystatechange = function() {
	       if(ajaxReturn(ajax) == true) {
	           if(ajax.responseText != "signup_success"){
			status.innerHTML = ajax.responseText;
			_("subtn").style.display = "block";
                        
			} else {
				window.scrollTo(0,0);

      _("signupform").innerHTML = "your Registration was successful. <a href='index.php' class='btn btn-primary'>click here to Login</a> ";
				}
	       }
        }
        ajax.send("p="+p1+"&e="+e+"&g="+g+"&ph="+ph+"&m="+m);
	}
}
       
        </script>
        <style>
            #status{
    color: red;
    font-size:  medium;
    text-align: center;
}
        </style>
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