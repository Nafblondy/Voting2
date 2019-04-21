<?php
require_once '../patch/function.php';
if(isset($_POST['title']) && isset($_POST['desc'])){
    require_once '../patch/db.inc.php';
    $title = database_clean($_POST['title']);
    $desc = database_clean($_POST['desc']);
    $sql = "SELECT options FROM options WHERE option_name = 'election_title' OR option_name = 'election_desc'";
          $count = num_rows($sql);
         
   if(strlen($title) < 4 || strlen($desc) < 4){
       echo "your description or title must be atleast 4 characters";
            exit();
   }
   elseif($count > 0){
       $sql =  "DELETE FROM options WHERE option_name = 'election_title'";
      $sql2 =  "DELETE FROM options WHERE option_name = 'election_desc";
      
      
             $delete_query = query($sql);
           $delete_query2 = query($sql2);
          if(!$delete_query || !$delete_query2){
              echo "sorry, election title or description can not be set at this time try again !!!";
                        exit();
          }
   }
   
      elseif($delete_query && $delete_query2){
      $sql = "INSERT INTO options(option_name,options)VALUES('election_title','$title')";  
     $sql2 = "INSERT INTO options(option_name,options)VALUES('election_desc','$desc')";  
            
              //check if time was set sucessfully
           $insert_query = query($sql);
           $insert_query2 = query($sql2);
        
         if(!$insert_query || !$insert_query2){
              echo "sorry, election title or description can not be set at this time try again";
                        exit(); 
          }
      else {
                echo "success";
                     exit();
      }
        
    }
      elseif($count <= 0){
      $sql = "INSERT INTO options(option_name,options)VALUES('election_title','$title')";  
     $sql2 = "INSERT INTO options(option_name,options)VALUES('election_desc','$desc')";  
            
              //check if time was set sucessfully
           $insert_query = query($sql);
           $insert_query2 = query($sql2);
        
         if(!$insert_query || !$insert_query2){
             echo "sorry, election title or description can not be set at this time try again";
                        exit(); 
          }
      else {
                  echo "success";
                     exit();
      }
        
    }
   
     
 
}



