<?php

// session_start();

include("koneksi.php");

function registrasi($data){
    global $conn;

    $nim = $data["nim"];
    $nama = $data["nama"];
    $prodi = $data["prodi"];
    $fakultas = $data["fakultas"];
    $tmptlhr = $data["tmptlhr"];
    $tgllhr = $data["tgllhr"];
    $alamat = $data["alamat"];
    $kota = $data["kota"];
    $provinsi = $data["provinsi"];
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    $mahasiswa = "mahasiswa";

    $cekUser = mysqli_query($conn, "SELECT nim FROM mahasiswa WHERE nim = '$nim'");

    if (mysqli_fetch_assoc($cekUser)) {
        echo "<script>alert('NIM Sudah Di Daftarkan');</script>";

        return false;
    }

    if ($password != $password2) {
        echo "<script>alert('Password Tidak Sesuai');</script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    
    mysqli_query($conn, "INSERT INTO mahasiswa VALUES('$nim', '$nama', '$prodi', '$fakultas', '$tmptlhr', '$tgllhr', '$alamat', '$kota' , '$provinsi', '$password', '$mahasiswa')");

    return mysqli_affected_rows($conn);
}

function editMk($data){
    global $conn;
    
    $idmk = $data['idmk'];
    $mk = $data['mk'];
    $prodi = $data['prodi'];
    $fakultas = $data['fakultas'];
    $semester = $data['semester'];
    $sks = $data['sks'];

    mysqli_query($conn,"UPDATE matakuliah SET mk='$mk', prodi='$prodi', fakultas='$fakultas', semester='$semester', sks='$sks' WHERE idmk='$idmk'");

    header("location:dashAdm.php");
}

?>