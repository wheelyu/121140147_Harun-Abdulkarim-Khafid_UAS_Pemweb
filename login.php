<?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: admin.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="img/harun.png" type="image/x-icon">

    <link rel="stylesheet" href="assets/style.css">

</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Login</h2>
        </div>
        <form class="form" id="form" action="action/auth.php" method="POST">
            <div class="form-control">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Enter Username">
            </div>
            <div class="form-control">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter Password">
            </div>
            <button type="submit">Login</button>
            <a href="index.php">Kembali</a>
        </form>
        <br>
        <a href="daftar.php">&nbsp;&nbsp;&nbsp;Tidak punya akun?</a>
        <p>&nbsp;</p>
    </div>

</body>
</html>