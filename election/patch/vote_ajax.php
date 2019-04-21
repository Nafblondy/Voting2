<?php
require_once("conx.php");
require_once("function.php");
if (isset($_POST["mc"])) {
     $matric = $_POST['mc'];
     $filter = preg_match("/^[A-za-z0-9\/]*$/", $matric);
     $matric = database_clean($matric);
   
    $sql = "SELECT reg_id FROM reg_voters WHERE matric_no ='$matric' LIMIT 1";
    $query = mysqli_query($link, $sql);
    $matric_check = mysqli_num_rows($query);
    if (!empty($matric) && !$filter) {
        echo '<strong style="color:#F00;"> matric is not valid</strong>';
        exit();
    }
    if (strlen($matric) < 5) {
        echo '<strong style="color:#F00;"> matric is not valid</strong>';
        exit();
    }
    if ($matric_check < 1) {
        echo '<strong style="color:#009900;">' .$matric . ' is OK</strong>';
               exit();
    } else {
        echo '<strong style="color:#F00;">' . $matric . ' is taken</strong>';
                exit();
    }
}
if(isset($_POST['m'])) {
      $pass_code = keygen();
  $vote_code = keygen();
    //matric number
        $m = database_clean($_POST['m']);
        $m_filter = preg_match("/^[A-za-z0-9\/]*$/", $m);
        //password
	$p = database_clean($_POST['p']);
      //emaill
        $e = database_clean($_POST['e']);
        //email validation
        $e_check = preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $e);
        //gender
        $g = database_clean($_POST['g']);
      //phone number
        $ph = database_clean($_POST['ph']);
      //department
        //validate a phone number
        $check_ph = preg_match("/^[0-9]*$/", $ph);
        //database check for a match for email
        // -------------------------------------------
	$sql = "SELECT reg_id FROM reg_voters WHERE email='$e' LIMIT 1";
               $query = mysqli_query($link, $sql); 
	$e_db_check = mysqli_num_rows($query);
          // -------------------------------------------
	$sql3 = "SELECT reg_id FROM reg_voters WHERE phone_no ='$ph' LIMIT 1";
               $query2 = mysqli_query($link, $sql3); 
	$ph_db_check = mysqli_num_rows($query2);
          // -------------------------------------------
        //database check for a match of matric number
	$sql2 = "SELECT reg_id FROM reg_voters WHERE matric_no ='$m' LIMIT 1";
               $query = mysqli_query($link, $sql2); 
	$m_db_check = mysqli_num_rows($query);
        
 if( $e == "" || $p == "" || $m == "" || $g == "" || $ph == ""){
           
               echo "The form submission is missing values.";
            exit();
        }
       else if ($m_db_check > 0){ 
           echo "The matric no you entered is already taken";
        exit();
	}
        //
        else if ($ph_db_check > 0){ 
           echo "The phone number you entered is already taken";
        exit();
	}
        
        else if ($e_db_check > 0){ 
        echo "That email address is already in use in the system";
        exit();
        }
     else if(empty($g)) {
        echo 'select a gender';
        exit();
    }
     else if(empty($p)) {
        echo 'entered your password';
          exit();
    }
     else if(strlen($p) < 6) {
        echo 'password must be at least six characters ';
          exit();
    }
    elseif(empty ($ph)) {
       echo 'entered your password';
          exit();
}
 else if (!$e_check){ 
        echo "email is not valid";
        exit();
}
 else if (!$m_filter){ 
        echo "matric is not valid";
        exit();
}
    elseif (empty($ph)) {
       echo 'enter your phone number';
          exit();
}
    elseif (!$check_ph) {
       echo 'phone number is not valid';
          exit();
}

 else {
                $p_hash = md5($p);
		// Add user info into the database table for the main site table
           $sql = "INSERT INTO reg_voters(matric_no , phone_no ,gender,email,password,date_registered,pass_code,voters_code)
			   VALUES('$m','$ph','$g','$e','$p_hash',NOW(),'$pass_code','$vote_code')";

         if(mysqli_query($link,$sql)){
       // mail($to, $subject, $message, $headers);
                     echo "signup_success";
                                exit();
             
         }
       else {
           echo "error in registration";
                              exit();
       }
         
         
       
                          
                     
}      

       
}
?>