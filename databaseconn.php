<?php
    //create connection database
    $conn = mysqli_connect("localhost", "root", "", "todo_db");

    if (!$conn){
        die("Koneksi tidak berhasil" . mysqli_connect_error());
    }
?>