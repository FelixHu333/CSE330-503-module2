<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
</head>
<body>
<?php
session_start();
session_destroy();
?>
<p>You logged out!</p>
<p>
    <form action="login.php">
	<input type="submit" value="Log in" />
    </form>
</p>
</body>
</html>
