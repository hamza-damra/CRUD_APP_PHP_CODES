<?php
 include 'config.php';
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
