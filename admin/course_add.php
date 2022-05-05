<?php
    require('connect.php');

    $coursename=$_POST['coursename'];
    $description=$_POST['description'];

    $sql_check="SELECT * FROM courses WHERE coursename=:coursename";
    $stmt=$conn->prepare($sql_check);
    $stmt->bindParam(':coursename',$coursename);
    $stmt->execute();
    $user_check =$stmt->fetch(PDO::FETCH_ASSOC);

    if($stmt->rowcount() > 0 )
{
  echo "<script>alert('Course already exist!!')</script>";
	echo "<script>location='course'</script>";
}
elseif($stmt->rowcount() <= 0)
{
    $query="INSERT INTO courses (coursename,description) VALUES(:coursename,:description)";

    $stmt=$conn->prepare($query);
    $stmt->bindParam(':coursename', $coursename);
    $stmt->bindParam(':description', $description);
    $stmt->execute();
    echo "<script>alert('Course add successful!')</script>";
    header("Location:course");
}

?>