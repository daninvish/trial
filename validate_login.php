<?php
session_start();

if (isset($_POST['submit'])) {

    // Database connection
   include "connection.php";
    // Check connection
    if ($con->connect_error) {
        die('Connection failed: ' . $con->connect_error);
    }

    // Get user inputs
    $email = $_POST['email'];
    $passward = $_POST['pswd'];
    // $passward = password_hash($_POST['pswd'], PASSWORD_DEFAULT);

    // Prepare the SQL statement
    $statement = $con->prepare('SELECT id, passward FROM tblregister WHERE email = ?');
    if (!$statement) {
        die('Prepare statement failed: ' . $con->error);
    }

    // Bind parameters
    $statement->bind_param('s', $email);


    // Execute the statement
    if (!$statement->execute()) {
        die('Execute statement failed: ' . $statement->error);
    }

    // Store the result
    $statement->store_result();

    // Check if user exists
    if ($statement->num_rows > 0) {
        // Bind the result
        $statement->bind_result($id, $hashed_password);
        $statement->fetch();

        // Verify the password
        if (password_verify($passward, $hashed_password)) {
            // Password is correct, set the session
            $_SESSION['user_id'] = $id;
            header('Location: welcome.php');
            exit();
        } else {
            // Invalid password
            echo "Invalid password. please try again";
            header('Refresh: 2; URL=login.php');
        }
    } else {
        // No user found with that email
        echo "No user found with that email.";
    }

    // Close the statement and connection
    $statement->close();
    $con->close();
} else {
    echo "Submit button not clicked.";
}
?>
