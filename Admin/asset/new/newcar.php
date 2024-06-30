<?php
session_start();
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
        <h2>Add new Car</h2>
        <?php
        if (isset($_SESSION["error"])) {
            echo $_SESSION['error'];
            unset($_SESSION['error']);
        }
        ?>
        <div class="content">
            <form action="../../controler/newcar_control.php" method="post" enctype="multipart/form-data">
                Name:<input type="text" name='carname' placeholder='Enter the Car name'><br>
                Type:<input type="text" name='cartype' placeholder='Enter the Car type'><br>
                Image:<input type="file" name='carimage'><br>
                Price/DAy:<input type="text" name='carprice' placeholder='Enter the Car price/Day'><br>
                Transmission:<input type="text" name='cartransmission' placeholder='Manual/Automatic'><br>
                <input type="submit" name="add" id="" value='Add'> <a href="../cars.php">View cars</a>
            </form>
        </div>
    </div>

</body>

</html>