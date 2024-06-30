<?php
// --------------------------------------------------
//Load Composer's autoloader
require '../vendor/autoload.php';

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';
// ---------------------------------------------


include "config.php";
session_start();

if (isset($_GET['approveid'])) {
    $approveid = $_GET['approveid'];
    $status = "Approved";
    $update = "UPDATE booking SET status='$status' WHERE booking_id='$approveid'";
    $query = mysqli_query($conn, $update);

    if ($query) {

        $sql = "SELECT *FROM booking where booking_id='$approveid'";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($query);
        $emailuser = $row['email'];



        // ------------------------------
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);


        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = 'ismaelcarlo2211@gmail.com';                     //SMTP username
        $mail->Password = 'ejsjvjampqhzcxix';                               //SMTP password
        $mail->SMTPSecure = "tls";            //Enable implicit TLS encryption
        $mail->Port = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('ismaelcarlo2211@gmail.com', 'Car_Rental_LTD');
        $mail->addAddress($emailuser);     //Add a recipient
//Content
        $mail->isHTML(true);                                  //Set email format to HTML

        $mail->Subject = 'Approved message';
        $mail->Body = 'your reservation has been approved succefuly, you can come to peek the car you have chosen';


        if ($mail->send()) {
            $_SESSION['error'] = '<div style="color: white; background-color:green;padding: 10px;font-weight:bold;font-size:20px;">Message sent to user</div>';
            header("location:../asset/orders.php");
        } else {
            $_SESSION['error'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

        }

    }



} else {
    $_SESSION['error'] = '<div style="color: #af4242; background-color:#fde8ec;padding: 10px;font-weight:bold;font-size:20px;">No id found</div>';
    header("location:noidfound.php");
}
?>