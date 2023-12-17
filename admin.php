<?php
session_start(); // Mulai sesi
// Cek apakah sesi pengguna sudah ada
    if (!isset($_SESSION['username'])) {
        // Jika belum ada, redirect ke halaman login
        header("Location: login.php");
        exit;
    }
?>
<?php
  include 'process.php';
    $sql = "SELECT * FROM logins where username = '$_SESSION[username]'";
    $result = $conn->query($sql);
    $data = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="shortcut icon" href="img/harun.png" type="image/x-icon">
  </head>
<body>
  <div class="bg">
      <nav>
          <div class="home-cont">
            <a href="formulir.php"class="home-btn">Formulir</a>
          </div>
          <div class="login-cont">
              <a href="action/logout.php" class="login">Log out</a>
          </div>
          <div class="title-cont">
            <h1><center>Pemrograman WEB</center></h1>
          </div>
      </nav>

    <div class="home">
        <h2>Selamat datang <?php echo $data['username']; ?></h2>
        <h2>di Website Saya</h2>
    </div>
    <section>

        <div class="about">
          <h1>About me</h1>
        </div>
        <center>
        <div class="about-table">
            <img src="profile.jpg" width="200">
            <p>Mahasiswa aktif di Institut Teknologi Sumatera, program studi Teknik Informatika angkatan 2021, 
            memiliki rasa tanggung jawab yang tinggi sehingga dapat bekerja sama dalam kelompok tertentu dengan baik,
            memiliki keinginan untuk mencari pengalaman baru dengan tujuan mengasah soft skill. 
          </p>
        </div>
        <footer>
        <div class="container"><small>Copyright &copy; Harun Abdulkarim Khafid 121140147</small></div>
        </footer>
        </center>
      

    </section>

  </div>
</body>
</html>
