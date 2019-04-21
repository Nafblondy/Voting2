<?php require_once("patch/header.php"); ?>
<div class="jumbotron jumb"><!--jumbotron beginning-->
<div class="container">
<div class="clo-lg-2 clo-md-2 col-sm-2"></div><!--class cols-->
<div class="clo-lg-8 clo-md-8 col-sm-8 form-container">
<?php
require_once 'patch/db.inc.php';
require_once 'patch/function.php';
?>
<table class="table bradius" border="1" bordercolor="#ccc">
    <thead>
        <tr class="theader">
    <th>Voter</th>
    <th>Candidate Name</th>
    <th>Position</th>
        </tr>
    </thead>
    <?php
    $query = "SELECT * FROM votes 
INNER JOIN reg_voters ON votes.reg_id = reg_voters.reg_id
INNER JOIN candidate ON candidate.c_id = votes.c_id
INNER JOIN positions ON positions.pos_id = votes.pos_id
WHERE votes.reg_id = reg_voters.reg_id ORDER BY positions.pos_id";
//$query = "SELECT * FROM votes ";
$results = mysqli_query($link,$query);
while($rows = mysqli_fetch_array($results)){
     $reg_no = $rows['matric_no'].'<br>';
      $first_name = $rows['first_name'];
       $last_name = $rows['last_name'];
     $position = $rows['position'];
     $name = "$first_name "   .$last_name; 
?>
    <tr>
        <td><?php echo  $reg_no ;?></td>
        <td><?php echo $name ;?></td>
        <td><?php echo $position ;?></td>
        
    </tr>
    <?php
}
?>
</table>
</div>
</div>
</div>
