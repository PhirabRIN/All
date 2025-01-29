<?php 
session_start();
if(empty($_SESSION['mail'])){
    header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQQnaOTbfJDrWrVHc3g5C69izw2PFpaMY3LO2qG4VTK1qmQdsIRcsW0ucfFDop6wKTKjRA&usqp=CAU">
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
            <?php 
                include 'aside.php'
            ?>
            <div class="section">
            <div class=" w-100">

               <form action="" class="w-100" method="post" enctype="multipart/form-data">
                    <div class="row mb-4">
                         <div class="col-6">
                              <label class="" for="name">NAME</label>
                              <input type="text" name="name" id="name" class="form-control  ">
                         </div>
                         <div class="col-6">
                              <label class="" for="reqular_price">REGULAR PRICE</label>
                              <input type="text" name="reqular_price" id="reqular_price" class="form-control  ">
                         </div>
                    </div>
                    <div class="row mb-4">
                         <div class="col-6">
                              <label class="" for="sale_price">SALE PRICE</label>
                              <input type="text" name="sale_price" id="sale_price" class="form-control  ">
                         </div>
                         <div class="col-6">
                              <label class="" for="qty">QUANTITY</label>
                              <input type="text" name="qty" id="qty" class="form-control  ">
                         </div>
                    </div>
                    <div class="row mb-4">
                         <div class="col-6">
                              <label class="" for="category">CATEGORIES</label>
                              <select name="category" id="category" class="form-select  ">
                                   <option value="Drink">Drink</option>
                                   <option value="Food">Food</option>
                                   <option value="Fast Food">Fast Food</option>
                                   <option value="Snack">Snack</option>
                              </select>
                         </div>
                         <div class="col-6">
                              <label class="" for="image">IMAGE</label>
                              <input type="file" name="image" id="image" class="form-control  ">
                         </div>
                    </div>
               
                    <div class="row mb-4">
                         <div class="col-12">
                              <label class="" for="description">DESCRIPTION</label>
                              <textarea name="description" id="description" cols="30" rows="6" 
                              class="form-control  "></textarea>
                         </div>
                    </div>
                    <div class="row ">
                         <div class="col-12 d-flex justify-content-end gap-3">
                              <button type="submit" class="btn btn-danger">CLOSE</button>
                              <button type="submit" class="btn btn-primary" name="save">SAVE</button>
                         </div>
                    </div>
               </form>
          </div>
            </div>
        </main>
   </div> 
</body>
</html>
<?php 
include '../conection.php';
include 'moveFile.php';

if (!isset($_SESSION['mail'])) {
    die("User not logged in.");
}

$sql = "SELECT `user_id` FROM `tbl_user` WHERE `email`='{$_SESSION['mail']}'";
$data = $con->query($sql);

if ($data->num_rows > 0) {
    $row = $data->fetch_assoc();
    $user_id = $row['user_id'];
} else {
    die("User not found.");
}

if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $r_price = $_POST['reqular_price'];
    $s_price = $_POST['sale_price'];
    $qty = $_POST['qty'];
    $cate = $_POST['category'];
    $image = moveFile('image');
    $description = $_POST['description'];
     if(!empty($name) && !empty($r_price)&& !empty($s_price)&& !empty($qty)&& !empty($cate)&& !empty($image)&& !empty($description)){
          $insert = "INSERT INTO `tbl_product`(`userID`, `name`, `reqular_price`, `sale_price`, `qty`, `category`, `image`, `description`) 
               VALUES ('$user_id', '$name', '$r_price', '$s_price', '$qty', '$cate', '$image', '$description')";
          if ($con->query($insert) === TRUE) {
               echo '<script>
                         Swal.fire({
                              title: "Product Added!",
                              icon: "success"
                         });
                     </script>';
          }
     }else{
          echo '
               <script>
                    Swal.fire({
                         title: "Please enter value!",
                         icon: "error"
                    });
               </script>';
     }
    
}
?>

    