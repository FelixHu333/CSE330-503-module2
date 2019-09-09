<?php
session_start();

if(isset($_SESSION['username'])){
    $name=(string)$_SESSION['username'];
    # VALIDATION CODE TAKEN FROM https://classes.engineering.wustl.edu/cse330/index.php?title=PHP#Uploading_a_File
    if( !preg_match('/^[\w_\-]+$/', $name) ){
        echo "Invalid username";
        exit;
    }
    $filename = basename($_FILES['uploadedfile']['name']);
	if( !preg_match('/^[\w_\.\-]+$/', $filename) ){
	    echo "Invalid filename";
	    exit;
    }
    $full_path = sprintf("/srv/uploads/%s/%s", $name, $filename);
    if( move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $full_path) ){
	header("Location: success_upload.html");
	exit;
    }else{
	header("Location: fail_upload.html");
	exit;
    }
    # end code snippet from wiki
} else {
    printf("Could not identify the user, did you logout?");
}
?>
