<?php

$database=new mysqli("localhost","id7469495_ntl","@@YAss00","id7469495_private_message");

if ($database->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['btn'])){
	session_start();
	$password=htmlspecialchars($_POST['password']);
	$password2=htmlspecialchars($_POST['password2']);
	$username=htmlspecialchars($_POST['username']);
    if($password==$password2){
		$password=sha1($password);
		$stmt=$database->prepare( "INSERT INTO users (username,password) VALUES (?,?)");
		$stmt->bind_param("ss",$username,$password);
		$stmt->execute();
		$_SESSION['message']="logged in";
		$_SESSION['username']=$username;
		header("Location: ./registerconf.php");




	}
	else{
		$_SESSION['message']="password doesnt match";


	}

	
}


?>


<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" href="bootstrap.min.css">

</head>
<body style="background:url('images/im.png'); background-size: cover;">
<div style="height: 100px;" align="center" class="h1" class="jumbotron jumbotron-fluid">
	<h1 class="display-4" style="padding: 20px;">Registr</h1>
</div>
<form onsubmit="return validate();return passLength();" name="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
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
			<td>Confirm Password:</td>
			<td><input type="password" name="password2" class="textInput">
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="btn" value="Register" class="btn btn-primary">
		</tr>


	</table>
</div>
</form>
<script type="text/javascript">
	
	function validate() {
    var x = document.forms["form"]["password"].value;
    var y =document.forms["form"]["password2"].value;
    if (x == y) {
    	if(x.length<8){
    		alert("Password too Short");
    		return false;
    	}
        return true;
    }
    else{
    	alert("Passwords Doesnt Match");
    	return false;
    }


   
} 
</script>
</body>
</html>