<?php
	session_start();
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
//	session_start();

	if($_SESSION['message']=="logged in"){
		echo "<h1>Registratiom Confirmed</h1>";
		echo "you may now <a href='login.php'>Login</a>";

	}
	elseif ($_SESSION['message']=="wrong") {
		echo "<h1>Login Error Wrong Username Or Password</h1>";
		echo "you may try again to  <a href='login.php'>Login</a>";
	}
	


	?>
	
	

</body>
</html>