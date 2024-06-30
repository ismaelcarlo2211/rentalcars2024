<?php
include ("config.php");
session_start();
if (isset($_POST["add"])) {
    $car_name = $_POST['carname'];
    $car_type = $_POST['cartype'];
    $car_price = $_POST['carprice'];
    $car_transmission = $_POST['cartransmission'];


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
        header('location:../asset/new/newcar.php');
    } else {

        if (in_array($typeFile, $format)) {

            move_uploaded_file($tmpfile, $folder . $filename);

            $insert = "INSERT INTO cars_list(car_id,car_name,car_type,car_image,price_day,transmission,Date_ins)values('','$car_name','$car_type','$filename','$car_price','$car_transmission','')";
            $query = mysqli_query($conn, $insert);

            if ($query) {
                $_SESSION['error'] = '<div style="color: white; background-color:green;padding: 10px;font-weight:bold;font-size:20px;">Added succesfuly</div>';
                header('location:../asset/new/newcar.php');
                // success meesage



            } else {

                // faile meesage
                $_SESSION['error'] = '<div style="color: #af4242; background-color:#fde8ec;padding: 10px;font-weight:bold;font-size:20px;">Not inserted</div>';
                header('location:../asset/new/newcar.php');
            }
        } else {
            // faile meesage
            $_SESSION['error'] = '<div style="color: #af4242; background-color:#fde8ec;padding: 10px;font-weight:bold;font-size:20px;">Wrong with your image</div>';
            header('location:../asset/new/newcar.php');
        }
    }
} else{
    $_SESSION['error'] = '<div style="color: #af4242; background-color:#fde8ec;padding: 10px;font-weight:bold;font-size:20px;">access denied</div>';
    header("location:noidfound.php");
}


?>
<div style=""></div>