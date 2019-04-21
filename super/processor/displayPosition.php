<?php
         require_once '../patch/function.php';
         require_once '../patch/db.inc.php';
$sql = "SELECT * FROM positions";
         $display = query($sql);
         $count = mysqli_num_rows($display);
?>
<table class="table bradius" border="1" bordercolor="#ccc">
<tr class="theader" >
<th>Position</th>
<th>Rank</th>
<th>Delete</th>
</tr>
<?php
  if(!$display){
    
  die('sorry there was an issue during this operation');
    
  }


 
     if($count != 0){
    while($row = mysqli_fetch_array($display)){
        
       echo "<tr><td>".display_DB($row['position'])."</td><td>".display_DB($row['pos_id'])."</td>"
                . "<td>"
                . "<a href=\"deletepos.php?pos=".$row['position'].
                 "\" onclick=\"return confirm('This action cannot be undone. Are you sure you want to proceed?');"
                 . "\" class=\"btn btn-block btn-primary\">Delete Position</a>"
                . "</td></tr>";
  
   
      
  
    }
     }
    else{
      echo "";  
    }
    
 ?>
 </table>
     



