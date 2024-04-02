<?php
// Include database connection
include "../config/connection.php";

session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $category_id = $_POST['category_id'];
    $province_id = $_POST['province_id'];
    $item_name = $_POST['item_name'];
    $description = $_POST['description'];
    $user_id = $_SESSION['user_id']; // Assuming you have a user session

    // File upload handling
    $targetDirectory = "../images/"; // Directory where images will be stored

    // Check if the target directory exists and create it if it doesn't
    if (!is_dir($targetDirectory)) {
        // Attempt to create the directory
        if (!mkdir($targetDirectory, 0755, true)) {
            echo "Failed to create the target directory: $targetDirectory";
            exit;
        }
    }

    // Check if the script has write permissions to the target directory
    if (!is_writable($targetDirectory)) {
        echo "The script does not have write permissions to the target directory: $targetDirectory";
        exit;
    }

    $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is an actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";

            // File uploaded successfully, now insert into database
            $sql = "INSERT INTO CultureItems (province_id, category_id, user_id, description, image, name)
                    VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($connection, $sql);

            $databaseFilePath = substr($targetFile, 3);

            // Bind parameters
            mysqli_stmt_bind_param($stmt, "iiisss", $province_id, $category_id, $user_id, $description, $databaseFilePath, $item_name);

            // Execute query
            if (mysqli_stmt_execute($stmt)) {
                header("Location: ../success-add-item.php");
            } else {
                echo "Error inserting data into the database.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>