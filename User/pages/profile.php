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
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="../css/animation.css">
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
                    <li><a href="about_us.php"><i class="fa fa-info-circle" aria-hidden="true"></i>About</a>
                    </li>
                    <?php
                    if (isset($_SESSION['email']) == null) {
                        ?>
                    <li><a href="login.php">login</a></li>
                    <li><a href="signup.php">register</a> </li>
                    <?php
                    } else {
                        ?>
                    <li class="btndrop"><a class="active" href="#"><i class="fa fa-fw fa-user"></i>
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
            <h1 class="title">My Profile</h1><br>
            <div class="hidden" id="content">
                <?php
                if (isset($_SESSION['error'])) {
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                }
                ?>

                <?php
                include "../controler/config.php";
                $email = $_SESSION['email'];
                $select = "SELECT *FROM users where email='$email'";
                $query = mysqli_query($conn, $select);
                $row = mysqli_fetch_assoc($query);
                if ($row !== null) {


                    ?>
                <form action="../controler/update_user.php" method="post">
                    <label>FullName:</label>
                    <input type="text" name="username" value="<?php echo $row['names']; ?>"><br><br>

                    <label>Email:</label>
                    <input type="text" name="email" value="<?php echo $row['Email'] ?>"><br><br>

                    <label>PhoneNumber:</label>
                    <input type="text" name="phone_no" value="<?php echo $row['phone_number'] ?>"><br><br>

                    <label>Password:</label>
                    <input type="password" name="password" value="<?php echo $row['password'] ?>"><br><br>


                    <input type="submit" name="update" value="Update"><i class="link">
                    </i>
                </form>
                <?php
                } ?>
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