<?php
  require_once '../patch/function.php';
if(isset($_POST['rank']) && isset($_POST['posName'])){
    require_once '../patch/db.inc.php';
    //clean password to prevent injection
    $rank = database_clean($_POST['rank']);
    $positionname = database_clean($_POST['posName']);
    
    //check if it exist
  $sql = "SELECT position,pos_id FROM positions WHERE pos_id = '$rank' OR position = '$positionname'";
            $num_rows = num_rows($sql);
    
    if($rank <= 0 || $positionname == ""){
           echo "position or rank must not be empty";
             exit();
    }
    elseif(strlen($positionname) < 3) {
        echo "please entered a vaild position";
    
}
    elseif($num_rows > 0) {
        echo "This position OR rank already exists ";
                  exit();
    
}
else{
    $sql = "INSERT INTO positions(pos_id,position)VALUES('$rank','$positionname')";
    
       
        $position = query($sql);
          if(!$position){
       echo "operation failed please try again";
                     exit();        
          
      }
 else {
      echo "success";
           exit();    
      }
} 
     
         
     
         
 
}

