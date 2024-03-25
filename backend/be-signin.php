<?php
include "../config/connection.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM Users WHERE username = '$username'";
    $result = mysqli_query($connection, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        if ($user['password'] == md5($password)) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            
            header("Location: ../admin.php");
            exit();
        } else {
            echo '<script>alert("Password is incorrect"); window.location.href = "../index.php#login-section";</script>';
        }
    } else {
        echo '<script>alert("User does not exist"); window.location.href = "../index.php#login-section";</script>';
    }
}
?>
