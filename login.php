<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Now</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <form action="logintrial.php" method="POST">

    <h1>Login Now</h1>

    <!-- Full Name: <input type="text" name="flname" required> -->
    Email: <input type="email" name="email" required>
    <!-- Contact: <input type="text" name="contact" required> -->
    Password: <input type="password" name="pswd" required> 

    <button type="submit" name="login" value="Login">Login</button>
    <p>Don't have an account yet! <a href="register.php">Register Now</a></p>
    </form>
    </div>
    
</body>
</html>