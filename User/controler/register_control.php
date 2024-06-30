<?php
include "config.php";
session_start();

if (isset($_POST['register'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone_no = $_POST['phone_no'];
    $image = $_POST['image'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    $selectemail = "SELECT * FROM users WHERE email='$email'";
    $selectquery = mysqli_query($conn, $selectemail);

    if (empty($username) || empty($email) || empty($phone_no) || empty($password) || empty($cpassword)) {
        $_SESSION['error'] = '<div style="color: #af4242;background-color:#fde8ec; font-weight:bold;font-size:20px;">No empty field</div>';
        header("location:../pages/signup.php");
    } else if ($password != $cpassword) {
        $_SESSION['error'] = '<div style="color: #af4242;background-color:#fde8ec; font-weight:bold;font-size:20px;">the two password should match</div>';
        header("location:../pages/signup.php");

    } else if (mysqli_num_rows($selectquery) > 0) {
        $_SESSION['error'] = '<div style="color: #af4242;background-color:#fde8ec; font-weight:bold;font-size:20px;">email exist already</div>';
        header("location:../pages/signup.php");
    } else {
        $sql = "INSERT INTO users(names,Email,phone_number,password)values('$username','$email','$phone_no','$password')";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            $_SESSION['error'] = '<div style="color: white;background-color:green; font-weight:bold;font-size:20px;">created, please login</div>';
            header("location:../pages/login.php");
        } else {
            echo "failed";
        }
    }

}
// ---------------------------------------------
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $selectemail = "SELECT * FROM users WHERE email='$email'";
    $selectemailpass = "SELECT * FROM users WHERE email='$email' && password='$password'";
    $query1 = mysqli_query($conn, $selectemail);
    $query2 = mysqli_query($conn, $selectemailpass);
    if (mysqli_num_rows($query1) > 0) {
        if (mysqli_num_rows($query2) > 0) {


            $_SESSION['email'] = $email;
            header("location:../../index.php");

        } else {

            $_SESSION['error'] = '<div style="color: #af4242;background-color:#fde8ec; font-weight:bold;font-size:20px;">wrong email or password</div>';
            header("location:../pages/login.php");
        }
    } else
        if ($email == "admin" && $password) {
            header("location:../../Admin");
        } else {

            $_SESSION['error'] = '<div style="color: #af4242;background-color:#fde8ec; font-weight:bold;font-size:20px;">you dont have an account, register first</div>';
            header("location:../pages/login.php");
        }

}


?>