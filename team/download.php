<?php
# Used to download files from internet url's

session_start();

if(isset($_SESSION['username'])){
    $name=(string)$_SESSION['username'];
    # VALIDATION CODE TAKEN FROM https://classes.engineering.wustl.edu/cse330/index.php?title=PHP#Uploading_a_File
    if( !preg_match('/^[\w_\-]+$/', $name) ){
        echo "Invalid username";
        exit;
    }
    # end code snippet from wiki
    
    # download content partly taken from https://thisinterestsme.com/download-file-file_get_contents/
    $url = $_POST['url'];
    $content = file_get_contents($url);
    if($content === false){
    	# failed download
	echo "Download failed! Check url.";
	exit;
    }
    if( !preg_match('/^[\w_\.\-]+$/', basename($url)) ){
            echo "Invalid filename or url";
            exit;
    }
    $full_path = sprintf("/srv/uploads/%s/%s", $name, basename($url));
    if( file_put_contents($full_path, $content) ){
        header("Location: success_upload.html");
        exit;
    }else{
        header("Location: fail_upload.html");
        exit;
    }
} else {
    printf("Could not identify the user, did you logout?");
    exit;
}


?>
