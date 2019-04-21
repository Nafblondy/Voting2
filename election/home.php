<?php
require_once("patch/session_check.php");
require_once("patch/header.php");
require_once("patch/function.php");
//index of the site

require_once("functions/function_fetch.php");
require_once("functions/site_function.php");

$check_user = detect_voted_user($reg_id);
 if($check_user > 0){
 echo "<script>alert('we detected that you have voted already and can no longer login');</script>";
           $token2 = 'voted';
           $token2 = sha1($token2);
      header('location:index.php?'.$token2);
 }
?>
<div class="jumbotron jum"><!--jumbotron beginning-->
<div class="container">
<div class="clo-lg-2 clo-md-2 col-sm-2"></div><!--class cols-->
<div class="clo-lg-8 clo-md-8 col-sm-8 form-container">
      <div class="form-header">
    <i class="fa fa-check"></i>
    </div>
<?php
$display = get_user();
//while for fetching individual record.
while($rows = mysqli_fetch_array($display)){
$first_name = show_clean($rows['first_name']);
$last_name = show_clean($rows['last_name']);
$name = "$first_name $last_name";
$voters_code = show_clean($rows['voters_code']);
}
?>
 Thank you<span style="color:#4071a9;"><?php echo " ". $name; ?></span>&nbsp;&nbsp;for your concern.Just be patient in a moment we are going to 
 provide you with an input to insert your voters code. Thank you once again.
 <br />
 <br />
  <br />
   <?php get_pass_code();?>
  <form action="" method="post">
 <div class="form-group">
 <b>pass Code:</b><span class="error">*</span><br />
 <input type="text" name="pass_code" id="pass_code" class="form-control" placeholder="Your pass Code Please!!!" />
 </div>
 <div class="form-group">
 <button type="submit" class="btn btn-block but btn-primary" name="verify">Verify your pass code!!!</button>
 </div>
 </form>
</div><!--class cols-->
<div class="clo-lg-2 clo-md-2 col-sm-2"></div><!--class cols-->
<?php require_once("patch/footer.php");?>