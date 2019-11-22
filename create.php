<?php
include 'dbconn.php';

$conn=openconn();
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
} 


$sql = "CREATE TABLE School (
SchoolName VARCHAR(30) NOT NULL,
SchoolId VARCHAR(30) NOT NULL,
Foreign key(SchoolId) REFERENCES stu(reg) on delete cascade
)";

if ($conn->query($sql) === TRUE) {
echo "Table School created successfully";
} else {
echo "Error creating table: " . $conn->error;
}

$conn->close();
?>

