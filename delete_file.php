<?php
session_start();
if(isset($_SESSION['username'])){
    $name=(string)$_SESSION['username'];
    #iprintf("<p>Welcome, %s</p>", $name);
} else {
   printf("Could not identify the user, did you logout?");
}
$filename = $_GET['file'];
if( !preg_match('/^[\w_\.\-]+$/', $filename) ){
        echo "Invalid filename";
        exit;
}
if( !preg_match('/^[\w_\-]+$/', $name) ){
        echo "Invalid username";
        exit;
}
$full_path = sprintf("/srv/uploads/%s/%s", $name, $filename);
if(unlink($full_path)==True){
    echo "Successful deletion!";
    exit;
} else {
    echo "Unsuccessful deletion!";
    exit;
}

?>
