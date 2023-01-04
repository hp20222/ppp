
  
  <?php   
  
  session_start();
 include("DB.php");
 
//to check if user name is valid or not
if(isset(/* الي رح يجي عن طريق البوست  */ $_POST['s']))
	
	{
	/* ايش رح يعمل؟ رح يعمل تشك على الي رح يجيني  من اليوزر  */
	checkUser($_POST['user'] , $_POST['pass'] ) ; /* call function that named checkUser  validation */
	}


function checkUser($u ,$p) {
	/* عشان يشتغل الفنكشن هاذ لازم يكون عندي كمان فنكشن اله علاقة ب الداتابيس  */
	$con =connect();
	$query = "select * from users where username = '$u' AND pass = '$p' "; 
	//echo $query;
	
	// هون ببلش الاختلاف مع فيديو الدكتور 
	$results = query($query, $con);
	if(mysqli_affected_rows($con) > 0) /* اذا هي انقلني للصفحه الي بعدها  */
	{   
	
		var_dump(mysqli_fetch_array($results));
		
		
		$_SESSION['u'] = $u;
		$_SESSION['p'] = $p;
		setcookie("username", $u );
		setcookie("password" , $p );   // why not(pass) ??  
		header('location:main.php'); /* redirect to other page  */
	}
	else 
		echo"<p style='color:red'>Wrong user name of password !!</p>";
	disconnect($con);
	

}



?>

<html>
	<body>
		<form method="post"  action="Login.php" >
			<input type="text" name="user"
					value=" <?php  if(isset($_COOKIE['username']))   echo $_COOKIE['username'];  ?> "/>
							
					
					
			<input type="password" name="pass"
					value=" <?php  if(isset($_COOKIE['password']))  echo $_COOKIE['password']; ?>  " />
					
				
			<input type="submit" name="s" />
			<input type="reset" name="r"/>
		</form>
	</body>
</html>