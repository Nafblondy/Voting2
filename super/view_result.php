<?php
require_once 'patch/header.php';
require_once("/patch/function.php");
//index of the site
//require_once("processing/session.php");
require_once("functions/function_fetch.php");
require_once("functions/site_function.php");
?>
<div class="jumbotron jum"><!--jumbotron beginning-->
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