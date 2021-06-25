<?php 
require "function.php";
    if(isset($_POST["register"])){
        if (registrasi($_POST) > 0) {
            echo "<script>alert('Berhasil Registrasi');</script>";
        }else{
            echo mysqli_error($conn);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;900&display=swap" rel="stylesheet"> 
    <title>Register</title>
</head>
<body>
    <div class="h3">
        <h3>Sign Up</h3>
    </div>
    <div class="login">
        <form action="" method="POST">
            <input type="text" required name="nim" placeholder="NIM"><br>
            <input type="text" required name="nama" placeholder="nama"><br>
            <input type="text" required name="prodi" placeholder="prodi"><br>
            <input type="text" required name="fakultas" placeholder="fakultas"><br>
            <input type="text" required name="tmptlhr" placeholder="Tempat Lahir"><br>
            <input type="date" required name="tgllhr" placeholder="Tanggal Lahir"><br>
            <input type="text" required name="alamat" placeholder="alamat"><br>
            <input type="text" required name="kota" placeholder="kota"><br>
            <input type="text" required name="provinsi" placeholder="provinsi"><br>
            <input type="password" required name="password" placeholder="Password"><br>
            <input type="password" required name="password2" placeholder="Confirm Password"><br>
            <button type="submit" required name="register" class="button">Register</button>
        </form>

        <a href="index.php">Sudah Punya Akun ?</a>
        
    </div>
</body>
</html>