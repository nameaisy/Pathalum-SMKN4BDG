<?php
    session_start();

    function base_url(){
        return "http://localhost/Pathalum-SMKN4BDG_2";
    }

    function flash($tipe, $pesan = ''){
        if(empty($pesan)){
            $pesan = @$_SESSION[$tipe];
            unset($_SESSION[$tipe]);
            return $pesan;
        } 
        else{
            $_SESSION[$tipe] = $pesan;
        }
    }

    function cekLogin(){
        $email = @$_SESSION['email'];

        if (empty($email)){
            header('location:../views/login.php');
        }
    }

    function sudahLogin(){
        $email = @$_SESSION['email'];
        $level = @$_SESSION['level'];

        if (!empty($email) && $level = "admin"){
            $user = "admin";
            header('location:../views/v_admin.php');
        } else if (!empty($email) && $level = "alumni"){
            $user = "alumni";
            header('location:../views/v_alumni.php');
        }
    }

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'hubin';

    $mysqli = mysqli_connect($host, $user, $pass, $db)
                or die('Tidak dapat konek ke Database');
?>