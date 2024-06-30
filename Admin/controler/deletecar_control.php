<?php
session_start();
include ("config.php");
if (isset($_GET['deid'])) {


    // get id form cars.php using get method
    $deleteid = $_GET['deid'];
    $sql = "DELETE from cars_list where car_id='$deleteid '";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $_SESSION['error'] = '<div style="color: white; background-color:green;padding: 10px;font-weight:bold;font-size:20px;">Deleted succesfully</div>';
        header("location:../asset/cars.php");
    } else {
        $_SESSION['error'] = '<div style="color: #af4242; background-color:#fde8ec;padding: 10px;font-weight:bold;font-size:20px;">Deleted failed</div>';
        header("location:../asset/cars.php");
    }
} else{
    $_SESSION['error'] = '<div style="color: #af4242; background-color:#fde8ec;padding: 10px;font-weight:bold;font-size:20px;">access denied</div>';
    header("location:noidfound.php");
}

?>