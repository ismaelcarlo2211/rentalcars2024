<?php
include "config.php";
session_start();

if (isset($_GET['denyid'])) {
    $denyid = $_GET['denyid'];
    $status = "Denied";
    $update = "UPDATE booking SET status='$status' WHERE booking_id='$denyid'";
    $query = mysqli_query($conn, $update);

    if ($query) {
        header("location:../asset/orders.php");
    }


}
else{
    $_SESSION['error'] = '<div style="color: #af4242; background-color:#fde8ec;padding: 10px;font-weight:bold;font-size:20px;">access denied</div>';
    header("location:noidfound.php");
}
?>