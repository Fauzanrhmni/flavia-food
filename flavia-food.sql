-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 05, 2025 at 08:23 AM
-- Server version: 8.0.30
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flavia-food`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id` int NOT NULL,
  `nama_brg` varchar(120) COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `kategori` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `harga` int NOT NULL,
  `stok` int NOT NULL,
  `gambar` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id`, `nama_brg`, `keterangan`, `kategori`, `harga`, `stok`, `gambar`) VALUES
(1, 'Double Beef Burger', 'hidangan burger yang terdiri dari dua lapis daging sapi panggang, yang disajikan di antara roti burger. Setiap lapisan daging memberikan rasa gurih dan keempukan, sementara roti burger menyempurnakan pengalaman menyantap deng', 'junkfood', 25000, 5, 'burger.jpg'),
(2, 'Formaggio Pizza', 'Pizza yang dilapisi saus tomat segar dengan taburan keju mozzarella yang meleleh, diberi sedikit daun basil segar dan memiliki rasa yang gurih, manis dan sedikit pedas.', 'pizza', 60000, 5, 'pizza.jpg'),
(3, 'Pulen Rice', 'Makanan pokok yang populer di berbagai belahan dunia, Nasi memiliki tekstur lembut dan rasa yang netral, membuatnya cocok sebagai pendamping berbagai hidangan.', 'junkfood', 10000, 8, 'rice.jpg'),
(4, 'Spicy Spaghetti', 'Hidangan pasta yang kenyal, disajikan dengan limpahan saus bolognese yang terbuat dari daging sapi cincang dengan rempah-rempah yang menghasilkan rasa gurih dan sedikit manis.', 'mie', 30000, 26, 'spagetti.jpg'),
(5, 'Beef Burger', 'hidangan yang terdiri dari lapisan daging sapi panggang yang diletakkan di antara dua irisan roti burger. Daging sapi tersebut biasanya dibentuk menjadi patty dan dipanggang atau digrill untuk memberikan rasa gurih dan keempu', 'junkfood', 15000, 7, 'burger2.jpg'),
(6, 'French Fries', 'Potongan kentang yang dipotong tipis dan digoreng hingga kecokelatan untuk menciptakan tekstur yang renyah di luar dan lembut di dalam.', 'junkfood', 13000, 6, 'frenchfries.jpg'),
(7, 'Chocho Ice Cream', 'Dibuat dari krim lembut yang menyatu dengan coklat murni berkualitas tinggi, setiap suapannya menghadirkan sensasi lembut dan kaya rasa coklat.', 'icecream', 12000, 12, 'icecreamcoklat.jpg'),
(8, 'White Caramel Ice Cream', 'Manisnya caramel yang dipadukan dengan manfaat susu, yang memberikan kalsium, protein dan karbohidrat dalam white caramel ice cream, menjadikan varian ini adalah pilihan yang banyak di sukai, nikmati langsung dan jadikan dese', 'icecream', 14000, 7, 'icecreamvanilla.jpg'),
(9, 'Beef Cheese Burger', 'Burger yang terdiri dari dua lapis daging sapi panggang, keju leleh, serta berbagai tambahan seperti selada, tomat, bawang, dan saus, semuanya disajikan dalam sepotong roti burger.', 'junkfood', 35000, 23, 'bigburger.jpg'),
(10, 'Hot Dog', 'Inovasi daging sosis, yang disajikan dengan roti dan sayuran', 'junkfood', 17000, 22, 'hotdog.jpg'),
(11, 'Fresh Cola', 'Minuman dengan kandungan soda extra ice yang segar Minuman dengan kandungan soda extra ice yang segar', 'drink', 17000, 19, 'flaviacoke.jpg'),
(12, 'Double Kebab ', 'Berupa kulit tortilla yang diisi dengan daging, sayuran, dan aneka sauss, dimasak dengan cara di panggang, nikmati langsung dan anda dapat merasakan rasa yang unik', 'junkfood', 22000, 48, 'sandwich.jpg'),
(13, 'Waffle', 'Dessert yang terbuat dari adonan beragi atau adonan yang dimasak di antara dua piring yang diberi pola untuk memberikan ukuran, bentuk, dan kesan permukaan yang khas, waffle ini sangat banyak digemari terutama di belgia, disi', 'icecream', 23000, 20, 'waffle.jpg'),
(14, 'Chicken Thighs', 'Potongan sayap ayam yang biasanya digoreng atau dipanggang, dengan tekstur renyah di luar dan daging ayam yang lembut di dalamnya. Wings ini sering disajikan dengan berbagai saus, seperti buffalo, barbecue, atau saus pedas, u', 'junkfood', 30000, 98, 'chicken.jpg'),
(15, 'Cream Soup', 'Sup yang disiapkan memakai cream, krim ringan, half and half atau susu sebagai bahan utama, daging ayam dan susu yang memberikan rasa yang lezat', 'junkfood', 17000, 996, 'creamsop.jpg'),
(16, 'Matcha Latte', 'Minuman yang terbuat dari campuran bubuk matcha yang dilarutkan dengan susu steam sehingga menghasilkan minuman yang manis dan creamy dengan sedikit rasa pahit dari teh hijau.', 'drink', 10000, 19, 'matchamilktea.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `id` int NOT NULL,
  `nama` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `notes` varchar(512) COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `status` enum('0','1','2','3','4') COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_invoice`
