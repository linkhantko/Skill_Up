<?php
require '../admin/connect.php';

$point_id=$_GET['point_id'];
$student_id=$_GET['student_id'];

$sql_student="SELECT point FROM students WHERE id=:student_id";
$stmt_student=$conn->prepare($sql_student);
$stmt_student->bindParam(':student_id',$student_id);
$stmt_student->execute();
$student =$stmt_student->fetch(PDO::FETCH_ASSOC);
$beforePoints=$student['point'];

$sql_point="SELECT amount FROM points WHERE id=:point_id";
$stmt_point=$conn->prepare($sql_point);
$stmt_point->bindParam(':point_id',$point_id);
$stmt_point->execute();
$point =$stmt_point->fetch(PDO::FETCH_ASSOC);
$addedPoint=$point['amount'];

$finalpoints=$beforePoints + $addedPoint;

$sql_update="UPDATE students SET point=:finalpoint where id=:student_id";
$stmt_update =$conn->prepare($sql_update);
$stmt_update->bindParam(':student_id',$student_id);
$stmt_update->bindParam(':finalpoint',$finalpoints);
$stmt_update->execute();

echo "<script>alert('Successfully Added!')</script>";
echo "<script>location='index'</script>";
?>