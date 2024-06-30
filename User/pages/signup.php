<?php
include ("../controler/config.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/register_login.scss">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>mybooking </title>
</head>

<body>


    <?php
include "header.php";
?>

    <!----------------------------------- body content ----------------------------->
    <div class="body">
        <h2>Registration</h2>

        <div class="content">
            <?php
                if (isset($_SESSION['error'])) {
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                }
                ?>
            <form action="../controler/register_control.php" method="post">
                <label>FullName:</label>
                <input type="text" name="username" placeholder=""><br><br>

                <label>Email:</label>
                <input type="text" name="email" placeholder=""><br><br>

                <label>PhoneNumber:</label>
                <input type="text" name="phone_no" placeholder=""><br><br>

                <label>Image:</label>
                <input type="file" name="image" style="color:white;"><br><br>

                <label>Password:</label>
                <input type="password" name="password" placeholder=""><br><br>

                <label>Password:</label>
                <input type="password" name="cpassword" placeholder=""><br><br>

                <input type="submit" name="register" value="register"><i class="link"> Have an account || <a
                        href="login.php">Login</a>
                </i>
            </form>
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