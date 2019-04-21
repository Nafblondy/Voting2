
<?php
require_once '../patch/function.php';
$sql = "SELECT options FROM options WHERE option_name = 'start_time' OR option_name = 'end_time'";
     $query = query($sql);
     echo  $count = num_rows($query);