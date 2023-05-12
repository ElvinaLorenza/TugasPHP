<?php
session_start();
$bedaUser = $_SESSION["USERID"];
if(!isset($_SESSION["login"])){
    header("Location: loginUser.php");
    exit;
}

    //connection database
    require 'databaseconn.php';
    require 'proses.php';
    require 'display.php';
    global $conn;

   // $result = mysqli_query($conn, "SELECT * FROM todolist");
    //var_dump($result);

    //nambah data list tudu
    if (isset($_POST["submit"])) {
        if (createList($_POST) > 0) {
            echo "succes add data";
        //    echo "<script>
          //          alert('Succes Add Data!');
            //      </script>";
        } else {
            echo "fail add data";
        }
    }

    //hapus data list tudu
    if(isset($_GET["delete"])){
        $id = $_GET["delete"];
        if(deleteList($id) > 0){
            echo "succes delete data";
        //    echo "<script>
          //          alert('Succes Delete Data!');
            //      </script>";
        } else {
            echo "fail delete data";
            //echo "<script>
              //      alert('Fail Delete Data!');
                //  </script>";
        }
    }

    //update data list tudu
    if(isset($_GET["update"])){
        $id = $_GET["update"];
        if(updateList($id)>0){
            echo "succes update data";
        } else {
            echo "fail update data";
        }
    }

    $query = "SELECT * FROM todolist WHERE userId = $bedaUser";
    $resultTudu = display($query);
?>

<!DOCTYPE html>
<html lang="en">
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tugas 5</title>
        <link rel="stylesheet" href="style2.css">
    </head>

    <body>
        <div class="container">
           <!-- <a href="logoutUser.php">Logout</a> -->
            <div class="content cf">
                <div class="header">
                    <h1>TO DO LIST</h1>
                    <div class="main">
                        <p>Elvina Lorenza</p>
                        <p>215314103</p>
                    </div>

                    <div class="sidebar">
                        <img src="PinaPlatform.jpeg" alt="Image" width="10%">
                    </div>
                </div>    
            </div>

            <div class="formtodo">
                <br><br>
                <form action="" method="post">
                    <label for="kegiatan">Kegiatan Baru : </label>
                    <input type="text" name="kegiatan">
                    <button type="submit" name="submit"> Tambah Data!</button>
                    <br><br>
                </form>

                <table border="1" cellpading="10" cellspacing="0" align="center">
                    <tr>
                        <th>ID</th>
                        <th>List Kegiatan</th> 
                        <th>Status</th>
                    </tr>

                    <?php $i = 1; ?>
                    <?php foreach ($resultTudu as $elemen) : ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $elemen["kegiatan"] ?></td>
                        <td><?= $elemen["status"] ?>
                            <a href="?update=<?= $elemen["id"] ?>">Selesai</a> 
                            |
                            <a href="?delete=<?= $elemen["id"] ?>">Hapus</a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </table>
            </div>
            <br><br>
            
            <div class="tombolOut">
                <a style="text-align:right;" href="logoutUser.php">Logout</a>
            </div>

            <div class="footer">
                <p class="copy">TugasPlatformPHP</p>
            </div>

        </div>
    </body>
</html>