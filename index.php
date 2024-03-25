<!DOCTYPE HTML>
<html>

<head>
    <title>Budaya Nusantara</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>

<body class="homepage is-preload">
    <!-- Header -->
    <header id="header">
        <div class="logo container">
            <h1><a href="index.php" id="logo">Budaya Nusantara</a></h1>
        </div>
    </header>

    <!-- Banner -->
    <section id="banner">
        <div class="content">
            <h2>Selamat datang di Budaya Nusantara</h2>
            <p>Budaya Indonesia yang kaya berpadu dengan teknologi yang interaktif: sebuah website yang menyenangkan untuk dijajaki.</p>
            <!-- Pilihan Admin -->
            <a href="#login-section" class="button scrolly">Admin</a>
            <!-- Pilihan Pengguna -->
            <a href="beranda.php" class="button scrolly">Pengunjung</a>
        </div>
    </section>
    <br> <br> <br>

    <!-- Formulir Login -->
    <section id="login-section" class="box">
        <h2>Login</h2>
        <form id="login-form" action="backend/be-signin.php" method="POST">
            <div class="row gtr-50">
                <div class="col-6 col-12-mobile">
                    <input type="text" name="username" id="username" placeholder="Username" required>
                </div>
                <div class="col-6 col-12-mobile">
                    <input type="password" name="password" id="password" placeholder="Password" required>
                </div>
                <div class="col-12">
                    <input type="submit" name="submit" value="Login">
                </div>
            </div>
        </form>

        <!-- Tulisan Create account? Sign Up -->
        <p style="margin-top: 0; color: #f7f1de; text-align: center;">Create account? <a href="signup.php" style="text-decoration: none; color: #e7e3d5; font-weight: bold;">Sign Up</a></p>
    </section>


    <!-- <script>
        // Function to redirect to beranda.php after login form submission
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("login-form").addEventListener("submit", function(event) {
                event.preventDefault(); // Prevent the default form submission
                // Redirect to beranda.php
                window.location.href = "admin.php";
            });
        });
    </script> -->
</body>

</html>