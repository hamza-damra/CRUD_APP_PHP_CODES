<?php

 include 'config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($_POST['name']) && !empty($_POST['email'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];

        $birthdate = isset($_POST['birthdate']) && strtotime($_POST['birthdate']) ? date('Y-m-d', strtotime($_POST['birthdate'])) : NULL;

        $salary = isset($_POST['salary']) && is_numeric($_POST['salary']) ? floatval($_POST['salary']) : NULL;

        $sql = "INSERT INTO users (name, email, birthdate, salary) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            die("Error preparing statement: " . $conn->error);
        }

       
        $stmt->bind_param("sssd", $name, $email, $birthdate, $salary);

     
        if ($stmt->execute()) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $stmt->error;
        }

      
        $stmt->close();
    } else {
        echo "Error: Missing POST data for name or email";
    }
} else {
    echo "Error: Invalid request method";
}

$conn->close();
?>
