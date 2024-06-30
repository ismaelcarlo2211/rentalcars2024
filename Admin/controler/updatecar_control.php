<?php
include ("config.php");
include ("../asset/update/updatecar.php");
session_start();

if (isset($_POST['update'])) {
    $car_name = $_POST['carname'];
    $car_type = $_POST['cartype'];
    $car_price = $_POST['carprice'];
    $car_transmission = $_POST['cartransmission'];

    // this is declared from updatecar, it helps to update the id selected
    $updateid = $_SESSION['updid'];



    // images config

    $folder = '../images/';
    $filename = $_FILES['carimage']['name'];
    $tmpfile = $_FILES['carimage']['tmp_name'];
    $typeFile = explode(".", $filename)[1];

    $format = array("jpg", "png", "gif", "jpeg", 'bpm');

    if (empty($car_name) || empty($car_type) || empty($car_price) || empty($car_transmission)) {

        $_SESSION['error'] =
            // faile meesage
            '<div style="color: #af4242; background-color:#fde8ec;padding: 10px;
            font-weight:bold;font-size:20px;">All field required</div>';
    } else {
        if (in_array($typeFile, $format)) {
            move_uploaded_file($tmpfile, $folder . $filename);

            $update = "UPDATE cars_list set car_name='$car_name',car_type='$car_type',car_image='$filename',price_month='$car_price',transmission='$car_transmission' where id='$updateid '";
            $query = mysqli_query($conn, $update);
            if ($query) {
                $_SESSION['error'] = '<div style="color: white; background-color:green;padding: 10px;font-weight:bold;font-size:20px;">Updated succesfuly</div>';
                header('location:../asset/cars.php');
            } else {
                // faile meesage
                $_SESSION['error'] = '<div style="color: #af4242; background-color:#fde8ec;padding: 10px;font-weight:bold;font-size:20px;">failed</div>';
                header('location:../asset/cars.php');
            }
        }

    }
} else{
    $_SESSION['error'] = '<div style="color: #af4242; background-color:#fde8ec;padding: 10px;font-weight:bold;font-size:20px;">access denied</div>';
    header("location:noidfound.php");
}
?>