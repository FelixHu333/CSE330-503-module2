<?php
session_start();

if(isset($_SESSION['username'])){
    $name=(string)$_SESSION['username'];
    printf("<p>Welcome, %s</p>", $name);
} else {
   printf("Could not identify the user, did you logout?");
}
?>
