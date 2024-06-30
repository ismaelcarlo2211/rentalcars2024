<?php
session_start();
include ("config.php");
if (isset($_GET['deleid'])) {
    

    $booking = $_GET['deleid'];
    $sql = "DELETE from booking WHERE booking_id='$booking'";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        $_SESSION['error'] = '<div style="color: white; background-color:green;padding: 10px;font-weight:bold;font-size:20px;">Deleted succesfuly</div>';
        header('location:../asset/orders.php');
    } else {
        $_SESSION['error'] = '<div style="color: #af4242; background-color:#fde8ec;padding: 10px;font-weight:bold;font-size:20px;">Deleted failed</div>';
        header('location:../asset/orders.php');
        // }
    }
}
else{
    $_SESSION['error'] = '<div style="color: #af4242; background-color:#fde8ec;padding: 10px;font-weight:bold;font-size:20px;">access denied</div>';
    header("location:noidfound.php");
}
?>