<?php
include_once 'dbconnection.php';
$conn=openconn();
$id=$_POST['id'];
$name = $_POST['name'];
$organisation = $_POST['organisation'];
$date = $_POST['date'];
$description = $_POST['description'];
$result=$conn->query("select * from awards where name='$name' and date='$date' and organisation='$organisation'");
		if($result->num_rows>0){echo $name. " ".$organisation." ".$date." "."Record already exist"."<br>";$sql=0;
		}
$chkcount = count($id);
for($i=0; $i<$chkcount; $i++)
{
	
	$conn->query("UPDATE awards SET name='$name[$i]', organisation='$organisation[$i]',date='$date[$i]',description='$description[$i]' WHERE id='abhay' AND sno=".$id[$i]);
}
header('Location:awards.php')
?>