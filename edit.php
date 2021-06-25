<?php 
require "function.php";
    if(isset($_POST["submit"])){
        editMk($_POST);
        // var_dump($_POST);
    }else {
        echo mysqli_error($conn);
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Edit</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/dashAdm.css">
        <style>
            form{
                margin-left: 25em;
                margin-top: 3em;
            }
            form input{
                padding: 10px;
                font-size: 20px;
            }
            form button{
                margin-top: 1em;
                margin-left: 12em;
                background-color: blue;
                color: white;
                border-radius: 5px;
                padding: 10px;
            }
            form button:hover{
                background-color: red;
            }
            h1{
                text-align: center;
            }
            table, th, td {
                font-family: 'Roboto';
                 border: solid black;
                padding: 15px;
            }
        </style>
    </head>
    <body>
    <div class="navbar">
        <ul>
            <li class="brand"><a href="dashAdm.php">UNIVERSITAS MULIA</a></li>
            <li class="link"><a href="inputMk.php">Input MataKuliah</a></li>
            <li class="link"><a href="">Profile</a></li>
        </ul>
    </div>
    <?php
    // include "koneksi.php";
    // include "function.php";
    $id = $_GET['id'];
    $data = mysqli_query($conn,"select * from matakuliah where idmk='$id'");

    while($d = mysqli_fetch_array($data)){?>
        <form action="" method="post">
            <input type="text" name="id_mahasiswa" hidden readonly>
            <table>
                <tr>
                    <td>Matakuliah</td>
                    <td>
                        <input type="hidden" name="idmk" value="<?php echo $d['idmk']; ?>">
                        <input type="text" name="mk" value="<?php echo $d['mk']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Program Studi</td>
                    <td><input type="text" name="prodi" value="<?php echo $d['prodi']; ?>"></td>
                </tr>
                <tr>
                    <td>Fakultas</td>
                    <td><input type="text" name="fakultas" value="<?php echo $d['fakultas']; ?>"></td>
                </tr>
                <tr>
                    <td>SKS</td>
                    <td><input type="text" name="sks" value="<?php echo $d['sks']; ?>"></td>
                </tr>
                <tr>
                    <td>Semester</td>
                    <td><input type="text" name="semester" value="<?php echo $d['semester_mk']; ?>"></td>
                </tr>
            </table>
            <button type="submit" name="submit">Submit</button>
        </form>
        <?php } ?>
    </body>
</html>
