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
    <link rel="stylesheet" href="../css/transaction.css">
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
                <H3>Transaction</H3>
                <div class="table">
                    <table>
                        <tr>
                            <th>trans_id</th>
                            <th>cust_name</th>
                            <th>credit_card</th>
                            <th>paid</th>
                            <th>date</th>
                            <th>Reservation_id</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        include "../controler/config.php";

                        $select = "SELECT *FROM transaction";
                        $query = mysqli_query($conn, $select);
                        if (mysqli_num_rows($query) > 0) {
                            while ($row = mysqli_fetch_assoc($query)) {
                                ?>
                        <tr>
                            <td><?php echo $row['trans_id']; ?></td>
                            <td><?php echo $row['name_on_card']; ?></td>
                            <td><?php echo $row['credit_card']; ?></td>
                            <td><?php echo $row['paid']; ?> $</td>
                            <td><?php echo $row['date']; ?></td>
                            <td><?php echo $row['booking_id']; ?></td>
                            <td class="<?php echo $row['status']; ?>"><?php echo $row['status']; ?></td>

                            <td>
                                <!-- this condition help to hide Approve and denie button once is pressed -->
                                <?php if ($row['status'] == "Appending") {
                                            ?>
                                <button><a
                                        href="../controler/trans_approve.php?trans_id=<?php echo $row['trans_id'] ?>">Approve</a></button>
                                <button><a
                                        href="../controler/trans_deny.php?trans_id=<?php echo $row['trans_id'] ?>">Deny</a></button>
                                <?php
                                        } else {
                                            echo "checked";
                                        }

                                        ?>


                            </td>
                        </tr>
                        <?php
                            }
                        } else {
                            ?>
                        <td colspan="5">No record found</td>
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