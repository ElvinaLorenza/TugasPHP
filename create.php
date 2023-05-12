<?php 
    require 'databaseconn.php';
    function createList($data){
        global $conn;
        $kegiatan = $data["kegiatan"];
        $status = "Belum Selesai";

        $query = "INSERT INTO todolist (kegiatan, status) VALUES ('$kegiatan', '$status')";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }
?>