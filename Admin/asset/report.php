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
                <H3>Report</H3>
                <div class="table">


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