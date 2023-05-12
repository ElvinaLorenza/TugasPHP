<?php
session_start();

if(isset($_SESSION["login"])){
    header("Location: formtudu.php");
    exit;
}

require 'databaseconn.php';

if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    //cek username
    if(mysqli_num_rows($result) === 1){
        //cek password
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"])){
            //set session
            $_SESSION["login"] = true;
            $_SESSION["USERID"] = $row["id"];

            header("Location: formtudu.php");
            exit;
        }
    }

    $error = true;

}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Halaman Login</title>
        <link rel="stylesheet" href="style.css">
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
        
        <div class="formLogin">
            <h3>Halaman Login User</h3>
            <form action="" method="post">
                <ul>        
                    <label for="username">Username :</label>
                    <input type="text" name="username" id="username">
                <br><br>
                    <label for="password">Password :</label>
                    <input type="password" name="password" id="password">
                <br><br>
                <button type="submit" name="login">Login</button>
                <br><br>
                </ul>
            </form>
        </div>

        <!--akan dijalankan ketika password error atau salah-->
        <?php
            if(isset($error)) :
        ?>
            <p style="color: red; font-style: bold;">Username / Password Anda Salah !! Silahkan Input Kembali</p>
        <?php
            endif;
        ?>

        <div class="footer">
            <p class="copy">Belum terdaftar? Silahkan Registrasi
                <a href="registrasiUser.php">Di Link Ini!</a>
            </p>
        </div>
    </div>
    </body>
</html>