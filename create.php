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

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if the required parameters are set
    if (isset($_POST['name']) && isset($_POST['email'])) {
        // Retrieve POST data
        $name = $_POST['name'];
        $email = $_POST['email'];

        // Prepare SQL statement to insert a new user
        $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error: Missing POST data";
    }
} else {
    echo "Error: Invalid request method";
}

// Close database connection
$conn->close();
?>
