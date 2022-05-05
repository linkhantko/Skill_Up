<?php
    require('connect.php');

    $pointname=$_POST['pointname'];
    $amount=$_POST['amount'];
    $prize=$_POST['prize'];

    $sql_check="SELECT * FROM points WHERE pointname=:pointname";
    $stmt=$conn->prepare($sql_check);
    $stmt->bindParam(':pointname',$pointname);
    $stmt->execute();
    $point_check =$stmt->fetch(PDO::FETCH_ASSOC);

    if($stmt->rowcount() > 0 )
{
  echo "<script>alert('Points amount is already exist!!')</script>";
	echo "<script>location='point'</script>";
}
elseif($stmt->rowcount() <= 0)
{
    $query="INSERT INTO points (pointname,amount,prize) VALUES(:pointname,:amount,:prize)";

    $stmt=$conn->prepare($query);
    $stmt->bindParam(':pointname', $pointname);
    $stmt->bindParam(':amount', $amount);
    $stmt->bindParam(':prize', $prize);
    $stmt->execute();
    echo "<script>alert('Points add successful!')</script>";
    header("Location:point");
}

?>