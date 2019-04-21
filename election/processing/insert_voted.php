<?php
    require_once '../patch/function.php';
if(isset($_POST['posId']) && !empty($_POST['p']) && !empty($_POST['userId'])){
      require_once '../patch/conx.php';
    $posId = database_clean($_POST['posId']);
    //where p is candidate unique ID
    $p = database_clean($_POST['p']);
    $userId = database_clean($_POST['userId']);
    //checking if user has voted before now
   $sql_voted = "SELECT reg_id FROM voted WHERE reg_id = '$userId' AND v_id != '0'";
       $count_voted = num_rows($sql_voted);
       //check if user has cast his/her vote for this positions
    $sql_change_mind = "SELECT id FROM votes WHERE pos_id = '$posId' AND reg_id = '$userId' AND c_id != '' ";
     $count_mind_chang = num_rows($sql_change_mind);
     
     if($count_voted <= 0 && $count_mind_chang <= 0){
         $sql_cast_vote = "INSERT INTO votes(c_id,pos_id,reg_id)VALUES('$p','$posId','$userId')";
         $sql_user_data = "INSERT INTO voted(reg_id,date_voted)VALUES('$userId',now())";
         $insert_query = query($sql_cast_vote);
         $insert_query2 = query($sql_user_data);
         if(!$insert_query || !$insert_query2){
             echo "sorry your voting operation fail due to resourses try again !!";
                  exit();
         }
      else {
          echo "success";
            exit();
      }
  
         
     }//end if
     
     //when a user change his mind after voting a candidate
elseif($count_voted > 0 && $count_mind_chang > 0) {
      $sql_update = "UPDATE votes SET c_id = '$p', pos_id = '$posId' WHERE reg_id = '$userId' AND pos_id = '$posId'";
      
             $sql_change_vote = query($sql_update);
             if(!$sql_change_vote){
                 echo "sorry this operation failed please try again later";
                       exit();
             }
             else{
                 //header("location:message.php");
                echo "we detcted you changed your mind though your revoting was successfull";
                                  exit();
             }
      }
   elseif($count_voted > 0 && $count_mind_chang <= 0){
         $sql_cast_vote = "INSERT INTO votes(c_id,pos_id,reg_id)VALUES('$p','$posId','$userId')";
         $insert_query = query($sql_cast_vote);
         if(!$insert_query){
             echo "sorry your voting operattion fail due to resourses try again !!";
                  exit();
         }
      else {
          echo "success";
            exit();
      }
  
         
     }
   
    
    
    
}

