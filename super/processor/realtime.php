<?php
require_once '../patch/function.php';
  if(isset($_POST['realDrop'])){
   $realDrop = database_clean($_POST['realDrop']); 
   $sql = "SELECT options FROM options WHERE option_name = 'real_time_result'";
         
       $count = num_rows($sql);
     if($count > 0){
         $sql =  "DELETE FROM options WHERE option_name = 'real_time_result'";
             
           $delete_query = query($sql);
          if(!$delete_query){
     echo "sorry,this setting can not be set now try again !!!";
                      exit();
          }
       elseif($delete_query) {
          $sql = "INSERT INTO options(option_name,options)VALUES('real_time_result','$realDrop')";  
          
             $insert_query = query($sql);
             
             if(!$insert_query){
              echo "sorry, this settings can not be set at this time try again";
                        exit(); 
          }
      else {
          echo "success";
                     exit();
      }
      }
     }
     elseif($count <= 0){
    $sql = "INSERT INTO options(option_name,options)VALUES('real_time_result','$realDrop')";  
            
              //check if time was set sucessfully
           $insert_query = query($sql);
       
        
         if(!$insert_query){
              echo "sorry,this setting can not be set now try again !!!";
                        exit(); 
          }
      else {
              echo "success";
                     exit();
      }
        
    }
}

