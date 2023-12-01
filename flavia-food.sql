-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2023 at 12:27 AM
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
(1, 'Beef Burger Chese', 'Enak Sedap Berkualitas', 'junkfood', 25000, 6, 'burger.jpg'),
(3, 'Formaggio Pizza', 'Pizza yang dilapisi saus tomat segar dengan taburan keju mozzarella yang meleleh, diberi sedikit daun basil segar dan memiliki rasa yang gurih, manis dan sedikit pedas.', 'pizza', 60000, 9, 'pizza.jpg'),
(5, 'Pulen Rice', 'Makanan pokok yang populer di berbagai belahan dunia, Nasi memiliki tekstur lembut dan rasa yang netral, membuatnya cocok sebagai pendamping berbagai hidangan.', 'junkfood', 10000, 10, 'rice.jpg'),
(7, 'Spicy Spaghetti', 'Hidangan pasta yang kenyal, disajikan dengan limpahan saus bolognese yang terbuat dari daging sapi cincang dengan rempah-rempah yang menghasilkan rasa gurih dan sedikit manis.', 'mie', 30000, 5, 'spagetti.jpg'),
(8, 'Beef Burger', 'belum ditambahkan', 'junkfood', 15000, 10, 'burger2.jpg'),
(9, 'French Fries', 'belum ditambahkan', 'junkfood', 13000, 10, 'frenchfries.jpg'),
(10, 'Ciocho Ice Cream', 'Dibuat dari krim lembut yang menyatu dengan coklat murni berkualitas tinggi, setiap suapannya menghadirkan sensasi lembut dan kaya rasa coklat.', 'junkfood', 12000, 15, 'icecreamcoklat.jpg'),
(11, 'White Caramel Ice Cream', '-', 'junkfood', 14000, 15, 'icecreamvanilla.jpg'),
(12, 'Beef Cheese Burger', 'Burger yang terdiri dari dua lapis daging sapi panggang, keju leleh, serta berbagai tambahan seperti selada, tomat, bawang, dan saus, semuanya disajikan dalam sepotong roti burger.', 'junkfood', 35000, 20, 'bigburger.jpg'),
(13, 'Hot Dog', '-', 'junkfood', 17000, 25, 'hotdog.jpg'),
(14, 'Fresh Cola', 'Minuman dengan kandungan soda extra ice yang segarMinuman dengan kandungan soda extra ice yang segar', 'drink', 17000, 20, 'flaviacoke.jpg'),
(15, 'Double Kebab ', '-', 'junkfood', 22000, 50, 'sandwich.jpg'),
(16, 'Waffle', '-', 'junkfood', 23000, 20, 'waffle.jpg'),
(17, 'Chicken Things', '-', 'junkfood', 30000, 100, 'chicken.jpg'),
(18, 'Cream Soup', '-', 'junkfood', 17000, 999, 'creamsop.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `id` int(11) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_invoice`
--

INSERT INTO `tb_invoice` (`id`, `nama`, `alamat`, `tgl_pesan`, `batas_bayar`) VALUES
(1, 'Fauzan', 'Garut', '2023-11-25 06:45:40', '2023-11-26 06:45:40'),
(2, 'Utaaa', 'Tasik', '2023-11-25 06:48:25', '2023-11-26 06:48:25'),
(3, 'Mitha', 'Garut', '2023-11-25 21:25:32', '2023-11-26 21:25:32'),
(4, 'Akmal', 'Gobras', '2023-11-27 11:25:53', '2023-11-28 11:25:53'),
(5, '', '', '2023-11-27 11:30:24', '2023-11-28 11:30:24'),
(6, 'Mitha', 'Singaparna', '2023-11-27 17:05:42', '2023-11-28 17:05:42'),
(7, 'SUe', 'Sue', '2023-11-27 17:06:21', '2023-11-28 17:06:21'),
(8, 'Sule', 'Jamanis', '2023-11-27 17:07:37', '2023-11-28 17:07:37'),
(9, 'Sule', 'Jamanis', '2023-11-27 17:08:39', '2023-11-28 17:08:39'),
(10, 'Tiarani', 'Waduh', '2023-11-27 17:12:32', '2023-11-28 17:12:32');

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
-- Dumping data for table `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id`, `id_invoice`, `id_brg`, `nama_brg`, `jumlah`, `harga`, `pilihan`) VALUES
(1, 1, 1, 'Beef Burger Chese', 2, 25000, ''),
(2, 2, 3, 'Formaggio Pizza', 2, 60000, ''),
(3, 3, 3, 'Formaggio Pizza', 2, 60000, ''),
(4, 3, 1, 'Beef Burger Chese', 1, 25000, ''),
(5, 4, 7, 'Spicy Spaghetti', 1, 30000, ''),
(6, 6, 3, 'Formaggio Pizza', 1, 60000, ''),
(7, 7, 3, 'Formaggio Pizza', 1, 60000, ''),
(9, 9, 5, 'Pulen Rice', 1, 10000, ''),
(10, 10, 5, 'Pulen Rice', 1, 10000, '');

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
(1, 'Fauzan Rahmani Ahdan', 'fauzan123@gmail.com', 'default.jpg', '$2y$10$WK5ikT7aRDe2Ks6MU259D.bfC9yB5Kq7k4oo8ErtJDZDpXrzWwtme', 1, 1, 1701133261),
(2, 'Mitha Ayu', 'mitha12345@gmail.com', 'default.jpg', '$2y$10$gwZADGcn1Rbxf9qvVMGyT.Iw7ovDsz1sDrWI5l0c2LGv.LEB1puMm', 2, 1, 1701133719),
(3, 'Sulaeman', 'sule234@gmail.com', 'default.jpg', '$2y$10$xMhYtnHfsR/NkQzytsGLFOrxaqXAZqH1RdLe8/SHJrZ3muJOxK/TO', 2, 1, 1701249669),
(4, 'Salsabila', 'salsa678@gmail.com', 'default.jpg', '$2y$10$2UvExoVIROWnItPOIfEhA.isx1FIOhMes3.poa.7gqVRYUIoIvZBW', 2, 1, 1701250165);

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
(3, 2, 2);

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
(2, 'User');

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
(5, 2, 'Edit Profile', 'admin/edit_profile', 'edit_square', 1);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
