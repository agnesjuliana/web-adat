<?php
// Create connection
include "config/connection.php";
session_start();

// Fetch provinces from the database
$sqlProvinces = "SELECT name FROM Provinces ORDER BY name ASC";
$resultProvinces = mysqli_query($connection, $sqlProvinces);
$provinces = array();
mysqli_close($connection);

?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Alat Musik Daerah</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f7f1de;
            /* overflow-x: hidden; */
            overflow-y: scroll;
        }

        #header .user-logo {
            padding-top: 100px;
        }

        #nav img {
            width: 20px;
            height: 20px;
            vertical-align: middle;
            margin-right: 5px;
        }

        #nav h1 a {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: inherit;
        }

        .container-province {
            margin: 0 auto;
            padding: 20px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .search-container {
            margin-top: 60px;
            width: 100%;
            max-width: 90vw;
        }

        #province-select {
            margin-right: 10px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
            font-size: 16px;
            color: #333;
            appearance: none;
            background-repeat: no-repeat;
            background-position: right 10px center;
            cursor: pointer;
            width: 100%;
        }

        #province-select:hover {
            background-color: #f0f0f0;
        }

        #province-select:focus {
            outline: none;
            border-color: #D2B48C;
        }

        #province-select option:hover {
            background-color: #D2B48C;
            color: #fff;
        }

        .province-dropdown {
            position: relative;
            width: 200px;
        }

        .province-dropdown::after {
            content: '\25BC';
            font-size: 14px;
            color: #555;
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
        }

        #search {
            flex-grow: 1;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        #search-btn {
            padding: 8px 20px;
            border: none;
            border-radius: 5px;
            background-color: #D2B48C;
            color: white;
            cursor: pointer;
        }

        #search-btn:hover {
            background-color: #D2B48C;
        }

        .province-info {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            width: 80vw;
        }

        .province-info img {
            max-width: 100%;
            max-height: 400px;
            min-height: 30vw;
            min-width: 30vw;
            border-radius: 5px;
        }

        .province-info {
            display: flex;
            align-items: center;
        }

        .info-content {
            display: flex;
            flex-direction: column;
        }

        .info-details {
            display: flex;
            align-items: center;
        }

        .info-details img {
            max-width: 50%;
            margin-right: 20px;
            /* Adjust margin as needed */
        }

        #province-description {
            flex-grow: 1;
        }

        .province-title {
            margin-bottom: 20px;
            text-align: center;
            font-size: 3rem;
        }
    </style>
</head>

<body class="is-preload">
    <div id="page-wrapper">

        <!-- Header -->
        <header id="header">
            <div class="user-logo container">
                <div>
                    <h1>
                        <a href="index.php" id="logo">Alat Musik Daerah</a>
                    </h1>
                </div>
            </div>
        </header>

        <!-- Nav -->
        <nav id="nav" style="font-family: Arial, sans-serif;">
            <ul>
                <li><a href="beranda.php"><img src="images/home.png" alt="Home"></a></li>
                <li><a href="rumah-adat.php">Rumah Adat</a></li>
                <li><a href="pakaian-adat.php">Pakaian Adat</a></li>
                <li><a href="alat-musik.php">Alat Musik Daerah</a></li>
                <li><a href="tarian-adat.php">Tarian Adat</a></li>
                <li><a href="makanan.php">Makanan Tradisional</a></li>
                <li><a href="senjata.php">Senjata Tradisional</a></li>
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="container-province">
            <!-- <h2>Karya Budaya dari Berbagai Suku Bangsa</h2> -->
            <div class="search-container">
                <div class="province-dropdown">
                    <select id="province-select">
                        <option value="">-- Pilih Provinsi --</option>
                    </select>
                </div>
                <button id="prev-btn">Back</button> <!-- Tombol untuk navigasi ke provinsi sebelumnya -->
                <button id="next-btn">Next</button> <!-- Tombol untuk navigasi ke provinsi berikutnya -->
            </div>
            <div class="province-info hidden" id="province-info">
                <div class="info-content">
                    <h3 id="province-title" class="province-title"></h3>
                    <div class="info-details">
                        <img src="" alt="" id="province-image">
                        <p id="province-description"></p>
                    </div>
                </div>
            </div>

        </div>
    </div>



    <script>
        const provinceSelect = document.getElementById("province-select");
        const provinceInfo = document.getElementById("province-info");
        const provinceTitle = document.getElementById("province-title");
        const provinceImage = document.getElementById("province-image");
        const provinceDescription = document.getElementById("province-description");

        const prevButton = document.getElementById("prev-btn");
        const nextButton = document.getElementById("next-btn");

        let selectedProvince = {}
        let provinceList = [];
        let currentIndex = 0;

        // Fetch provinces from PHP file
        fetch('backend/be-province.php')
            .then(response => response.json())
            .then(provinces => {
                provinceList = provinces;
                // Populate dropdown with provinces
                provinces.forEach(province => {
                    const option = document.createElement("option");
                    option.textContent = province.name;
                    option.value = province.province_id;
                    selectedProvince = province;
                    provinceSelect.appendChild(option);
                });
            })
            .catch(error => console.error('Error fetching provinces:', error));

        // Fetch items when change option
        provinceSelect.addEventListener("change", () => {
            const selectedProvinceId = provinceSelect.value;
            const selectedCategoryId = 3;
            currentIndex = provinceList.findIndex(province => province.province_id == selectedProvinceId);

            fetchItem(selectedProvinceId, selectedCategoryId);
        });

        function fetchItem(selectedProvinceId, selectedCategoryId) {
            fetch(`backend/be-find-item.php?province_id=${selectedProvinceId}&category_id=${selectedCategoryId}`)
                .then(response => response.json())
                .then(items => {
                    if (items.length > 0) {
                        showProvinceInfo(items[0]);
                    } else {
                        provinceInfo.classList.add("hidden");
                    }
                })
                .catch(error => console.error('Error fetching items:', error));
        }

        function showProvinceInfo(item) {
            provinceTitle.textContent = item.name;
            provinceImage.src = `images/${item.image}`;
            provinceDescription.textContent = item.description;
            provinceInfo.classList.remove("hidden");
        }

        prevButton.addEventListener("click", () => {
            if (currentIndex != 0) {
                currentIndex = (currentIndex - 1);
                provinceSelect.value = provinceList[currentIndex].province_id;
                fetchItem(provinceList[currentIndex].province_id, 3);
            }
        });

        nextButton.addEventListener("click", () => {
            if (currentIndex != provinceList.length - 1) {
                currentIndex = (currentIndex + 1);
                provinceSelect.value = provinceList[currentIndex].province_id;
                fetchItem(provinceList[currentIndex].province_id, 3);
            }
        });
    </script>
</body>

</html>