<?php
include_once 'dbconnection.php';
$conn=openconn();
$id=$_POST['id'];
$title = $_POST['title'];
$role = $_POST['role'];
$date = $_POST['date'];
$description = $_POST['description'];
$result=$conn->query("select * from trainingsessions where title='$title' and date='$date'");
		if($result->num_rows>0){echo $name." ".$date." "."Record already exist"."<br>";$sql=0;
		}
$chkcount = count($id);
for($i=0; $i<$chkcount; $i++)
{
	
	$conn->query("UPDATE trainingsessions SET title='$title[$i]', role='$role[$i]',date='$date[$i]',description='$description[$i]' WHERE id='abhay' AND sno=".$id[$i]);
}
header('Location:trainingsessions.php')
?>