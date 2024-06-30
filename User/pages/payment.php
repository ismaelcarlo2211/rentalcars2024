<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/payment.css">

</head>

<body>

    <div class="container">

        <form action="../controler/payment_control.php" method="post">

            <div class="row">

                <div class="col">

                    <h3 class="title">payment</h3>

                    <div class="inputBox">
                        <span>cards accepted :</span>
                        <img src="../images/card_img.png" alt="">
                    </div>
                    <div class="inputBox">
                        <span>name on card :</span>
                        <input type="text" name="name" placeholder="mr. john deo">
                    </div>
                    <div class="inputBox">
                        <span>credit card number :</span>
                        <input type="number" name="card_no" placeholder="1111-2222-3333-4444">
                    </div>
                    <div class="inputBox">
                        <span>Price :</span>
                        <input type="number" name="price" placeholder="100$">
                    </div>




                </div>

            </div>

            <input type="submit" value="proceed to checkout" class="submit-btn">

        </form>

    </div>

</body>

</html>