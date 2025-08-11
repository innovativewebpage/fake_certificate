<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $result = mysqli_query($connect, "SELECT filename, filedata, filetype FROM files WHERE id = $id");

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        header("Content-Type: " . $row['filetype']);
        header("Content-Disposition: attachment; filename=\"" . $row['filename'] . "\"");
        echo $row['filedata'];
    } else {
        echo "File not found.";
    }
}
?>
