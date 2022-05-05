<?php
require('../admin/connect.php');
$id = $_GET['id'];
$class_id =$_GET['c_id'];
if ( $_GET['status']== "Present")
{
  $status = "Absent";
}else if( $_GET['status']== "Absent")
{
  $status = "Present";
}
$sql_check ="UPDATE booking SET attendance = :status WHERE student_id=:student_id and class_id=:class_id";
	$stmt_check = $conn->prepare($sql_check);
	$stmt_check->bindParam(':status',$status);
	$stmt_check->bindParam(':student_id',$id);
	$stmt_check->bindParam(':class_id',$class_id);
	$stmt_check->execute();
  header('Location:booking');
 ?>