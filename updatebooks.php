<?php
include_once 'dbconnection.php';
$conn=openconn();

$title = $_POST['title'];
$isbn = $_POST['isbn'];
$description = $_POST['description'];
$result=$conn->query("select * from books where isbn='$isbn'");
		if($result->num_rows>0){echo $isbn." ".$title." "."Record already exist"."<br>";$sql=0;
		}
$chkcount = count($isbn);
for($i=0; $i<$chkcount; $i++)
{
	
	$conn->query("UPDATE books SET title='$title[$i]',description='$description[$i]' WHERE id='abhay' AND isbn='$isbn[$i]'");
}
header('Location:books.php');
?>