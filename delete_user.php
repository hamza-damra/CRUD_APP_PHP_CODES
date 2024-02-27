<?php
// Database configuration
$servername = "localhost";
$username = "root"; // Default username for localhost
$password = ""; // Default password for localhost
$dbname = "crudapp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if user ID is set in the POST request
if(isset($_POST['user_id'])) {
    // Retrieve user ID from POST data
    $userId = $_POST['user_id'];

    // Prepare SQL statement to delete user with the given ID
    $sql = "DELETE FROM users WHERE id = $userId";

    // Execute the SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "User deleted successfully";
    } else {
        echo "Error deleting user: " . $conn->error;
    }
} else {
    echo "User ID is missing in the request";
}

// Close database connection
$conn->close();
?>
