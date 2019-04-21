<?php
require_once '../patch/function.php';
if(isset($_POST['date_start']) && isset($_POST['time_start']) && isset($_POST['time_end']) || isset($_POST['date_end'])){
       require_once '../patch/db.inc.php';
    $date_start = database_clean($_POST['date_start']);
    $time_start = database_clean($_POST['time_start']);
    //
    $time_end = database_clean($_POST['time_end']);
    $date_end = database_clean($_POST['date_end']);
   $sql = "SELECT options FROM options WHERE option_name = 'start_time' OR option_name = 'end_time'";
      $count = num_rows($sql);
       //timestamp to start election
    $append_start_time = $date_start. " ".$time_start;
    //=============================================
    //appending date and time
    $append_end_time = $date_end.$time_end;
    
    
  
       //convert date/time to timestamp 
    $start_timestamp = strtotime($append_start_time);
    
   
    //***********************************************
    //converting date/time to timestamp to end election
    $end_timestamp = strtotime($append_end_time);
    
    if($count > 0){
      $sql =  "DELETE FROM options WHERE option_name = 'start_time'";
      $sql2 =  "DELETE FROM options WHERE option_name = 'end_time'";
           
          $delete_query = query($sql);
          $delete_query2 = query($sql2);
          if(!$delete_query || !$delete_query2){
              echo "sorry, election time can not be set at this time try again !!!";
                        exit();
          }
          elseif($delete_query && $delete_query2){
      $sql = "INSERT INTO options(option_name,options)VALUES('start_time','$start_timestamp')";  
     $sql2 = "INSERT INTO options(option_name,options)VALUES('end_time','$end_timestamp')";  
            
              //check if time was set sucessfully
           $insert_query = query($sql);
           $insert_query2 = query($sql2);
        
         if(!$insert_query || !$insert_query2){
              echo "sorry, election time can not be set at this time try again";
                        exit(); 
          }
      else {
          echo "election starts".$date_start." ".$time_start."AND ENDS"."$date_end"." ".$time_end;
                     exit();
      }
        
    }
          }
       
    
    
   elseif($count <= 0){
     $sql = "INSERT INTO options(option_name,options)VALUES('start_time','$start_timestamp')";  
     $sql2 = "INSERT INTO options(option_name,options)VALUES('end_time','$end_timestamp')";  
            
              //check if time was set sucessfully
           $insert_query = query($sql);
           $insert_query2 = query($sql2);
        
         if(!$insert_query || !$insert_query2){
              echo "sorry, election time can not be set at this time try again";
                        exit(); 
          }
      else {
          echo "election starts".$date_start." ".$time_start."AND ENDS"."$date_end"." ".$time_end;
                     exit();
      }
        
    }
   
      
}
