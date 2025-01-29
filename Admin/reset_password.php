<?php
include '../conection.php';
session_start();

if (isset($_POST['reset'])) {
    $new_password = $_POST['new_password'];
    $email = $_SESSION['email'];
    global $con;
    $updatePass="UPDATE `tbl_user` SET `password`='$new_password' WHERE `email`='$email'";
    if($con->query($updatePass)){
        echo '<script>
            Swal.fire({
                title: "Success",
                text: "Password updated!",
                icon: "success"
            });
        </script>';
        header('location: login.php');
    }
    
    session_destroy(); // Clear session
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
    form{
        width: 350px;
        height: 200px;
        border-radius: 5px;
        padding: 20px;
        background-color: #fff;
        display: flex;
        flex-direction: column;
        align-items: center;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        margin: auto;
        margin-top: 150px;
        gap: 20px;
    }
</style>
<body>
<form action="" method="post">
    <label for="new_password" class="form-label">Enter New Password:</label>
    <input type="password" name="new_password" id="new_password" class="form-control w-75" required>
    <button type="submit" name="reset" class="btn btn-primary ">Reset Password</button>
</form>
</body>
</html>
