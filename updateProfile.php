<?php

    include("koneksi.php");

    $nim = $_POST['nim'];
    $nama =$_POST['nama'];
    $prodi = $_POST['prodi'];
    $fakultas = $_POST['fakultas'];
    $tmptlhr = $_POST['tmptlhr'];
    $tgllhr = $_POST['tgllhr'];
    $alamat = $_POST['alamat'];
    $kota = $_POST['kota'];
    $provinsi = $_POST['provinsi'];

    mysqli_query($conn, "UPDATE mahasiswa SET nama='$nama', prodi='$prodi', fakultas='$fakultas', tmptlhr='$tmptlhr', tgllhr='$tgllhr', alamat='$alamat', kota='$kota', provinsi='$provinsi' WHERE nim='$nim'");

    header("Location: dashboard.php");

?>