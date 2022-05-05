<?php
    require('connect.php');

    $level=$_POST['level'];
    $description=$_POST['description'];

    $sql_check="SELECT * FROM levels WHERE level=:level";
    $stmt=$conn->prepare($sql_check);
    $stmt->bindParam(':level',$level);
    $stmt->execute();
    $level_check =$stmt->fetch(PDO::FETCH_ASSOC);

    if($stmt->rowcount() > 0 )
{
  echo "<script>alert('Level name is already exist!!')</script>";
	echo "<script>location='point'</script>";
}
elseif($stmt->rowcount() <= 0)
{
    $query="INSERT INTO levels (level,description) VALUES(:level,:description)";

    $stmt=$conn->prepare($query);
    $stmt->bindParam(':level', $level);
    $stmt->bindParam(':description', $description);
    $stmt->execute();
    echo "<script>alert('Level add successful!')</script>";
    header("Location:level");
}

?>