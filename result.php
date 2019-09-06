<?php
    $res = 0;
    $y = 1;
    $x = 0;
    $valid = True;
    $divByZero = False;
    if(isset($_GET['x'])){
    	$x=(float)$_GET['x'];
    } else {
    	$valid = False;
    }
    if(isset($_GET['y'])){
    	$y=(float)$_GET['y'];
    } else {
    	$valid = False;
    }
    #if((empty($x)&&$x!=0) || (empty($y) && $y != 0)){
#	printf("<p>got here</p>");
#    	$valid = False;
#    }
    $op="nothing";
    if(isset($_GET['operation'])){
        $op=$_GET['operation'];
    } else {
    	$valid = False;
    }
    switch($op){
        case "plus":
            $res = $x+$y;
            break;
        case "minus":
            $res = $x-$y;
            break;
        case "divide":
            if($y==0){
                $divByZero=True;
                break;
            }
            $res = $x/$y;
            break;
        case "multiply":
            $res = $x*$y;
            break;
        default:
            $valid = False;
            break;
    }
    if($valid == False) {
        printf("<p>Error: didn't specify operation</p>");
    } else if($divByZero == True){
        printf("<p>Division by zero: undefined</p>");
    } else {
        printf("<p>%f</p>", htmlentities($res));
    }
?>
