<?php
include "connection.php";

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $passward = password_hash($_POST['pswd'], PASSWORD_DEFAULT );

    $sql = "select * from tblregister where email='$email'";

    $res = mysqli_query($con, $sql);

    if (mysqli_num_rows($res) > 0) {

        $row = mysqli_fetch_assoc($res);

        $password = $row['passward'];

        $decrypt = password_verify($password, $passward);


        if ($decrypt) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['fullname'] = $row['fullname'];

            echo "Login succesfully";
            header("location: welcome.php");


        } else {
            echo "<div class='message'>
                    <p>Wrong Password</p>
                    </div><br>";

                 
                    echo "Login Failed";
                    header("location: login.php");
                    
        }

    } else {
        echo "<div class='message'>
                    <p>Wrong Email or Password</p>
                    </div><br>";

        // echo "<a href='login.php'><button class='btn'>Go Back</button></a>";
        header("location: login.php");

    }

}else{
    echo "Click on the login buuton";
}
?>