-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2023 at 02:28 PM
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
-- Database: `flavia-food`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id` int(11) NOT NULL,
  `nama_brg` varchar(120) NOT NULL,
  `keterangan` varchar(225) NOT NULL,
  `kategori` varchar(60) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(4) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id`, `nama_brg`, `keterangan`, `kategori`, `harga`, `stok`, `gambar`) VALUES
(1, 'Double Beef Burger', 'hidangan burger yang terdiri dari dua lapis daging sapi panggang, yang disajikan di antara roti burger. Setiap lapisan daging memberikan rasa gurih dan keempukan, sementara roti burger menyempurnakan pengalaman menyantap deng', 'junkfood', 25000, 10, 'burger.jpg'),
(2, 'Formaggio Pizza', 'Pizza yang dilapisi saus tomat segar dengan taburan keju mozzarella yang meleleh, diberi sedikit daun basil segar dan memiliki rasa yang gurih, manis dan sedikit pedas.', 'pizza', 60000, 13, 'pizza.jpg'),
(3, 'Pulen Rice', 'Makanan pokok yang populer di berbagai belahan dunia, Nasi memiliki tekstur lembut dan rasa yang netral, membuatnya cocok sebagai pendamping berbagai hidangan.', 'junkfood', 10000, 21, 'rice.jpg'),
(4, 'Spicy Spaghetti', 'Hidangan pasta yang kenyal, disajikan dengan limpahan saus bolognese yang terbuat dari daging sapi cincang dengan rempah-rempah yang menghasilkan rasa gurih dan sedikit manis.', 'mie', 30000, 33, 'spagetti.jpg'),
(5, 'Beef Burger', 'hidangan yang terdiri dari lapisan daging sapi panggang yang diletakkan di antara dua irisan roti burger. Daging sapi tersebut biasanya dibentuk menjadi patty dan dipanggang atau digrill untuk memberikan rasa gurih dan keempu', 'junkfood', 15000, 9, 'burger2.jpg'),
(6, 'French Fries', 'Potongan kentang yang dipotong tipis dan digoreng hingga kecokelatan untuk menciptakan tekstur yang renyah di luar dan lembut di dalam.', 'junkfood', 13000, 9, 'frenchfries.jpg'),
(7, 'Chocho Ice Cream', 'Dibuat dari krim lembut yang menyatu dengan coklat murni berkualitas tinggi, setiap suapannya menghadirkan sensasi lembut dan kaya rasa coklat.', 'icecream', 12000, 14, 'icecreamcoklat.jpg'),
(8, 'White Caramel Ice Cream', 'Manisnya caramel yang dipadukan dengan manfaat susu, yang memberikan kalsium, protein dan karbohidrat dalam white caramel ice cream, menjadikan varian ini adalah pilihan yang banyak di sukai, nikmati langsung dan jadikan dese', 'icecream', 14000, 11, 'icecreamvanilla.jpg'),
(9, 'Beef Cheese Burger', 'Burger yang terdiri dari dua lapis daging sapi panggang, keju leleh, serta berbagai tambahan seperti selada, tomat, bawang, dan saus, semuanya disajikan dalam sepotong roti burger.', 'junkfood', 35000, 25, 'bigburger.jpg'),
(10, 'Hot Dog', 'Inovasi daging sosis, yang disajikan dengan roti dan sayuran', 'junkfood', 17000, 23, 'hotdog.jpg'),
(11, 'Fresh Cola', 'Minuman dengan kandungan soda extra ice yang segarMinuman dengan kandungan soda extra ice yang segar', 'drink', 17000, 19, 'flaviacoke.jpg'),
(12, 'Double Kebab ', 'Berupa kulit tortilla yang diisi dengan daging, sayuran, dan aneka sauss, dimasak dengan cara di panggang, nikmati langsung dan anda dapat merasakan rasa yang unik', 'junkfood', 22000, 49, 'sandwich.jpg'),
(13, 'Waffle', 'Dessert yang terbuat dari adonan beragi atau adonan yang dimasak di antara dua piring yang diberi pola untuk memberikan ukuran, bentuk, dan kesan permukaan yang khas, waffle ini sangat banyak digemari terutama di belgia, disi', 'icecream', 23000, 20, 'waffle.jpg'),
(14, 'Chicken Things', 'Potongan sayap ayam yang biasanya digoreng atau dipanggang, dengan tekstur renyah di luar dan daging ayam yang lembut di dalamnya. Wings ini sering disajikan dengan berbagai saus, seperti buffalo, barbecue, atau saus pedas, u', 'junkfood', 30000, 99, 'chicken.jpg'),
(15, 'Cream Soup', 'Sup yang disiapkan memakai cream, krim ringan, half and half atau susu sebagai bahan utama, daging ayam dan susu yang memberikan rasa yang lezat', 'junkfood', 17000, 998, 'creamsop.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `id` int(11) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `notes` varchar(512) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(50) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` int(10) NOT NULL,
  `pilihan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Fauzan Rahmani Ahdan', 'fauzan123@gmail.com', 'fauzan.jpg', '$2y$10$Gze89wGmZRyt/cnotvYw4e/rVxa0073hNRNsHFhR1wMoRp4uc6Ihi', 1, 1, 1701133261),
(2, 'Mitha Ayu Desfany', 'mitha12345@gmail.com', 'happy-burger.jpg', '$2y$10$Z4Qyonx5osOewg3MKN3I0.5Gjdn//MZW7VemspKjjBNlymgJ7eX6W', 2, 1, 1701133719),
(3, 'Coet Mutu', 'coetmutu355@gmail.com', 'default.jpg', '$2y$10$DXfP2i7lXJLtZXmDtSm..upXqWNqwNpCic0aU.ah9Kl5ln/X781W.', 2, 1, 1702711438);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
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
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
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
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
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
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
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
(10, 1, 'Role', 'admin/dashboard_admin/role', 'group_add', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
