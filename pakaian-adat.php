<!DOCTYPE HTML>
<html>
<head>
    <title>Pakaian Adat</title>
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
            padding: 10px; /* Penyesuaian padding */
            border-radius: 5px; 
            border: 1px solid #ccc; 
            background-color: #f9f9f9; /* Warna latar belakang dropdown */
            font-size: 16px; 
            color: #333; 
            appearance: none; 
            background-repeat: no-repeat; 
            background-position: right 10px center; 
            cursor: pointer;
            width: 100%; /* Menyesuaikan lebar dengan parent */
        }

        #province-select:hover {
            background-color: #f0f0f0; /* Warna latar belakang saat hover */
        }

        #province-select:focus {
            outline: none; /* Menghilangkan outline saat focus */
            border-color: #D2B48C; /* Warna border saat focus */
        }

        #province-select option:hover {
            background-color: #D2B48C; /* Warna latar belakang saat hover */
            color: #fff; /* Warna teks saat hover */
        }

        .province-dropdown {
            position: relative;
            width: 200px; /* Lebar dropdown */
        }

        .province-dropdown::after {
            content: '\25BC'; /* Simbol panah bawah */
            font-size: 14px; /* Ukuran simbol panah */
            color: #555; /* Warna simbol panah */
            position: absolute;
            top: 50%;
            right: 10px; /* Jarak dari kanan */
            transform: translateY(-50%);
        }

        #search {
            flex-grow: 1; /* membuat input 'Cari' memenuhi sisa ruang yang tersedia */
            padding: 8px; /* menambahkan padding untuk memberikan ruang di dalam input */
            border-radius: 5px; /* membuat sudut input membulat */
            border: 1px solid #ccc; /* menambahkan garis tepi */
        }

        #search-btn {
            padding: 8px 20px; /* memberikan padding di dalam tombol 'Cari' */
            border: none;
            border-radius: 5px;
            background-color: #D2B48C; /* memberikan warna latar belakang */
            color: white; /* warna teks */
            cursor: pointer;
        }

        #search-btn:hover {
            background-color: #D2B48C; /* memberikan warna latar belakang pada hover */
        }

        /* gaya untuk menampilkan informasi provinsi */
        .province-info {
            margin-top: 20px;
            background-color: #f9f9f9; /* memberikan warna latar belakang */
            border: 1px solid #ddd; /* memberikan garis tepi */
            border-radius: 5px;
            padding: 20px;
        }

        .province-info img {
            max-width: 100%;
            max-height: 400px; /* Atur tinggi maksimum gambar */
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
                        <a href="index.php" id="logo">Pakaian Adat</a>
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
                        <!-- Provinsi akan ditambahkan di sini -->
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
        // Data provinsi beserta gambar dan penjelasan
        const provinces = [
            { name: "Aceh", image: "alat-musik/aceh.webp", description: "Alat musik tradisional dari Aceh adalah serune kale. Serune kale sangat populer di daerah Pidie, Aceh Utara, Aceh Besar dan Aceh Barat. Alat musik ini kerap kali dimainkan bersamaan dengan Rapai dan Gendrang pada acara-acara hiburan, tari-tarian atau penyambutan tamu kehormatan. Bahan dasar sarune kale ini berupa kayu, kuningan dan tembaga. Bentuk alat musiknya hampir menyerupai seruling bambu. Fungsinya sebagai pemanis atau penghias musik tradisional Aceh." },
            { name: "Bali", image: "alat-musik/bali.webp", description: "Selanjutnya ada alat musik tradisional dari Bali yang menghasilkan suara cukup unik, yaitu genggong. Bahan utama dari alat musik ini terbuat dari pelepah aren dan bambu. Cara menghasilkan suara yang unik dari alat musik ini adalah dengan menjadikan rongga mulut sebagai resonator sambil menarik-narik tali yang terdapat pada ujung genggong. Penggunaan alat musik tradisional ini seringkali ditemui dalam acara-acara pernikahan." },
            { name: "Bangka Belitung", image: "bali.jpg", description: "Penjelasan Provinsi Babel." },
            { name: "Banten", image: "bali.jpg", description: "Provinsi Banten memiliki alat musik bernama dogdog lonjor yang dimainkan dengan cara ditabuh seperti bedug. Alat musik ini terbuat dari kayu berbentuk silinder memanjang. Bagian tengahnya dibuat berongga, di mana salah satu sisinya ditutup dengan membran dari kulit kambing atau sapi." },
            { name: "Bengkulu", image: "bali.jpg", description: "Serunai merupakan alat musik tradisional Indonesia yang berasal dari Suku Pekal di Kabupaten Muko-muko dan berbentuk seperti terompet. Cara menggunakan alat musik ini adalah dengan cara ditiup. Serunai terbuat dari Bambu yang tumbuh di tepi sungai, bambu tersebut harus tipis sehingga mudah diolah dan bersuara nyaring. Di Bengkulu, Serunai sering dijumpai saat upacara ataupun acara adat." },
            { name: "Daerah Istimewa Yogyakarta", image: "bali.jpg", description: "Daerah Istimewa Yogyakarta." },
            { name: "DKI Jakarta", image: "alat-musik/jakarta.webp", description: "Alat musik tradisional tehyan berasal dari DKI Jakarta dan telah menjadi salah satu alat musik yang kehadirannya sudah mulai langka. Alat musik gesek ini merupakan hasil perpaduan suku Betawi dan kebudayaan Tionghoa. Cara memainkan Tehyan pun cukup mudah, cukup menggesek senar dawai seperti saat sedang bermain biola. Jenis alat ini terbagi menjadi 3 berdasarkan bentuk dan ukurannya, ada tehyan, sukong, dan kong ahyan. Seringkali masyarakat memainkannya pada acara kebudayaan Betawi seperti penampilan ondel-ondel, lenong Betawi, serta pertunjukan gambang kromong." },
            { name: "Gorontalo", image: "bali.jpg", description: "Penjelasan Provinsi Gorontalo." },
            { name: "Jambi ", image: "bali.jpg", description: "Salah satu alat musik terkenal dari Jambi adalah Cangor. Cangor termasuk ke dalam jenis musik idio-kordofon. Alat musik ini terbuat dari bahan bambu yang dipotong dengan panjang sekitar 40 cm, dan pada bagian kulit bambu dicungkil dan diganjal dengan bantalan kayu. Cangor dimainkan dengan cara dipukul dengan menggunakan dua tongkat yang terbuat dari bahan rotan. Alat musik ini biasa dimainkan oleh para petani saat sedang istirahat setelah mengurus kebun di ladang." },
            { name: "Jawa Barat", image: "alat-musik/jabar.webp", description: "Alat musik tradisional terkenal di Jawa Barat adalah angklung. Alat musik tradisional ini terbuat dari bambu. Angklung dimainkan dengan cara digoyangkan. Setelah digoyangkan maka bunyinya akan keluar. Bunyi ini terjadi karena adanya benturan badan pipa bambu. Bunyi yang bergetar menghasilkan susunan nada 2, 3 sampai dengan 4 nada dalam setiap ukuran baik besar maupun kecil." },
            { name: "Jawa Tengah", image: "alat-musik/jateng.webp", description: "Gamelan adalah salah satu alat musik tradisional Indonesia yang berasal dari Jawa Tengah. Alat musik ini diduga sudah ada di Jawa sejak tahun 404 Masehi, dilihat dari adanya penggambaran masa lalu di relief Candi Borobudur dan Prambanan. Gamelan merupakan seperangkat instrumen yang dibunyikan dari beberapa alat musik, seperti di antaranya gambang, gendang, dan gong. Perpaduan ini memiliki sistem nada non diatonis yang menyajikan suara indah jika dimainkan secara harmonis." },
            { name: "Jawa Timur", image: "bali.jpg", description: "Penjelasan Provinsi Jawa Timur." },
            { name: "Kalimantan Barat", image: "bali.jpg", description: "Penjelasan Provinsi Kalimantan Barat." },
            { name: "Kalimantan Selatan", image: "alat-musik/kalsel.webp", description: "Alat musik khas dari Kalimantan Selatan adalah panting. Alat musik panting merupakan salah satu alat musik tradisional Indonesia yang secara pemetaan tumbuh dan berkembang di daerah Tapin, Kalimantan Selatan. Panting terbuat dari kayu, kulit zat pewarna, dan senar. Kayu yang digunakan di antaranya kayu pulantan, kayu kambang, kayu jingah, kayu halaban, dan lain-lain. Sedangkan bahan kulit diambil dari kulit hewan yang hidup di hutan seperti kulit kijang, rusa, atau kulit hewan melata seperti kulit ular puraca, ular sawah, dan biawak. Panting dimainkan dengan cara dipetik." },
            { name: "Kalimantan Tengah", image: "bali.jpg", description: "Penjelasan Provinsi Kalimantan Tengah." },
            { name: "Kalimantan Timur", image: "bali.jpg", description: "Penjelasan Provinsi Kalimantan Timur." },
            { name: "Kalimantan Utara", image: "bali.jpg", description: "Penjelasan Provinsi Kalimantan Utara." },
            { name: "Kepulauan Riau", image: "bali.jpg", description: "Penjelasan Provinsi Kepulauan Riau." },
            { name: "Lampung", image: "alat-musik/lampung.webp", description: "Di Lampung, alat musik khasnya adalah kompang. Kompang merupakan alat musik tradisional Indonesia yang dibuat dari kayu dan kulit kambing. Kompang digunakan dengan cara dipukul dan biasanya diiringi dengan lagu atau syair bernuansa islami. Dalam perkembangannya, Kompang biasanya dimainkan pada beberapa acara seperti upacara adat, acara pernikahan, dan penyambutan pejabat yang sedang berkunjung." },
            { name: "Maluku", image: "alat-musik/maluku.webp", description: "Alat musik tradisional Tifa bisa ditemukan di daerah Maluku. Alat musik ini terbuat dari sebatang kayu Lenggua yang dikosongkan isinya. Tifa juga bisa ditemukan di Papua, namun, bentuk antara Tifa dari Papua dan Maluku berbeda. Tifa Papua terdapat pegangan di sisinya, sementara Tifa Maluku hanya berbentuk tabung biasa tanpa pegangan. Cara memainkannya dengan cara dipukul." },
            { name: "Maluku Utara", image: "bali.jpg", description: "Penjelasan Provinsi Maluku Utara." },
            { name: "Nusa Tenggara Barat", image: "bali.jpg", description: "Penjelasan Provinsi Nusa Tenggara Barat." },
            { name: "Nusa Tenggara Timur", image: "alat-musik/ntt.webp", description: "Dari Nusa Tenggara Timur (NTT), memiliki alat musik tradisional bernama sasando. Sasando memiliki bentuk yang sangat unik dan berbeda dari alat musik petik lainnya yakni berbentuk tabung panjang. Sasando sendiri terbuat dari bambu, kayu, paku penyangga, senar string, dan daun lontar. Cara memainkan sasando adalah dengan menggunakan kedua tangan untuk memetik dawainya. Seperti bermain gitar." },
            { name: "Papua", image: "bali.jpg", description: "Penjelasan Provinsi Papua." },
            { name: "Papua Barat", image: "bali.jpg", description: "Alat musik Papua barat memiliki keunikan tersendiri. Salah satu contohnya adalah guoto. Guoto adalah alat musik yang dimainkan dengan cara dipetik. Guoto terbuat dari kulit binatang lembu. Alat musik ini memiliki senar yang bisa dipetik dengan tangan." },
            { name: "Papua Barat Daya", image: "bali.jpg", description: "Alat musik tradisional yang terkenal dari Papua Barat Daya adalah Korambi, yang terbuat dari bambu. Korambi sendiri berasal dari suku Tehit di Kabupaten Sorong. Korambi sendiri merupakan alat musik tradisional yang digunakan untuk mengiringi kesenian dan tarian adat. Cara memainkannya dengan cara dipetik dan biasa dimainkan bersama dengan Fuu dan Tifa." },
            { name: "Papua Pegunungan", image: "bali.jpg", description: "Penjelasan Provinsi Papua Pegunungan." },
            { name: "Papua Selatan", image: "bali.jpg", description: "Papua Selatan dengan ibukota Provinsi di Merauke, tentu memiliki alat musik tradisional. Salah satunya Butshake. Butshake memiliki bentuk yang unik dan terbuat dari bambu dan buah kenari. Cara memainkan alat musik ini sendiri dengan cara digoyangkan sehingga buah kenari saling menempel satu dengan lainnya dan menghasilkan suara musik. Butshake sendiri berasal dari suku Matu yang berada di Kabupaten Merauke, Papua Selatan." },
            { name: "Papua Tengah", image: "bali.jpg", description: "Triton merupakan alat musik dari Papua Tengah yang berasal dari Nabire. Nabire sendiri merupakan ibukota Provinsi Papua Tengah. Triton merupakan alat musik tiup tradisional yang terdapat di tanah Papua. Alat musik ini dibuat dari kulit kerang yang biasanya ditemukan di wilayah Nabire. Cara memainkannya dengan ditiup. Alat musik ini digunakan untuk memanggil masyarakat agar berkumpul." },
            { name: "Riau", image: "bali.jpg", description: "Penjelasan Provinsi Riau." },
            { name: "Sulawesi Barat", image: "bali.jpg", description: "Sulawesi Barat memiliki alat musik tradisional bernama Pakeke. Ini adalah alat musik yang terbuat dari bambu berukuran kecil sekitar 10cm. Bambu diberi lubang tiga sampai enam lubang, pada ujung bambu dililit daun lontar yang bentuknya menyerupai terompet sebagai pembawa efek bunyi khas yang dihasilkan saat ditiup." },
            { name: "Sulawesi Selatan", image: "alat-musik/sulsel.webp", description: "Alat musik tradisional dari provinsi Sulawesi Selatan salah satunya bernama puik-puik (puwi-puwi). Penggunaan alat musik sangat mudah sebab hanya ditiup saja. Seringkali alat ini digunakan saat melakukan acara-acara adat, seperti mengiringi tari akkarena dan dimainkan saat acara pernikahan." },
            { name: "Sulawesi Tengah", image: "bali.jpg", description: "Penjelasan Provinsi Sulawesi Tengah." },
            { name: "Sulawesi Tenggara", image: "bali.jpg", description: "Salah satu kebudayaan asli Sulawesi Tenggara dalam bidang kesenian adalah alat musik Ladolado. Untuk memainkan alat musik Sulawesi Tenggara ini adalah dengan cara dipetik. Pembuatan alat musik ladolado ini berasal dari kayu atau bambu yang dibentuk dengan menyerupai gitar." },
            { name: "Sulawesi Utara", image: "alat-musik/sulut.webp", description: "Alat musik tradisional Indonesia yang juga mendunia dan berasal dari Minahasa, Sulawesi Utara adalah kolintang. Kolintang terbuat dari kayu khusus yang disusun dan dimainkan dengan cara dipukul. Biasanya alat musik kolintang digunakan untuk mengiringi upacara adat, pertunjukan tari, pengiring nyanyian, bahkan pertunjukan musik." },
            { name: "Sumatera Barat", image: "alat-musik/sumbar.webp", description: "Salah satu alat musik tradisional Indonesia khas suku Minangkabau di Sumatera Barat ada Saluang. Alat musik ini terbuat dari bambu tipis atau bambu talang. Bambu talang dipercaya bisa mengeluarkan suara yang lebih bagus dan merdu. Alat musik saluang termasuk golongan seruling, tapi pembuatannya lebih sederhana. Cukup dengan membuat 4 lubang pada bambu talang. Sama seperti seruling pada umumnya, taluang dimainkan dengan cara ditiup." },
            { name: "Sumatera Selatan", image: "bali.jpg", description: "Di Sumatera Selatan, terdapat jenis alat musik yang cukup unik bernama tenun. Alat musik tradisional Indonesia ini dulunya sering digunakan ketika para wanita mengerjakan tenunan kain dan namanya diambil dari kegiatan tenun. Bahan yang dipakai untuk membuat alat musik ini adalah dari kayu yang berbentuk persegi panjang. Untuk memainkan alat musik tenun ini cukup mudah yaitu dengan cara di pukul." },
            { name: "Sumatera Utara", image: "bali.jpg", description: "Penjelasan Provinsi Sumatera Utara." },
            // Tambahkan data provinsi lainnya di sini
        ];

        const provinceSelect = document.getElementById("province-select");
        const provinceInfo = document.getElementById("province-info");
        const provinceTitle = document.getElementById("province-title");
        const provinceImage = document.getElementById("province-image");
        const provinceDescription = document.getElementById("province-description");
        const prevButton = document.getElementById("prev-btn");
        const nextButton = document.getElementById("next-btn");

        // Membuat daftar provinsi diurutkan dari A-Z
        provinces.sort((a, b) => a.name.localeCompare(b.name)).forEach(province => {
            const option = document.createElement("option");
            option.textContent = province.name;
            option.value = province.name;
            provinceSelect.appendChild(option);
        });

        provinceSelect.addEventListener("change", () => {
            const selectedProvince = provinces.find(province => province.name === provinceSelect.value);
            showProvinceInfo(selectedProvince);
        });

        function showProvinceInfo(province) {
            provinceTitle.textContent = province.name;
            provinceImage.src = `images/${province.image}`;
            provinceDescription.textContent = province.description;
            provinceInfo.classList.remove("hidden");
        }

        let currentIndex = 0;

        prevButton.addEventListener("click", () => {
            currentIndex = (currentIndex - 1 + provinces.length) % provinces.length;
            showProvinceInfo(provinces[currentIndex]);
            provinceSelect.value = provinces[currentIndex].name;
        });

        nextButton.addEventListener("click", () => {
            currentIndex = (currentIndex + 1) % provinces.length;
            showProvinceInfo(provinces[currentIndex]);
            provinceSelect.value = provinces[currentIndex].name;
        });
    </script>
</body>
</html>