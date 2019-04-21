<?php
require_once("patch/conx.php");
require_once("patch/function.php");
if(isset($_POST['showresults'])){
$bid = preg_replace("#[^0-9]#", '' , $_POST['showresults']);
$input ="";
$inputs = "";
$query = "SELECT * FROM positions INNER JOIN candidate ON positions.pos_id = candidate.pos_id WHERE candidate.pos_id ='$bid'";
$results =  mysqli_query($link, $query);
$num_check = mysqli_num_rows($results);
if($num_check == 1){
while($rows = mysqli_fetch_array($results)){
 $pos_id = database_clean($rows['pos_id']);
  $can_id = database_clean($rows['c_id']);
$first_name = show_clean($rows['first_name']);
$last_name = show_clean($rows['last_name']);
$positions = show_clean($rows['position']);
$image = $rows['image'];
$name = "$first_name $last_name";
$query = "SELECT COUNT(reg_id)FROM votes WHERE c_id = '$can_id' && pos_id = '$pos_id'";
$result =  mysqli_query($link, $query); 
while($rows = mysqli_fetch_array($result)):
$total_vote = $rows[0];
$input .= "<table width='100%' class='tables'>"
        . "<tr>"
        . "<td width='50%'>"
        ."<img src=\"../super/uploads/$image\" width=\"150\" height=\"150\"  class=\"img-circle imgborder\" />&nbsp;&nbsp;$name </td>"
        . "<td width='50%'align='left'><span class=\"badge bd\">$total_vote </span> </div></td></tr>";
endwhile;
}

echo "<h1><div class='badge bd'>$positions</div></h1><br/>";
echo $input;
}
else{
$inputs = "There is no candidate to vote for";
echo $inputs;
}
}
?>

