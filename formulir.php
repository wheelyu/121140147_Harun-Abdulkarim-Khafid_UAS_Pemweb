<?php
session_start(); // Mulai sesi
// Cek apakah sesi pengguna sudah ada
    if (!isset($_SESSION['username'])) {
        // Jika belum ada, redirect ke halaman login
        header("Location: login.php");
        exit;
    }
    function get_client_ip() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
    // Mengambil informasi browser pengguna
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $browser = get_browser($user_agent, true);

    include "process.php";
    //Cek apakah ada kiriman form dari method post
    if (isset($_GET['ID'])) {
        $ID=htmlspecialchars($_GET["ID"]);

        $sql="delete from form where ID='$ID' ";
        $hasil=mysqli_query($conn,$sql);
        if($hasil){
            echo "<script>alert('Data berhasil dihapus');</script>";
            
        }else{
            echo "<script>alert('Data gagal dihapus'); window.location='formulir.php';</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir</title>
    <link href="assets/styles3.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/harun.png" type="image/x-icon">
</head>
<body>
    <div class="bg">
        <nav>
            <div class="home-cont">
                <a href="admin.php"class="home-btn">Home</a>
            </div>
            <div class="login-cont">
            <a href="action/logout.php" class="login">Log out</a>
            </div>
            <div class="title-cont">
                <h1><center>Pemrograman WEB</center></h1>
            </div>
        </nav>
    <center><h3>Daftar</h3></center>
    <div class="test ">
        <center>
        <table class="table1">
            <tr >  
                <th>No</th>         
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Program Studi</th>
                <th>Tanggal Lahir</th>
                <th>Email</th>
                <th colspan='2'>Aksi</th>
            </tr>
            <?php
                include "process.php";
                $sql="select * from form order by ID asc";

                $hasil=mysqli_query($conn,$sql);
                $no=0;
                while ($data = mysqli_fetch_array($hasil)) {
                    $no++;
            ?> 
                <tbody>
                    <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $data["nama"]; ?></td>
                        <td><?php echo $data["jenis_kelamin"]; ?></td>
                        <td><?php echo $data["Prodi"]; ?></td>
                        <td><?php echo $data["tgl_lahir"]; ?></td>
                        <td><?php echo $data["email"]; ?></td>
                        <td>
                            <div class="btn1"> 
                                <a href="update.php?ID=<?php echo htmlspecialchars($data['ID']); ?>" class="btn btn-warning" role="button">Update</a>
                            </div>
                            <div class="btn2">
                                <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?ID=<?php echo $data['ID']; ?>" class="btn btn-danger" role="button">Delete</a>
                            </div>
                        </td>
                        
                    </tr>
                </tbody>
            <?php
            }
            ?>
        </table>
        
        </center>
        <div class="tambah-data">
            <a href="input.php" class="btn-data" role="button">Tambah Data</a>
        </div>
        
    </div>
    <center>
    <br><br><br><br><br><br><br><br><br><br><br><br>
    <h4>Alamat IP dan Browser User</h4>
        <div class="address">
            <table class="table2">
                <tr>
                    <th width="50%">IP</th>
                    <th>Browser</th>
                </tr>
                <tr>
                    <td><?php echo get_client_ip(); ?></td>
                    <td><?php echo $browser['browser']; ?></td>
                </tr>
            </table>
        </div>
    </center>
    </div>
    <footer class="footer">
        <div>
            <center><h4>Copyright &copy; Harun Abdulkarim 121140147</h4></center>
        </div>
    </footer>

</body>
</html>