<!DOCTYPE HTML>
<html>

<head>
    <title>Sign Up</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>

<body class="homepage is-preload">
    <div id="page-wrapper">

        <!-- Header -->
        <header id="header">
            <div class="logo container">
                <div>
                    <h1><a href="index.php" id="logo">Sign Up</a></h1>
                </div>
            </div>
        </header>

        <!-- Formulir Sign Up -->
        <section id="signup-section" class="box">
            <form id="signup-form" action="backend/be-signup.php" method="POST">
                <div class="row gtr-50">
                    <div class="col-6 col-12-mobile">
                        <input type="text" name="username" id="username" placeholder="Username" required>
                    </div>
                    <div class="col-6 col-12-mobile">
                        <input type="email" name="email" id="email" placeholder="Email" required>
                    </div>
                    <div class="col-6 col-12-mobile">
                        <input type="password" name="password" id="password" placeholder="Password" required>
                    </div>
                    <div class="col-6 col-12-mobile">
                        <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required>
                    </div>
                    <div class="col-12">
                        <input type="submit" value="Sign Up">
                    </div>
                </div>
            </form>
        </section>


        <!-- Link to Signup -->
        <section id="signup-link" class="box" style="font-size: 16px; font-family: Arial, sans-serif;">
            <p style="margin: 0; color:black">Already have an account? <a href="index.php" style="text-decoration: none; color: #a78b12; font-weight: bold;">Login here</a></p>
        </section>

        <!-- <script>
            // Function to redirect to beranda.php after login form submission
            document.addEventListener("DOMContentLoaded", function() {
                document.getElementById("signup-form").addEventListener("submit", function(event) {
                    event.preventDefault(); // Prevent the default form submission
                    // Redirect to beranda.php
                    window.location.href = "admin.php";
                });
            });
        </script> -->
    </div>
</body>

</html>