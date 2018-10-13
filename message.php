<?php
session_start();
$welcome = "Welcome,<b>".$_SESSION['username']."</b>! <a href ='logout.php'> Logout </a> <br /><a href ='message.php?id=sendmessage'>Send New Message</a> | <a href ='message.php?id='inbox'>Your Messages</a>| <a href ='dbdump.php?id='inbox'>Download Dbdump</a><br /><br />";
?>

<html>
<head>
	<title>
		private message
	</title>
</head>
<body style="background:url('images/im.png'); background-size: cover;">
	<?php print $welcome; ?>

<?php
$pages_dir = 'msg';
if(!empty($_GET['id'])){
	$pages = scandir($pages_dir,0);
	unset($pages[0],$pages[1]);

	$id=$_GET['id'];

	if(in_array('sendmessage.php',$pages)){
		include($pages_dir.'/'.'sendmessage.php');
		
	}else{
		echo "Page Not FOUND";
		}
	}else{
	include($pages_dir.'/inbox.inc.php');
}
?>
</body>
</html>