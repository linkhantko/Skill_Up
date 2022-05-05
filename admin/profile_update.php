<?php
require 'connect.php';
$id=$_POST['id'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$address = $_POST['address'];

$sql= "UPDATE users SET name=:name, phone=:phone, address=:address where id=:id";
$stmt =$conn->prepare($sql);
$stmt->bindParam(':id',$id);
$stmt->bindParam(':name',$name);
$stmt->bindParam(':phone',$phone);
$stmt->bindParam(':address',$address);
$stmt->execute();

echo "<script>alert('Update Successful!')</script>";
header('location:profile');

if(isset($_POST['btnPassword']))
{
    if(isset($_SESSION['loginUser']))
    {
    $sql_cid="SELECT password from users WHERE id=:id";
    $stmt_cid=$conn->prepare($sql_cid);
    $stmt_cid ->bindParam(':id', $urID);
    $stmt_cid->execute();
    $user=$stmt_cid->fetch(PDO::FETCH_ASSOC);

    $oldpassword=$user['password'];
    }
}
 ?>
