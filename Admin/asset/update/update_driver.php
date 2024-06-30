<?php
include ("../../controler/config.php");
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
        <h2>UPDATE DRIVER</h2>
        <?php
        if (isset($_SESSION["error"])) {
            echo $_SESSION['error'];
            unset($_SESSION['error']);
        }
        ?>
        <div class="content">
            <form action="../../controler/update_driver_control.php" method="post" enctype="multipart/form-data">

                <?php
                $dvid=$_GET['id'];
                $sql="SELECT *FROM drivers WHERE driver_id='$dvid'";
                $query=mysqli_query($conn,$sql);
                while($row=mysqli_fetch_assoc($query)){

                    ?>
                <label>DriverId:</label><input type="text" name='driveid' value='<?php echo $row['Driver_id']?>'><br>
                <label>FullName:</label><input type="text" name='fullname' value='<?php echo $row['Full_name'] ?>'><br>

                <label>Age:</label><input type="text" name='age' value='<?php echo $row['gender'] ?>'><br>
                <hr>
                <br>
                <label for="">Gender:</label>
                <input type="radio" name="gender" value="male" required>Male
                <input type="radio" name="gender" value="female" required>Female <br> <br>

                <label for="">Maritial Status:</label>
                <input type="radio" name="maritial" value="single" required>Single
                <input type="radio" name="maritial" value="maried" required>Maried <br>
                <hr>
                <br>
                <label>Driving licence no:</label>
                <input type="text" name="licenceno" value="<?php echo $row['Driving_licence_no'] ?>"> <br>
                <label>Driving Licence:</label>
                <input class="file" type="file" name='licenceimg' required><br>

                <label>Address:</label>
                <input type="text" name='address' value='<?php echo $row['address'] ?>'><br>
                <label>Phone_No:</label>
                <input type="text" name='phone_no' value='<?php echo $row['phone_number'] ?>'><br>
                <label>Email:</label>
                <input type="text" name='email' value='<?php echo $row['email'] ?>'><br>
                <input type="submit" name="update" id="" value='update'> <a href="../drivers.php">View drivers</a>
            </form>
            <?php
                    
                }

                

            ?>

        </div>
    </div>

</body>

</html>