<!DOCTYPE html>
<html lang="en">
<head>
    <title>CSE 330/503 Calculator</title>
</head>
<body>
    <header>
        <h1> PHP Calculator </h1>
   </header>
   <form action="result.php" method="GET">
	<p>
	    <label>x: </label> <input type="text" name="x" required/>
	    <label>y: </label> <input type="text" name="y" required/>
	</p>
	<p>
	    <input type = "radio" name = "operation" value="plus" id="add" /> <label for="add">+</label>
	    <input type = "radio" name = "operation" value="minus" id="sub" /> <label for="sub">-</label>
	    <input type = "radio" name = "operation" value="multiply" id="mult" /> <label for="mult">*</label>
	    <input type = "radio" name = "operation" value="divide" id="divi" /> <label for="divi">/</label>
	</p>
	<p>
	   <input type = "submit" value = "calculate">
	</p>
   </form> 
</body>
</html>

