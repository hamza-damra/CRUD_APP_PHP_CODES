<?php

$servername = "localhost";
$username = "id21939663_hamza"; 
$password = "Hh@#2021"; 
$dbname = "id21939663_crudapp";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);

    $name = $_POST['name'];
    $email = $_POST['email'];

    $stmt->execute();

    echo "User saved successfully";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;

