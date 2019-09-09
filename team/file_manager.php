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
    <link rel="stylesheet" type="text/css" href="file_manager.css" />
    <meta charset="utf-8"/>
    <title>File Manager</title>
</head>
<body>
    <header>
	<?php
	if($success==True){
	    printf("<h1>%s's files</h1>", $name);
	}
	?>
    </header>
    <p>
	<?php 
        if($success==True){
	    printf("<form action='logout.php'>
            <input type='submit' value='Log out' />
    	    </form>\n
	    <form action='upload.php'>
	    <input type='submit' value='Upload file'>
	    </form>");
	} 
	?>
    </p>
    <table>
    <?php
    if($success== True){
        foreach($files as $fil){
            echo sprintf("<tr><td valign='center'>%s</td>\n
	    <td valign='center'><form action='view_file.php' method='GET'>\n
    	    <button type='submit' value='%s'  name='file' >view</button></form></td>\n
	    <td valign='center'><form action='delete_file.php' method='GET'><button type='submit' value='%s' name='file' >delete</button></form></td>\n
	    <td valign='center'><form action='rename_file.php' method='GET'><button type='submit' value='%s' name='file' >rename</button></form></td>\n
	    <td valign='center'><form action='share_file.php' method='GET'><button type='submit' value='%s' name='file' >share</button></form></td>",
	        htmlentities($fil),
	        htmlentities($fil),
	        htmlentities($fil),
		htmlentities($fil),
		htmlentities($fil)
            );
	    # $curr = pathinfo($full_path.'/'.$fil)['extension'];
	    # if($curr == "png" || $curr  == "jpeg" || $curr == "jpg"){
	    #	echo sprintf("<td valign='center'><form action='meme_ify.php' method='GET'><button type='submit' value='%s' name='file' >meme-ify</button></form></td>",
	    #	htmlentities($fil)
	    #	);
	    # }
	    echo "</tr>";
        }
    }
    ?>
    </table>
</body>
</html>
