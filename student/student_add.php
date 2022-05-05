<?php
    require('../admin/connect.php');

    $f_name=$_POST['firstname'];
    $l_name=$_POST['lasttname'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $gender=$_POST['gender'];
    $status='Inactive';
    $qcheck='No';
    $point='0';
    $image=$_FILES['photo'];
    $image_name=$image['name'];
    $pic_source="../admin/images/";
    $file_name=$pic_source.$image_name;

    move_uploaded_file($image['tmp_name'], $file_name);

    $sql_check="SELECT * FROM students WHERE username=:username";
    $stmt=$conn->prepare($sql_check);
    $stmt->bindParam(':username',$username);
    $stmt->execute();
    $user_check =$stmt->fetch(PDO::FETCH_ASSOC);

    if($stmt->rowcount() > 0 )
{
  echo "<script>alert('Username already exist!!')</script>";
	echo "<script>location='register'</script>";
}
elseif($stmt->rowcount() <= 0)
{
    $query="INSERT INTO students (f_name,l_name,username,email,password,phone,address,gender,photo,status,q_check,point) VALUES(:f_name,:l_name,:username,:email,:password,:phone,:address,:gender,:photo,:status,:q_check,:point)";

    $stmt=$conn->prepare($query);
    $stmt->bindParam(':f_name', $f_name);
    $stmt->bindParam(':l_name', $l_name);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':q_check', $qcheck);
    $stmt->bindParam(':point', $point);
    $stmt->bindParam(':gender', $gender);
    $stmt->bindParam(':photo', $file_name);
    $stmt->execute();

    session_start();
$_SESSION['reg_success']="Your account has been created and Admin Team will be Contact You.";
    header("Location:login");
}

?>