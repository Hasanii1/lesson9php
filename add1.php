<?php

include_once('config1.php');


if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $company = $_POST['company'];
    $contact = $_POST['phone'];
    $message = $_POST['message'];
}

    try {
        $sql = "INSERT INTO register (name, email, company, phone, message) 
                VALUES (:name, :email, :company, :phone, :message)";
        $sqlQuery = $conn->prepare($sql);
    
        $sqlQuery->bindParam(":name", $name);
        $sqlQuery->bindParam(":email", $email);
        $sqlQuery->bindParam(":company", $company);
        $sqlQuery->bindParam(":phone", $contact);
        $sqlQuery->bindParam(":message", $message);
    
        $sqlQuery->execute();
    
        echo "Data saved successfully.";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }