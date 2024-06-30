<?php
session_start();
include "../controler/config.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/sidebar.css">
    <link rel="stylesheet" href="../css/subcriber.css">
    <link rel="stylesheet" href="../css/table.css">

    <title>home_admin</title>
</head>

<body>
    <div class="container">
        <!-- side bar -->
        <div class="sidebar">
            <div class="logo">
                <img src="../images/isma.jpg" alt="">
                <h2>Admin</h2>
            </div>
            <!-- <hr> -->
            <div class="list">

                <a href="../index.php"><i class="fa fa-navicon"></i>Dashborad</a>

                <a href="cars.php"><i class="fa fa-car"></i>Cars lits</a>
                <a href="drivers.php"><i class="fa fa-fw fa-user"></i>Drivers</a>
                <a href="users.php"><i class="fa fa-fw fa-user"></i>Users</a>
                <a href="orders.php"><i class="fa fa-shopping-cart"></i>Reservation</a>
                <a href="transaction.php"><i class="fa fa-shopping-cart"></i>Transaction</a>
                <a href="subcriber.php" class="acitive"><i class="fa fa-book"></i>subcribers</a>
                <a href="messages.php"><i class="fa fa-envelope"></i>message</a>
                <a href="report.php"><i class="fa fa-shopping-cart"></i>Report</a>
                <a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>logout</a>
                <a href="setting.php"><i class="fa fa-gear"></i>Setting</a>

            </div>

        </div>
        <!-- nav bar -->

        <!-- content  -->
        <div class="home">
            <div class="header">
                <h2>Car Rental Managment System</h2>

            </div>

            <div class="content">
                <H3>SUBCRIBERS</H3>
                <div class="table">
                    <table>
                        <tr>
                            <th>id</th>
                            <th>email</th>
                            <th>date created</th>
                        </tr>
                        <?php
                        $select = "SELECT *FROM subscribers";
                        $query = mysqli_query($conn, $select);

                        if (mysqli_num_rows($query) > 0) {
                            while ($row = mysqli_fetch_assoc($query)) {
                                ?>
                        <tr>
                            <td><?php echo $row['sub_id']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                        </tr>
                        <?php
                            }
                        } else {
                            ?>
                        <td colspan="3">no record found</td>
                        <?php
                        }

                        ?>
                    </table>
                </div>

            </div>
            <div class="view">
                <img height="100px" src="../images/<?php echo $row['licence_img']; ?>" alt="">
            </div>

        </div>

    </div>

    </div>

</body>

</html>