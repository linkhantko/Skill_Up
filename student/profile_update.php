<?php
require '../admin/connect.php';
$id=$_POST['id'];
$f_name = $_POST['f_name'];
$l_name = $_POST['l_name'];
$phone = $_POST['phone'];
$address = $_POST['address'];

$sql= "UPDATE students SET f_name=:f_name, l_name=:l_name, phone=:phone, address=:address where id=:id";
$stmt =$conn->prepare($sql);
$stmt->bindParam(':id',$id);
$stmt->bindParam(':f_name',$f_name);
$stmt->bindParam(':l_name',$l_name);
$stmt->bindParam(':phone',$phone);
$stmt->bindParam(':address',$address);
$stmt->execute();

echo "<script>alert('Update Successful!')</script>";
header('location:profile');

 ?>
