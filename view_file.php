<?php
session_start();
if(isset($_SESSION['username'])){
    $name=(string)$_SESSION['username'];
    #iprintf("<p>Welcome, %s</p>", $name);
} else {
   printf("Could not identify the user, did you logout?");
}

$filename = $_GET['file'];

# VALIDATION CODE TAKEN FROM https://classes.engineering.wustl.edu/cse330/index.php?title=PHP#Sending_a_File_to_the_Browser
if( !preg_match('/^[\w_\.\-]+$/', $filename) ){
	echo "Invalid filename";
	exit;
}
if( !preg_match('/^[\w_\-]+$/', $name) ){
	echo "Invalid username";
	exit;
}
$full_path = sprintf("/srv/uploads/%s/%s", $name, $filename);
$finfo = new finfo(FILEINFO_MIME_TYPE);
$mime = $finfo->file($full_path);
header("Content-Type: ".$mime);
readfile($full_path);
# end code taken from wiki
?>
