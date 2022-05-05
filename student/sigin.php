<?php
require '../admin/connect.php';
session_start();

$username = $_POST['username'];
$password = $_POST['password'];
$status ="Active";
$sql = "SELECT * FROM students where username=:username and password=:password and status=:status";
$stmt = $conn-> prepare($sql);
$stmt->bindParam(':username',$username);
$stmt->bindParam(':password',$password);
$stmt->bindParam(':status',$status);
$stmt->execute();

if($stmt->rowCount() <= 0) {

    $_SESSION['fail_login']="Wrong Password Please Try Again!";

    if(!isset($_COOKIE['loginCount'])){
     $loginCount = 1;
    }
    else
    {
        $loginCount = $_COOKIE['loginCount'];
        $loginCount++;
    }

    setcookie('loginCount',$loginCount,time()+10);

    if ($loginCount >= 3) {
        #time_out
        header('location:404.html');
        setcookie('loginCount','',time()-10);

        echo "<script type=\"text/javascript\">
                (function(){
                        setTimeout(function(){
                            location.href='login';
                            },10000);
                    })();
                </script>";
    }
    else
    {
        $_SESSION['fail_login']="Wrong Password! Please Try Again!";
        header('location:login');
    }


}
else
{
    $student = $stmt->fetch(PDO::FETCH_ASSOC);
    $_SESSION['loginStudent'] = $student;
    echo "<script>alert('Login Successful')</script>";
    header("Location:index");
}




?>
