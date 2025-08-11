<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $query = "DELETE FROM files WHERE id = $id";
    if (mysqli_query($connect, $query)) {
        echo "File deleted successfully.";
    } else {
        echo "Error deleting file: " . mysqli_error($connect);
    }
} else {
    echo "No file ID provided.";
}
?>
