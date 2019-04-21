<?php require_once("patch/header.php");
require_once("patch/function.php");
require_once("functions/function_fetch.php");
?>
<div class="jumbotron jumb"><!--jumbotron beginning-->
<div class="container">
<div class="clo-lg-2 clo-md-2 col-sm-2"></div><!--class cols-->
<div class="clo-lg-8 clo-md-8 col-sm-8" style="border:solid 1px #e8e8e8; text-align: left;">
    <div><h3 style="text-align: center;">List of Candidates:</h3></div>
    <table class="table bradius" border="1" bordercolor="#ccc">
       <thead>
        <tr class="theader">
    <th>Candidate</th>
    <th>Position</th>
        </tr>
    </thead>
        <?php
$candidate = get_candidate();
while($rows = mysqli_fetch_array($candidate)){
$first_name = show_clean($rows['first_name']);
$last_name = show_clean($rows['last_name']);
$positions = show_clean($rows['position']);
$name = "$first_name $last_name";
 ?>
     <tr>
        <td><?php echo  $name ;?></td>
        <td><?php echo  $positions ;?></td>
        
        
    </tr>
     <?php
}
?>
     </table>
</div>
<?php require_once("patch/footer.php");?>