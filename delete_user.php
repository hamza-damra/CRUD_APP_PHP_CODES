<?php
$servername = "localhost";
$username = "id21939663_hamza"; 
$password = "Hh@#2021"; 
$dbname = "id21939663_crudapp";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['user_id'])) {
    $userId = $_POST['user_id'];

    $sql = "DELETE FROM users WHERE id = $userId";

    if ($conn->query($sql) === TRUE) {
        echo "User deleted successfully";
    } else {
        echo "Error deleting user: " . $conn->error;
    }
} else {
    echo "User ID is missing in the request";
}

$conn->close();
?>
