<?php
require_once "pdo.php";
$stmt="Select * from users";
$rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
?>
