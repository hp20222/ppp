<form method="post" action ="1212.php" >
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
$f = fopen('log.log',"a+");
$t = time();

 

if(isset($_POST["s"]))
{
    listAllUsers();
}
elseif(isset($_POST['i']))
{
    InsertUser();
}
elseif(isset($_POST['u']))
{
    UpdateUser();
}
elseif(isset($_POST['d']))
{
    DeleteUser();
}

 


function DeleteUser()
{
	global $t, $f;

	 

	$conn = mysqli_connect("localhost","root","","today") or die("Error connecting to the DB!!!!!");
	$t = time();
	fwrite($f,"$t: DeleteUser function connected to DB successfully\n");

	 

	$q = "delete from test where username ='$_POST[user]'";
	$result=mysqli_query($conn, $q);

	 

	$t=time();
	fwrite($f   , "$t: user ran the following query to the DB: $q\n");

	

	if(($x=mysqli_affected_rows($conn)) > 0)
	{
		echo "$x rows were affected";
		
		$t = time();
		fwrite($f,"$t: $x rows were affected" );
		
	}   else {echo "No rows were affected";}

	 

	mysqli_close($conn);
	listAllUsers();
}

 


function UpdateUser()
	{
	global $t, $f;

	 

	$conn = mysqli_connect("localhost","root","","today") or die("Error connecting to the DB!!!!!");
	$t = time();
	fwrite($f,"$t: UpdateUser function connected to DB successfully\n");

	 

	$q = "update test set password = '$_POST[pass]'  where username='$_POST[user]'";
	$result=mysqli_query($conn, $q);

	 

	$t=time();
	fwrite($f, "$t: user ran the following query to the DB: $q\n");

	 

	if(($x=mysqli_affected_rows($conn)) > 0){
		echo "$x rows were affected";
		$t = time();
		fwrite($f,"$t: $x rows were affected");
	}else{echo "No rows were affected";}

	 

	mysqli_close($conn);
	listAllUsers();
	}

 


function InsertUser()
	{
			
	
		
	global $t, $f;

	 

	$conn = mysqli_connect("localhost","root","","today") or die("Error connecting to the DB!!!!!");
	$t = time();
	fwrite($f,"$t: InsertUser function connected to DB successfully\n");

	 

	$q = "insert into test values('$_POST[user]','$_POST[pass]',$_POST[a], $_POST[g])";
	$result=mysqli_query($conn, $q);

	 

	$t=time();
	fwrite($f, "$t: user ran the following query to the DB: $q\n");

	 

	if(($x=mysqli_affected_rows($conn)) > 0){
		echo "$x rows were affected";
		$t = time();
		fwrite($f,"$t: $x rows were affected");
	}else{echo "No rows were affected";}

	 

	mysqli_close($conn);
	listAllUsers();
	}

 

function listAllUsers()
	{
	$conn = mysqli_connect("localhost","root","","today") or die("Error connecting to the DB!!!!!");

	 

	$q = "select * from test";
	$result=mysqli_query($conn, $q);

	 

	echo "<table border=1>";
	echo "<tr><th>Username</th><th>Password</th><th>Age</th></tr>";
	
	while( $row = mysqli_fetch_assoc($result) )

	{
		echo "<tr><td>" . $row['Username'] . "</td><td>" . $row['Password'] . "</td><td>" . $row['Age'] . "</td></tr>"; 
	}
	echo "</table>";

	 

	mysqli_close($conn);
	}

 

fclose($f);
?>