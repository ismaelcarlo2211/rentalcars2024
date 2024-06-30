<?php
include "config.php";
session_start();

$booking_id = $_SESSION['book_id'];
$name = $_POST['name'];
$card = $_POST['card_no'];
$price = $_POST['price'];
$status = "Appending";

$sql = "INSERT INTO transaction(name_on_card,credit_card,paid,booking_id,status)values('$name','$card','$price','$booking_id','$status')";

$query = mysqli_query($conn, $sql);
if ($query) {
    echo "inserted succefully";
}


?>