<?php
	require 'connect.php';

	$id=$_POST['id'];
	$pointname = $_POST['pointname'];
	$amount = $_POST['amount'];
	$prize = $_POST['prize'];

	$sql= "UPDATE points SET pointname=:pointname, amount=:amount, prize=:prize where id=:id";
	$stmt =$conn->prepare($sql);
	$stmt->bindParam(':id',$id);
	$stmt->bindParam(':pointname',$pointname);
	$stmt->bindParam(':amount',$amount);
	$stmt->bindParam(':prize',$prize);
	$stmt->execute();   
	header('location:point');
 ?>
