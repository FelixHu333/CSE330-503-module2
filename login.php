<!DOCTYPE html>
<html lang="en">
<head>
    <title>File Share Login</title>
</head>
<body>
    <header>
        <h1> Login  </h1>
   </header>
   <form action="" method="POST">
	<p>
            <label>Enter your username: </label> <input type="text" name="username"  id="username" required/>
	</p>
	<p>
           <input type = "submit" value = "login">
	</p>
   </form>
<?php
if(isset($_POST['username'])){
    # check if username is inside users.txt
    $name = trim((string)$_POST['username']);
    
    # CODE SNIPPET CITATION: https://classes.engineering.wustl.edu/cse330/index.php?title=PHP#Reading_a_File_Line-by-Line
    $h = fopen("/srv/users.txt", "r");
    $valid = False;
    $linenum=1;  
    while( !feof($h) ){
        $curr = trim((string)fgets($h)); 
        if(strcmp($curr, $name) == 0){
            # valid username
            $valid=True;
	    printf("<p>Username found!</p>");
        }
    }
# if valid, start_session, redirect to file_manager.php 
fclose($h);     
if($valid == True){
    session_start();
    $_SESSION['username'] = $name;
    header("Location: file_manager.php");
    exit;
} else {
    printf("<p>Username not found!</p>");
}
}
?>
</body>
</html>
