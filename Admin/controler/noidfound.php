<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>no_id_found</title>
</head>

<body>
    <div class="container">
        <center>
            <h3>Something is wrong</h3>
            <?php
            if (isset($_SESSION["error"])) {
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            }
            ?>
        </center>
    </div>
</body>

</html>