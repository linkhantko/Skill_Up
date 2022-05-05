<?php
	require 'connect.php';

	$id=$_POST['id'];
	$level = $_POST['level'];
	$description = $_POST['description'];

	$sql= "UPDATE levels SET level=:level, description=:description where id=:id";
	$stmt =$conn->prepare($sql);
	$stmt->bindParam(':id',$id);
	$stmt->bindParam(':level',$level);
	$stmt->bindParam(':description',$description);
	$stmt->execute();   
	header('location:level');
 ?>
