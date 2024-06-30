<?php

include "config.php";

session_start();

// -----------
$idcar = $_SESSION['carid'];
$select = "SELECT *FROM cars_list where car_id='$idcar'";
$result = mysqli_query($conn, $select);
$row = mysqli_fetch_assoc($result);
$carname = $row['car_name'];


//-----
$email = $_SESSION['email'];
$selectuser = "SELECT *FROM users WHERE Email='$email'";
$resultuser = mysqli_query($conn, $selectuser);
$rowuser = mysqli_fetch_assoc($resultuser);

$fullname = $rowuser['names'];
$peekdate = $_POST['peekdate'];
$dropdate = $_POST['dropdate'];
$driver = $_POST['driver'];

// --------------------
$days1 = strtotime($dropdate) - strtotime($peekdate);
$days = round($days1 / 86400);
$address = $_POST['address'];

$status = "Appending";
$moneytobepaid = $days * $row['price_day'];


$sql = "INSERT INTO booking(booking_id,fullname,email,selected,peekdate,dropdate,driver,days,to_be_paid,addresss,status)
values('','$fullname','$email','$carname','$peekdate','$dropdate','$driver','$days','$moneytobepaid','$address','$status')";
$query = mysqli_query($conn, $sql);


if ($query) {
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/booking_control.css">
    <title>Document</title>
</head>

<body>
    <div class="success">
        <p>Your reservation has been sent successfully</p>
        <p>Days: <?php echo $days ?></p>
        <p>Money to be paid :<?php echo $moneytobepaid ?>$</p>
        <p><a href="../pages/carlist.php">Click here </a> to view cars list</p>
    </div>
</body>

</html>

<?php

}

?>