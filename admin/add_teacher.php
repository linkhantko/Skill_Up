<?php
    require('connect.php');

    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $gender=$_POST['gender'];
    $image=$_FILES['photo'];
    $image_name=$image['name'];
    $pic_source="images/";
    $file_name=$pic_source.$image_name;
    $role_id=2;
    $role_name="Teacher";

    move_uploaded_file($image['tmp_name'], $file_name);

    $sql_check="SELECT * FROM users WHERE email=:email";
    $stmt=$conn->prepare($sql_check);
    $stmt->bindParam(':email',$email);
    $stmt->execute();
    $user_check =$stmt->fetch(PDO::FETCH_ASSOC);

    if($stmt->rowcount() > 0 )
{
  echo "<script>alert('Email already exist!!')</script>";
	echo "<script>location='teacher'</script>";
}
elseif($stmt->rowcount() <= 0)
{
    $query="INSERT INTO users (name,email,password,phone,address,gender,photo,roles_id,role_name) VALUES(:name,:email,:password,:phone,:address,:gender,:photo,:role_id,:role_name)";

    $stmt=$conn->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':gender', $gender);
    $stmt->bindParam(':photo', $file_name);
    $stmt->bindParam(':role_id', $role_id);
    $stmt->bindParam(':role_name', $role_name);
    $stmt->execute();

    header("Location:teacher");
}

?>