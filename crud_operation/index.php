<?php include 'connect.php';

if(isset($_POST['submit']))
{
$username=$_POST['name'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$address=$_POST['address'];

$sql = "INSERT INTO phpcrud (username,email,mobile,address) VALUES ('$username', '$email', '$mobile','$address')";
$result=mysqli_query($conn,$sql);
if($result){
    echo "inserted successfully";
    header('location:display.php');

}
else{
    echo "not inserted";
}


}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD OPERATION</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   <h1>PHP CRUD</h1>
   <a href="display.php">View Data</a>
   <form action="" method="post">
    <input type="text"placeholder="Enter your name" autocomplete="off" name="name">
    <input type="email"placeholder="Enter your email" autocomplete="off" name="email">
    <input type="number"placeholder="Enter your phone"  autocomplete="off" name="mobile">
    <input type="text"placeholder="Enter your address" autocomplete="off" name="address">
    <input type="submit" class="btn" name="submit">
   
</form>
</body>
</html>