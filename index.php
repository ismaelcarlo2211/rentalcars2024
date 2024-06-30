<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="User/css/header.scss">
    <link rel="stylesheet" href="User/css/home.scss">
    <link rel="stylesheet" href="User/css/footer.css">
    <link rel="stylesheet" href="User/css/animation.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>home_user </title>
</head>

<body>
    <div class="container">
        <!---------------------------------- header content----------------------------------->
        <!-- Animationi is setted into animation files, css and javascript -->

        <div class="" id="header">

            <!-- logo -->
            <div class="logo">
                <div>
                    <img src="User/icons/icons8-car-50.png" alt="">
                </div>
                <div>
                    <h3>Rental car</h3>
                </div>

                <div class="toggle">
                    <img class="menu" src="User/icons/menu.png" alt="">
                </div>
            </div>

            <!-- navigation  -->
            <nav>
                <ul>
                    <li><a class="active" href=""><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
                    <li><a href="User/pages/carlist.php"><i class="fa fa-car"></i>Cars</a></li>
                    <li><a href="User/pages/contact_us.php"><i class="fa fa-info-circle" aria-hidden="true"></i>Contact
                            us</a></li>
                    <li><a href="User/pages/about_us.php"><i class="fa fa-info-circle" aria-hidden="true"></i>About</a>
                    </li>
                    <?php
                    if (isset($_SESSION['email']) == null) {
                        ?>
                    <li><a href="User/pages/login.php">login</a> </li>
                    <li><a href="User/pages/signup.php">register</a> </li>

                    <?php
                    } else {
                        ?>
                    <li class="btndrop"><a href="#"><i class="fa fa-fw fa-user"></i><?php echo $_SESSION['email']; ?>
                            ▼</a>
                        <ul class="dropdown">
                            <li><a href="User/pages/profile.php">profile</a></li>
                            <li><a href="User/pages/mybooking.php">mybooking</a></li>
                            <li><a href="#">help</a></li>
                            <li><a href="User/controler/logout.php">logout</a></li>

                        </ul>
                    </li>
                    <?php
                    }
                    ?>

                </ul>

            </nav>

        </div>

        <!----------------------------------- body content ----------------------------->
        <section class="body">

            <div id="body-content">
                <h1 class="hidden">Car Dealing Experience</h1>
                <h2 class="hidden">Welcome in our company</h2>
                <p class="hidden">in fact most of
                    people are strugling to move from one place to an other
                    because of not having a car, or if have it might be damaged
                    ,so we're here to help you, you need just to click ...
                </p>
                <a href="User/pages/carlist.php" class="hidden" id='btn'>Explore cars</a>
            </div>

            <div class="" id="body-image">
                <!-- <div class="hidden" id="image1"><img src="User/images/car3.png" alt=""></div> -->
                <div class="listcard">
                    <?php
                    include "User/controler/config.php";
                    $select = "SELECT *FROM cars_list order by car_id limit 2";
                    $query = mysqli_query($conn, $select);
                    $check = mysqli_num_rows($query);
                    if($check>0){
                        while ($row = mysqli_fetch_assoc($query)) {
                            ?>
                    <div class="hidden" id="card">
                        <div class="carimage">
                            <img src="Admin/images/<?php echo $row['car_image']; ?>" alt="">
                        </div>
                        <div class="cardtext">
                            <div class="carname">
                                <?php echo $row['car_name']; ?>
                            </div>
                            <div class="cartype">
                                Brand :
                                <?php echo $row['car_type']; ?>
                            </div>
                            <div class="carprice">
                                <?php echo $row['price_day']; ?>$ /Day
                            </div>
                            <div class="cartransmission">
                                <?php echo $row['transmission']; ?>
                            </div>

                        </div>
                        <div class="rentlink"><a
                                href="User/pages/booking.php?carselected=<?php echo $row['car_id']; ?>">Rent
                                Now</a>
                        </div>
                    </div>
                </div>
                <?php
                        }
                    }
                    ?>



            </div>

        </section>


        <!-- -----------------------------------footer content ------------------------------->
        <?php
        include "User/pages/footer.php";

        ?>
        <script src="User/js/header.js"></script>
        <script src="User/js/animation.js"></script>
</body>


</html>