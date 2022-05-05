<?php
require('connect.php');
$id=$_GET['id'];
$sql="DELETE FROM students WHERE id=:id";
$stmt=$conn->prepare($sql);
$stmt->bindParam(':id',$id);
$stmt->execute();

header('location:student');
?>