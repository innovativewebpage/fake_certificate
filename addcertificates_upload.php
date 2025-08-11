<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include 'db.php';

$session_id = $_SESSION['user_id'];
$qry = mysqli_query($connect, "SELECT * FROM register WHERE p_id = '$session_id'");
if (!$qry) {
    die("Query failed: " . mysqli_error($conn));
}
$row = mysqli_fetch_assoc($qry);

$p_id = $row['p_id'];
$reg_id = $row['reg_id'];

if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {


    $filename = mysqli_real_escape_string($connect, $_FILES['file']['name']);
    $filetype = mysqli_real_escape_string($connect, $_FILES['file']['type']);
    $filedata = mysqli_real_escape_string($connect, file_get_contents($_FILES['file']['tmp_name']));

    $sql = "INSERT INTO files (p_id,reg_id,filename, filedata, filetype) VALUES ('$p_id','$reg_id','$filename', '$filedata', '$filetype')";
    
    if (mysqli_query($connect, $sql)) {
        echo "File uploaded successfully!";
    } else {
        echo "Upload failed: " . mysqli_error($connect);
    }
} else {
    echo "No file received or upload error.";
}
?>
