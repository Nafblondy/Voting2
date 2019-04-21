<?php
if(move_uploaded_file($_FILES['newfile']['tmp_name'],"../roll/roll.dat")) {
	chmod("..roll.dat",0777);
	header("location:index.php#security");
	exit;
}