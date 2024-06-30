<?php
include "config.php";
session_start();

if (isset($_POST['update'])) {
    $emailuser = $_SESSION['email'];

    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone_no = $_POST['phone_no'];
    $password = $_POST['password'];


    if (empty($username) || empty($email) || empty($phone_no) || empty($password)) {
        $_SESSION['error'] = '<div style="color: #af4242;background-color:#fde8ec; font-weight:bold;font-size:20px;">No empty field</div>';
        header("location:../pages/profile.php");
    } else {
        $sql = "UPDATE users set names='$username',Email='$email',phone_number='$phone_no',password='$password' WHERE email='$emailuser'";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            $_SESSION['error'] = '<div style="color: white;background-color:green; font-weight:bold;font-size:20px;">updated</div>';
            $_SESSION['email'] = $email; //to avoid old session of email to be disconected
            header("location:../pages/profile.php");
        } else {
            echo "failed";
        }
    }
}


?>