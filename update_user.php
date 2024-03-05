<?php

include 'config.php';

if (isset($_POST['id'], $_POST['name'], $_POST['email'], $_POST['birthdate'], $_POST['salary'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $birthdate = $_POST['birthdate']; 
    $salary = $_POST['salary']; 

    $sql = "UPDATE users SET name=?, email=?, birthdate=?, salary=? WHERE id=?";
    $stmt = $conn->prepare($sql);


    if (!$stmt) {
        echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
    } else {
        $stmt->bind_param("sssdi", $name, $email, $birthdate, $salary, $id);

        if ($stmt->execute()) {
            echo "User updated successfully";
        } else {
            echo "Failed to update user: " . $stmt->error;
        }

        $stmt->close();
    }
} elseif (isset($_GET['sortOption'])) {
    $sortOption = $_GET['sortOption'];

    $sql = "SELECT * FROM users";

    switch ($sortOption) {
        case 'asc':
            $sql .= " ORDER BY birthdate ASC";
            break;
        case 'desc':
            $sql .= " ORDER BY birthdate DESC";
            break;
        default:
            $sql .= " ORDER BY birthdate ASC";
    }

    $result = $conn->query($sql);

    if ($result) {
        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        echo json_encode($rows);
    } else {
        echo "Error executing query: " . $conn->error;
    }
} else {
    echo "Required parameters are missing";
}

$conn->close();

?>