--

INSERT INTO `tb_invoice` (`id`, `nama`, `alamat`, `notes`, `tgl_pesan`, `batas_bayar`, `email`, `status`) VALUES
(28, 'Fauzan ', 'Garut', 'hati hati', '2025-02-05 13:58:41', '2025-02-06 13:58:41', 'fauzanrahmani1315@gmail.com', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id` int NOT NULL,
  `id_invoice` int NOT NULL,
  `id_brg` int NOT NULL,
  `nama_brg` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah` int NOT NULL,
  `harga` int NOT NULL,
  `status` enum('0','1','2','3','4') COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id`, `id_invoice`, `id_brg`, `nama_brg`, `jumlah`, `harga`, `status`) VALUES
(71, 28, 1, 'Double Beef Burger', 2, 25000, '0'),
(72, 28, 7, 'Chocho Ice Cream', 1, 12000, '0');

--
-- Triggers `tb_pesanan`
--
DELIMITER $$
CREATE TRIGGER `pesanan_penjualan` AFTER INSERT ON `tb_pesanan` FOR EACH ROW BEGIN
	UPDATE tb_barang SET stok = stok-NEW.jumlah
    WHERE id = NEW.id_brg;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `role_id` int NOT NULL,
  `is_active` int NOT NULL,
  `date_created` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Fauzan Rahmani Ahdan', 'fauzan123@gmail.com', 'fauzan.jpg', '$2y$10$VUtQlJ9dHTCryYooZCmkD.cI3A98otC0uN0NxC6l2eSNhKxKOrIeu', 1, 1, 1701133261),
(2, 'Mitha Ayu Desfany', 'mitha12345@gmail.com', 'happy-burger.jpg', '$2y$10$Z4Qyonx5osOewg3MKN3I0.5Gjdn//MZW7VemspKjjBNlymgJ7eX6W', 2, 1, 1701133719),
(14, 'Fauzan Rahmani', 'fauzanrahmani1315@gmail.com', 'default.jpg', '$2y$10$futibT26cCtnFOmSiWlwtOdX1OsjC8vt2eO3kN6zJMX6dRcJ0nkEK', 2, 1, 1738738406);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int NOT NULL,
  `role_id` int NOT NULL,
  `menu_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int NOT NULL,
  `menu` varchar(128) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int NOT NULL,
  `role` varchar(128) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int NOT NULL,
  `menu_id` int NOT NULL,
  `title` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `url` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `icon` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `is_active` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin/dashboard_admin', 'dashboard', 1),
(2, 1, 'Data Barang', 'admin/data_barang', 'database', 1),
(3, 1, 'Invoices', 'admin/invoice', 'receipt_long', 1),
(4, 2, 'My Profile', 'admin/myprofile', 'person', 1),
(5, 2, 'Edit Profile', 'admin/myprofile/editprofile', 'edit_square', 1),
(6, 3, 'Menu', 'menu', 'folder', 1),
(7, 3, 'Sub Menu', 'menu/submenu', 'folder_open', 1),
(8, 2, 'Change Password', 'admin/dashboard_admin/changepassword', 'lock', 1),
(9, 1, 'Data User', 'admin/dashboard_admin/datauser', 'Person', 1),
(10, 1, 'Role', 'admin/dashboard_admin/role', 'group_add', 1),
(11, 1, 'Pengiriman', 'admin/invoice/pengiriman', 'local_shipping', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `date_created` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
