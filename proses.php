<?php 
    require 'databaseconn.php';

    
    function createList($data){
        $bedaUser = $_SESSION["USERID"];
        global $conn;
        $kegiatan = $data["kegiatan"];
        $status = "Belum Selesai";

        $query = "INSERT INTO todolist (userId, kegiatan, status) VALUES ('$bedaUser', '$kegiatan', '$status')";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function deleteList($id){
        global $conn;
        mysqli_query($conn, "DELETE FROM todolist WHERE id = $id");
        return mysqli_affected_rows($conn);
    }

    function updateList($id){
        global $conn;
        $query = "UPDATE todolist SET status = 'Selesai' WHERE id = $id";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function registrasi($data){
        global $conn;
        $username = strtolower(stripslashes($data["username"]));
        $password = mysqli_real_escape_string($conn, $data["password"]);
        $password2 = mysqli_real_escape_string($conn, $data["password2"]);

        //cek apakah duplikat username
        $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
        if(mysqli_fetch_assoc($result)){
            echo "<script>
                    alert('Username Telah Terdaftar Sebelumnya')
                    </script>";
            return false;
        }

        //cek konfir pass
        if($password !== $password2){
            echo "<script>
                    alert('Konfirmasi Password Tidak Sesuai!');
                  </script>";
            return false;
        }

        //enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);
        //var_dump($password); die; //untuk cek running

        //menambahkan user baru ke database
        mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");
        return mysqli_affected_rows($conn);
    }
?>