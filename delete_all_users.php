<?php
// Database connection parameters
$host = "localhost"; // or your database host
$db = "crudapp"; // your database name
$user = "root"; // your database user
$pass = ""; // your database password

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL to check the number of users
$checkSql = "SELECT COUNT(*) AS count FROM users";
$result = $conn->query($checkSql);
$row = $result->fetch_assoc();

if ($row['count'] > 0) {
    // Users exist, proceed with deletion
    $deleteSql = "DELETE FROM users";
    if ($conn->query($deleteSql) === TRUE) {
        echo "All records deleted successfully";
    } else {
        echo "Error deleting records: " . $conn->error;
    }
} else {
    // No users to delete
    echo "No users to delete";
}

$conn->close();
?>
