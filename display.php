<?php

include 'dbconn.php';

$conn=openconn();

$sql="select * from stu";

$result = $conn->query($sql) or die ($conn->error);

//print_r($result); 
if($result->num_rows)
{

echo "<table id='t1' name='t1'>
<tr>
<td>Name</td>
<td>Registration Number</td>
</tr>";
while($rows=$result->fetch_assoc())
    {
echo "<tr>
<td>".$rows['reg']."</td><td>".$rows['name']."</td></tr>";
    }
echo "</table>";
}

?>

