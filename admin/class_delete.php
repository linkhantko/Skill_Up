<?php
require('connect.php');
$id=$_GET['cid'];
$sql="DELETE FROM classes WHERE id=:id";
$stmt=$conn->prepare($sql);
$stmt->bindParam(':id',$id);
$stmt->execute();

header('location:class');
?>