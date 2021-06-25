<?php

require "function.php";

if (isset($_POST["login"])) {
    $nim = $_POST["nim"];
    $password = $_POST["password"];
    
    $cekUser = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE nim = '$nim'");
    
    if (mysqli_num_rows($cekUser) === 1) {
        
        $user = mysqli_fetch_assoc($cekUser);
        if (password_verify($password, $user["password"])){

            if ($user["role"] == "mahasiswa") {
                session_start();
                ob_start();
                $_SESSION["login"] =true;
                $_SESSION["nim"] = $user["nim"];
                
    
                header("Location: dashboard.php");
                exit;
            }
            
            if ($user["role"] == "admin") {
                session_start();
                ob_start();
                $_SESSION["login"] =true;
                $_SESSION["nim"] = $user["nim"];
                
    
                header("Location: dashAdm.php");
                exit;
            }
            
        }
    }

    $error = true;
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
    <title>KRS</title>
</head>
<body>
    <div class="h3">
        <h3>Sign In</h3>
    </div>
    <div class="login">
    <?php if (isset($error)) : ?>
        <p class="error-login" style="color :red; font-style:italic;">NIM Atau Password Salah</p>
    <?php endif; ?>
        <form action="" method="POST">
            <input type="text" name="nim" placeholder="NIM"><br>
            <input type="password" name="password" placeholder="Password"><br>
            <button type="submit" name="login" class="button">Login</button>
        </form>
        <a href="register.php">Belum Punya Akun ?</a>
        
    </div>
</body>
</html>