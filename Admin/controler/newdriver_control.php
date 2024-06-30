<?php
include ("config.php");
session_start();

if (isset($_POST['add'])) {

    $driveId = $_POST['driveid'];
    $fullname = $_POST['fullname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $maritial = $_POST['maritial'];
    $licence_no = $_POST['licenceno'];


    $address = $_POST['address'];
        $phone_no = $_POST['phone_no'];
        $email = $_POST['email'];
    // images config

    $folder = '../images/';
    $filename = $_FILES['licenceimg']['name'];
    $tmpfile = $_FILES['licenceimg']['tmp_name'];
    $typeFile = explode(".", $filename)[1];

    $format = array("jpg", "png", "gif", "jpeg", 'bpm');

    if (in_array($typeFile, $format)) {

        move_uploaded_file($tmpfile, $folder . $filename);
        

        $sql = "INSERT INTO drivers(Driver_id,Full_name,Age,gender,Maritial_status,Driving_licence_no,licence_img,address,phone_number,email)
    values('$driveId','$fullname','$age','$gender','$maritial','$licence_no','$filename','$address','$phone_no','$email')";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            $_SESSION['error'] = '<div style="color: white; background-color:green;padding: 10px;font-weight:bold;font-size:20px;">Added succesfuly</div>';
            header('location:../asset/new/newdriver.php');
        } else {
            $_SESSION['error'] = '<div style="color: #af4242; background-color:#fde8ec;padding: 10px;font-weight:bold;font-size:20px;">Not inserted</div>';
            header('location:../asset/new/newdriver.php');
        }
    }
    else{
        $_SESSION['error'] = '<div style="color: #af4242; background-color:#fde8ec;padding: 10px;font-weight:bold;font-size:20px;">Wrong with your image</div>';
        header('location:../asset/new/newdriver.php');
    }
}
else{
    $_SESSION['error'] = '<div style="color: #af4242; background-color:#fde8ec;padding: 10px;font-weight:bold;font-size:20px;">access denied</div>';
    header("location:noidfound.php");
}

?>