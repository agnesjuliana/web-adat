<?php
include "../config/connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $hashed_password = md5($password); 

    $sql = "INSERT INTO Users (name, email, username, password) VALUES ('$name', '$email', '$username', '$hashed_password')";
    if (mysqli_query($connection, $sql)) {
        header("Location: ../success-register.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
} else {
    header("Location: ../index.php");
    exit();
}
?>
