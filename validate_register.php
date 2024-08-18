<?php

if (isset($_POST['submit'])) {

    include "connection.php"; 
    
    $fullname = $_POST['flname'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $passward = ($_POST['pswd']);
    // $passward = password_hash($_POST['pswd'], PASSWORD_DEFAULT);

    if ($con->connect_error) {
        die('Connection failed : ' . mysqli_connect_errno());
    } else {

        $statement = $con->prepare('INSERT INTO tblregister(fullname, email, contact, passward) 
                                    VALUES(?,?,?,?)');

        $statement->bind_param("ssis", $fullname, $email, $contact, $passward);
        $statement->execute();
        $statement->close();
        $con->close();
        echo "Data inserted successfully";

        header('Refresh: 2; URL=login.php');
        exit();
    }


}
?>