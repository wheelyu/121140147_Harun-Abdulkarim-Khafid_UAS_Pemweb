<?php
session_start(); // Mulai sesi
// Cek apakah sesi pengguna sudah ada
    if (!isset($_SESSION['username'])) {
        // Jika belum ada, redirect ke halaman login
        header("Location: login.php");
        exit;
    }
    include 'process.php';
    function input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $Nama = input($_POST["Nama"]);
        $Jenis_Kelamin = input($_POST["Jenis_Kelamin"]);
        $prodi = input($_POST["Prodi"]);
        $Tgl = input($_POST["Tanggal_Lahir"]);
        $Email = input($_POST["Email"]);

        $sql = "insert into form (nama,jenis_kelamin, Prodi,tgl_lahir,email) values
        ('$Nama','$Jenis_Kelamin','$prodi','$Tgl','$Email')";
        $result = $conn -> query($sql);
        if ($result) {
            echo "<script>alert('Data berhasil ditambahkan.'); window.location.href='formulir.php';</script>";
            exit;
        } else {
            echo "<script>alert('Data gagal ditambahkan.')</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Mahasiswa</title>
    <link rel="stylesheet" href="assets/styles4.css">
    <link rel="shortcut icon" href="img/harun.png" type="image/x-icon">
</head>
<body>

    <center><h2>Formulir Mahasiswa</h2></center>
    <div class="cont-form">
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" class="form">
            <center><table>
                <tr>
                    <td><h2>Nama</h2></td>
                    <td><input type="text" name="Nama" id="Nama" required  placeholder="Nama"></td>
                </tr>
                <tr>
                    <td><h2>Jenis Kelamin</h2></td>
                    <td> <select name="Jenis_Kelamin" id="Jenis_Kelamin" required >
                        <option value="0" selected>pilih</option>
                        <option value="laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select></td>
                </tr>
                <tr>
                    <td><h2>Program Studi</h2></td>
                    <td><input type="text" name="Prodi" id="Prodi" required placeholder="Program Studi"></td>
                </tr>
                <tr>
                    <td><h2>Tanggal Lahir</h2></td>
                    <td><input type="date" name="Tanggal_Lahir" id="Tanggal_Lahir" required placeholder="Tanggal"></td>
                </tr>
                <tr>
                    <td><h2>Email</h2></td>
                    <td><input type="text" name="Email" id="Email" required placeholder="Email"></td>
                </tr>
            </table></center>
            <div class="tombol">
                <button  class="btn1" type="submit">Submit</button>
                <a class="btn2"href="formulir.php">Kembali</a>
            </div>
            <br>
            <br>
        </form>
        </div>
</body>
</html>
