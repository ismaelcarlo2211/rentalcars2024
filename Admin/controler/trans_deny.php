<?php
include "config.php";
session_start();
if (isset($_GET['trans_id'])) {
    $trans_id = $_GET['trans_id'];
    $status = "Denied";
    $update = "UPDATE transaction SET status='$status' WHERE trans_id='$trans_id'";
    $query = mysqli_query($conn, $update);
    if ($query) {
        echo "success";
    }
}
?>