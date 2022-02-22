<?php
include '../lib/library.php';

if (isset($_GET['id_alumni'])) {
    $id_alumni = $_GET['id_alumni'];
    $sql = "SELECT * FROM alumni, users WHERE id_alumni = " . $id_alumni . " AND alumni.id_users = users.id_user AND users.level = 'alumni' ";
    $data = $mysqli -> query($sql) or die($mysqli->error);
    
    if($data->num_rows != 0){  
        $row = mysqli_fetch_array($data);
        $sqldelete = "DELETE FROM users WHERE id_user = " . $row['id_user'];
        $delete = $mysqli -> query($sqldelete) or die($mysqli->error);
        header("Location:v_admin.php?page=data");
    } else {
        echo "error";
    }


}

?>