<?php

include 'config.php';

if (isset($_GET['sortOption'])) {
    $sortOption = $_GET['sortOption'];
    $sql = "SELECT * FROM users";

    switch ($sortOption) {
        case 'asc':
            $sql .= " ORDER BY name ASC";
            break;
        case 'desc':
            $sql .= " ORDER BY name DESC";
            break;
        case 'newest':
            $sql .= " ORDER BY created_at DESC";
            break;
        case 'oldest':
            $sql .= " ORDER BY created_at ASC";
            break;
        default:
            $sql .= " ORDER BY created_at DESC"; 
            break; 
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
