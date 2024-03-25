<?php
    include "../config/connection.php";
    session_start();

    if(isset($_GET['category_id']) && isset($_GET['province_id'])) {
        // Get the category_id and province_id from the GET request
        $category_id = $_GET['category_id'];
        $province_id = $_GET['province_id'];

        // Prepare the SQL statement with placeholders
        $sql = "SELECT * FROM CultureItems WHERE category_id = ? AND province_id = ?";
        
        // Prepare the SQL statement
        $stmt = mysqli_prepare($connection, $sql);

        mysqli_stmt_bind_param($stmt, "ii", $category_id, $province_id);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        $cultureItems = mysqli_fetch_all($result, MYSQLI_ASSOC);

        mysqli_stmt_close($stmt);

        // Output the result as JSON
        echo json_encode($cultureItems);
    } else {
        echo json_encode(array("error" => "category_id and province_id are required"));
    }

    mysqli_close($connection);
?>
