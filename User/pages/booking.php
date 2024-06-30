<?php

session_start();
if (isset($_SESSION['email']) == null) {
    header("location:login.php");
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/booking.css">
    <link rel="stylesheet" href="../css/animation.css">
    <title>bookingcar</title>
</head>

<body>
    <?php
    include "header.php";
    ?>
    <div class="body">


        <div class="content">
            <div class="carselected">
                <?php
                include "../controler/config.php";
                $idcar = $_GET['carselected'];
                $select = "SELECT *FROM cars_list where car_id='$idcar'";
                $result = mysqli_query($conn, $select);
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    ?>
                <div class="carimage">
                    <img src="../../Admin/images/<?php echo $row['car_image']; ?>" alt="">
                </div>
                <div class="cardtext">
                    <div class="carname">
                        <?php echo $row['car_name'];
                            $_SESSION['carid'] = $idcar; ?>
                    </div>
                    <div class="cartype">
                        Brand :
                        <?php echo $row['car_type']; ?>
                    </div>
                    <div class="carprice">
                        <?php echo $row['price_day']; ?>$ /Month
                    </div>
                    <div class="cartransmission">
                        <?php echo $row['transmission']; ?>
                    </div>
                    <div class="description">
                        <h3>description</h3>

                        daejnaernferfbvejberjfbjbnrjnfvsrvjbjrbt <br>
                        tgvsbtrrrbtrjbvrbvrtvrubsubutubvu<br>

                    </div>
                </div>
                <?php
                } else {
                    echo 'no record found';
                }
                ?>
            </div>
            <div class="clientinfo">
                <h2>Book Now</h2>
                <?php
                if (isset($_SESSION["error"])) {
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                }
                ?>
                <form action="../controler/booking_control.php" method="post">
                    <div class="selectdate">


                        Peek date :<input type="date" name="peekdate" required><br><br>

                        Return date:<input type="date" name="dropdate" required><br><br>

                        Driver : <select name="driver" id="">
                            <?php
                            include ("../controler/config.php");
                            $sql = "SELECT *FROM drivers";
                            $query = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($query) > 0) {
                                while ($row = mysqli_fetch_assoc($query)) {
                                    ?>
                            <option value="<?php echo $row['Full_name'] ?>"><?php echo $row['Full_name'] ?></option>
                            <?php
                                }
                            }
                            ?>

                        </select> <br>

                        Your Address in Goma: <textarea placeholder="" name="address" required></textarea><br><br>
                        ID Card: <input type="file"><br><br>

                    </div>


                    <button>Submit</button> <a href="carlist.php">Go to the bookin cars</a>
                </form>
            </div>
        </div>
    </div>
    <?php
    include "footer.php";
    ?>

    <script src="../js/header.js"></script>
    <script src="../js/animation.js"></script>
</body>

</html>