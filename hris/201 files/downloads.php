<?php
require_once("../include/connection.php");

if (isset($_GET['file_id'])) {
    $file = $_GET['file_id'];

    // Validate the file name to prevent directory traversal
    $file = basename($file);

    $file_path = '../uploads/' . $file;

    if (file_exists($file_path)) {
        // Set headers for file download
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . $file);
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file_path));

        // Update download count in the database
        $sql = "UPDATE upload_files SET DOWNLOAD = DOWNLOAD + 1 WHERE NAME = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $file);
        $stmt->execute();

        // Read and output the file contents
        readfile($file_path);
        exit;
    } else {
        echo "File not found.";
    }
} else {
    echo "Invalid file request.";
}
?>
