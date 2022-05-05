<?php
require('../admin/connect.php');

    $studentID=$_POST['studentID'];
    $level=$_POST['level'];

    $sql_check="SELECT * FROM assign_level WHERE student_id=:student_id";
    $stmt=$conn->prepare($sql_check);
    $stmt->bindParam(':student_id',$studentID);
    $stmt->execute();
    $level_check =$stmt->fetch(PDO::FETCH_ASSOC);

    if($stmt->rowcount() > 0 )
{

    $update="UPDATE assign_level SET level=:level where student_id=:studentID";
    $stmt_update =$conn->prepare($update);
	$stmt_update->bindParam(':studentID',$studentID);
	$stmt_update->bindParam(':level',$level);
	$stmt_update->execute();
    echo "<script>alert('Points add successful!')</script>";
    header("Location:student");
}
elseif($stmt->rowcount() <= 0)
{
    $query="INSERT INTO assign_level (student_id,level) VALUES(:studentID,:level)";

    $stmt_insert=$conn->prepare($query);
    $stmt_insert->bindParam(':studentID', $studentID);
    $stmt_insert->bindParam(':level', $level);
    $stmt_insert->execute();
    echo "<script>alert('Points add successful!')</script>";
    header("Location:student");
}
?>