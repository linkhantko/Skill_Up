<?php 
include("../admin/connect.php");
$cid=$_GET['cid'];
$student_id=$_GET['student_id'];
$sql_delete="DELETE FROM booking WHERE class_id=:cl_id";
$stmt_delete=$conn->prepare($sql_delete);
$stmt_delete->bindParam(':cl_id',$cid);
$stmt_delete->execute();
echo "<script>alert('Cancel')</script>";

if($stmt_delete)
{
    $sql_point="SELECT * FROM students WHERE id=:student_id";
    $stmt_point=$conn->prepare($sql_point);
    $stmt_point->bindParam(':student_id',$student_id);
    $stmt_point->execute();
    $point =$stmt_point->fetch(PDO::FETCH_ASSOC);
    $beforePoints=$point['point'];

    $afterPoint = $beforePoints + 1;

    $sql_update="UPDATE students SET point=:afterPoint where id=:student_id";
    $stmt_update =$conn->prepare($sql_update);
    $stmt_update->bindParam(':student_id',$student_id);
    $stmt_update->bindParam(':afterPoint',$afterPoint);
    $stmt_update->execute();

    echo "<script>alert('1 point will be Added!')</script>";
    echo "<script>location='index'</script>";
}else
{
    echo "<script>alert('Something wrong!')</script>";
}
?>