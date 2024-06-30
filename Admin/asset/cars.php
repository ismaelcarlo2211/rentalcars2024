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
    <link rel="stylesheet" href="../css/cars.css">

    <title>home_admin</title>
</head>

<body>
    <div class="container">

        <!-- side bar -->
        <?php
    include "sidebar.php"
        ?>
        <!-- nav bar -->

        <!-- content  -->
        <div class="home">
            <!--  -->

            <!-- content -->
            <div class="content">
                <H3>Cars list</H3>
                <!-- to get success message or error -->
                <?php
                if (isset($_SESSION["error"])) {
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                }
                ?>

                <p class='newcar'><a href="new/newcar.php">Add New</a></p>
                <div class="table">
                    <table>
                        <tr>
                            <th id='id'>Id</th>
                            <th id=''>Satus</th>
                            <th id='name'>Car name</th>
                            <th>Car type</th>
                            <th>Price/DAy</th>
                            <th>Transmision</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                        <?php
                        // NB: no html tag should be inside php tag(<?php  )
                        include ("../controler/config.php");
                        $select = "SELECT *FROM cars_list";
                        $query = mysqli_query($conn, $select);
                        $check = mysqli_num_rows($query);

                        if ($check > 0) {

                            while ($row = mysqli_fetch_assoc($query)) {
                                ?>
                        <tr>
                            <td><?php echo $row['car_id']; ?></td>
                            <td><img height="100px" src="../images/<?php echo $row['car_image']; ?>" alt=""></td>
                            <td><?php echo $row['car_name']; ?></td>
                            <td><?php echo $row['car_type']; ?></td>
                            <td><?php echo $row['price_day']; ?> $</td>
                            <td><?php echo $row['transmission']; ?></td>
                            <td><?php echo $row['Date_ins']; ?></td>
                            <td class="link">
                                <button class="edit"><a
                                        href="update/updatecar.php?upid=<?php echo $row['car_id']; ?>">Edit</a></button>
                                <button class="delete"><a
                                        href="../controler/deletecar_control.php?deid=<?php echo $row['car_id']; ?>">Delete</a></button>
                            </td>
                        </tr>
                        <?php
                            }
                        } else {
                            ?>
                        <tr>
                            <td colspan='7'>No Data found</td>
                        </tr>
                        <?php
                        }
                        ?>
                    </table>

                </div>

            </div>

        </div>

    </div>

</body>

</html>