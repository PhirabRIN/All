<?php 
    include '../conection.php';
    //staff
    function getStaff(){
        global $con;
        $sql="SELECT * FROM `tbl_user`";
        $data=$con->query($sql);
        while($row=$data->fetch_assoc()){
            echo '
            <tr>
                <td>'.$row['user_id'].'</td>
                <td>'.$row['userName'].'</td>
                <td>'.$row['email'].'</td>
                <td>'.$row['password'].'</td>
                <td><img width="60px"  class="rounded" src="../Image/'.$row['profile'].'" alt=""></td>
                <td>
                    <i class="bi bi-pencil-square me-1"></i>
                    <i class="bi bi-trash text-danger"></i>
                </td>
            </tr>';
        }

    }
    // Product
    
?>