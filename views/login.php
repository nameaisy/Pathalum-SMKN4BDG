<?php
    include '../lib/library.php';

    sudahLogin();

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = " SELECT *  FROM users WHERE (email = '$email' OR username =  '$email') AND password = SHA1('$password')";

        $data = $mysqli -> query($sql) or die($mysqli->error);

        if ($data->num_rows != 0)
        {
        $row = mysqli_fetch_object($data);
        $_SESSION['id_user'] = $row -> id_user;
        $_SESSION['email'] = $row -> email;
        $_SESSION['username'] = $row -> username;
        $_SESSION['password'] = $row -> password;
        $_SESSION['level'] = $row -> level;
        
        if($_SESSION['level'] == "admin"){
            $user = "admin";
            header("location:v_admin.php");
            } else if ($_SESSION['level'] == "alumni"){
                $user = "alumni";
                header("location:v_alumni.php");
            } else {
                echo "error";
            }
        }
        else
        {
            $error ="Email atau Password salah";
        }
    }

    include "v_login.php";
?>
