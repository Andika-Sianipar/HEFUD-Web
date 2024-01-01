-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2023 at 03:09 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hefud`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_12_14_144118_create_tb_produk', 2),
(6, '2023_12_14_144419_create_tb_kategori', 3),
(7, '2023_12_26_031932_create_tb_harga_produk', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_harga_produk`
--

CREATE TABLE `tb_harga_produk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `start_harga` date NOT NULL,
  `end_harga` date NOT NULL,
  `harga_produk` decimal(10,3) NOT NULL,
  `id_produk` bigint(11) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_harga_produk`
--

INSERT INTO `tb_harga_produk` (`id`, `start_harga`, `end_harga`, `harga_produk`, `id_produk`, `created_at`, `updated_at`) VALUES
(4, '2023-12-25', '2023-12-27', 100.000, 5, '2023-12-25 19:38:38', '2023-12-25 20:50:33');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`created_at`, `updated_at`, `id_kategori`, `nama_kategori`) VALUES
('2023-12-15 09:08:14', '2023-12-15 09:08:14', 1, 'Makanan'),
('2023-12-15 09:08:39', '2023-12-15 09:08:39', 2, 'Minuman');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gambar_produk` varchar(100) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `desk_produk` longtext NOT NULL,
  `harga_produk` decimal(10,3) NOT NULL,
  `stok_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`created_at`, `updated_at`, `gambar_produk`, `id_produk`, `nama_produk`, `desk_produk`, `harga_produk`, `stok_produk`, `id_kategori`) VALUES
