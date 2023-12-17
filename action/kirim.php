<?php
    include "../process.php";
    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username=input($_POST["username"]);
        $password=input($_POST["password"]);

        //Query input menginput data kedalam tabel anggota
        $sql="insert into logins (username, password) values
		('$username','$password')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($conn,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            echo "<script>alert('Pendaftaran berhasil. Redirect ke halaman login.'); window.location='../login.php';</script>";
        }
        else if(!$hasil){
            echo "<script>alert('Registrasi gagal. Redirect ke halaman registrasi.'); window.location='../daftar.php';</script>";

        }
    }
    ?>