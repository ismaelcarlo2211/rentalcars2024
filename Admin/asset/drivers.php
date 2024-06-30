<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/sidebar.css">
    <link rel="stylesheet" href="../css/drivers.css">

    <title>home_admin</title>
</head>

<body>
    <div class="container">
        <!-- side bar -->
        <?php
    include "sidebar.php"
        ?>

        <!-- content  -->
        <div class="home">

            <div class="content">
                <H3>DRIVERS LIST</H3>
                <?php
                if (isset($_SESSION['error'])) {
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                }
                ?>
                <p class='newdriver'><a href="new/newdriver.php">New Driver</a></p>
                <div class="table">
                    <table>
                        <tr>
                            <th id='id'>Driver_Id</th>
                            <th id='name'>Names</th>
                            <th>Gender</th>
                            <th>Age</th>
                            <th>Driving licence status</th>
                            <th>Maritial Status</th>
                            <th>Driving licence Number</th>
                            <th>Address</th>
                            <th>Phone_No</th>
                            <th>Email</th>
                            <th>Date created</th>
                            <th>Action</th>


                        </tr>

                        <?php
                        include ("../controler/config.php");
                        $select = "SELECT *FROM drivers";
                        $query = mysqli_query($conn, $select);
                        $check = mysqli_num_rows($query);
                        if ($check > 0) {
                            while ($row = mysqli_fetch_assoc($query)) {
                                ?>

                        <tr>
                            <td><?php echo $row['Driver_id'] ?></td>
                            <td><?php echo $row['Full_name'] ?></td>
                            <td><?php echo $row['gender'] ?></td>
                            <td><?php echo $row['Age'] ?></td>
                            <td> <img height="100px" src="../images/<?php echo $row['licence_img']; ?>" alt=""></td>
                            <td><?php echo $row['Maritial_status'] ?></td>
                            <td><?php echo $row['Driving_licence_no'] ?></td>
                            <td><?php echo $row['address'] ?></td>
                            <td><?php echo $row['phone_number'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['date_created'] ?></td>
                            <td class="link">

                                <button class="edit"> <a
                                        href="update/update_driver.php?id=<?php echo $row['Driver_id']; ?>">Edit</a></button>
                                <button class="delete"><a
                                        href="../controler/delete_driver.php?deid=<?php echo $row['Driver_id']; ?>">Delete</a></button>
                            </td>
                        </tr>
                        <?php

                            }
                        } else {
                            ?>
                        <td colspan=" 11">no data found
                        </td>
                        <?php
                        }
                        ?>

                    </table>
                </div>
                <div class="view">
                    <img height="100px" src="../images/<?php echo $row['licence_img']; ?>" alt="">
                </div>

            </div>

        </div>

    </div>

</body>

</html>