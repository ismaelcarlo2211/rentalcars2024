<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <link rel="stylesheet" href="../css/sidebar.css">
    <link rel="stylesheet" href="../css/cars.css">
    <link rel="stylesheet" href="../css/table.css">

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
                <H3>Cars list</H3>
                <div class="table">
                    <table>
                        <tr>
                            <th id='id'>User_id</th>
                            <th id='name'>Names</th>
                            <th>Email</th>
                            <th>Phone_No</th>
                            <th>Password</th>
                            <th>Date</th>

                        </tr>
                        <?php

                        include ("../controler/config.php");
                        $select = "SELECT *FROM users";
                        $query = mysqli_query($conn, $select);
                        $check = mysqli_num_rows($query);

                        if ($check > 0) {
                            while ($row = mysqli_fetch_assoc($query)) {
                                ?>
                        <tr>
                            <td><?php echo $row['user_id'] ?></td>
                            <td><?php echo $row['names'] ?></td>
                            <td><?php echo $row['Email'] ?></td>
                            <td><?php echo $row['phone_number'] ?></td>
                            <td><?php echo $row['password'] ?></td>
                            <td><?php echo $row['date'] ?></td>
                        </tr>
                        <?php

                            }
                        } else {
                            ?>
                        <td colspan="7">No data found</td>
                        <?php
                        }
                        ?>

                    </table>
                </div>
                <!-- end of table -->

                <button class=""><a href="notification.php">Notify</a></button>
            </div>

        </div>

    </div>

</body>

</html>