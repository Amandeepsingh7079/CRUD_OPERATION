<?php 
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display PHP CRUD Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Display Data</h1>
    <a href="index.php">Back</a>
    
    <table border="1">
        <thead>
            <tr>
                <th>Sno</th>
                <th>Username</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch data from the database
            $display_data = mysqli_query($conn, "SELECT * FROM `phpcrud`");
            
            if(mysqli_num_rows($display_data) > 0) {
                $sno = 1; // Initialize serial number counter
                while($row = mysqli_fetch_assoc($display_data)) {
                    ?>
                    <tr>
                        <td><?php echo $sno++; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['mobile']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td>
                            <a href="update.php?id=<?php echo $row['id']; ?>">Update</a> |
                            <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='6'>No data found</td></tr>";
            }
            ?>
        </tbody>
    </table>
    
</body>
</html>
