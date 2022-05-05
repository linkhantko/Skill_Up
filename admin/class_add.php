<?php
    require('connect.php');
    $class=$_POST['classname'];
    $teacher=$_POST['teacher'];
    $level=$_POST['level'];
    $course=$_POST['course'];
    $date=$_POST['date'];
    $time=$_POST['time'];
    $description=$_POST['description'];

    $sql_check="SELECT * FROM classes WHERE class=:class";
    $stmt=$conn->prepare($sql_check);
    $stmt->bindParam(':class',$class);
    $stmt->execute();
    $class_check =$stmt->fetch(PDO::FETCH_ASSOC);

    if($stmt->rowcount() > 0 )
{
  echo "<script>alert('Class already exist!!')</script>";
	echo "<script>location='class'</script>";
}
elseif($stmt->rowcount() <= 0)
{
    $query="INSERT INTO classes (class,course,description,teacher_name,assign_level,date,time) VALUES(:class,:course,:description,:teacher_name,:assign_level,:date,:time)";

    $stmt=$conn->prepare($query);
    $stmt->bindParam(':class', $class);
    $stmt->bindParam(':course', $course);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':teacher_name', $teacher);
    $stmt->bindParam(':assign_level', $level);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':time', $time);
    $stmt->execute();
    echo "<script>alert('Class add successful!')</script>";
    header("Location:class");
}
?>
