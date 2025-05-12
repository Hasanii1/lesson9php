<?php

include_once('config1.php');


if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
}

    try {
        $sql = "INSERT INTO register (name, email, password) 
                VALUES (:name, :email, :password)";
        $sqlQuery = $conn->prepare($sql);
    
        $sqlQuery->bindParam(":name", $name);
        $sqlQuery->bindParam(":email", $email);
        $sqlQuery->bindParam(":password", $password);
    
        $sqlQuery->execute();
    
        echo "Data saved successfully.";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }