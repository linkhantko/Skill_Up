<?php
require('connect.php');
$id=$_GET['pid'];
$sql="DELETE FROM points WHERE id=:id";
$stmt=$conn->prepare($sql);
$stmt->bindParam(':id',$id);
$stmt->execute();

header('location:point');
?>