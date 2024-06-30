<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/newdriver.css">
    <title>new-driver</title>
</head>

<body>
    <div class="container">
        <h2>NEW DRIVER</h2>
        <?php
        if (isset($_SESSION["error"])) {
            echo $_SESSION['error'];
            unset($_SESSION['error']);
        }
        ?>
        <div class="content">
            <form action="../../controler/newdriver_control.php" method="post" enctype="multipart/form-data">
                <label>DriverId:</label><input type="text" name='driveid' placeholder=''><br>
                <label>FullName:</label><input type="text" name='fullname' placeholder=''><br>

                <label>Age:</label><input type="text" name='age' placeholder=''><br>
                <hr>
                <br>
                <label for="">Gender:</label>
                <input type="radio" name="gender" value="male">Male
                <input type="radio" name="gender" value="female">Female <br> <br>

                <label for="">Maritial Status:</label>
                <input type="radio" name="maritial" value="single">Single
                <input type="radio" name="maritial" value="maried">Maried <br>
                <hr>
                <br>
                <label>Driving licence no:</label>
                <input type="text" name="licenceno" placeholder=""> <br>
                <label>Driving Licence:</label>
                <input class="file" type="file" name='licenceimg'><br>

                <label>Address:</label>
                <input type="text" name='address' placeholder=''><br>
                <label>Phone_No:</label>
                <input type="text" name='phone_no' placeholder='+243....'><br>
                <label>Email:</label>
                <input type="text" name='email' placeholder='.....@gmail.com'><br>
                <input type="submit" name="add" id="" value='Add'> <a href="../drivers.php">View drivers</a>
            </form>
        </div>
    </div>

</body>

</html>