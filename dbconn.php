<?php

function openconn(){
$servername = "localhost";
$username = "root";
$password = "";
$db="students";

$conn = new mysqli($servername,$username,$password,$db);

if($conn->connect_error){
	die("Connection Error" . $conn->connect_error);
}
echo "Connected Successfully";
return $conn;
}

function closeconn($conn){
	$conn->close();
	echo "Connected Closed";
}
?>
