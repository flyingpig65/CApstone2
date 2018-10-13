<?php
$database=new mysqli("localhost","id7469495_ntl","@@YAss00","id7469495_private_message");

if ($database->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST['btn'])){
	session_start();
	$password=htmlspecialchars($_POST['password']);
	$username=htmlspecialchars($_POST['username']);
	$password=sha1($password);
	$stmt=$database->prepare( "SELECT username,password from users WHERE username=? AND password=?");
	$stmt->bind_param("ss",$username,$password);
	$stmt->execute();
	$stmt->bind_result($username1,$password1);
    while($stmt->fetch()){
    	if($username==$username1 and $password==$password1){
    		
    		$_SESSION['message']="Sucessfull";
	        $_SESSION['username']=$username;
	        //$_SESSION['id']=$from_id;
	        header("Location: ../message.php");
    	}
    	else{
    		 $_SESSION['message']="unSucessfull";
    	}
    		
    }  
   
    	
	
	




	}
    	
	

?>



<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="bootstrap.min.css">

</head>
<body style="background:url('images/im.png'); background-size: cover;">
<div style="height: 100px;" align="center" class="h1" class="jumbotron jumbotron-fluid">
	<h1 class="display-4" style="padding: 20px;">Login</h1>
</div>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<div style="width: 50%;margin-left: 330px;" >
	<table align="center" class="table table-dark">

		<tr>
			<td>Username:</td>
			<td><input type="text" name="username" class="textInput">
		</tr>

		<tr>

			<td>Password:</td>
			<td><input type="password" name="password" class="textInput">
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="btn" value="Register" class="btn btn-primary">
		</tr>


	</table>
</div>
</form>


</body>
</html>