
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>
    <link rel="shortcut icon" href="img/harun.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Daftar Akun</h2>
        </div>
        <form class="form" id="form" action="action/kirim.php" method="POST">
            <div class="form-control">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Enter Username" required>
            </div>
            <div class="form-control">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter Password" required>
            </div>

            <button type="submit">Daftar</button>
            <a href="login.php">Kembali</a>
        </form>
    </div>

</body>
</html>