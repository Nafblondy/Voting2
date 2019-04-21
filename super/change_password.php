<?php  
require_once 'patch/db.inc.php';
require_once 'patch/header.php';
require_once 'patch/function.php';
?>
 <div class="container jum">
  <div class="row">
    <div class="col-lg-2 col-md-2 col-sm-2"></div>
     <div class="col-lg-8 col-md-8 col-sm-8">
      <div id="acess" class="padd">
 <fieldset class="fsborder">
  <legend class="lborder">Change Admin Password</legend>
<div class="change_acces"></div>
<form method="post" onsubmit="return false;" id="changepassword">
<input type="hidden" value="<?php echo "" ?>" id="username"/>
<div class="form-group">
<label for="password">New Password:</label> 
<input type="text" id="password" class="form-control"  placeholder=" enter new password" maxlength="40" autocomplete="on"
onfocus="emptystatus('status')"/>
</div>
<div class="form-group">
<label for="Password">Confirm Password:</label> 
<input type="text" id="Cpassword"  class="form-control" placeholder=" enter new password" maxlength="40" autocomplete="on"
onfocus="emptystatus('status')"/>
</div>
<input type="submit" id="stb" class="btn btn-block btn-primary" onclick="changeDetails()" value="CHANGE DETAILS"/>
<span id="status"></span>
</form>
</fieldset>
</div>
     </div>
         <div class="col-lg-2 col-md-2 col-sm-2"></div>
  </div>
 </div>
 <?php require_once("patch/footer.php");?>