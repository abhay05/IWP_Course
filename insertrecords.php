<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Php Form Program</title>
</head>
<script>
function validate()
{
var name=document.getElementById("uname").value;
	if(name=="")
        {
			document.getElementById("nerr").innerHTML="Enter ";
			return false;
        }
	var reg=document.getElementById("registration").value;
	if(reg=="")
        {
			document.getElementById("rerr").innerHTML="PLEASE TYPE THE REGISTRATION FIELD";
			return false;
        }
	return true;
}
</script>
<style>
.err{
color:red;
	font-size:100%;
}
body{
	background-color:#d1d1d19;
}
table{
	position:absolute;
	left:500px;
	top:250px;
}
h2{
	position:absolute;
	left:580px;
	top:150px;
}
#first{
	font-weight:bold;
	position:absolute;
	left:30px;
	top:50px;
}
</style>
<body>
<h2>Insert Record</h2>
<form id="form1" name="form1" method="post" action="insertrecords.php" onsubmit="return validate();" >
<table id="t1" name="t1">
<tr>
<td> Name
</td>
<td><input type="text" name="uname" id="uname">
</td>
<td id="nerr" class="err">
</td>
</tr>
<tr>
<td>Registration Number
</td>
<td><input type="text" name="reg" id="reg">
</td>
<td id="rerr" class="err">
</td>
</tr>
<tr>
<td colspan="2"><input type="submit" name= "submit" value="Submit">
</td>
</tr>
</table>
</form>
<div>
	<form action="insertrecords.php" id="form3" name="form3" method="post">
	<input type="submit" id="submit1" name="submit1" value="Log Out" />
	</form>
</div>
</body>
</html>
<?php
	if (isset($_POST['submit1'])){
		session_destroy();
		header('Location: login.php');
	}
?>
<?php

if (isset($_POST['submit']))
{
	$test = $_SESSION['username'];
	echo "<p id='first'>";
	echo $test;
    echo "</p>";
	$name=$_POST['uname'];
    $reg=$_POST['reg'];
	$sql= new mysqli('localhost','root','','da');
    $query="insert into Student values('$name','$reg','$session1')";
	if($sql->query($query)==TRUE)
    {
		echo "<span style='color:green';>Record Successfully Inserted</span>";
    }
	else
    {
	echo "Error: ". $sql->error;
    }
}
?>
