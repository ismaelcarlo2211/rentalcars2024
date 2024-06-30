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

    <link rel="stylesheet" href="../css/orders.css">

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
                <H3>Rersevation</H3>
                <?php
                if (isset($_SESSION['error'])) {
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                }
                ?>
                <div class="table">
                    <table>
                        <tr>
                            <th id='id'>id</th>
                            <th id='name'>names</th>
                            <th>Email</th>
                            <th>Car_selected</th>
                            <th>peekup_Date</th>
                            <th>Drop date</th>
                            <th>Driver</th>
                            <th>Duration</th>
                            <th>Price</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>

                        <?php
                        include ("../controler/config.php");
                        $sql = "SELECT *FROM booking";
                        $query = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($query) > 0) {
                            while ($row = mysqli_fetch_assoc($query)) {
                                ?>
                        <tr>
                            <td><?php echo $row['booking_id'] ?></td>
                            <td><?php echo $row['fullname'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['selected'] ?></td>
                            <td><?php echo $row['peekdate'] ?></td>
                            <td><?php echo $row['dropdate'] ?></td>
                            <td><?php echo $row['driver'] ?></td>
                            <td><?php echo $row['days'] ?> days</td>
                            <td><?php echo $row['to_be_paid'] ?> $</td>
                            <td><?php echo $row['addresss'] ?></td>
                            <td class="<?php echo $row['status']; ?>"><?php echo $row['status'] ?></td>
                            <td>
                                <!-- this condition help to hide Approve and denie button once is pressed -->
                                <?php if ($row['status'] == "Appending") {
                                            ?>
                                <a class="approve"
                                    href="../controler/approve_control.php?approveid=<?php echo $row['booking_id']; ?>">Approve</a><a
                                    class="deny"
                                    href="../controler/cancel_control.php?denyid=<?php echo $row['booking_id']; ?>">Deny</a>
                                <?php
                                        } else {
                                            echo "Checked";
                                        }
                                        ?>


                            </td>
                            <td><button class="delete"><a
                                        href="../controler/delete_reservation.php?deleid=<?php echo $row['booking_id']; ?>">Delete</a></button>
                            </td>

                        </tr>
                        <?php
                            }
                        } else {
                            ?>
                        <td colspan="8">no data found</td>
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