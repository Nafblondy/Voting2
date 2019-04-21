
<?php
//require_once '../patch/function.php';


//$file = '../roll/roll.dat';
//
//  $lines = count(file($file));
//
//  echo "There are $lines lines in $file"; 

echo $useragent = $_SERVER['HTTP_USER_AGENT'];
 echo "<hr/>";
 

echo $_SERVER['HTTP_USER_AGENT'] . "\n\n";

$browser = get_browser(null, true);
print_r($browser);

?>
<img src="picture000.jpg" width="100" height="100"/>