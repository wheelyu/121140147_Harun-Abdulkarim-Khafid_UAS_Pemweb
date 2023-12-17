<?php
    session_start();
    include '../process.php';
    if(isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
    }
    // Hindari SQL injection dengan menggunakan parameterized query
    $query = "SELECT * FROM logins WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param("ss", $username, $password); // s: string, jika password disimpan dalam bentuk hash, ganti dengan hash
        $stmt->execute();
        $stmt->store_result();

    if ($stmt->num_rows == 1) {
        // Login berhasil
        $_SESSION['username'] = $username;
        header("Location: ../admin.php");
        exit();
    } else {
        echo "<script>alert('Username atau password salah!'); window.location='../login.php';</script>";
    }

    $stmt->close();
    }else {
        // Tangani kesalahan query
        echo "Kesalahan query: " . $conn->error;
    }
    $conn->close();
?>
