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
$f = fopen('log2.log',"a+");
$t = time();
$conn = mysqli_connect("localhost","root","","today") or die("Error connecting to the DB!!!!!");
$t = time();
fwrite($f,"$t: InsertUser function connected to DB successfully\n");

 


if(isset($_POST["s"]))
{
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
	global $t, $f, $conn;

	 

	$result=mysqli_query($conn, $query);
	$t=time();
	fwrite($f, "$t: user ran the following query to the DB: $query\n");

	 

	if(($x=mysqli_affected_rows($conn)) > 0)
	{
		echo "$x rows were affected";
		$t = time();
		fwrite($f,"$t: $x rows were affected");
	}else{echo "No rows were affected";}

	 

	listAllUsers();
	}

 

function listAllUsers()
	{
	global $conn;
	$q = "select * from test";
	$result=mysqli_query($conn, $q);

	 

	echo "<table border=1>";
	echo "<tr><th>Username</th><th>Password</th></tr>";
	while( $row = mysqli_fetch_assoc($result) ){
		echo "<tr><td>" . $row['Username'] . "</td><td>" . $row['Password'] . "</td></tr>"; 
	}
	echo "</table>";
	}

 

mysqli_close($conn);

 

fclose($f);
?>