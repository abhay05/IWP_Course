<?php
include_once 'dbconnection.php';
$conn=openconn();
$id=$_POST['id'];
$title = $_POST['title'];
$year = $_POST['year'];
$description = $_POST['description'];
$result=$conn->query("select * from research where accessionNumber='$accessionNumber'");
		if($result->num_rows>0){echo $isbn." ".$accessionNumber." "."Record already exist"."<br>";$sql=0;
		}
$chkcount = count($id);
for($i=0; $i<$chkcount; $i++)
{
	
	$conn->query("UPDATE research SET title='$title[$i]', year='$year[$i]',description='$description[$i]' WHERE id='abhay' AND accessionNumber=".$id[$i]);
}
header('Location:research.php')
?>