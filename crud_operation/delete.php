<?php
// Include database connection
include 'connect.php';

// Check if ID is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare the DELETE query
    $delete_query = "DELETE FROM `phpcrud` WHERE id = $id";

    // Execute the query
    if (mysqli_query($conn, $delete_query)) {
        // Redirect to the display page after successful deletion
        header("Location: display.php");
        exit(); // Stop further execution
    } else {
        // If deletion failed, display an error message
        echo "Error: " . mysqli_error($conn);
    }
} else {
    // If no ID is provided, redirect back to the display page
    header("Location: display.php");
    exit();
}
?>
