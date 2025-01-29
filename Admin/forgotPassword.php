<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<style>
.container-fluid{
    width: 100%;
    height: 100vh;
    background-image: linear-gradient(to right, #6a11cb 0%, #2575fc 100%);
    display: flex;
    justify-content: center;
    align-items: center;
}
form{
    width: 400px;
    margin: auto;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 280px;
    background-color: #fff;
    gap: 30px;
    border-radius: 10px;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
}
h4{
    color: #333;
}
</style>
<body>
    <div class="container-fluid">
        <form action="" method="post" enctype="multipart/form-data">
            <h4 class="text-center">Enter Email to Reset Password</h4>
            <input class="form-control w-75" type="email" name="email" id="email" required placeholder="Enter your email address">
            <button class="btn btn-primary " type="submit" name="submit">Submit</button>
        </form>
    </div>
</body>
</html>
<?php
include '../conection.php';
session_start(); // Start the session for storing OTP

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/SMTP.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email']; // Email from the form input
    global $con;
    $sql="SELECT `email` FROM `tbl_user` WHERE `email`='$email'";
    $data=$con->query($sql);
    while($row=$data->fetch_assoc()){
        $mails=$row['email'];
    }
    global $mails;
    if($mails==$email){
        $otp = rand(100000, 999999); // Generate a 6-digit OTP
$_SESSION['otp'] = $otp; // Store OTP in session
$_SESSION['email'] = $email; // Store email in session

$mail = new PHPMailer(true);

try {
    // SMTP settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'nalensrin480@gmail.com'; // Your Gmail address
    $mail->Password = 'xvus zpww opbg qhel';   // Your Gmail App Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Email settings
    $mail->setFrom('nalensrin480@gmail.com', 'OzzyStore');
    $mail->addAddress($email);
    $mail->Subject = 'OTP Verification for Password Reset';
    $mail->Body = "Your OTP for password reset is: $otp";

    $mail->send();
    header('location: otp.php');
    
        } catch (Exception $e) {
            echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }else{
    echo '<script>
            Swal.fire({
                title: "404 Not Found!",
                text: "Invalid email in the system!",
                icon: "error"
            });
        </script>';
}
    
}
?>

