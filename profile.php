<?php

ob_start();
session_start();

// if( !isset($_SESSION["lo"]) ){
//     header("Location: index.php");
//     exit;
// }
require "function.php";

$dataProfile = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE nim = '$_SESSION[nim]'");

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;900&display=swap" rel="stylesheet"> 
    <title>Dashboard</title>
</head>
<body>
    <div class="navbar">
        <ul>
            <li class="brand"><a href="dashboard.php">UNIVERSITAS MULIA</a></li>
            <li class="link"><a href="#beranda">Mata Kuliah</a></li>
            <li class="link"><a href="#berita">KRS</a></li>
            <li class="link"><a href="profile.php">Profile</a></li>
        </ul>
    </div>
    <div class="data">
        <div class="profile">
            <img src="img/profile.png" alt="">
        </div>
        <div class="data-diri">
            <?php
            while ($profile = mysqli_fetch_array($dataProfile)) {  
            ?>
            <form method="POST" action="updateProfile.php">
                <label for="">NIM</label><br>
                <input type="text" readonly name="nim" value="<?= $profile["nim"] ?>"><br>
                <label for="">Nama</label><br>
                <input type="text" name="nama" value="<?= $profile["nama"] ?>"><br>
                <label for="">Prodi</label><br>
                <input type="text" name="prodi" value="<?= $profile["prodi"] ?>"><br>
                <label for="">Fakultas</label><br>
                <input type="text" name="fakultas" value="<?= $profile["fakultas"] ?>"><br>
                <label for="">Tempat Lahir</label><br>
                <input type="text" name="tmptlhr" value="<?= $profile["tmptlhr"] ?>"><br>
                <label for="">Tanggl Lahir</label><br>
                <input type="text" name="tgllhr" value="<?= $profile["tgllhr"] ?>"><br>
                <label for="">Alamat</label><br>
                <input type="text" name="alamat" value="<?= $profile["alamat"] ?>"><br>
                <label for="">Kota</label><br>
                <input type="text" name="kota" value="<?= $profile["kota"] ?>"><br>
                <label for="">Provinsi</label><br>
                <input type="text" name="provinsi" value="<?= $profile["provinsi"] ?>"><br>
                <button type="submit" name="submit" class="btn">Update Profile</button>
            </form>
            <?php } ?>
        </div>
    </div>
</body>
</html>