<?php
	require 'connect.php';

	$id=$_POST['id'];
	$coursename = $_POST['coursename'];
	$description = $_POST['description'];

	$sql= "UPDATE courses SET coursename=:coursename, description=:description where id=:id";
	$stmt =$conn->prepare($sql);
	$stmt->bindParam(':id',$id);
	$stmt->bindParam(':coursename',$coursename);
	$stmt->bindParam(':description',$description);
	$stmt->execute();   
	header('location:course');
 ?>
