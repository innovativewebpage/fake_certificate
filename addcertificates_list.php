<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json');
session_start();
include 'db.php';


$session_id = $_SESSION['user_id'];
$result = mysqli_query($connect, "SELECT id, filename FROM files WHERE p_id = '$session_id' ORDER BY uploaded_at DESC");
if (!$result) {
    echo json_encode(["error" => "Query failed: " . mysqli_error($connect)]);
    exit;
}

$files = [];
while ($row = mysqli_fetch_assoc($result)) {
    $files[] = $row;
}

echo json_encode($files);
?>
