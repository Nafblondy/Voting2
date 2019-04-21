<?php

require_once("/patch/session_check.php");
require_once("patch/header.php");
//index of the site
require_once("functions/function_fetch.php");
require_once("functions/site_function.php");
?>
<div class="jumbotron jum"><!--jumbotron beginning-->
<div class="container">
<div class="clo-lg-2 clo-md-2 col-sm-2"></div><!--class cols-->
<div class="clo-lg-8 clo-md-8 col-sm-8 form-container">
<?php
$display = get_user();
//while for fetching individual record.
while($rows = mysqli_fetch_array($display)){
$first_name = $rows['first_name'];
$last_name = $rows['last_name'];
$name = "$first_name $last_name";
$voters_code = $rows['voters_code'];
}
?>
 <b>Thank you<span style="color:#4071a9;">&nbsp;&nbsp;<?php echo $name; ?></span>&nbsp;&nbsp;for been patient. In a moment we are going to 
 excited you with what you are going to see.Just copy this voters code<span style="color:#4071a9;">&nbsp;&nbsp;<?php echo $voters_code; ?></span>&nbsp;&nbsp;
 and pest it in the input below. Thank you once again.</b>
 <br />
 <br />
  <br />
   <?php get_voters_code();?>
  <form action="" method="post">
 <div class="form-group">
 <b>Voters Code:</b><span class="error">*</span><br />
 <input type="text" name="voters_code" id="voters_code" class="form-control" placeholder="Your Voters Code Please!!!" />
 </div>
 <div class="form-group">
 <button type="submit" class="btn btn-block but btn-primary" name="voter">Verify your voters code</button>
 </div>
 </form>
</div><!--class cols-->
<div class="clo-lg-2 clo-md-2 col-sm-2"></div><!--class cols-->
<?php require_once("patch/footer.php");?>