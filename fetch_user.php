<?php
$conn = new mysqli("localhost", "id21939663_hamza", "Hh@#2021", "id21939663_crudapp");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error);
}

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo $row["id"] . "," . $row["name"] . "," . $row["email"] . "<br>";
    }
} else {
    echo "0 results";
}

$result->close();

$conn->close();
?>
