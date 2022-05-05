<?php
require('connect.php');
$id=$_GET['lid'];
$sql="DELETE FROM levels WHERE id=:id";
$stmt=$conn->prepare($sql);
$stmt->bindParam(':id',$id);
$stmt->execute();

header('location:level');
?>