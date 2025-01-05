<?php
// Include database connection
include 'connect.php';

// Check if ID is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Fetch the current data for the provided ID
    $get_data = mysqli_query($conn, "SELECT * FROM `phpcrud` WHERE id = $id");
    if (mysqli_num_rows($get_data) == 1) {
        $row = mysqli_fetch_assoc($get_data);
    } else {
        echo "Record not found!";
        exit();
    }
} else {
    // If no ID is provided, redirect to the display page
    header("Location: display.php");
    exit();
}

// Check if the form is submitted to update the data
if (isset($_POST['update'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];

    // Update query to modify the record in the database
    $update_query = "UPDATE `phpcrud` SET username = '$username', email = '$email', mobile = '$mobile', address = '$address' WHERE id = $id";
    
    // Execute the query and check if successful
    if (mysqli_query($conn, $update_query)) {
        // Redirect to the display page after successful update
        header("Location: display.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Update Data</h1>

    <!-- Update form -->
    <form action="update.php?id=<?php echo $id; ?>" method="post">
        <input type="text" autocomplete="off" name="username" value="<?php echo $row['username']; ?>" required>
        <input type="email" autocomplete="off" name="email" value="<?php echo $row['email']; ?>" required>
        <input type="number" autocomplete="off" name="mobile" value="<?php echo $row['mobile']; ?>" required>
        <input type="text" autocomplete="off" name="address" value="<?php echo $row['address']; ?>" required>
        <input type="submit" class="btn" name="update" value="Update">
    </form>

    <br>
    <a href="display.php">Back to Data</a>
</body>
</html>
