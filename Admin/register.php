<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQQnaOTbfJDrWrVHc3g5C69izw2PFpaMY3LO2qG4VTK1qmQdsIRcsW0ucfFDop6wKTKjRA&usqp=CAU">
</head>
<style>
.login {
  min-height: 100vh;
}

.bg-image {
  background-image: url('https://i.pinimg.com/736x/0c/9b/89/0c9b89b62ba04b4b4740f4ce2da28b54.jpg');
  background-size: cover;
  background-position: center;
}

.login-heading {
  font-weight: 300;
}

.btn-login {
  font-size: 0.9rem;
  letter-spacing: 0.05rem;
  padding: 0.75rem 1rem;
}
.register{
    width: 80%;
    margin: auto;
}
</style>
<body>
<div class="container-fluid ps-md-0">
  <div class="row g-0 register">
    <div class="col-md-8 col-lg-6">
      <div class="login d-flex align-items-center py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto">
              <h3 class="login-heading mb-4">Register Account</h3>

              <!-- Sign In Form -->
              <form method="post" enctype="multipart/form-data">
                <div class="form-group mb-3">
                  <label for="floatingName">Username</label>
                  <input type="text" class="form-control" id="floatingName" placeholder="username" name="name">
                </div>
                <div class="form-group mb-3">
                  <label for="floatingEmail">Email</label>
                  <input type="email" class="form-control" id="floatingEmail" placeholder="name@example.com" name="email">
                </div>
                <div class="form-group mb-3">
                  <label for="floatingPassword">Password</label>
                  <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                </div>
                <div class="form-group mb-3">
                    <label for="floatingProfile">Profile</label>
                    <input type="file" class="form-control " id="floatingProfile" name="profile">
                </div>
                <div class="d-grid ">
                    <div class="text-center">
                        <a class="small" style="text-decoration: none;" href="login.php">Already have account?</a>
                    </div>
                    <button class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mt-2" type="submit" name="signUp">Sign Up</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
  </div>
</div>
</body>
</html>
<?php 
include 'moveFile.php';
include '../conection.php';

try {
    if (isset($_POST['signUp'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $profile = moveFile('profile');

        global $con;

        // Check if the email already exists
        $sqlCheck = "SELECT * FROM `tbl_user` WHERE `email` = ?";
        $stmtCheck = $con->prepare($sqlCheck);
        $stmtCheck->bind_param("s", $email);
        $stmtCheck->execute();
        $resultCheck = $stmtCheck->get_result();

        if ($resultCheck->num_rows > 0) {
            // Email already exists
            echo "<script>alert('This email is already registered. Please use a different email.');</script>";
        } else {
            // Insert new user
            $sql = "INSERT INTO `tbl_user`(`userName`, `email`, `password`, `profile`) VALUES (?, ?, ?, ?)";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("ssss", $name, $email, $password, $profile);
            if ($stmt->execute()) {
                header('location: login.php');
            } else {
                echo "<script>alert('Failed to register. Please try again later.');</script>";
            }
        }
    }
} catch (Exception $e) {
    // Handle exception
    echo "<script>alert('An error occurred: " . $e->getMessage() . "');</script>";
}
?>
