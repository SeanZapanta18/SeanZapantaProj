<?php
require_once("../include/connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['file_id'])) {
    $fileToDelete = $_GET['file_id']; // Get the file name to delete

    // Fetch file details from the database
    $getFileDetails = "SELECT * FROM upload_files WHERE NAME = ?";
    $stmt = $conn->prepare($getFileDetails);
    $stmt->bind_param("s", $fileToDelete);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $fileDetails = $result->fetch_assoc();
        $filePath = '../uploads/' . $fileDetails['NAME']; // Path to the file in the directory

        // Check if the file exists in the directory
        if (file_exists($filePath)) {
            // Delete the file from the directory
            if (unlink($filePath)) {
                // Delete the entry from the database
                $deleteQuery = "DELETE FROM upload_files WHERE NAME = ?";
                $stmt = $conn->prepare($deleteQuery);
                $stmt->bind_param("s", $fileToDelete);
                if ($stmt->execute()) {
                    // Redirect back to the user_files.php page after successful deletion
                    header("Location: user_files.php?uploader=" . urlencode($fileDetails['UPLOADER']));
                    exit();
                } else {
                    echo "Error deleting file entry from the database.";
                }
            } else {
                echo "Error deleting the file from the directory.";
            }
        } else {
            echo "File not found in the directory.";
        }
    } else {
        echo "File details not found in the database.";
    }
} else {
    echo "Invalid request.";
}
?>
