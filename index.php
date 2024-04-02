<!DOCTYPE HTML>
<html>

<head>
    <title>Budaya Nusantara</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <!-- <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f7f1de;
            overflow-x: hidden;
        }

        header {
            background-color: #324851;
            /* height: 100px; */
            /* padding: 20px 0; */
        }

        #header .logo {
            text-align: center;
        }

        #header .logo a {
            font-size: 1.5rem;
            color: #f7f1de;
            text-decoration: none;
            border-top: 0;
            top: 0;
        }

        #login-section {
            background-color: #f7f1de;
            padding: 50px 20px;
            text-align: center;
        }

        #login-section h2 {
            color: #324851;
            font-size: 2rem;
            margin-bottom: 30px;
        }

        #login-form {
            max-width: 100vw;
            margin: 0 auto;
            padding: 0 20px;
        }

        #login-form input[type="text"],
        #login-form input[type="password"],
        #login-form input[type="submit"] {
            width: calc(100% - 30px);
            /* Adjusted width to accommodate padding */
            padding: 15px;
            margin-bottom: 20px;
            border: none;
            border-radius: 5px;
            font-size: 1.1rem;
        }

        #login-form input[type="submit"] {
            width: calc(100% - 30px);
            /* Adjusted width to match the input fields */
            padding: 15px;
            margin-bottom: 20px;
            border: none;
            border-radius: 5px;
            font-size: 1.1rem;
            display: block;
            /* Ensure the button takes up the full width */
            margin: 0 auto;
            /* Center the button horizontally */
            background-color: #324851;
            color: #f7f1de;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        #login-form input[type="submit"]:hover {
            background-color: #1e2b36;
        }


        p {
            color: #324851;
            font-size: 1.1rem;
        }
    </style> -->
</head>

<body class="homepage is-preload">
    <!-- Banner -->
    <section id="banner">
        <div class="content">
            <h2>Selamat datang di Budaya Nusantara</h2>
            <p>Budaya Indonesia yang kaya berpadu dengan teknologi yang interaktif: sebuah website yang menyenangkan untuk dijajaki</p>
            <!-- Pilihan Admin -->
            <a href="#login-section" class="button scrolly">Admin</a>
            <!-- Pilihan Pengguna -->
            <a href="beranda.php" class="button scrolly">Pengunjung</a>
        </div>
    </section>

    <!-- Formulir Login -->
    <section id="login-section" class="box">
        <h2>MASUK SEBAGAI ADMINISTRATOR</h2>
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
        <p>Belum punya akun? <a href="signup.php">Sign Up</a></p>
    </section>

</body>

</html>