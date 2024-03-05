<?php

$servername = "localhost";
$username = "id21939663_hamza";
$password = "Hh@#2021";
$dbname = "id21939663_crudapp";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
