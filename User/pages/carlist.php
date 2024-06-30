<?php
include ("../controler/config.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/header.scss">
    <link rel="stylesheet" href="../css/carlist.scss">
    <link rel="stylesheet" href="../css/animation.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>home_user </title>
</head>

<body>
    <div class="container">
        <!---------------------------------- header content----------------------------------->
        <div class="" id="header">
            <div class="logo">
                <div>
                    <img src="../icons/icons8-car-50.png" alt="">
                </div>
                <div>
                    <h3>Rental car</h3>
                </div>
                <div class="toggle">
                    <img class="menu" src="../icons/menu.png" alt="">
                </div>
            </div>

            <nav>
                <ul>
                    <li><a href="../../index.php"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
                    <li><a class="active" href="carlist.php"><i class="fa fa-car"></i>Cars</a></li>
                    <li><a href="contact_us.php"><i class="fa fa-info-circle" aria-hidden="true"></i>Contact
                            us</a></li>
                    <li><a href="about_us.php"><i class="fa fa-info-circle" aria-hidden="true"></i>About</a>
                    </li>
                    <?php
                    if (isset($_SESSION['email']) == null) {
                        ?>
                    <li><a href="login.php">login</a></li>
                    <li><a href="signup.php">register</a> </li>
                    <?php
                    } else {
                        ?>
                    <li class="btndrop"><a href="#"><i class="fa fa-fw fa-user"></i>
                            <?php echo $_SESSION['email']; ?>
                            ▼
                        </a>
                        <ul class="dropdown">
                            <li><a href="profile.php">profile</a></li>
                            <li><a href="mybooking.php">mybooking</a></li>

                            <li><a href="#">help</a></li>
                            <li><a href="../controler/logout.php">logout</a></li>

                        </ul>
                    </li>
                    <?php
                    }
                    ?>


                </ul>

            </nav>

        </div>
        <!----------------------------------- body content ----------------------------->
        <div class="body">
            <h1 class="title">LIST OF THE CARS </h1>
            <div class="container">
                <div class="listcards">
                    <?php

                    $select = "SELECT *FROM cars_list";
                    $query = mysqli_query($conn, $select);
                    $check = mysqli_num_rows($query);

                    if ($check > 0) {
                        while ($row = mysqli_fetch_assoc($query)) {
                            ?>
                    <div class="hidden" id="card">
                        <div class="carimage">
                            <img src="../../Admin/images/<?php echo $row['car_image']; ?>" alt="">
                        </div>
                        <div class="cardtext">
                            <div class="carname">
                                <?php echo $row['car_name']; ?>
                            </div>
                            <div class="cartype">
                                Brand :
                                <?php echo $row['car_type']; ?>
                            </div>
                            <div class="carprice">
                                <?php echo $row['price_day']; ?>$ /Day
                            </div>
                            <div class="cartransmission">
                                <?php echo $row['transmission']; ?>
                            </div>

                        </div>
                        <div class="rentlink"><a href="booking.php?carselected=<?php echo $row['car_id']; ?>">Rent
                                Now</a>
                        </div>
                    </div>
                    <?php

                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <!-- -----------------------------------footer content ------------------------------->
        <?php
        include "footer.php";
        ?>
        <!---------->
    </div>
    <script src="../js/header.js"></script>
    <script src="../js/animation.js"></script>
</body>


</html>