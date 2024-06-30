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
        <?php
    include "sidebar.php"
        ?>

        <!-- content  -->
        <div class="home">


            <div class="content">
                <H3>MESSAGES</H3>
                <div class="table">
                    <table>
                        <tr>
                            <th>msg_id</th>
                            <th>Name</th>
                            <th>email</th>
                            <th>Message</th>
                            <th>date</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        $select = "SELECT *FROM messages";
                        $query = mysqli_query($conn, $select);
                        if (mysqli_num_rows($query) > 0) {
                            while ($row = mysqli_fetch_assoc($query)) {
                                ?>
                        <tr>
                            <td><?php echo $row['msg_id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['message']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td>
                                <button>Read</button>
                                <button>reply</button>

                            </td>

                        </tr>
                        <?php
                            }
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