<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crudapp";

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

