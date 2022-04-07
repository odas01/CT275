-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2022 at 04:46 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ct275_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'laptop'),
(2, 'pc'),
(3, 'ram');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `address` varchar(32) NOT NULL,
  `phone` int(11) NOT NULL,
  `note` varchar(200) NOT NULL,
  `status` int(2) NOT NULL,
  `code` int(11) NOT NULL,
  `ship` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `order_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `percent` int(11) NOT NULL,
  `img` varchar(50) NOT NULL,
  `detail` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `type_id`, `name`, `price`, `percent`, `img`, `detail`) VALUES
(1, 1, 'Asus VivoBook A415EA i5 1135G7 (AM1637W)', 19000000, 10, './asset/img/laptop/asus1.jpg', 'CPU: i5 1135G7 2.4GHz,\r\nRAM: 8GB DDR4(1 khe) 3200 MHz,\r\nỔ cứng: 512GB SSD NVMe PCIe (Có thể tháo ra lắp thanh khác tối đa 1TB),\r\nMàn hình: 14\" Full HD (1920 x 1080),\r\nTrọng lượng: 1.4kg,\r\nHệ điều hành: Windows 11 Home SL'),
(2, 1, 'Dell Gaming G3 15 i7 10750H (P89F002BWH)', 31690000, 15, './asset/img/laptop/dell1.jpg', 'CPU: i7 10750H 2.6GHz,\r\nRAM: 16GB DDR4 2 khe (1 khe 8GB + 1 khe 8GB) 2933 MHz,\r\nỔ cứng: 512GB SSD NVMe PCIe Hỗ trợ thêm 1 khe cắm SSD M.2 PCIe mở rộng,\r\nMàn hình: 15.6\" Full HD (1920 x 1080) 120Hz,\r\nTrọng lượng: 2.58kg,\r\nHệ điều hành: Windows 10 Home SL'),
(3, 1, 'Asus VivoBook A515EA OLED i5 1135G7 (L12032W)', 19690000, 5, './asset/img/laptop/asus2.jpg', 'CPU: i5 1135G7 2.4GHz,\r\nRAM: 8 GBDDR4 2 khe (1 khe 8GB onboard + 1 khe trống) 3200 MHz,\r\nỔ cứng: 512GB SSD NVMe PCIe (Có thể tháo ra lắp thanh khác tối đa 1TB) Hỗ trợ thêm 1 khe cắm HDD SATA (nâng cấp tối đa 1TB),\r\nMàn hình: 15.6\" Full HD (1920 x 1080),\r\nTrọng lượng: 1.8kg,\r\nHệ điều hành: Windows 11 Home SL'),
(4, 1, 'Lenovo Yoga 9 14ITL5 i7/1185G7 (82BG006EVN)', 49000000, 8, './asset/img/laptop/lnv1.jpg', 'CPU: i7 1185G7 3GHz,\r\nRAM: 16GB LPDDR4 (On board) 4266 MHz,\r\nỔ cứng: 1 TB SSD M.2 PCIe\r\nMàn hình: 14\" 4K/UHD  (3840 x 2160),\r\nTrọng lượng: 1.37kg,\r\nHệ điều hành: Windows 10 Home SL'),
(5, 1, 'Dell Inspiron 14 5410 i5 1155G7 (N4I5547W1)', 26900000, 8, './asset/img/laptop/dell2.jpg', 'CPU: i5 1155G7 2.5GHz,\r\nRAM: 8GB DDR4 2 khe (1 khe 4GB + 1 khe 4GB) 3200 MHz,\r\nỔ cứng: 512GB SSD NVMe PCIe (Có thể tháo ra lắp thanh khác tối đa 1TB)\r\nMàn hình: 14\" Full HD (1920 x 1080),\r\nTrọng lượng: 1.65kg,\r\nHệ điều hành: Windows 11 Home SL + Office H'),
(6, 1, 'MacBook Pro 14 M1 Max 2021/32-core GPU', 77990000, 12, './asset/img/laptop/mac1.jpg', 'CPU: Apple M1 Pro 200GB/s memory bandwidth,\r\nRAM: 32 GB,\r\nỔ cứng: 1 TB SSD\r\nMàn hình: 14.2\" Liquid Retina XDR display (3024 x 1964)120Hz,\r\nTrọng lượng: 1.6kg,\r\nHệ điều hành: Mac OS'),
(7, 1, 'MSI Gaming Leopard GP76 11UG i7 11800H (823VN)', 49900000, 10, './asset/img/laptop/msi1.jpg', 'CPU: i7 11800H 2.30 GHz,\r\nRAM: 16 GB DDR4 2 khe (1 khe 8GB + 1 khe 8GB) 3200 MHz,\r\nỔ cứng: 1 TB SSD M.2 PCIe (Có thể tháo ra lắp thanh khác tối đa 2TB)Hỗ trợ thêm 1 khe cắm SSD M.2 PCIe mở rộng (nâng cấp tối đa 2TB),\r\nMàn hình: 17.3\" Full HD (1920 x 1080),\r\nTrọng lượng: 2.9kg,\r\nHệ điều hành: Windows 10 Home SL\r\n'),
(8, 1, 'MSI Gaming GF65 Thin 10UE i5 10500H (286VN)', 29000000, 5, './asset/img/laptop/msi2.jpg', 'CPU: i5 10500H 2.5GHz,\r\nRAM: 16 GB DDR4 2 khe (1 khe 8GB + 1 khe 8GB) 3200 MHz,\r\nỔ cứng: 512 GB SSD NVMe PCIe (Có thể tháo ra lắp thanh khác tối đa 2TB) Hỗ trợ thêm 1 khe cắm SSD M.2 PCIe mở rộng (nâng cấp tối đa 2TB),\r\nMàn hình: 15.6\" Full HD (1920 x 10),\r\nTrọng lượng: 1.68kg,\r\nHệ điều hành: Windows 10 Home SL'),
(9, 2, 'PC FPT E-POWER 002 Intel Core i3-10105 (3.7 GHz-4.', 7890000, 5, './asset/img/pc/pc1.jpg', 'CPU: Intel Core i3 10105,\r\nRAM: 8GB DDR4 2800 MHz,\r\nỔ cứng: 120GB SSD,\r\nChip đồ họa: Intel UHD Graphics 630,\r\nTrọng lượng: 6.5kg,\r\nHệ điều hành: không đi kèm'),
(10, 2, 'PC Gaming E-POWER 016 Core i5 10400F 2.9 GHz-4.3 G', 35990000, 15, './asset/img/pc/pc2.jpg', 'CPU: Intel Core i5 10400F,\r\nRAM: 8GB DDR4 2800 MHz,\r\nỔ cứng: 256GB SSD,\r\nChip đồ họa: GeForce GT 1050 Ti,\r\nTrọng lượng: 8kg,\r\nHệ điều hành: không đi kèm'),
(11, 2, 'PC Gaming E-POWER 013 Core i5 10400F 2.9 GHz-4.3 G', 20399000, 5, './asset/img/pc/pc3.jpg', 'CPU: Intel Core i5 10400F,\r\nRAM: 8GB DDR4 2800 MHz,\r\nỔ cứng: 256GB SSD,\r\nChip đồ họa: GeForce GT 1050 Ti,\r\nTrọng lượng: 8kg,\r\nHệ điều hành: không đi kèm'),
(12, 2, 'PC Gaming E-POWER 014 Core i5 10400F 2.9 GHz-4.3 G', 16150000, 8, './asset/img/pc/pc4.jpg', 'CPU: Intel Core i5 10400F,\r\nRAM: 8GB DDR4 2800 MHz,\r\nỔ cứng: 256GB SSD,\r\nChip đồ họa: GeForce GT 1050 Ti,\r\nTrọng lượng: 8kg,\r\nHệ điều hành: không đi kèm'),
(13, 2, 'PC Gaming E-POWER 014 Core i5 10400F 2.9 GHz-4.3 G', 15990000, 15, './asset/img/pc/pc5.jpg', 'CPU: Intel Core i5 4-core,\r\nRAM: 4GB DDR4,\r\nỔ cứng: 512GB SSD,\r\nChip đồ họa: Intel UHD Graphics,\r\nTrọng lượng: 7.7kg,\r\nHệ điều hành: Windows 10'),
(14, 2, 'PC FPT E-POWER 014 Ryzen 5 Pro 4650G 3.7 GHz-4.2 G', 12000000, 15, './asset/img/pc/pc8.jpg', 'CPU: AMD Ryzen 5 Pro 4650G,\r\nRAM: 8GB DDR4 2800 MHz,\r\nỔ cứng: 240GB SSD,\r\nChip đồ họa: Radeon Vega Graphics,\r\nTrọng lượng: 8kg,\r\nHệ điều hành: không đi kèm'),
(15, 2, 'Máy tính để bàn HP 285 Pro G6 MT/AMD R5 4600G/ 8GB', 11199000, 5, './asset/img/pc/pc7.jpg', 'CPU: AMD Ryzen 5 4600G,\r\nRAM: 8GB DDR4 3200 MHz,\r\nỔ cứng: 256GB SSD,\r\nChip đồ họa: Radeon TM Vega 7 Graphics,\r\nTrọng lượng: 5.52kg,\r\nHệ điều hành: Windows 10'),
(16, 2, 'iMac 24\" 2021 Retina 4.5K M1/8-Core CPU/8-Core GPU', 45490000, 10, './asset/img/pc/pc6.jpg', 'CPU: Apple M1 8-core,\r\nRAM: 8GB,\r\nỔ cứng: 512GB SSD,\r\nMàn hình: 24\",\r\nTrọng lượng: 4.48kg,\r\nHệ điều hành: Mac OS'),
(17, 3, 'RAM ADATA XPG Spectrix D41 RGB 8 GB-DDR4-3200 MHz', 962000, 7, './asset/img/ram/ram1.png', 'RAM: DDR4,\r\nDung lượng: 8GB,\r\nTốc độ: 3200MHz,\r\nHỗ trợ ECC: không,\r\nĐèn LED: RGB,\r\nTrọng lượng: 100g'),
(18, 3, 'RAM ADATA XPG Lancer RGB 32 GB-DDR5-5200 MHz (AX5U', 7289000, 5, './asset/img/ram/ram2.png', 'RAM: DDR5,\r\nDung lượng: 32GB,\r\nTốc độ: 5200MHz,\r\nHỗ trợ ECC: không,\r\nĐèn LED: RGB,\r\nTrọng lượng: 400g'),
(19, 3, 'RAM G.SKILL Trident Z5 RGB 32 GB-DDR5-5600 MHz (F5', 12600000, 12, './asset/img/ram/ram3.png', 'RAM: DDR5,\r\nDung lượng: 32GB,\r\nTốc độ: 5600MHz,\r\nHỗ trợ ECC: không,\r\nĐèn LED: RGB,\r\nTrọng lượng: 69g'),
(20, 3, 'RAM Kingmax 32GB DDR4-3200 Zeus RGB', 4455000, 10, './asset/img/ram/ram4.png', 'RAM: DDR4,\r\nDung lượng: 32GB,\r\nTốc độ: 3200MHz,\r\nHỗ trợ ECC: không,\r\nĐèn LED: RGB,\r\nTrọng lượng: 250g'),
(21, 3, 'RAM G.SKILL Aegis 16 GB-DDR4-3000 MHz (F4-3000C16S', 1537000, 10, './asset/img/ram/ram6.png', 'RAM: DDR4,\r\nDung lượng: 16GB,\r\nTốc độ: 3000MHz,\r\nHỗ trợ ECC: không,\r\nĐèn LED: không,\r\nTrọng lượng: 18g'),
(22, 3, 'RAM G.SKILL Ripjaws V 32 GB-DDR4-3000 MHz (F4-3000', 3294000, 12, './asset/img/ram/ram5.png', 'RAM: DDR4,\r\nDung lượng: 32GB,\r\nTốc độ: 3000MHz,\r\nHỗ trợ ECC: không,\r\nĐèn LED: không,\r\nTrọng lượng: 86g'),
(23, 3, 'RAM Kingston Fury 32 GB-DDR4-3600 MHz (KF436C18BBA', 4194000, 5, './asset/img/ram/ram7.png', 'RAM: DDR4,\r\nDung lượng: 32GB,\r\nTốc độ: 3600MHz,\r\nHỗ trợ ECC: không,\r\nĐèn LED: không,\r\nTrọng lượng: ...'),
(24, 3, 'RAM Geil EVO X 8 GB-DDR4-3200 MHz', 989000, 7, './asset/img/ram/ram8.png', 'RAM: DDR4,\r\nDung lượng: 8GB,\r\nTốc độ: 3600MHz,\r\nHỗ trợ ECC: không,\r\nĐèn LED: không,\r\nTrọng lượng: 85g');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_ibfk_1` (`user_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_detail_ibfk_1` (`order_id`),
  ADD KEY `order_detail_ibfk_2` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
