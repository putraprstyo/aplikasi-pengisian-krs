<?php

require 'function.php';
// include 'koneksi.php';

$id = $_GET['id'];
    mysqli_query($conn,"DELETE FROM matakuliah WHERE idmk='$id'");

    header("location:dashAdm.php");

?>