<?php
require 'config.php';

if(isset($_POST['submit']))
{

    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($email) || empty($password)){
        echo "fill out the fields";
    }
    else{



$sql = "SELECT *FROM register WHERE email=:email";
$insertSql = $conn->prepare($sql);
$insertSql->bindParam(':email' , $email);
$insertSql->execute();

if($insertSql->rowCount() > 0){
    $data=$insertSql->fetch();
    if(password_verify($password , $data['password'])){
        header("Location: dashboard.php");
    }else{
        echo "password incorrect";
        header("refresh:2; url=login.php");
    }

}else{
    echo"user not found";
}

}
}