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

    <div class="mk">
    <form action="" method="post">
            <input type="text" name="id_mahasiswa" hidden readonly>
            <table>
                <tr>
                    <td>Matakuliah</td>
                    <td>
                        <input type="text" name="mk">
                    </td>
                </tr>
                <tr>
                    <td>Program Studi</td>
                    <td><input type="text" name="prodi" ></td>
                </tr>
                <tr>
                    <td>Fakultas</td>
                    <td><input type="text" name="fakultas" ></td>
                </tr>
                <tr>
                    <td>SKS</td>
                    <td><input type="text" name="sks"></td>
                </tr>
                <tr>
                    <td>Semester</td>
                    <td><input type="text" name="semester_mk"></td>
                </tr>
            </table>
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>

    <?php 
        if (isset($_POST['submit'])) {
            $mk = isset($_REQUEST['mk']) ? ($_REQUEST['mk']) : null;
            $prodi = isset($_REQUEST['prodi']) ? ($_REQUEST['prodi']) : null;
            $fakultas = isset($_REQUEST['fakultas']) ? ($_REQUEST['fakultas']) : null;
            $sks = isset($_REQUEST['sks']) ? ($_REQUEST['sks']) : null;
            $semester_mk = isset($_REQUEST['semester_mk']) ? ($_REQUEST['semester_mk']) : null;
            
            $queryinsert = "INSERT INTO matakuliah SET mk='$mk', prodi='$prodi', fakultas='$fakultas',sks='$sks', semester_mk='$semester_mk'";
            mysqli_query($conn, $queryinsert);
        }else{}

    ?>

    <div class="matakuliah">
        <table style="width:80%">
            <tr>
                <th>Mata Kuliah</th>
                <th>Program Studi</th>
                <th>Fakultas</th>
                <th>SKS</th>
                <th>Semester</th>
                <th>Action</th>
            </tr>
            <?php 
            $no = 1;
            $matakuliah = mysqli_query($conn, "SELECT * FROM matakuliah");
            
            while($data = mysqli_fetch_array($matakuliah)) {
            echo "<tr>";
                echo "<td>". $data['mk'] . "</td>";
                echo "<td>". $data['prodi'] . "</td>";
                echo "<td>". $data['fakultas'] . "</td>";
                echo "<td>". $data['sks'] . "</td>";
                echo "<td>". $data['semester_mk'] . "</td>";
                echo "<td>
                        <a href='edit.php?id=".$data['idmk']."' class='btn-edit'>Edit</a>   
                        <a href='deleteMk.php?id=".$data['idmk']."' class='btn-delete'>Delete</a>
                    </td>";
            echo "</tr>";
            } ?>
        </table>

    </div>
</body>
</html>
