
<?php
//require_once '../patch/function.php';
function check_user($search){
    
$lines = file('../roll/roll.dat');
// Store true when the text is found
$found = false;
foreach($lines as $line)
{
  if(strpos($line, $search) !== false)
  {
      $found = true;
     
  }
}
// If the text was not found, show a message
if(!$found)
{
    header('location:index.php');
    echo 'No match found';
}
    
}

$u = '11/341014';
$r = check_user($u);
echo $r;