('2023-12-15 18:40:29', '2023-12-26 02:10:24', 'gambarproduk/1702694429salad1.jpeg', 4, 'Salad Sayur Bali', '<p>Salad sayur Bali&nbsp;terbuat dari bahan-bahan alami:</p><ul><li><strong>-&gt;tomat</strong></li><li><strong>-&gt;wortel</strong></li><li><strong>-&gt;timun</strong></li><li><strong>-&gt;radish</strong></li><li><strong>-&gt;selada</strong></li></ul><p>Salad sayur kami tidak hanya kaya akan vitamin, mineral, serat, dan antioksidan, tetapi juga rendah kalori dan lemak. Salad sayur kami dapat membantu Anda menurunkan berat badan, meningkatkan sistem kekebalan tubuh, dan mencegah penyakit kronis. Salad sayur kami juga cocok untuk vegetarian, vegan, dan gluten-free.</p>', 25.000, 5, 1),
('2023-12-16 01:05:40', '2023-12-26 02:15:04', 'gambarproduk/1702717539jussayuran.jpeg', 5, 'Green Tea Original', '<p>Green Tea adalah minuman yang menyuguhkan kekuatan antioksidan yang luar biasa.Daun teh hijau yang dipetik dengan hati-hati memberikan kandungan katekin, seperti epigallocatechin gallate (EGCG), yang terbukti memiliki sifat anti-inflamasi dan antioksidan yang kuat, membantu menjaga kesehatan jantung dan meningkatkan sistem kekebalan tubuh.</p><p>Minuman rendah kafein ini tidak hanya memberikan kehangatan dan ketenangan, tetapi juga membawa manfaat untuk metabolisme dan menjaga berat badan yang sehat.</p><p>Bahan-bahan yang digunakan:</p><p><strong>-&gt;Daun Teh Hijau</strong>: Dipilih dari varietas teh hijau berkualitas tinggi untuk menjamin manfaat kesehatan yang optimal.</p><p>Setiap tegukan Green Tea&nbsp; adalah kesempurnaan cita rasa dan kesehatan yang menginspirasi gaya hidup yang seimbang.</p>', 10.000, 5, 2),
('2023-12-26 00:30:01', '2023-12-26 02:14:00', 'gambarproduk/1703579401jagung.jpeg', 10, 'Sup Jagung', '<p>Kelezatan alami jagung manis bertemu dengan cita rasa yang mendalam dari sayuran segar, menciptakan harmoni yang sempurna dari rasa dan nutrisi.Kami menggunakan bahan-bahan segar yang dipilih dengan cermat, menyajikan hidangan yang kaya serat, rendah lemak, dan bebas tambahan bahan pengawet.<br />&nbsp;</p><p>Bahan-bahan yang digunakan:</p><ol><li><strong>-&gt;Jagung Manis</strong>.</li><li><strong>-&gt;Wortel</strong></li><li><strong>-&gt;Kaldu Sayuran</strong>:&nbsp;</li><li><strong>-&gt;Rempah-rempah (opsional):&nbsp;</strong>seperti peterseli, merica, atau thyme untuk menambahkan dimensi rasa yang lebih dalam.</li></ol><p>Setiap bahan dipilih dengan teliti untuk memastikan kesegaran dan kualitasnya, menghasilkan Sup Jagung yang tidak hanya lezat namun juga bernutrisi tinggi.</p>', 12.000, 5, 1),
('2023-12-26 00:30:31', '2023-12-26 02:12:48', 'gambarproduk/1703579431ayam.jpeg', 11, 'Sup Ayam', '<p>Sup Ayam menggabungkan nutrisi tinggi dari ayam dengan kaya serat dan vitamin dari sayuran-sayuran segar yang dipilih secara khusus. Setiap tegukan menyuguhkan kelezatan wortel yang manis, keharuman timun yang menyegarkan, serta khasiat penyembuhan dari selidri yang kaya akan antioksidan. Tidak lupa, kelezatan daging ayam yang lembut dipadukan dengan kelezatan tomat dan aroma harum bawang putih yang melengkapi cita rasa dan memberikan manfaat kesehatan yang luar biasa.</p><p>Bahan-bahan yang digunakan:</p><ol><li><strong>-&gt;Ayam Segar</strong></li><li><strong>-&gt;Wortel</strong></li><li><strong>-&gt;Timun</strong></li><li><strong>-&gt;Selada/Selidri</strong></li><li><strong>-&gt;Tomat</strong></li><li><strong>-&gt;Kaldu Sayuran</strong></li></ol><p>Setiap bahan dipilih secara hati-hati untuk memastikan kualitasnya yang terbaik, menciptakan Sup Ayam yang tidak hanya menggugah selera, tetapi juga memberikan nutrisi tinggi serta kehangatan yang memeluk setiap hidangan.</p>', 50.000, 5, 1),
('2023-12-26 00:46:46', '2023-12-26 02:13:01', 'gambarproduk/1703580406oatmel.jpeg', 13, 'Oatmeal dan Buah Segar', '<p>Kami menghadirkan kelezatan dari oatmeal yang lembut dan sejuk yang menyatu dengan kelezatan buah-buahan segar yang dipilih dengan cermat. Oatmeal yang dimasak dengan sempurna bertemu dengan potongan buah-buahan segar, seperti potongan pisang manis yang lembut, blueberry yang penuh antioksidan, dan alpukat kaya akan nutrisi.<br />&nbsp;</p><p>Bahan-bahan yang digunakan:</p><ol><li><strong>-&gt;Oatmeal</strong></li><li><strong>-&gt;Blueberry</strong></li><li><strong>-&gt;Lemon</strong></li><li><strong>-&gt;Bahan Tambahan (opsional)</strong>: Seperti madu, kacang-kacangan, atau biji-bijian untuk menambah dimensi rasa dan nutrisi.</li></ol><p>Setiap bahan dipilih dengan cermat untuk memberikan kombinasi nutrisi yang seimbang dan cita rasa yang luar biasa. Nikmati pengalaman sarapan yang menyehatkan dan memuaskan dengan Oatmeal dan Buah Segar kami yang menghadirkan energi dan kelezatan untuk memulai hari Anda dengan baik!</p><p>&nbsp;</p><p>-buah jambu</p>', 15.000, 5, 1),
('2023-12-26 00:47:10', '2023-12-26 02:14:16', 'gambarproduk/1703580430berry.jpeg', 14, 'Smoothie Berry Segar', '<p>kami menghadirkan paduan sempurna antara keharuman dan kelezatan dari campuran buah-buahan berry yang segar. Setiap tegukan smoothie ini menggabungkan potongan stroberi manis, blueberry yang penuh antioksidan, dan raspberry yang menyegarkan. Semua buah-buahan segar ini dipadukan dengan yogurt rendah lemak atau susu almond untuk memberikan kekayaan rasa dan tekstur yang lembut. Smoothie ini tidak hanya memanjakan lidah, tetapi juga memberikan dosis nutrisi tinggi dengan vitamin dan antioksidan dari buah-buahan segar yang dipilih secara khusus.</p><p>Bahan-bahan yang digunakan:</p><ol><li><strong>-&gt;Stroberi</strong></li><li><strong>-&gt;Blueberry</strong></li><li><strong>-&gt;Raspberry</strong></li><li><strong>-&gt;Yogurt Rendah Lemak/Susu Almond</strong></li><li><strong>-&gt;Bahan Tambahan (opsional)</strong>: Seperti madu, chia seed, atau oats untuk tambahan nutrisi dan tekstur.</li></ol><p>Setiap bahan dipilih dengan teliti untuk memberikan kombinasi nutrisi yang seimbang dan cita rasa yang luar biasa. Nikmati pengalaman menyegarkan dan menghidrasi dengan Smoothie Berry Segar kami yang menyehatkan, memberikan energi dan kelezatan dalam setiap tegukan!</p>', 10.000, 5, 2),
('2023-12-26 00:54:57', '2023-12-26 02:14:49', 'gambarproduk/1703582905matha.jpeg', 16, 'Teh Matcha', '<p>Teh Matcha merupakan sumber antioksidan yang kuat, memberikan perlindungan terhadap radikal bebas dan meningkatkan daya tahan tubuh. Teh ini juga kaya akan katekin EGCG yang terbukti meningkatkan metabolisme dan membantu menjaga berat badan yang sehat. Dengan sentuhan energi dari kafein alami, Teh Matcha memberikan fokus yang tajam tanpa meninggalkan rasa gelisah.</p><p>Bahan-bahan yang digunakan:</p><p><strong>-&gt;Daun Teh Hijau</strong>: Daun teh hijau berkualitas tinggi yang digiling menjadi bubuk halus untuk menciptakan Teh Matcha.</p><p>Setiap tegukan Teh Matcha kami merupakan kesempurnaan nutrisi dan kelezatan yang tidak hanya memanjakan lidah, tetapi juga memberikan manfaat kesehatan yang luar biasa. Dengan kualitas daun teh hijau terbaik, Teh Matcha kami siap menghadirkan kekuatan alami dan kelezatan yang tak tertandingi untuk membantu Anda menjalani gaya hidup yang seimbang dan sehat.</p>', 10.000, 5, 2),
('2023-12-26 01:32:50', '2023-12-26 02:16:40', 'gambarproduk/1703585800ikanpanggang2.jpeg', 18, 'Ikan Panggang dengan Sayuran Panggang', '<p>Hidangan Ikan Panggang dengan Sayuran Panggang yang istimewa! Dipenuhi dengan nutrisi alami dan kelezatan yang memikat, hidangan ini menggabungkan kebaikan ikan panggang yang lembut dengan kekayaan rasa dan vitamin dari sayuran panggang yang segar. Potongan tomat yang kaya akan antioksidan, kesegaran timun, serta kepedasan cabai yang menggoda, semuanya dipadukan dengan aroma segar dari lemon yang memberikan sentuhan khas pada hidangan. Tidak lupa, rempah-rempah yang dipilih dengan cermat memberikan dimensi rasa yang memukau pada setiap sajian.</p><p>Bahan-bahan yang digunakan:</p><ol><li><strong>-&gt;Ikan</strong>: Menyediakan protein berkualitas dan asam lemak sehat.</li><li><strong>-&gt;Tomat</strong>: Sumber antioksidan yang kaya akan vitamin C dan likopen.</li><li><strong>-&gt;Timun</strong>: Mengandung air tinggi dan serat yang baik untuk pencernaan.</li><li><strong>-&gt;Cabai</strong>: Memberikan rasa pedas dan mengandung senyawa capsaicin yang bermanfaat untuk kesehatan.</li><li><strong>-&gt;Lemon</strong>: Sumber vitamin C yang baik dan menyegarkan.</li><li><strong>-&gt;Rempah-rempah</strong>: Menambahkan aroma dan rasa yang khas pada hidangan, seperti lada hitam, paprika, atau rempah pilihan lainnya.</li></ol><p>Setiap bahan dipilih secara teliti untuk memberikan kombinasi kesehatan dan cita rasa yang luar biasa dalam setiap hidangan.</p>', 25.000, 5, 1),
('2023-12-26 01:48:40', '2023-12-26 02:18:25', 'gambarproduk/1703585905chaiteh.jpeg', 19, 'Chai Tea', '<p>Teh Chai merupakan kombinasi unik dari rempah-rempah khas India yang tidak hanya memberikan kenikmatan rasa yang hangat dan mendalam, tetapi juga menyuguhkan beragam manfaat kesehatan yang luar biasa. Diproses dari campuran rempah-rempah seperti kayu manis, jahe, cengkeh, dan cardamom, Teh Chai menyuguhkan rasa yang kuat dan aromatik yang memberikan kehangatan bagi tubuh Anda. Kayu manis dan jahe membantu meningkatkan metabolisme dan pencernaan, sementara cengkeh dan cardamom menawarkan sifat anti-inflamasi yang dapat mendukung sistem kekebalan tubuh.</p><p>Bahan-bahan yang digunakan:</p><p><strong>-&gt;Kayu Manis</strong><br /><strong>-&gt;Jahe</strong><br /><strong>-&gt;Cengkeh dan Cardamom</strong><br />Setiap bahan rempah-rempah dipilih secara hati-hati untuk memberikan nutrisi dan manfaat kesehatan yang tak tertandingi dalam secangkir Teh Chai. Menyajikan kehangatan, kesehatan, dan kelezatan, Teh Chai India kami hadir untuk memberikan pengalaman minum teh yang luar biasa dan memperkaya kesehatan Anda secara alami.</p>', 10.000, 5, 2),
('2023-12-26 01:49:22', '2023-12-26 02:18:06', 'gambarproduk/1703585886telemonjahe3.jpeg', 20, 'Lemon Jahe', '<p>Lemon Jahe sebagai minuman penyegar yang tidak hanya menghadirkan kenikmatan rasa, tetapi juga memberikan beragam manfaat kesehatan yang luar biasa. Dalam sajian ini, kami memadukan perasan lemon yang kaya vitamin C untuk meningkatkan sistem kekebalan tubuh dengan jahe yang memiliki sifat anti-inflamasi dan dapat membantu meredakan gejala flu dan pilek. Setiap tegukan mempersembahkan kombinasi yang sempurna antara keasaman menyegarkan dari lemon dan kehangatan yang menenangkan dari jahe, menciptakan minuman yang cocok untuk menyegarkan tubuh dan pikiran.</p><p>Bahan-bahan yang digunakan:</p><p><strong>-&gt;Lemon<br />-&gt;Jahe</strong><br />Setiap bahan dipilih dengan cermat, tidak hanya untuk menghadirkan cita rasa yang menggugah selera, tetapi juga untuk memberikan manfaat kesehatan yang nyata. Nikmati Lemon Jahe kami sebagai minuman sehat yang membantu menjaga tubuh tetap segar dan meningkatkan kesejahteraan secara alami.</p>', 10.000, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'andika', 'andika@gmail.com', NULL, '$2y$10$lO9xDjEeV/mVZ5Rl1hBHxuBCcLsBkKi09mGFh1wqDwPlH4Vhfxq9u', 'admin', NULL, '2023-12-14 05:57:25', '2023-12-14 05:57:25'),
(2, 'rian', 'rian@gmail.com', NULL, '$2y$10$FEw4AxQydpDTb4.sHNtOhuFWT9nrsaiNzfyoLdmrY/XR.QqweIkX6', 'user', NULL, '2023-12-17 04:54:56', '2023-12-17 04:54:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tb_harga_produk`
--
ALTER TABLE `tb_harga_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_harga_produk`
--
ALTER TABLE `tb_harga_produk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
