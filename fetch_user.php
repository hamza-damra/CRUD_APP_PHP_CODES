<?php
// Establish connection to MySQL database
$conn = new mysqli("localhost", "root", "", "crudapp");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare SQL statement to fetch all users
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

// Check if query executed successfully
if (!$result) {
    die("Query failed: " . $conn->error);
}

// Check if any users were found
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo $row["id"] . "," . $row["name"] . "," . $row["email"] . "<br>";
    }
} else {
    echo "0 results";
}

// Close result set
$result->close();

// Close database connection
$conn->close();
?>
