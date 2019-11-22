<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
	<style>
		body {
			background-color:#99ccff;
		}
		#form1 {
			position:absolute;
			left:40%;
			top:35%;
		}
	</style>
	</head>
	<body>
		<form action="login.php" id="form1" name="form1" method="post" enctype="multipart/form-data">
		 <span style="font-style:bold; font-size:35px; position:relative; left:48px;">Log-in</span><br><br>
			<label ="uname">Username: </label>
			<input type="text" id="uname" name="uname" /><br>
			<label ="upass">Password: </label>
			<input type="password" id="upass" name="upass" /><br>
			<input type="submit" name="submit" value="Log In" />
		</form>
	</body>
</html><?php
if(isset($_POST['submit'])){
	$db = new mysqli("localhost","root","","da");
 		$name1=$_POST["uname"];
		$query = "SELECT * FROM login WHERE username='".$_POST['uname']."' AND password='".$_POST['upass']."'";
 
		$sql = $db->query($query);
		$n = $sql->num_rows;
		if($n > 0){
		$_SESSION["username"] = $name1;
		echo $_SESSION['username'];
		header('Location: insertrecords.php');			
		}
	
		else {
			echo '<script language="javascript">';
			echo 'alert("Invalid Login Credentials")';
			echo '</script>';
			exit();
		}
	}
?>
