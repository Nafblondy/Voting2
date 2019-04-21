<?php
require_once '../patch/function.php';
if(isset($_POST['fn']) && isset($_POST['drop']) && isset($_POST['ln'])){
    $fn = database_clean($_POST['fn']);
    $drop = database_clean($_POST['drop']);
    $ln = database_clean($_POST['ln']);
    
   if(strlen($fn) < 3 || strlen($ln) < 3){
       echo "firstname or lastname must be greater than 3 charaters";
       exit();
   } 
   elseif(!ctype_alpha($fn) || !ctype_alpha($ln)){
       echo "firstname OR lastname must not contain Numbers";
       exit();
   }
   elseif(empty($drop)) {
    echo "candidate must be contesting for a position";
        exit();
} 
 else{
          $sql = "INSERT INTO candidate(last_name,first_name,pos_id,date_created)"
                  . "VALUES('$ln','$fn','$drop',now())";
             
               $inser_query = query($sql);
              
               if(!$inser_query){
                   echo "this operation failed, please try again";
                      exit();
               }
          else {
                  echo "success";
          }
  }
  
    
    
}

