<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Rename file</title>
</head>
<body>
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
	<label for="new_name">New name: </label><input type="text" name="name" id="new_name" />
	<label for="old_file"> for file: </label><input type="text" name="file" id="old_file" value="<?php printf("%s", $_GET['file']); ?>" readonly />
	<input type="submit" value="Rename">
    </form>
</body>
</html>

<?php
# rename file for user

session_start();

if(isset($_SESSION['username'])){
    $name=(string)$_SESSION['username'];
    # VALIDATION CODE TAKEN FROM https://classes.engineering.wustl.edu/cse330/index.php?title=PHP#Uploading_a_File
    if( !preg_match('/^[\w_\-]+$/', $name) ){
        echo "Invalid username";
        exit;
    }
    # end code snippet from wiki

    if(isset($_POST['file']) && isset($_POST['name'])){
    	$old = sprintf("/srv/uploads/%s/%s", $name, $_POST['file']);
    	$new = sprintf("/srv/uploads/%s/%s", $name, $_POST['name']);

	# followed example from https://www.geeksforgeeks.org/php-rename-function/
	if(file_exists($new)){
	    echo "File name already exists, you clown.";
	    exit;
	} else {
	    rename($old, $new);
	    header("Location: file_manager.php");
	    exit;
	}
    }   
} else {
    printf("Could not identify the user, did you logout?");
    exit;
}

?>
