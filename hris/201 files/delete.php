<?php
// Check if the ID parameter is present and numeric
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Include your database connection file
    require_once("../include/connection.php");

    // Sanitize the ID to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // SQL query to delete the record with the specified ID
    $query = "DELETE FROM employees WHERE id = $id";

    // Execute the query
    if (mysqli_query($conn, $query)) {
        echo "<script type='text/javascript'>alert('Deleted Record!');document.location='index.php'</script>";
    } else {
        // Error in deletion
        echo "Error deleting record: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    // If ID is not provided or not numeric
    echo "Invalid ID or ID not provided";
}
?>