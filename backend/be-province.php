<?php
    // Create connection
    include "../config/connection.php";
    session_start();

    // Fetch provinces from the database
    $sqlProvinces = "SELECT * FROM Provinces ORDER BY name ASC";
    $resultProvinces = mysqli_query($connection, $sqlProvinces);
    $provinces = array();

    if ($resultProvinces && mysqli_num_rows($resultProvinces) > 0) {
        while ($row = mysqli_fetch_assoc($resultProvinces)) {
            $provinces[] = $row;
        }
    }

    // Output provinces as JSON
    echo json_encode($provinces);

    mysqli_close($connection);
?>
