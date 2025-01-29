<?php
session_start();

if (isset($_POST['verify'])) {
    $entered_otp = $_POST['otp'];

    if ($_SESSION['otp'] == $entered_otp) {
        echo "OTP verified successfully.";
        header('location: reset_password.php');
    } else {
        echo "Invalid OTP. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<style>
    *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }
    body{
        width: 100%;
        height: 100vh;
        /* background-color: blue; */
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .otp{
        width: 80%;
        height: 80%;
        margin: auto;
        background-image: linear-gradient(to top, #c471f5 0%, #fa71cd 100%);
        border-radius: 20px;
        display: flex;
        .text{
            width: 50%;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            h1{
                color: #333;
            }
        }
        .form{
            width: 50%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            form{
                width: 350px;
                background-color: #fff;
                height:350px;
                padding: 20px;
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 20px;
                border-radius: 10px;
            }
        }
    }
</style>
<body>
<div class="otp">
    <h1></h1>
    <div class="text">
        <h1>OTP</h1>
        <h1>Verification</h1>
    </div>
   <div class="form">
   <form action="" method="post">
    <img width="100px" src="https://cdn-icons-png.flaticon.com/512/4413/4413865.png" alt="">
    <label for="otp" class="form-label"><h3>Enter OTP:</h3></label>
    <input type="text" name="otp" id="otp" class="form-control w-75" required>
    <button type="submit" name="verify" class="btn btn-primary">Verify</button>
    </form>
   </div>
</div>
</body>
</html>
