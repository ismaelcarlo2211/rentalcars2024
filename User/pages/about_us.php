<?php
include ("../controler/config.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/header.scss">
    <link rel="stylesheet" href="../css/animation.css">
    <link rel="stylesheet" href="../css/about_us.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>mybooking </title>
</head>

<body>
    <div class="container">
        <!---------------------------------- header content----------------------------------->
        <div class="" id="header">
            <div class="logo">
                <div>
                    <img src="../icons/icons8-car-50.png" alt="">
                </div>
                <div>
                    <h3>Rental car</h3>
                </div>
                <div class="toggle">
                    <img class="menu" src="../icons/menu.png" alt="">
                </div>
            </div>

            <nav>
                <ul>
                    <li><a href="../../index.php"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
                    <li><a href="carlist.php"><i class="fa fa-car"></i>Cars</a></li>
                    <li><a href="contact_us.php"><i class="fa fa-info-circle" aria-hidden="true"></i>Contact
                            us</a></li>
                    <li><a class="active" href="about_us.php"><i class="fa fa-info-circle"
                                aria-hidden="true"></i>About</a>
                    </li>
                    <?php
                    if (isset($_SESSION['email']) == null) {
                        ?>
                    <li><a href="login.php">login</a></li>
                    <li><a href="signup.php">register</a> </li>
                    <?php
                    } else {
                        ?>
                    <li class="btndrop"><a href="#"><i class="fa fa-fw fa-user"></i>
                            <?php echo $_SESSION['email']; ?> ▼
                        </a>
                        <ul class="dropdown">
                            <li><a href="profile.php">profile</a></li>
                            <li><a href="mybooking.php">mybooking</a></li>
                            <li><a href="#">help</a></li>
                            <li><a href="../controler/logout.php">logout</a></li>

                        </ul>
                    </li>
                    <?php
                    }
                    ?>


                </ul>

            </nav>

        </div>
        <!----------------------------------- body content ----------------------------->
        <div class="body">
            <h1>About us</h1>
            <div class="hidden" id="content">
                <div class="image">
                    <img src="../images/ismael.jpg" alt="">
                    <div>
                        <p><a href="">Ismael wamungu</a></p>

                    </div>

                </div>
                <div class="text">
                    <p>i'm the student at ULK(KIGALI INDEPENDENT UNIVERSITY) since 2021, and
                        i'm preparing for the defence, means that very soon i'm ggoing to get bachelor degree ||</p>
                    <div class="link">
                        for more information follow me on <a href="">Facebook</a> <a href="">Youtube</a> <a
                            href="">instagram</a> <a href="">X</a>
                    </div>

                </div>
            </div>

        </div>

        <!-- -----------------------------------footer content ------------------------------->
        <?php
        include "footer.php";
        ?>
    </div>
    <script src="../js/header.js"></script>
    <script src="../js/animation.js"></script>
</body>


</html>