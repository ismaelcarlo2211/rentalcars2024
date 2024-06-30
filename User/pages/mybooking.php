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
    <link rel="stylesheet" href="../css/mybooking.css">
    <link rel="stylesheet" href="../css/animation.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>mybooking </title>
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
                    <li><a href="carlist.php"><i class="fa fa-car"></i>Cars</a></li>
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
                    <li class="btndrop"><a class="active" href="#"><i class="fa fa-fw fa-user"></i>
                            <?php echo $_SESSION['email']; ?> ▼
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
            <h1 class="title">My Booking</h1>
            <div class="content">
                <?php
                include ("../controler/config.php");
                $email = $_SESSION['email'];
                $select = "SELECT *FROM booking WHERE email='$email'";
                $query = mysqli_query($conn, $select);
                // ---check if customer booked
                if (mysqli_num_rows($query) > 0) {

                    while ($row = mysqli_fetch_assoc($query)) {


                        ?>

                <div class="hidden" id="booking">
                    <!-- the class of this i tag contain the fetched Status in order to differentiente the color accordning to the status  -->


                            <div class="texte">
                                <h2 class="h2">Reservation</h2>
                                <h3>Car selected: <a href="">
                                        <?php echo $row['selected']; ?>
                                    </a></h3>

                                <h3>pekkdate: <a href="">
                                        <?php echo $row['peekdate']; ?>
                                    </a></h3>
                                <h3>dropdate: <a href="">
                                        <?php echo $row['dropdate']; ?>
                                    </a></h3>

                                <h3>days: <a href="">
                                        <?php echo $row['days']; ?>days
                                    </a></h3>
                                <h3>money to be paid: <a href="">
                                        <?php echo $row['to_be_paid']; ?> $
                                    </a></h3>
                                <h3>Driver: <a href="">
                                        <?php echo $row['driver']; ?> $
                                    </a></h3><br>
                                <span class="">Status: <i class="<?php echo $row['status']; ?>">
                                        <?php echo $row['status']; ?>
                                    </i></span>
                            </div>
                            <!-- ------------------------------------- -->
                            <div class="payemtmethod">
                                <h2 class="h2">Payment</h2>
                                <?php
                                $booking_id = $row['booking_id'];
                                $selecttrans = "SELECT *FROM transaction WHERE booking_id='$booking_id'";
                                $querytrans = mysqli_query($conn, $selecttrans);
                                $rowtra = mysqli_fetch_assoc($querytrans);
                                // -----------
                                if ($row['status'] == "Approved") {

                                    // *******
                                    if (mysqli_num_rows($querytrans) > 0) {
                                        // ##
                                        if ($rowtra['status'] == "Appending") {
                                            ?>
                                            <p>Click to <a href="payment.php?book_id=<?php echo $row['booking_id'];
                                            $_SESSION['book_id'] = $row['booking_id']; ?>"><button class="payment"
                                                        disabled>Add
                                                        payment</button></a></p>
                                            <span class="">Status: <i class="<?php echo $rowtra['status']; ?>">
                                                    <?php echo $rowtra['status']; ?>
                                                </i></span>
                                            <?php
                                        }
                                        // ##
                                        elseif ($rowtra['status'] == "Approved") {
                                            ?>
                                            <p>Click to <a href="payment.php?book_id=<?php echo $row['booking_id'];
                                            $_SESSION['book_id'] = $row['booking_id']; ?>"><button class="payment"
                                                        disabled>Add
                                                        payment</button></a></p>

                                            <span class="">Status: <i class="<?php echo $rowtra['status']; ?>">
                                                    <?php echo $rowtra['status']; ?>
                                                </i></span>

                                            <?php
                                        }
                                        // ##
                                        elseif ($rowtra['status'] == "Denied") {
                                            ?>
                                            <p>Click to <a href="payment.php?book_id=<?php echo $row['booking_id'];
                                            $_SESSION['book_id'] = $row['booking_id']; ?>"><button class="payment"
                                                        disabled>Add
                                                        payment</button></a></p>

                                            <span class="">Status: <i class="<?php echo $rowtra['status']; ?>">
                                                    <?php echo $rowtra['status']; ?>
                                                </i></span>

                                            <?php
                                        }

                                    }
                                    // *******
                                    else {
                                        ?>
                                        <p>You can add payment</p>
                                        <p>Click to <a href="payment.php?book_id=<?php echo $row['booking_id'];
                                        $_SESSION['book_id'] = $row['booking_id']; ?>"><button class="payment">Add
                                                    payment</button></a>
                                            <?php
                                    }
                                }
                                // -------------
                                elseif ($row['status'] == "Denied") {
                                    ?>

                                    <p>Click to <a href="payment.php"><button class="payment" disabled>Add
                                                payment</button></a></p>
                                    <p class="NB"> button disabled, your reservation has been denied</p>
                                    <?php
                                }
                                // -----------
                                elseif ($row["status"] == "Appending") {
                                    ?>
                                    <p>Click to <a href="payment.php"><button class="payment" disabled>Add
                                                payment</button></a></p>
                                    <p class="NB">This button is currently disabled until your Reservation is approved</p>
                                    <?php
                                }
                                ?>
                            </div>

                        </div>
                        <?php
                    }
                } else {
                    echo "did not book yet";
                }
                ?>
            </div>
        </div>

        <!-- -----------------------------------footer content ------------------------------->
        <?php
        include "footer.php";
        ?>
    </div>
    <script src="../js/header.js"></script>
    <script src="../js/animation.js"></script>
</body>


</html>