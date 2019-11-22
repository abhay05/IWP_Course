<!DOCTYPE html>
<html>
<head>
<title>
    Search
</title>
</head>
<body>
<form id="formn" name="formn" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<input type="text" name="search" id="search">
<input type="submit" name="submit" value="Submit">
</form>
</body>
</html>

<?php
if(isset($_POST['submit'])){
include 'dbconn.php';

$conn=openconn();
$reg=$_POST['search'];
$sql="select * from stu where reg='".$reg."'";

$result = $conn->query($sql) or die ($conn->error);

if($result->num_rows)
{

echo "<table id='t1' name='t1'>
<tr>
<td>Name</td>
<td>Registration Number</td>
</tr>
    ";

    $rows=$result->fetch_assoc();
echo "<tr>
<td>".$rows['reg']."</td><td>".$rows['name']."</td></tr>";
echo "</table>";
}
else
{
echo "No Such Record Found";
}
}
?>
