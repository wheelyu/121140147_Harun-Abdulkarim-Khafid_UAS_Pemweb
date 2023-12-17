<?php
session_start(); // Mulai sesi
// Cek apakah sesi pengguna sudah ada
    if (!isset($_SESSION['username'])) {
        // Jika belum ada, redirect ke halaman login
        header("Location: login.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="assets/styles4.css">
    <link rel="shortcut icon" href="img/harun.png" type="image/x-icon">
</head>
<body>
<?php
            include 'process.php';
            function input($data){
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            if (isset($_GET['ID'])) {
                $ID=input($_GET["ID"]);
                $sql="select * from form where ID=$ID";
                $hasil=mysqli_query($conn,$sql);
                $data = mysqli_fetch_assoc($hasil);
            }
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $ID=htmlspecialchars($_POST['ID']);
                $Nama = input($_POST["Nama"]);
                $Jenis_Kelamin = input($_POST["Jenis_Kelamin"]);
                $prodi = input($_POST["Prodi"]);
                $Tgl = input($_POST["Tanggal_Lahir"]);
                $Email = input($_POST["Email"]);
        
                $sql = "update form set 
                    nama='$Nama',
                    jenis_kelamin='$Jenis_Kelamin',
                    Prodi='$prodi',
                    tgl_lahir='$Tgl',
                    email='$Email' 
                    where ID='$ID'";
        
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo "<script>alert('Data berhasil diupdate.');window.location='formulir.php';</script>";
                    exit;
                } else {
                    echo "<script>alert('Data gagal diupdate.'); window.location='formulir.php';</script>";
                }
            }
        ?>
    <center><h2>Update data</h2></center>
    <div class="cont-form">
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" class="form">
            <center><table>
                <tr>
                    <td><h2>Nama</h2></td>
                    <td><input type="text" name="Nama" id="Nama" required  placeholder="Nama" value="<?= $data['nama'] ?>"></td>
                </tr>
                <tr>
                    <td><h2>Jenis Kelamin</h2></td>
                    <td> <select name="Jenis_Kelamin" id="Jenis_Kelamin" required value="<?= $data['jenis_kelamin'] ?>">
                        <option value="0" selected>pilih</option>
                        <option value="laki-laki" <?= ($data['jenis_kelamin'] == 'laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                        <option value="Perempuan"<?= ($data['jenis_kelamin'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                    </select></td>
                </tr>
                <tr>
                    <td><h2>Program Studi</h2></td>
                    <td><input type="text" name="Prodi" id="Prodi" required placeholder="Program Studi" value="<?= $data['Prodi'] ?>"></td>
                </tr>
                <tr>
                    <td><h2>Tanggal Lahir</h2></td>
                    <td><input type="date" name="Tanggal_Lahir" id="Tanggal_Lahir" required placeholder="Tanggal" value="<?= $data['tgl_lahir'] ?>"></td>
                </tr>
                <tr>
                    <td><h2>Email</h2></td>
                    <td><input type="text" name="Email" id="Email" required placeholder="Email" value="<?= $data['email'] ?>"></td>
                </tr>
            </table></center>
            <input type="hidden" name="ID" value="<?php echo $data['ID']; ?>" />
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
