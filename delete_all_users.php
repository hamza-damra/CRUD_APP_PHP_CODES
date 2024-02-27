<?php
$host = "localhost"; 
$db = "crudapp"; 
$user = "root"; 
$pass = ""; 


$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$checkSql = "SELECT COUNT(*) AS count FROM users";
$result = $conn->query($checkSql);
$row = $result->fetch_assoc();

if ($row['count'] > 0) {
    $deleteSql = "DELETE FROM users";
    if ($conn->query($deleteSql) === TRUE) {
        echo "All records deleted successfully";
    } else {
        echo "Error deleting records: " . $conn->error;
    }
} else {
    echo "No users to delete";
}

$conn->close();
?>
