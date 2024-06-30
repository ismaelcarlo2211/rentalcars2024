<?php
//Load Composer's autoloader
require '../vendor/autoload.php';
include "config.php";
session_start();

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';

if (isset($_POST['send'])) {

    $subject = $_POST['subject'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

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
    $mail->Port = 587;

    //Recipients
    $mail->setFrom($email, "CAR RENTAL");
    $mail->addAddress('ismaelcarlo2211@gmail.com');     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML

    $mail->Subject = $subject;
    $bodyParagraphs = ["Name: {$name}", "Email: {$email}", "Message:", nl2br($message)];
    $body = join('<br />', $bodyParagraphs);
    $mail->Body = $body;


    if ($mail->send()) {
       
        $_SESSION['error']='<div style="color:blue;">Message has been sent</div>';
        
        
        $insert="INSERT INTO messages(name,email,message)values('$name','$email','$message')";
        $query=mysqli_query($conn,$insert);
        // if($query){
        //     echo "inserted succefuly";
        // }
        // else{
        //     echo "no inseted";
        // }
        header("location:../pages/contact_us.php");
    } else {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }


}
?>