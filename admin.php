<!DOCTYPE HTML>
<html>

<head>
    <title>Admin Dashboard</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #D2B48C;
        }

        header {
            background-color: #b69468;
            color: #ffffff;
            text-align: center;
            padding: 20px;
            font-size: 32px;
            font-weight: bold;
            font-family: 'Montserrat', sans-serif;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        main {
            padding: 20px;
        }

        section {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        h2 {
            font-family: 'Arial', sans-serif;
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

        input[type="file"],
        input[type="text"],
        select,
        textarea {
            background-color: #f8f9fa;
            padding: 10px;
            border: 1px solid #ced4da;
            margin-bottom: 10px;
            border-radius: 5px;
            width: 100%;
            /* Set width to 100% */
            box-sizing: border-box;
            /* Include padding and border in the element's total width */
        }

        select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
        }

        select::after {
            content: '\25BC';
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            pointer-events: none;
        }


        input[type="submit"] {
            background-color: #b69468;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            display: block;
            width: fit-content;
            margin: auto;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #090a0a;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin-top: 0;
        }

        a {
            color: #b69468;
            text-decoration: none;
            font-weight: bold;
            font-family: 'Poppins', sans-serif;
        }

        a:hover {
            text-decoration: underline;
        }

        .dropdown {
            position: relative;
            display: inline-block;
            margin-bottom: 10px;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #ffffff;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            border-radius: 5px;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .caption {
            margin-top: 10px;
            font-size: 14px;
            color: #6c757d;
        }

        .logout-btn {
            display: block;
            width: fit-content;
            margin: auto;
            background-color: #161513;
            color: #ffffff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s;
            text-align: center;
        }

        .logout-btn:hover {
            background-color: #333333;
        }
    </style>
</head>

<body>
    <header>
        Admin Dashboard
    </header>
    <main>
        <section id="image-management">
            <h2>Tambah Item Kebudayaan</h2>
            <form id="image-upload-form" action="./backend/be-add-item.php" method="POST" enctype="multipart/form-data">

                <input type="file" name="image" required>
                <br>
                <input type="text" name="item_name" placeholder="Nama Item" required>
                <br>
                <textarea name="description" placeholder="Description" required></textarea>
                <br>
                <select name="province_id" required>
                    <option value="" disabled selected>Select Province</option>
                    <?php
                    // Include database connection
                    include "./config/connection.php";

                    // Fetch provinces from database
                    $sqlProvinces = "SELECT * FROM Provinces";
                    $resultProvinces = mysqli_query($connection, $sqlProvinces);

                    // Loop through provinces and create options
                    if ($resultProvinces && mysqli_num_rows($resultProvinces) > 0) {
                        while ($row = mysqli_fetch_assoc($resultProvinces)) {
                            echo '<option value="' . $row["province_id"] . '">' . $row["name"] . '</option>';
                        }
                    }
                    ?>
                </select>
                <br>
                <select name="category_id" required>
                    <option value="" disabled selected>Select Category</option>
                    <?php
                    // Fetch categories from database
                    $sqlCategories = "SELECT * FROM Categories";
                    $resultCategories = mysqli_query($connection, $sqlCategories);

                    // Loop through categories and create options
                    if ($resultCategories && mysqli_num_rows($resultCategories) > 0) {
                        while ($row = mysqli_fetch_assoc($resultCategories)) {
                            echo '<option value="' . $row["category_id"] . '">' . $row["name"] . '</option>';
                        }
                    }
                    ?>
                </select>
                <br>
                <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                <input type="submit" value="SUBMIT">
            </form>
        </section>
    </main>
    <a href="index.php" class="logout-btn">Logout</a> <!-- Tautan untuk logout admin -->
</body>

</html>