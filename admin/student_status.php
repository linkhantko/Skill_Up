<?php
require('connect.php');
$id = $_GET['id'];
if ( $_GET['status']== "Active")
{
  $status = "Inactive";
}else if( $_GET['status']== "Inactive"){
  $status = "Active";
}
$sql_check ="UPDATE `students` SET
        status=:status
        WHERE id=:id";
	$stmt_check = $conn->prepare($sql_check);
	$stmt_check->bindParam(':status',$status);
	$stmt_check->bindParam(':id',$id);
	$stmt_check->execute();
  header('Location:student');
 ?>