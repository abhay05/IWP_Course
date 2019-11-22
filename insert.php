<!DOCTYPE html>
<html>
<head>
<title>
PHP form program
</title>
</head>

<body>
<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
<label for="name">Name</label>
<input type="text" id="name" name="name"/><br/>
<label for="reg">Registration Number</label>
<input type="text" id="reg" name="reg"/><br/>
<input type="submit" id="btn" name ="submit" value="submit"/>
</form>
</body>
</html>

<?php

if(isset($_POST['submit'])){
	$name=$_POST['name'];
	$reg=$_POST['reg'];
	
	include 'dbconn.php';
	
	$conn =openconn();
	$val="insert into stu values('$name','$reg')";
	if($conn->query($val)==TRUE){
		echo "Record inserted successfully";
		
	}
	else{
		echo "Error" . $conn->error;
	}
	closeconn($conn);
	
}
?>
