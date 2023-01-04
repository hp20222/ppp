<form method="post" action ="" >
Username: <input type="text" name="user" /> <br/>
Password: <input type="text" name="pass" /> <br/>
Age: <input type="text" name="a" /> <br/>
Gender: <input type="text" name="g" /> <br/>
<input type="submit" name="i" value="Insert User" />
<input type="submit" name="s" value="List Users" />
<input type="submit" name="d" value="Delete Users" />
<input type="submit" name="u" value="Update Users" />
</form>

 

<?php
include("DBheader.php");

 

$fileHandler = oLog();
writeLog($fileHandler, "Log opened");


$dbHandler = dbConnect();
writeLog($fileHandler, "Connected to DB");

 

if(isset($_POST["s"]))
	{
		writeLog($fileHandler, "List Users function");
		listAllUsers();	
	}
	
elseif(isset($_POST['i']))
	{
		$q = "insert into test values('$_POST[user]','$_POST[pass]',$_POST[a], $_POST[g])";
		ModifyUser($q);
	}
	
elseif(isset($_POST['u']))
	{
		$q = "update test set password = '$_POST[pass]' where username='$_POST[user]'";
		ModifyUser($q);
	}

elseif(isset($_POST['d']))
	{
		$q = "delete from test where username ='$_POST[user]'";
		ModifyUser($q);
	}

 

function ModifyUser($query)
	{
	global $fileHandler, $dbHandler;

	 

	$result=mysqli_query($dbHandler, $query);
	writeLog($fileHandler, "user ran the following query to the DB: $query\n");

	 

	if(($x=mysqli_affected_rows($dbHandler)) > 0)
	{
		echo "$x rows were affected";
		writeLog($fileHandler,"$x rows were affected");
	}else{echo "No rows were affected";}

	 

	listAllUsers();
	}

 

function listAllUsers()
	{
	global $dbHandler;
	$q = "select * from test";
	$result=mysqli_query($dbHandler, $q);

	 

	echo "<table border=1>";
	echo "<tr><th>Username</th><th>Password</th></tr>";
	while( $row = mysqli_fetch_assoc($result) )
	{
		echo "<tr><td>" . $row['Username'] . "</td><td>" . $row['Password'] . "</td></tr>"; 
	}
	echo "</table>";
	}

	 

dbDisconnect($dbHandler);

cLog($fileHandler);

 

?>