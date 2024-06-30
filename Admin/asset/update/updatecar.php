<?php
session_start();
include ("../../controler/config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/newcar.css">
    <title>new-car</title>
</head>

<body>

    <div class="container">
        <h2>Update Car</h2>
        <?php
        if (isset($_SESSION["error"])) {
            echo $_SESSION['error'];
            unset($_SESSION['error']);
        }

        ?>
        <div class="content">

            <?php

            if (isset($_GET['upid'])) {
                // fetch
                $updateid = $_GET['upid'];
                $fetch = "SELECT *from cars_list where car_id='$updateid'";
                $result = mysqli_query($conn, $fetch);
                $row = mysqli_fetch_assoc($result);

                // this will helps to get id selected because it will ne contreled in the other folder 
                $_SESSION['updid'] = $updateid;

                ?>
            <form action="../../controler/updatecar_control.php" method="post" enctype="multipart/form-data">
                Name:<input type="text" name='carname' value="<?php echo $row['car_name']; ?>"><br>
                Type:<input type="text" name='cartype' value="<?php echo $row['car_type']; ?>"><br>
                Image:<input required type="file" name='carimage'><br>
                Price/month:<input type="text" name='carprice' value="<?php echo $row['price_day']; ?>"><br>
                Transmission:<input type="text" name='cartransmission' value="<?php echo $row['transmission']; ?>"><br>
                <input type="submit" name="update" id="" value='Update'> <a href="../cars.php">View cars</a>

                <?php


            } else {
                $_SESSION['error'] = '<div style="color: #af4242; background-color:#fde8ec;padding: 10px;font-weight:bold;font-size:20px;">No id selected</div>';

            }

            ?>


            </form>
        </div>
    </div>

</body>

</html>