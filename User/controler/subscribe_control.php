<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'rental_car';
$conn = mysqli_connect($host, $user, $pass, $dbname);

if (isset($_POST['subscribe'])) {


    $email = $_POST['email'];

    $select = "SELECT *FROM subscribers WHERE email='$email'";
    $queryselect = mysqli_query($conn, $select);
    if (mysqli_num_rows($queryselect) > 0) {
        echo "you're already a member";
    } else
        if (!empty($email)) {


            $sql = "INSERT INTO subscribers(email)values('$email')";
            $query = mysqli_query($conn, $sql);

            if ($query) {
                echo "success";
            }
        } else {
            echo "no empty field";
        }
}
?>