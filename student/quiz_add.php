<?php
include('../admin/connect.php');
session_start();

$studentid=$_POST['studentid'];
$ans1=$_POST['answer1'];
$ans2=$_POST['answer2'];
$ans3=$_POST['answer3'];
$ans4=$_POST['answer4'];
$ans5=$_POST['answer5'];
$ans6=$_POST['answer6'];
$ans7=$_POST['answer7'];
$ans8=$_POST['answer8'];
$ans9=$_POST['answer9'];
$ans10=$_POST['answer10'];
$q_check="Checked";

$insert="INSERT INTO student_quiz (student_id,ans1,ans2,ans3,ans4,ans5,ans6,ans7,ans8,ans9,ans10) VALUES(:student_id,:ans1,:ans2,:ans3,:ans4,:ans5,:ans6,:ans7,:ans8,:ans9,:ans10)";

    $stmt=$conn->prepare($insert);
    $stmt->bindParam(':student_id', $studentid);
    $stmt->bindParam(':ans1', $ans1);
    $stmt->bindParam(':ans2', $ans2);
    $stmt->bindParam(':ans3', $ans3);
    $stmt->bindParam(':ans4', $ans4);
    $stmt->bindParam(':ans5', $ans5);
    $stmt->bindParam(':ans6', $ans6);
    $stmt->bindParam(':ans7', $ans7);
    $stmt->bindParam(':ans8', $ans8);
    $stmt->bindParam(':ans9', $ans9);
    $stmt->bindParam(':ans10', $ans10);
    $stmt->execute();

    $update= "UPDATE students SET q_check=:q_check where id=:id";
	$stmt =$conn->prepare($update);
	$stmt->bindParam(':id',$studentid);
	$stmt->bindParam(':q_check',$q_check);
	$stmt->execute();

    header("Location:quiz");
?>