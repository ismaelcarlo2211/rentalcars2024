<!DOCTYPE html>
<html lang="en">
<?php
include "controler/config.php";


?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <title>home_admin</title>
</head>

<body>
    <div class="container">

        <!-- side bar -->
        <div class="sidebar">
            <div class="logo">
                <img src="images/isma.jpg" alt="">
                <h2>Admin</h2>
            </div>
            <!-- <hr> -->
            <div class="list">

                <a href="" class="acitive"><i class="fa fa-navicon"></i>Dashborad</a>

                <a href="asset/cars.php"><i class="fa fa-car"></i>Cars lits</a>
                <a href="asset/drivers.php"><i class="fa fa-fw fa-user"></i>Drivers</a>
                <a href="asset/users.php"><i class="fa fa-fw fa-user"></i>Users</a>
                <a href="asset/orders.php"><i class="fa fa-shopping-cart"></i>Reservation</a>
                <a href="asset/transaction.php"><i class="fa fa-shopping-cart"></i>Transaction</a>
                <a href="notification.php"><i class="fa fa-envelope"></i>notification</a>
                <a href="asset/messages.php"><i class="fa fa-envelope"></i>message</a>
                <a href="asset/report.php"><i class="fa fa-shopping-cart"></i>Report</a>
                <a href="asset/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>logout</a>
                <a href="asset/setting.php"><i class="fa fa-gear"></i>Setting</a>

            </div>

        </div>
        <!-- nav bar -->

        <!-- content  -->
        <div class="home">
            <div class="header">
                <div>
                    <h2>Car Rental Managment System</h2>
                </div>
                <div>
                    <h2>Account</h2>
                </div>

            </div>
            <div class="content">
                <H3>Dashborad</H3>
                <div class="listcards">

                    <!--  -->
                    <div class="card" id="cars">
                        <?php
                        $car = "SELECT count(*) as totalcar FROM cars_list";
                        $car = mysqli_query($conn, $car);
                        $rowcar = mysqli_fetch_assoc($car);
                        ?>
                        <i class="fa fa-car"></i>
                        <div class="title">Total Cars</div>
                        <div class="count"><?php echo $rowcar['totalcar']; ?></div>
                        <div class="link"><a href="asset/cars.php">View</a></div>
                    </div>
                    <!--  -->
                    <div class="card" id="users">
                        <?php
                        $users = "SELECT count(*) as totalusers FROM users";
                        $users = mysqli_query($conn, $users);
                        $rowuser = mysqli_fetch_assoc($users);
                        ?>
                        <i class="fa fa-car"></i>
                        <div class="title">Users</div>
                        <div class="count"><?php echo $rowuser['totalusers']; ?></div>
                        <div class="link"><a href="asset/users.php">View</a></div>
                    </div>
                    <!--  -->
                    <div class="card" id="drivers">
                        <?php
                        $drivers = "SELECT count(*) as totaldrivers FROM drivers";
                        $drivers = mysqli_query($conn, $drivers);
                        $rowdrivers = mysqli_fetch_assoc($drivers);
                        ?>
                        <i class="fa fa-car"></i>
                        <div class="title">Drivers</div>
                        <div class="count"><?php echo $rowdrivers['totaldrivers']; ?></div>
                        <div class="link"><a href="asset/drivers.php">View</a></div>
                    </div>
                    <!--  -->
                    <div class="card" id="orders">
                        <?php
                        $reservation = "SELECT count(*) as reservation FROM booking";
                        $reservation = mysqli_query($conn, $reservation);
                        $rowreservation = mysqli_fetch_assoc($reservation);
                        ?>
                        <i class="fa fa-shopping-cart"></i>
                        <div class="title">Total orders</div>
                        <div class="count"><?php echo $rowreservation['reservation']; ?></div>
                        <div class="link"><a href="asset/orders.php">View</a></div>
                    </div>
                    <!--  -->
                    <div class="card" id="appending">
                        <?php
                        $appending = "SELECT count(*) as appending FROM booking where status='Appending'";
                        $appending = mysqli_query($conn, $appending);
                        $rowappending = mysqli_fetch_assoc($appending);
                        ?>
                        <i class="fa fa-car"></i>
                        <div class="title">Appending</div>
                        <div class="count"><?php echo $rowappending['appending']; ?></div>
                        <div class="link"><a href="asset/orders.php">View</a></div>
                    </div>
                    <!--  -->
                    <div class="card" id="approved">
                        <i class="fa fa-car"></i>
                        <div class="title">Approved</div>
                        <div class="count">20</div>
                        <div class="link"><a href="">View</a></div>
                    </div>
                    <!--  -->
                    <div class="card" id="messages">
                        <i class="fa fa-envelope"></i>
                        <div class="title">Messages</div>
                        <div class="count">20</div>
                        <div class="link"><a href="">View</a></div>
                    </div>
                    <!--  -->
                    <div class="card" id="denied">
                        <i class="fa fa-car"></i>
                        <div class="title">Denied</div>
                        <div class="count">20</div>
                        <div class="link"><a href="">View</a></div>
                    </div>
                    <!--  -->
                    <div class="card" id="">
                        <i class="fa fa-car"></i>
                        <div class="title">Activity</div>
                        <div class="count">20</div>
                        <div class="link"><a href="">View</a></div>
                    </div>

                </div>

            </div>




        </div>

    </div>

</body>

</html>