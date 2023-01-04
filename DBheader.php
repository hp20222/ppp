<?php // DBheader.php
function oLog()
	{
	$f = fopen('log1.log',"a+");
	return $f;
	}

 

function dbConnect()
	{
	$conn = mysqli_connect("localhost","root","","today") or die("Error connecting to the DB!!!!!");
	return $conn;
	}

 

function dbDisconnect($conn){ mysqli_close($conn); }

 

function cLog($f){     fclose($f); }

 

function getTime(){ return time(); }

 

function writeLog($f, $msg)
{
    fwrite($f,getTime() . ": $msg\n");
}


?>


<?php
/*
 

function connect(){
    $conn = mysqli_connect("localhost","root","","test17112022") or die("Error connecting to the DB!!!!!");
    return $conn;
}

 

function oLog(){
    $f = fopen('myLog.log','a+');
    return $f;
}

 

function writeLog($f, $str){
    fwrite($f,time() . ": $str\n");
}

 
*/
?>