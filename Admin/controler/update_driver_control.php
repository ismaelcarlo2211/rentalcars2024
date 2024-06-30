<?php
include ("config.php");
session_start();

if (isset($_POST['update'])) {

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
        $update="UPDATE drivers set Driver_id='$driveId',Full_name='$fullname',Age='$age',gender='$gender'
        ,Maritial_status='$maritial',Driving_licence_no='$licence_no',
        licence_img='$filename',address='$address',phone_number='$phone_no',email='$email' where Driver_id='$driveId'";
        
        $result=mysqli_query($conn,$update);
        if($result){
            $_SESSION['error'] = '<div style="color: white; background-color:green;padding: 10px;font-weight:bold;font-size:20px;">Updated succesfuly</div>';
            header('locatIon:../asset/drivers.php');
        }
        

       
    }
}
else{
    $_SESSION['error'] = '<div style="color: #af4242; background-color:#fde8ec;padding: 10px;font-weight:bold;font-size:20px;">access denied</div>';
    header("location:noidfound.php");
}
?>