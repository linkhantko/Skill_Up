<?php
include('../admin/connect.php');
$class_id=$_GET['cid'];
$class=$_GET['class'];
$student_id=$_GET['student_id'];
$teacher_name=$_GET['teacher_name'];
$student_name=$_GET['student_name'];
$level=$_GET['level'];
$attendance="Absent";
$status="Checked";

$sql_check="SELECT * FROM booking WHERE class_id = :class_id AND student_id = :student_id";
    $stmt=$conn->prepare($sql_check);
    $stmt->bindParam(':student_id',$student_id);
    $stmt->bindParam(':class_id',$class_id);
    $stmt->execute();
    $user_check =$stmt->fetch(PDO::FETCH_ASSOC);

    if($stmt->rowcount() > 0 )
    {
         echo "<script>alert('Already Booked')</script>";
         echo "<script>location='index'</script>";
    }
    else
    {
            $sql_point="SELECT * FROM students WHERE id=:student_id";
            $stmt_point=$conn->prepare($sql_point);
            $stmt_point->bindParam(':student_id',$student_id);
            $stmt_point->execute();
            $point =$stmt_point->fetch(PDO::FETCH_ASSOC);
            $beforePoints=$point['point'];

            if($beforePoints < 1)
            {
                echo "<script>alert('Need to Fill the Points')</script>";
                echo "<script>location='profile'</script>";
            }else
            {
            $insert="INSERT INTO booking (class_id,class,student_id,student_name,attendance,level,teacher_name,status) VALUES(:class_id,:class,:student_id,:student_name,:attendance,:level,:teacher_name,:status)";
            $stmt=$conn->prepare($insert);
            $stmt->bindParam(':class_id', $class_id);
            $stmt->bindParam(':class', $class);
            $stmt->bindParam(':student_id', $student_id);
            $stmt->bindParam(':student_name', $student_name);
            $stmt->bindParam(':attendance', $attendance);
            $stmt->bindParam(':level', $level);
            $stmt->bindParam(':teacher_name', $teacher_name);
            $stmt->bindParam(':status', $status);
            $stmt->execute();

            if(isset($stmt))
            {
                $afterPoint = $beforePoints - 1;

                $sql_update="UPDATE students SET point=:afterPoint where id=:student_id";
                $stmt_update =$conn->prepare($sql_update);
                $stmt_update->bindParam(':student_id',$student_id);
                $stmt_update->bindParam(':afterPoint',$afterPoint);
                $stmt_update->execute();

                echo "<script>alert('Successfully Book this Class!')</script>";
                echo "<script>location='index'</script>";
            }else
            {
                echo "<script>alert('Something Wrong! Try Agan')</script>";
                echo "<script>location='index'</script>";
            }
        }
    }
?>