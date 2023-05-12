<?php
//session_start();

//if(!isset($_SESSION["login"])){
  //  header("Location: loginUser.php");
    //exit;
//}

require 'databaseconn.php';
require 'proses.php';

if(isset($_POST["register"])){
    if(registrasi($_POST) > 0) {
        echo "<script>
                alert('Berhasil Menambahkan User Baru');
            </script>";
    } else {
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Halaman Registrasi</title>
        <style>
            label{
                display: block;
            }
        </style>
        <link rel="stylesheet" href="styleRegis.css">
    </head>

    <body>
        <div class="container">
            <div class="content cf">
                <div class="header">
                    <div class="main">
                        <p>Elvina Lorenza</p>
                        <p>215314103</p>
                    </div>

                    <div class="sidebar">
                        <img src="PinaPlatform.jpeg" alt="Image" width="10%">
                    </div>
                </div>    
            </div>
    
        <form action="" method="post">
            <div class="formRegis">
            <h1>Halaman Registrasi New User</h1>
            <ul>
                    <label for="username">Username :
                        <input type="text" name="username" id="username">
                    </label>
                <br>
                    <label for="password">Password : 
                        <input type="password" name="password" id="password">
                    </label>
                <br>
                    <label for="password2">Konfirmasi Password : 
                        <input type="password" name="password2" id="password2">
                    </label>
                <br><br>
                    <button type="submit" name="register">Daftar!</button>
            </ul>
            </div>

        </form>

        <div class="footer">
            <p class="copy">Sudah terdaftar? Silahkan Login
                <a href="loginUser.php">Di Link Ini!</a>
            </p>
        </div>
        </div>
    </body>
</html>