<?php
session_start();

if(isset($_SESSION['username'])){
    $name=(string)$_SESSION['username'];
    # VALIDATION CODE TAKEN FROM https://classes.engineering.wustl.edu/cse330/index.php?title=PHP#Sending_a_File_to_the_Browser 
    if( !preg_match('/^[\w_\-]+$/', $name) ){
	echo "Invalid username";
	exit;
    }
    $full_path = sprintf("/srv/uploads/%s/", $name);
    # end code snippet from wiki
    # code taken from https://stackoverflow.com/questions/15774669/list-all-files-in-one-directory-php
    $files = array_diff(scandir($full_path), array('.', '..'));
    # end code taken from stackoverflow
    $success= True;
} else {
   $success= False;
   printf("Could not identify the user, did you logout?");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
</head>
<table>
<?php
if($success== True){
    foreach($files as $fil){
        echo sprintf("<tr><td valign='center'>%s</td>\n<td valign='center'><form action='view_file.php' method='GET'>\n
	<input type='submit' value='%s'  name='file'></form></td><td valign='center'><form><input type=submit value='delete'></form></td></tr>",
	    htmlentities($fil),
	    htmlentities($fil)
        );
    }
}
?>
</table>
</html>
