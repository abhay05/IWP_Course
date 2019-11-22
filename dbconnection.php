<?php

function openconn(){
$servername = "localhost";
$username = "root";
$password = "";
$db="ncl_healthcenter";

$conn = new mysqli($servername,$username,$password,$db);

if($conn->connect_error){
	die("Connection Error" . $conn->connect_error);
}

return $conn;
}

function closeconn($conn){
	$conn->close();
	echo "Connected Closed";
}
?>