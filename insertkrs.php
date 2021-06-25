<?php

    include ('koneksi.php');

    if (isset($_POST['inputKrs'])) {
        $nim = $_POST['nim'];
        $idmk = $_POST['idmk'];
        $tahun_akademik = $_POST['tahun_akademik2'];
        $semester = $_POST['semester2'];
        $kelas = $_POST['kelas2'];
        
    }
    var_dump($idmk);

    $jumlah_data = count($idmk);

    
    for ($i=0; $i < $jumlah_data; $i++) { 
        // $insert = "INSERT INTO mengambil VALUES ('', '$nim', '$idmk[$i]', '$tahun_akademik', '$semester', '$kelas')";
        mysqli_query($conn, "INSERT INTO mengambil SET nim='$nim', idmk='$idmk[$i]', tahun_akademik='$tahun_akademik',semester='$semester', ,kelas='$kelas'");

        header("Location : dashboard.php");
    }


    
?>