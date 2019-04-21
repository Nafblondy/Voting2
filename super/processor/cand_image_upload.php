<?php
require_once 'header.php';
require_once '../patch/function.php';
         require_once '../patch/db.inc.php';
if(isset($_FILES["uploaded_file"]["name"]) && isset($_POST['cand_name'])){
/// Access the $_FILES global variable for this specific file being uploaded
// and create local PHP variables from the $_FILES array of information
$cand_name = $_POST['cand_name'];
$fileName = $_FILES["uploaded_file"]["name"]; // The file name
$fileTmpLoc = $_FILES["uploaded_file"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["uploaded_file"]["type"]; // The type of file it is
$fileSize = $_FILES["uploaded_file"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["uploaded_file"]["error"]; // 0 for false... and 1 for true
$fileName = preg_replace('#[^a-z.0-9]#i', '', $fileName); // filter
$kaboom = explode(".", $fileName); // Split file name into an array using the dot
$fileExt = end($kaboom); // Now target the last array element to get the file extension
//checking for errors for 
if(!$cand_name){
    echo "ERROR: Please select a user to upload image for."."<br/>";
}
// START PHP Image Upload Error Handling -------------------------------
if (!$fileTmpLoc) { // if file not chosen
    echo "ERROR: Please browse for a file before clicking the upload button."."<br/>"."<a href='../index.php'>Click to go back</a>";
 
    exit();
} else if($fileSize > 5242880) { // if file size is larger than 5 Megabytes
    echo "ERROR: Your file was larger than 5 Megabytes in size.";
    unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
    exit();
} else if (!preg_match("/.(gif|jpg|png)$/i", $fileName) ) {
     // This condition is only if you wish to allow uploading of specific file types    
     echo "ERROR: Your image was not .gif, .jpg, or .png.";
     unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
     exit();
} else if ($fileErrorMsg == 1) { // if file upload error key is equal to 1
    echo "ERROR: An error occured while processing the file. Try again.";
    exit();
}
// END PHP Image Upload Error Handling ---------------------------------
// Place it into your "uploads" folder mow using the move_uploaded_file() function
$moveResult = move_uploaded_file($fileTmpLoc, "../uploads/$fileName");
// Check to make sure the move result is true before continuing
if ($moveResult != true) {
    echo "ERROR: File not uploaded. Try again.";
    exit();
}
// Include the file that houses all of our custom image functions
include_once("../patch/image_function.php");
// ---------- Start Universal Image Resizing Function --------
$target_file = "../uploads/$fileName";
$resized_file = "../uploads/resized_$fileName";
$resized = "resized_$fileName";
$wmax = 150;
$hmax = 150;
ak_img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt);
// ----------- End Universal Image Resizing Function ----------
// ---------- Start Convert to JPG Function --------
if (strtolower($fileExt) != "jpg") {
    $target_file = "../uploads/resized_$fileName";
    $new_jpg = "../uploads/resized_".$kaboom[0].".jpg";
    ak_img_convert_to_jpg($target_file, $new_jpg, $fileExt);
}
$sql = "UPDATE candidate
 SET image = '$resized'
WHERE c_id = '$cand_name'";
$update_user_img = query($sql);
if($update_user_img){
    echo "<a href='../home.php'>Click to go back</a>"."<br/>";
echo "The file named <strong>$fileName</strong> uploaded successfuly.<br /><br />";
echo "It is <strong>$fileSize</strong> bytes in size.<br /><br />";

}
}
 else {
    echo "please select a an image to upload";
}
// ----------- End Convert to JPG Function -----------

// ----------- End Image Watermark Function -----------
// Display things to the page so you can see what is happening for testing purposes
