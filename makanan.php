<!DOCTYPE HTML>
<html>
<head>
    <title>Makanan Tradisional</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <style>
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

        .search-container {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        #province-select {
            margin-right: 10px;
            padding: 10px;
            /* Penyesuaian padding */
            border-radius: 5px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
            /* Warna latar belakang dropdown */
            font-size: 16px;
            color: #333;
            appearance: none;
            background-repeat: no-repeat;
            background-position: right 10px center;
            cursor: pointer;
            width: 100%;
            /* Menyesuaikan lebar dengan parent */
        }

        #province-select:hover {
            background-color: #f0f0f0;
            /* Warna latar belakang saat hover */
        }

        #province-select:focus {
            outline: none;
            /* Menghilangkan outline saat focus */
            border-color: #D2B48C;
            /* Warna border saat focus */
        }

        #province-select option:hover {
            background-color: #D2B48C;
            /* Warna latar belakang saat hover */
            color: #fff;
            /* Warna teks saat hover */
        }

        .province-dropdown {
            position: relative;
            width: 200px;
            /* Lebar dropdown */
        }

        .province-dropdown::after {
            content: '\25BC';
            /* Simbol panah bawah */
            font-size: 14px;
            /* Ukuran simbol panah */
            color: #555;
            /* Warna simbol panah */
            position: absolute;
            top: 50%;
            right: 10px;
            /* Jarak dari kanan */
            transform: translateY(-50%);
        }

        #search {
            flex-grow: 1;
            /* membuat input 'Cari' memenuhi sisa ruang yang tersedia */
            padding: 8px;
            /* menambahkan padding untuk memberikan ruang di dalam input */
            border-radius: 5px;
            /* membuat sudut input membulat */
            border: 1px solid #ccc;
            /* menambahkan garis tepi */
        }

        #search-btn {
            padding: 8px 20px;
            /* memberikan padding di dalam tombol 'Cari' */
            border: none;
            border-radius: 5px;
            background-color: #D2B48C;
            /* memberikan warna latar belakang */
            color: white;
            /* warna teks */
            cursor: pointer;
        }

        #search-btn:hover {
            background-color: #D2B48C;
            /* memberikan warna latar belakang pada hover */
        }

        /* gaya untuk menampilkan informasi provinsi */
        .province-info {
            margin-top: 20px;
            background-color: #f9f9f9;
            /* memberikan warna latar belakang */
            border: 1px solid #ddd;
            /* memberikan garis tepi */
            border-radius: 5px;
            padding: 20px;
        }

        .province-info img {
            max-width: 100%;
            max-height: 400px;
            /* Atur tinggi maksimum gambar */
            border-radius: 5px;
        }
    </style>
</head>

<body class="is-preload">
    <div id="page-wrapper">

        <!-- Header -->
        <header id="header">
            <div class="logo container">
                <div>
                    <h1>
                        <a href="index.php" id="logo">Makanan Tradisional</a>
                    </h1>
                </div>
            </div>
        </header>

        <!-- Nav -->
        <nav id="nav">
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
            <br>

            <!-- Main Content -->
            <div class="container">
                <br> <br> <br> <br>
                <h2>Karya Budaya dari Berbagai Suku Bangsa</h2>
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
                    <h3 id="province-title"></h3>
                    <img src="" alt="" id="province-image">
                    <p id="province-description"></p>
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
            const selectedCategoryId = 5;
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