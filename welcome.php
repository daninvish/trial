<?php
session_start();

// if (!isset($_SESSION['email'])) {
//     header('Location: login.php');
//     exit();
// }else{
//     echo "Welcome to the protected page! ";
// }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <link rel="stylesheet" href="style.css">
</head>
<>
    <h2>Welcome to the protected page!</h2>
    <p>You are successfully logged in.</p><br>
    <p>Click here to logout <a href="logout.php">
        <button class="logt" type="submit" name="logout" >Logout</button></a></p>
</body>
</html>
