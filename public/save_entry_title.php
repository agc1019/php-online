<?php
include('./connection.php');

session_start(); // Ensure the session is started

// Check if collection_id is set in the session
if (!isset($_SESSION['collection_id'])) {
    echo json_encode(['error' => 'No collection ID in session']);
    exit;
}

$collection_id = $_SESSION['collection_id'];

// Prepare SQL query to prevent SQL injection
$sql = $conn->prepare("SELECT * FROM collection_titles WHERE collection_id = ? ORDER BY collection_id DESC");
$sql->bind_param('i', $collection_id); // Assuming collection_id is an integer
$sql->execute();
$result = $sql->get_result();

$options = array();

if ($result->num_rows > 0) {
    // Fetch data
    while ($row = $result->fetch_assoc()) {
        $options[] = $row;
    }
} else {
    echo json_encode(['error' => 'No results found']);
    exit;
}

// Close the statement and connection
$sql->close();
$conn->close();

// Set content type to JSON and return data
header('Content-Type: application/json');
echo json_encode($options);
?>