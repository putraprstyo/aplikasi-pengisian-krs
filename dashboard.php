<?php

ob_start();
session_start();

// if( !isset($_SESSION["lo"]) ){
//     header("Location: index.php");
//     exit;
// }
include "function.php";

$dataProfile = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE nim = '$_SESSION[nim]'");
$profile = mysqli_fetch_array($dataProfile);

$mk = "SELECT * FROM mengambil INNER JOIN matakuliah ON mengambil.idmk = matakuliah.idmk WHERE nim = '$_SESSION[nim]'";
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;900&display=swap" rel="stylesheet"> 
    <title>Dashboard</title>
</head>
<body>
    <div class="navbar">
        <ul>
            <li class="brand"><a href="dashboard.php">UNIVERSITAS MULIA</a></li>
            <li class="link"><a href="#beranda">Mata Kuliah</a></li>
            <li class="link"><a href="inputKrs.php">KRS</a></li>
            <li class="link"><a href="profile.php">Profile</a></li>
        </ul>
    </div>
    <div class="data">
        <div class="profile">
            <img src="img/profile.png" alt="">
        </div>
        <div class="data-diri">
            <ul>
                <li><?= $profile["nim"]; ?></li>
                <li><?= $profile["nama"]; ?></li>
                <li><?= $profile["prodi"]; ?></li>
            </ul>
        </div>
    </div>
    <div class="krs">
        <table style="width:50%">
            <tr>
                <th>Mata Kuliah</th>
                <th>SKS</th>
                <th>Semester</th>
                <th>Status</th>
            </tr>
            <?php 
            $querymk = mysqli_query($conn, $mk);
            while ($data = mysqli_fetch_array($querymk)) { ?>
                <tr>
                    <td><?= $data['mk'] ?></td>
                    <td><?= $data['sks'] ?></td>
                    <td><?= $data['semester_mk'] ?></td>
                    <?php if ($data['status'] == "Belum Disetujui") { ?>
                    <td>Belum Di Setujui Oleh Dosen PA</td>
                    <?php }else{ ?>
                    <td>Sudah Di Setujui Oleh Dosen PA</td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </table> 
    </div>
</body>
</html>