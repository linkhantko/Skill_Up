<?php

require 'connect.php';
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

// var_dump($email);
// var_dump($password);

// $sql = "SELECT users.*, roles.rolename as rname FROM users LEFT JOIN roles ON users.role_id = roles.id WHERE email=:email AND password=:password";
$sql = "SELECT * FROM users where email=:email and password=:password";
$stmt = $conn-> prepare($sql);
$stmt->bindParam(':email',$email);
$stmt->bindParam(':password',$password);
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
        header('location:404page');
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
    $user = $stmt->fetch(PDO::FETCH_ASSOC);


    $_SESSION['loginUser'] = $user;

    $roleid = $user['roles_id'];

    if($roleid == 1) {
        header('location:index');
    }
    elseif($roleid == 2)
    {
        header('location:../teacher');
    }
}




?>
