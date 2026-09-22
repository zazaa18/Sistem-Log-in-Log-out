<?php
session_start();

if (!isset($_SESSION["admin_id"])) {
    header("Location: ../auth/login.php");
    exit;
}

$adminName  = $_SESSION["admin_name"] ?? "Administrator";
$adminEmail = $_SESSION["admin_email"] ?? "admin@gmail.com";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>

    <!-- Google Font: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome 6 Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="dashboard-container">

    <!-- SIDEBAR NAVIGASI (DENGAN DEKORASI LENGKUNGAN BULAT BAWAH) -->
    <aside class="sidebar">
        <div class="sidebar-logo">
            <div class="logo-icon">
                <i class="fa-solid fa-shield-halved"></i>
            </div>
            <span>Admin Panel</span>
        </div>

        <nav class="sidebar-menu">
            <a href="index.php" class="menu-item active">
                <span class="menu-icon"><i class="fa-solid fa-house"></i></span>
                <span>Dashboard</span>
            </a>
            <a href="#" class="menu-item">
                <span class="menu-icon"><i class="fa-solid fa-user"></i></span>
                <span>Pengguna</span>
            </a>
            <a href="#" class="menu-item">
                <span class="menu-icon"><i class="fa-solid fa-gear"></i></span>
                <span>Pengaturan</span>
            </a>

            <div class="sidebar-divider"></div>

            <a href="../auth/logout.php" class="menu-item logout-menu">
                <span class="menu-icon"><i class="fa-solid fa-arrow-right-from-bracket"></i></span>
                <span>Logout</span>
            </a>
        </nav>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="main-content">

        <!-- DEKORASI LENGKUNGAN LATAR BELAKANG ATAS HALAMAN -->
        <div class="bg-shape-dashboard"></div>

        <!-- TOPBAR -->
        <header class="topbar">
            <div></div>

            <div class="admin-profile">
                <div class="profile-avatar">
                    <i class="fa-solid fa-circle-user"></i>
                </div>
                <span><?= htmlspecialchars($adminName) ?></span>
                <i class="fa-solid fa-chevron-down profile-arrow"></i>
            </div>
        </header>

        <!-- DASHBOARD CONTENT AREA -->
        <section class="dashboard-content">

            <!-- KARTU SAMBUTAN UTAMA -->
            <div class="dashboard-card">
                
                <!-- BENTUK BULAT / BLOB LATAR BELAKANG DI DALAM KARTU -->
                <div class="card-bg-circle"></div>

                <div class="welcome-content">
                    
                    <!-- TEKS KIRI -->
                    <div class="welcome-text">
                        <div class="dashboard-label">
                            <i class="fa-solid fa-shield-halved"></i> Dashboard
                        </div>
                        
                        <h1>
                            Selamat Datang,<br>
                            <span><?= htmlspecialchars($adminName) ?>!</span>
                        </h1>
                        
                        <p>
                            Anda berhasil login ke dalam sistem administrator.<br>
                            
                        </p>

                        <div class="email-info">
                            <div class="email-icon">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div class="email-text">
                                <small>Email</small>
                                <strong><?= htmlspecialchars($adminEmail) ?></strong>
                            </div>
                        </div>
                    </div>

                    <!-- ILUSTRASI 3D LAPTOP, PERISAI GEMBOK & POT TANAMAN -->
                    <div class="welcome-illustration">
                        <svg viewBox="0 0 520 380" width="100%" height="100%" preserveAspectRatio="xMidYMid meet">
                            <defs>
                                <filter id="baseShadow" x="-20%" y="-20%" width="140%" height="140%">
                                    <feDropShadow dx="0" dy="18" stdDeviation="15" flood-color="#4f46e5" flood-opacity="0.14"/>
                                </filter>

                                <linearGradient id="screenFill" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" stop-color="#f5f8ff"/>
                                    <stop offset="100%" stop-color="#e9efff"/>
                                </linearGradient>

                                <linearGradient id="shieldGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" stop-color="#5e5ce6"/>
                                    <stop offset="100%" stop-color="#433ecd"/>
                                </linearGradient>
                                
                                <linearGradient id="shieldInner" x1="0%" y1="0%" x2="0%" y2="100%">
                                    <stop offset="0%" stop-color="#7270f8"/>
                                    <stop offset="100%" stop-color="#514de6"/>
                                </linearGradient>
                            </defs>

                            <!-- BLOB LATAR BELAKANG LENGKUNG -->
                            <path d="M120 220 C70 120 170 40 290 50 C410 60 510 130 500 240 C490 330 380 370 260 360 C150 350 140 280 120 220 Z" fill="#ebf0fe" opacity="0.8"/>
                            <ellipse cx="320" cy="315" rx="190" ry="24" fill="#dce5fb" opacity="0.6"/>

                            <!-- PERCIKAN SINAR (SPARKLES DI ATAS LAPTOP) -->
                            <path d="M428 72 L438 52" stroke="#5e5ce6" stroke-width="4.5" stroke-linecap="round"/>
                            <path d="M446 88 L466 84" stroke="#5e5ce6" stroke-width="4.5" stroke-linecap="round"/>
                            <circle cx="398" cy="74" r="4" fill="#c7d2fe"/>
                            <circle cx="448" cy="115" r="3" fill="#c7d2fe"/>

                            <!-- TANAMAN HIAS & POT KERAMIK PUTIH -->
                            <g transform="translate(45, 95)">
                                <path d="M90 140 C55 105 45 45 60 15 C82 38 88 95 90 140 Z" fill="#38a169"/>
                                <path d="M90 140 C100 90 135 40 155 30 C158 60 132 108 90 140 Z" fill="#2f855a"/>
                                <path d="M90 140 C45 120 30 75 42 45 C66 65 85 105 90 140 Z" fill="#48bb78"/>
                                <path d="M90 140 C75 80 85 25 96 5 C108 28 105 85 90 140 Z" fill="#38a169"/>
                                <path d="M90 140 C110 100 150 85 165 62 C156 95 125 122 90 140 Z" fill="#68d391"/>

                                <ellipse cx="90" cy="205" rx="34" ry="7" fill="#c7d3eb" opacity="0.6"/>
                                <path d="M62 145 L118 145 L111 200 C110 205 104 208 99 208 L81 208 C76 208 70 205 69 200 Z" fill="#ffffff" stroke="#d5def0" stroke-width="2.5"/>
                                <rect x="56" y="137" width="68" height="11" rx="5" fill="#f8fafc" stroke="#d5def0" stroke-width="2.5"/>
                            </g>

                            <!-- LAPTOP DENGAN PERSPEKTIF MIRING 3D -->
                            <g filter="url(#baseShadow)">
                                <!-- Bagian Bawah / Keyboard -->
                                <path d="M142 298 L385 348 L460 310 L460 302 L385 340 L142 290 Z" fill="#b9c6ea"/>
                                <path d="M142 290 L385 340 L460 302 L230 262 Z" fill="#e8effd" stroke="#5e5ce6" stroke-width="3.5" stroke-linejoin="round"/>
                                
                                <path d="M250 306 L330 322 L315 330 L238 314 Z" fill="#d2defa"/>
                                <rect x="360" y="337" width="28" height="4" rx="2" fill="#5e5ce6" transform="rotate(11 360 337)"/>

                                <!-- Bingkai Layar Miring -->
                                <path d="M228 152 L422 120 C428 119 434 123 435 129 L410 300 C409 306 403 310 397 311 L203 277 C197 276 193 270 194 264 L219 159 C220 155 224 152 228 152 Z" 
                                      fill="#ffffff" stroke="#5e5ce6" stroke-width="6" stroke-linejoin="round"/>

                                <!-- Permukaan Layar LCD -->
                                <path d="M233 163 L414 133 C417 132.5 420 134.5 420.5 137.5 L399 288 C398.5 291 395.5 293 392.5 292.5 L211 262 C208 261.5 206 258.5 206.5 255.5 L227 167 C227.5 164.5 230 163 233 163 Z" 
                                      fill="url(#screenFill)"/>

                                <circle cx="328" cy="144" r="2.5" fill="#5e5ce6"/>

                                <!-- Sketsa Bar di Kiri Layar -->
                                <path d="M245 186 L285 180" stroke="#cdd9f8" stroke-width="5" stroke-linecap="round"/>
                                <path d="M243 200 L275 195" stroke="#dbe5fc" stroke-width="4.5" stroke-linecap="round"/>

                                <!-- PERISAI DAN GEMBOK -->
                                <g transform="translate(325, 215) rotate(-3)">
                                    <path d="M0 -34 C18 -34 35 -24 35 -6 C35 22 0 42 0 42 C0 42 -35 22 -35 -6 C-35 -24 -18 -34 0 -34 Z" fill="#2e3bb4" opacity="0.15" transform="translate(0, 4)"/>
                                    <path d="M0 -36 C20 -36 38 -26 38 -7 C38 24 0 44 0 44 C0 44 -38 24 -38 -7 C-38 -26 -20 -36 0 -36 Z" fill="url(#shieldGrad)"/>
                                    <path d="M0 -32 C17 -32 32 -23 32 -6 C32 20 0 37 0 37 C0 37 -32 20 -32 -6 C-32 -23 -17 -32 0 -32 Z" fill="url(#shieldInner)"/>

                                    <rect x="-11" y="-5" width="22" height="18" rx="4" fill="#ffffff"/>
                                    <circle cx="0" cy="2" r="2.5" fill="#5e5ce6"/>
                                    <path d="M-1 2 L1 2 L1.5 6 L-1.5 6 Z" fill="#5e5ce6"/>
                                    <path d="M-7 -5 V-13 C-7 -17.5 -3.5 -20 0 -20 C3.5 -20 7 -17.5 7 -13 V-5" 
                                          fill="none" stroke="#ffffff" stroke-width="3.5" stroke-linecap="round"/>
                                </g>
                            </g>
                        </svg>
                    </div>

                </div>
            </div>

        </section>

    </main>

</div>

</body>
</html>