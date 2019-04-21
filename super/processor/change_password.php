<?php
require_once '../patch/function.php';

if(isset($_POST['p']) && isset($_POST['p2']) && isset($_POST['user'])){
    require_once '../patch/db.inc.php';
    //clean password to prevent injection
    $password = database_clean($_POST['p']);
    $Cpassword = database_clean($_POST['p2']);
    $username = database_clean($_POST['user']);
         if($password != $Cpassword){
          echo "the password entered did not match";
                      exit();
         }
      elseif(strlen($password) < 8 || strlen($Cpassword) < 8) {
          echo "password entered must be atleast 8 characters";
                  exit();
         
     }
elseif(!ctype_alnum($password) || !ctype_alnum($Cpassword)) {
         echo "password must be alphanumeric. character only";
                    exit();
 }
 else{
       $hashed_pass = sha1(md5($password));
       
     $sql = "UPDATE reg_admin SET password = '$hashed_pass' WHERE username = '$username'";
        $update_query = query($sql);
      if(!$update_query){
         echo "password could not be updated pls try again";
           exit();
      }
 else {
        echo  "the password of "."<strong>". $username. "</strong>". " has been changed successfully"; 
                   exit();
      }
 }
     
         
 
}

