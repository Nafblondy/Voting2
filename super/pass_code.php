<?php
require_once("functions/function_fetch.php");
 require_once("patch/header.php");
?>
<div class="jumbotron jumb"><!--jumbotron beginning-->
<div class="container">
<div class="clo-lg-2 clo-md-2 col-sm-2"></div><!--class cols-->
<div class="clo-lg-8 clo-md-8 col-sm-8 form-container">
<table class="table bradius" border="1" bordercolor="#ccc">
    <thead>
        <tr class="theader">
    <th>Registration Number</th>
    <th>Pass Code</th>
    <th>Gender</th>
    <th>Date Registered</th>
        </tr>
    </thead>
    <?php
$pass_code = get_reg_passcode();
while($rows = mysqli_fetch_array($pass_code)){
   $passcode = $rows['pass_code'];
   $gender = $rows['gender'];
  $matric_no = $rows['matric_no'];
 $date = $rows['date_registered'];
 ?>
     <tr>
        <td><?php echo  $matric_no ;?></td>
        <td><?php echo  $passcode ;?></td>
        <td><?php echo $gender ;?></td>
        <td><?php echo $date ;?></td>
        
    </tr>
     <?php
}
?>
     </table>
</div>
</div>
</div>