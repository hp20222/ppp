<?php

include ("DB.php");
$conn = connect(); 

if(isset($_POST['s']))  // لما اعمل سبمت مفروض يخليني اضيف ريكورد على الداتابيس
{
	
$q = "insert into users(username, pass, encrypt_pass) values('$_POST[user]','$_POST[pass]' , ' " .md5($_POST['pass']) . " ' )";  

	$result=mysqli_query($conn, $q); 


if(($x=mysqli_affected_rows($conn)) > 0)
	{
		echo "$x Inserted successfuly!!";

	}else{echo "Error inseting user name or password !";}

	 

	mysqli_close($conn);
	


}

?>
<html>
	<body>
		<form method="post"  action="userEntry.php" >
			<input type="text" name="user" />
			<input type="password" name="pass" />
			<input type="submit" name="s" />
			<input type="reset" name="r"/>
		</form>
	</body>
</html>