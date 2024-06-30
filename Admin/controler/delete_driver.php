<?php

include ("config.php");
if (isset($_GET['deid'])) {

    $driver_id = $_GET['deid'];
    $sql = "DELETE from drivers WHERE Driver_id='$driver_id'";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        $_SESSION['error'] = '<div style="color: white; background-color:green;padding: 10px;font-weight:bold;font-size:20px;">Deleted succesfuly</div>';
        header('location:../asset/drivers.php');
    } else {
        $_SESSION['error'] = '<div style="color: #af4242; background-color:#fde8ec;padding: 10px;font-weight:bold;font-size:20px;">Deleted failed</div>';
        header('location:../asset/drivers.php');
        // }
    }
}

else{
    $_SESSION['error'] = '<div style="color: #af4242; background-color:#fde8ec;padding: 10px;font-weight:bold;font-size:20px;">access denied</div>';
    header("location:noidfound.php");
}
?>