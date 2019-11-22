<!DOCTYPE html>
<html>
<form id="formn" name="formn" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<label for="delete">Enter Reg. no.</label>
<input type="text" id="delete" name="delete" />
<input type="submit" name="submit" value="Submit">
</form>
</html>

<?php

if(isset($_POST['submit'])){
include 'dbconn.php';

$conn=openconn();
$reg=$_POST['delete'];

$sql="delete from stu where reg='".$reg."'";
if($conn->query($sql))
{

echo "Deleted succcessfully";
}
else{echo "Record not deleted";}
}
?>
