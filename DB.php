<?php   
include ("Files.php") ;

function connect()
	{
		
		$conn = mysqli_connect("localhost","root","","testt");
		return $conn;
	}

function disconnect($conn) 
	{ 		
		mysqli_close($conn);
	}

function query($q, $conn )
	{ 
		$f =  open();
		log_query($q ,$f) ;
		close($f);
		$result = mysqli_query($conn , $q ); 
		return $result;
	}


 ?>