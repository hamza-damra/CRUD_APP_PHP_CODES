<?php
// Database configuration
$servername = "localhost";
$username = "root"; // default username for localhost
$password = ""; // default password for localhost
$dbname = "crudapp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the necessary POST parameters are set
if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['email'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Prepare and execute SQL statement to update user information
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

