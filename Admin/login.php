<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
.log{
    width: 80%;
    margin: auto;
}
</style>
<body>
<div class="container-fluid ps-md-0">
  <div class="row g-0 log">
    <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
    <div class="col-md-8 col-lg-6">
      <div class="login d-flex align-items-center py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto">
              <h3 class="login-heading mb-4">Welcome back!</h3>

              <!-- Sign In Form -->
              <form method="post" enctype="multipart/form-data">
                <div class="form-floating mb-3">
                  <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                  <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                  <label for="floatingPassword">Password</label>
                </div>
                <div class="form-check mb-3">
                  <input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck">
                  <label class="form-check-label" for="rememberPasswordCheck">
                    Remember password
                  </label>
                </div>
                <div class="d-grid ">
                  <button class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2" type="submit" name="signIn">Sign in</button>
                  <div class="text-center">
                    <a class="small" href="forgotPassword.php">Forgot password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" style="text-decoration: none;" href="register.php">Don`t have account?</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>

<?php 
   include '../conection.php';
    session_start();
    if(isset($_POST['signIn'])){
        global $con;
        $email=$_POST['email'];
        $password=$_POST['password'];
        $sql="SELECT * FROM `tbl_user` WHERE `email`='$email' AND `password` ='$password'";
        $data=$con->query($sql);
           $row=$data->fetch_assoc();
            try {
                if ($row && isset($row['email']) && $row['email'] == $email) {
                    $_SESSION['mail'] = $email;
                    header('location: dashboard.php');
                    exit(); // Ensure no further code is executed after redirection
                } else {
                    /* The `echo` statement in PHP is used to output strings or variables. In this case, the `echo` statement is outputting a JavaScript code block enclosed in single quotes. This JavaScript code block is using the `Swal.fire()` function from the SweetAlert2 library to display a pop-up modal with an error message. */
                    echo '<script>
                            Swal.fire({
                                title: "Error!",
                                text: "Invalid email or no matching record found!",
                                icon: "error"
                            });
                          </script>';
                }
            } catch (Exception $e) {
                echo '<script>
                        Swal.fire({
                            title: "Exception!",
                            text: "An unexpected error occurred: ' . $e->getMessage() . '",
                            icon: "error"
                        });
                      </script>';
            }
            
        } 
    
?>