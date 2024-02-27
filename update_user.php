<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "crudapp";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['email'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "UPDATE users SET name=?, email=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $name, $email, $id);

    if ($stmt->execute()) {
        echo "User updated successfully";
    } else {
        echo "Failed to update user";
    }

    $stmt->close();
} else {
    echo "Required parameters are missing";
}

$conn->close();

