<?php

ob_start();
session_start();

// if( !isset($_SESSION["lo"]) ){
//     header("Location: index.php");
//     exit;
// }
include "function.php";

// if($_POST['semester']){
//     $query = mysqli_query($conn, "SELECT * FROM matakuliah WHERE semester = '$_POST[semester]'");
//     $data = mysqli_fetch_array($query);
// }
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
            <li class="link"><a href="#berita">KRS</a></li>
            <li class="link"><a href="profile.php">Profile</a></li>
        </ul>
    </div>
    <div class="semester">
        <form action="" method="POST">
            <label for="">Kelas :</label><br>
            <input type="text" name="kelas"><br>
            <label for="">Tahun Akademik :</label><br>
            <input type="text" name="tahun_akademik"><br>
            <label for="">Semester :</label><br>
            <select name="semester">
                <option value="1">I</option>
                <option value="2">II</option>
                <option value="3">III</option>
                <option value="4">IV</option>
                <option value="5">V</option>
                <option value="6">VI</option>
                <option value="7">VII</option>
                <option value="8">VIII</option>
            </select><br>
            <button type="submit" class="btn-smt">Submit</button>
        </form>
        <?php
        $semester1 = isset($_REQUEST['semester']) ? ($_REQUEST['semester']) : null;
        $kelas1 = isset($_REQUEST['kelas']) ? ($_REQUEST['kelas']) : null;
        $tahun_akademik1 = isset($_REQUEST['tahun_akademik']) ? ($_REQUEST['tahun_akademik']) : null;
        // var_dump($semester1, $kelas1, $tahun_akademik1);
        $query = mysqli_query($conn, "SELECT idmk, mk, sks FROM matakuliah WHERE semester_mk = '$semester1'");
        ?>
    </div>
    <?php if ($semester1 == true) {?>
    <div class="inputKrs">
        <form action="" method="POST">
            <table style="width:80%">
                <tr>
                    <th>Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Action</th>
                    <th class="hilang">Nim</th>
                    <th class="hilang">Semester</th>
                    <th class="hilang">Kelas</th>
                    <th class="hilang">Tahun Akademik</th>
                </tr>
                <?php
                while($data = mysqli_fetch_array($query)) { ?>
                <tr>
                    <td><?= $data['mk'] ?></td>
                    <td><?= $data['sks'] ?></td>
                    <td><input type="checkbox" name="idmk[]" value="<?= $data['idmk'] ?>"></td>
                    <td class="hilang"><input type="text" name="nim" value="<?= $_SESSION['nim'] ?>" readonly></td>
                    <td class="hilang"><input type="text" name="semester2" value="<?= $semester1 ?>" readonly></td>
                    <td class="hilang"><input type="text" name="status" value="Belum Disetujui" readonly></td>
                    <td class="hilang"><input type="text" name="kelas2" value="<?= $kelas1 ?>" readonly></td>
                    <td class="hilang"><input type="text" name="tahun_akademik2" value="<?= $tahun_akademik1 ?>" readonly ></td>
                </tr>
                <?php } ?>
            </table> 
            <button type="submit" name="inputKrs" class="btn-inputKrs">Kirim</button>
        </form>
    </div>
    <?php }?>
    <?php

    if (isset($_POST['inputKrs'])) {
        $idmk = $_POST['idmk'];
        $nim = $_POST['nim'];
        $tahun_akademik = $_POST['tahun_akademik2'];
        $semester = $_POST['semester2'];
        $kelas = $_POST['kelas2'];
        $status = $_POST['status'];
        
        $jumlah_data = count($idmk);
        for ($i=0; $i < $jumlah_data; $i++) { 
            $insert = "INSERT INTO mengambil VALUES ('0', '$nim', '$idmk[$i]', '$tahun_akademik', '$semester', '$kelas', '$status')";
            // var_dump($insert);
            if (mysqli_query($conn, $insert)) {
                header('Location: dashboard.php');
            }
        }
    }

    
    ?>
</body>
</html>