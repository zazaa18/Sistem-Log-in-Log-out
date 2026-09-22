<?php
session_start();

require_once "../config/database.php";

// Jika sudah login, langsung alihkan ke dashboard
if (isset($_SESSION['admin_id'])) {
    header("Location: ../dashboard/index.php");
    exit;
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email    = trim($_POST["email"] ?? "");
    $password = $_POST["password"] ?? "";

    if (empty($email) || empty($password)) {
        $error = "Email dan password wajib diisi.";
    } else {
        $sql  = "SELECT * FROM admins WHERE email = :email LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["email" => $email]);
        $admin = $stmt->fetch();

        if ($admin && password_verify($password, $admin["password"])) {
            session_regenerate_id(true);

            $_SESSION["admin_id"]    = $admin["id"];
            $_SESSION["admin_name"]  = $admin["name"];
            $_SESSION["admin_email"] = $admin["email"];

            header("Location: ../dashboard/index.php");
            exit;
        } else {
            $error = "Email atau password yang Anda masukkan salah.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

    <!-- Google Font: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="login-container">
    <div class="login-card">

        <!-- =========================
             BAGIAN KIRI (GRADASI BIRU POLOS)
        ========================== -->
        <div class="login-left">
            <!-- Lingkaran Lengkungan Dekorasi Halus -->
            <div class="login-curve-shape shape-one"></div>
            <div class="login-curve-shape shape-two"></div>

            <div class="login-left-inner">
                <!-- Logo Brand Tameng S -->
                <div class="login-brand">
                    <div class="brand-shield">
                        <i class="fa-solid fa-shield-halved"></i>
                        <span class="brand-letter">S</span>
                    </div>
                    <span>Admin Panel</span>
                </div>

                <!-- Teks Sambutan Kiri -->
                <div class="login-left-content">
                    <h2>Kelola Data,<br><span>Lebih Mudah</span></h2>
                    <p>Masuk ke akun admin untuk mengakses dashboard dan mengelola sistem.</p>
                </div>
            </div>
        </div>

        <!-- =========================
             BAGIAN KANAN (FORM LOGIN)
        ========================== -->
        <div class="login-right">
            
            <!-- Avatar Bulat Biru & Judul -->
            <div class="login-header">
                <div class="login-avatar-circle">
                    <i class="fa-solid fa-user"></i>
                </div>
                <h1>Admin Login</h1>
                <p>Silakan login untuk melanjutkan<br>ke dashboard.</p>
            </div>

            <!-- Pesan Notifikasi Error -->
            <?php if (!empty($error)): ?>
                <div class="alert-error">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    <span><?= htmlspecialchars($error) ?></span>
                </div>
            <?php endif; ?>

            <form method="POST" action="" autocomplete="off">
                
                <!-- Input Email -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <div class="input-wrapper">
                        <span class="input-icon">
                            <i class="fa-regular fa-envelope"></i>
                        </span>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="Masukkan email"
                            value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                            required
                        >
                    </div>
                </div>

                <!-- Input Password -->
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="password-wrapper">
                        <span class="input-icon">
                            <i class="fa-solid fa-lock"></i>
                        </span>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Masukkan password"
                            required
                        >
                        <button
                            type="button"
                            class="toggle-password"
                            id="togglePassword"
                            aria-label="Tampilkan password"
                        >
                            <i class="fa-regular fa-eye-slash"></i>
                        </button>
                    </div>
                </div>

                <!-- Tombol Submit -->
                <button type="submit" class="btn-login">
                    Login <i class="fa-solid fa-arrow-right"></i>
                </button>

            </form>

            <!-- Garis Pemisah Footer -->
            <div class="login-footer">
                <span></span>
                <small>Admin Management System</small>
                <span></span>
            </div>

        </div>

    </div>
</div>

<!-- Script Show / Hide Kata Sandi -->
<script>
document.addEventListener("DOMContentLoaded", () => {
    const toggleBtn = document.getElementById("togglePassword");
    const passwordInput = document.getElementById("password");

    if (toggleBtn && passwordInput) {
        toggleBtn.addEventListener("click", () => {
            const isPassword = passwordInput.getAttribute("type") === "password";
            passwordInput.setAttribute("type", isPassword ? "text" : "password");
            
            const icon = toggleBtn.querySelector("i");
            if (icon) {
                icon.className = isPassword ? "fa-regular fa-eye" : "fa-regular fa-eye-slash";
            }
        });
    }
});
</script>

</body>
</html>