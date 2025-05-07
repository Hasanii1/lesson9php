<?php
require 'config.php';

if(isset($_POST['submit']))
{

    $email = $_POST['email'];
    $password = $_POST['password'];

}

$sql = "SELECT *FROM users WHERE email=:email";
$insertSql = $conn->prepare($sql);
$insertSql->bindParam(':email' , $email);
$insertSql->execute();

