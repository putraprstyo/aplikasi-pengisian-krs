<?php

require "function.php";
ob_start();
session_start();

if( !isset($_SESSION["login"]) ){
    header("Location: index.php");
    exit;
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dashAdm.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;900&display=swap" rel="stylesheet"> 
    <title>Dashboard</title>
</head>
<body>
    <div class="navbar">
        <ul>
            <li class="brand"><a href="dashAdm.php">UNIVERSITAS MULIA</a></li>
            <li class="link"><a href="krs.php">KRS</a></li>
            <li class="link"><a href="">Profile</a></li>
        </ul>
    </div>
    <div class="matakuliah">
        <table style="width:80%">
            <tr>
                <th>NIM</th>
                <th>Matakuliah</th>
                <th>Tahun Akademik</th>
                <th>Semester</th>
                <th>Kelas</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <?php 
            $mk = "SELECT * FROM mengambil INNER JOIN matakuliah ON mengambil.idmk = matakuliah.idmk";
            $query = mysqli_query($conn, $mk);
            echo "<form method=POST>";
            while($data = mysqli_fetch_array($query)) { 
            echo "<tr>";
                echo "<td>". $data['nim'] . "</td>";
                echo "<td>". $data['mk'] . "</td>";
                echo "<td>". $data['tahun_akademik'] . "</td>";
                echo "<td>". $data['semester'] . "</td>";
                echo "<td>". $data['kelas'] . "</td>";?>
                <?php if ($data['status'] == "Belum Disetujui") { ?>
                <td>Belum Disetujui</td>
                <?php }else{ ?>
                    <td>Sudah Disetujui</td>
                <?php } ?>
                <td><input type='checkbox' name='id[]' value="<?= $data['id']?>"></td>
            <?php
            echo "</tr>";
            } 
                echo "<button style='margin-top:2em;' class='btn' type='submit' name='konfirmasiKrs'>Konfirmasi</button>";
            echo "</form>";
            ?>
        </table>
            <?php
                if (isset($_POST['konfirmasiKrs'])) {
                    $id = $_POST['id'];
                    $status = "Sudah Di Setujui";

                    $jmlh = count($id);
                    for ($i=0; $i < $jmlh; $i++) { 
                        $insert = "UPDATE mengambil SET status='$status' WHERE id='$id[$i]'";
                        var_dump($insert);
                        if (mysqli_query($conn, $insert)) {
                            header('Location: dashAdm.php');
                        }else {
                            header('Location: krs.php');
                        }
                    }
                };
            
            ?>
    </div>
</body>
</html>