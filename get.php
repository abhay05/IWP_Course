<?php
/*
$date1 = new DateTime();
$date2 = new DateTime("2018-05-16");
$diff = $date1->diff($date2);
// will output 2 days
$days=$diff->days;
if($diff->invert){$days=-$days;}
echo $days . ' days ';*/

include 'dbconnection.php';
$conn=openconn();

$qu=$_GET['q'];
echo $qu;
$sql = "Select * from Anemia where village like '%".$qu."%'";


?>