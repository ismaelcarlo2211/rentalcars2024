<?php
include ("../controler/config.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="../css/animation.css">
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
        <h2>Login</h2>

        <div class="content">

            <?php
            if (isset($_SESSION['error'])) {
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            }
            ?>
            <form action="../controler/register_control.php" method="post">


                <label>Email:</label>
                <input type="text" name="email" placeholder="" required><br><br>

                <label>Password:</label>
                <input type="password" name="password" placeholder="" required><br><br>

                <input type="submit" name="login" value="login"><i class="link"> Have an account || <a
                        href="signup.php">Signup</a> </i>
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