-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2023 at 03:17 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asriloka`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `checkIn` datetime(3) NOT NULL,
  `checkOut` datetime(3) NOT NULL,
  `roomId` int(11) DEFAULT NULL,
  `status` enum('BOOKED','PAYED','CHECKEDIN','CHECKEDOUT','CANCELLED') DEFAULT 'BOOKED',
  `totalPrice` int(50) NOT NULL,
  `bundlingId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `userId`, `checkIn`, `checkOut`, `roomId`, `status`, `totalPrice`, `bundlingId`) VALUES
(32, 7, '2023-10-01 00:00:00.000', '2023-10-02 00:00:00.000', 71, 'BOOKED', 550000, NULL),
(35, 7, '2023-10-01 00:00:00.000', '2023-10-10 00:00:00.000', 72, 'CHECKEDIN', 19800000, NULL),
(37, 7, '2023-10-01 00:00:00.000', '2023-10-02 00:00:00.000', 67, 'CHECKEDOUT', 1100000, NULL),
(38, 7, '2023-10-01 00:00:00.000', '2023-10-02 00:00:00.000', NULL, 'CHECKEDIN', 1100000, 24),
(39, 7, '2023-10-01 00:00:00.000', '2023-10-02 00:00:00.000', NULL, 'BOOKED', 1100000, 23);

-- --------------------------------------------------------

--
-- Table structure for table `bundling`
--

CREATE TABLE `bundling` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` varchar(191) NOT NULL,
  `price` double NOT NULL,
  `type` enum('LDK','PERUSAHAAN','KELUARGA','CAMP') NOT NULL,
  `picture` varchar(191) DEFAULT NULL,
  `isReady` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bundling`
--

INSERT INTO `bundling` (`id`, `name`, `description`, `price`, `type`, `picture`, `isReady`) VALUES
(23, 'Minimalis', '', 1000000, 'CAMP', NULL, 1),
(24, '100 orang', '', 1000000, 'PERUSAHAAN', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `capacity`
--

CREATE TABLE `capacity` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `capacity`
--

INSERT INTO `capacity` (`id`, `name`, `description`) VALUES
(1, 'Standard', '4 Dewasa 1 Anak'),
(2, 'Standard', '2 Dewasa 4 anak');

-- --------------------------------------------------------

--
-- Table structure for table `capacityonroom`
--

CREATE TABLE `capacityonroom` (
  `roomId` int(11) NOT NULL,
  `capacityId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `capacityonroom`
--

INSERT INTO `capacityonroom` (`roomId`, `capacityId`) VALUES
(67, 2),
(71, 2),
(72, 2);

-- --------------------------------------------------------

--
-- Table structure for table `facility`
--

CREATE TABLE `facility` (
  `id` int(11) NOT NULL,
  `picture` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` varchar(191) NOT NULL,
  `isGeneral` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facility`
--

INSERT INTO `facility` (`id`, `picture`, `name`, `description`, `isGeneral`) VALUES
(6, 'internet.png', 'Wifi', 'Tanya di loket', 1),
(14, '1bb30149-c9a8-4240-947c-530f6e9863f9.jpg', 'TV', 'TV dgn ch inter\r\n', 1),
(15, '60961de48b31a.jpg', 'GYM area', 'ngegym', 0);

-- --------------------------------------------------------

--
-- Table structure for table `facilityonbundling`
--

CREATE TABLE `facilityonbundling` (
  `bundlingId` int(11) NOT NULL,
  `facilityId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facilityonbundling`
--

INSERT INTO `facilityonbundling` (`bundlingId`, `facilityId`) VALUES
(23, 15),
(24, 6),
(24, 14),
(24, 15);

-- --------------------------------------------------------

--
-- Table structure for table `facilityonroom`
--

CREATE TABLE `facilityonroom` (
  `roomId` int(11) NOT NULL,
  `facilityId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facilityonroom`
--

INSERT INTO `facilityonroom` (`roomId`, `facilityId`) VALUES
(67, 6),
(71, 14),
(71, 15),
(72, 6),
(72, 14),
(72, 15);

-- --------------------------------------------------------

--
-- Table structure for table `generalinformation`
--

CREATE TABLE `generalinformation` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` varchar(191) NOT NULL,
  `picture` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `picture`
--

CREATE TABLE `picture` (
  `id` int(11) NOT NULL,
  `name` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `picture`
--

INSERT INTO `picture` (`id`, `name`) VALUES
(29, 'Malaka-Hotel-Bandung-2.webp'),
(30, '60961de48b31a.jpg'),
(31, '1bb30149-c9a8-4240-947c-530f6e9863f9.jpg'),
(32, 'image (1).png'),
(33, 'success-icon-23201.png'),
(34, 'penginapan1.jpg'),
(35, 'slide2.jpg'),
(36, 'slide3.jpg'),
(37, 'slide4.jpg'),
(38, 'slide2.jpg'),
(39, 'slide3.jpg'),
(40, 'slide4.jpg'),
(41, 'slide2.jpg'),
(42, 'slide3.jpg'),
(43, 'slide4.jpg'),
(44, 'slide2.jpg'),
(45, 'slide3.jpg'),
(46, 'slide4.jpg'),
(47, 'slide2.jpg'),
(48, 'slide3.jpg'),
(49, 'slide4.jpg'),
(50, 'slide2.jpg'),
(51, 'slide3.jpg'),
(52, 'slide4.jpg'),
(53, 'denahKuntilt1.PNG'),
(54, 'slide3.jpg'),
(55, 'denahKuntilt2.PNG'),
(56, 'slide4.jpg'),
(57, 'denahKuntilt2.PNG'),
(58, 'denahKuntilt3.PNG'),
(59, 'denahKuntilt2.PNG'),
(60, 'denahKuntilt3.PNG'),
(61, 'slide3.jpg'),
(62, 'slide4.jpg'),
(63, 'slide3.jpg'),
(64, 'slide4.jpg'),
(65, 'denahKuntilt2.PNG'),
(66, 'denahKuntilt3.PNG'),
(67, 'denahKuntilt3.PNG'),
(68, 'denahKuntilt1.PNG'),
(69, 'denahKuntilt2.PNG'),
(70, 'denahKuntilt3.PNG'),
(71, 'denahKuntilt3.PNG'),
(72, 'slide2.jpg'),
(73, 'slide3.jpg'),
(74, 'slide4.jpg'),
(75, 'denahKuntilt3.PNG'),
(76, 'denahKuntilt1.PNG'),
(77, 'slide4.jpg'),
(78, 'logo.png'),
(79, 'denahKuntilt3.PNG'),
(80, 'denahKuntilt3.PNG'),
(81, 'slide2.jpg'),
(82, 'denahKuntilt3.PNG'),
(83, 'slide4.jpg'),
(84, 'success.png'),
(85, 'slide3.jpg'),
(86, 'denahKuntilt3.PNG'),
(87, 'slide2.jpg'),
(88, 'slide3.jpg'),
(89, 'slide4.jpg'),
(90, 'denahKuntilt3.PNG'),
(91, 'slide2.jpg'),
(92, 'slide3.jpg'),
(93, 'slide4.jpg'),
(94, 'slide3.jpg'),
(95, 'penginapan1.jpg'),
(96, 'slide2.jpg'),
(97, 'slide3.jpg'),
(98, 'slide4.jpg'),
(99, 'denahKuntilt3.PNG'),
(100, 'penginapan1.jpg'),
(101, 'slide2.jpg'),
(102, 'slide3.jpg'),
(103, 'slide4.jpg'),
(104, 'penginapan1.jpg'),
(105, 'slide2.jpg'),
(106, 'denahKuntilt1.PNG'),
(107, 'slide3.jpg'),
(108, 'slide2.jpg'),
(109, 'slide3.jpg'),
(110, 'slide4.jpg'),
(111, 'slide3.jpg'),
(112, 'slide4.jpg'),
(113, 'penginapan1.jpg'),
(114, 'slide2.jpg'),
(115, 'slide3.jpg'),
(116, 'slide4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pictureonbundling`
--

CREATE TABLE `pictureonbundling` (
  `bundlingId` int(11) NOT NULL,
  `pictureId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pictureonbundling`
--

INSERT INTO `pictureonbundling` (`bundlingId`, `pictureId`) VALUES
(23, 58),
(24, 35),
(24, 36),
(24, 37);

-- --------------------------------------------------------

--
-- Table structure for table `pictureonroom`
--

CREATE TABLE `pictureonroom` (
  `roomId` int(11) NOT NULL,
  `pictureId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pictureonroom`
--

INSERT INTO `pictureonroom` (`roomId`, `pictureId`) VALUES
(67, 34),
(67, 35),
(67, 36),
(67, 37),
(71, 36),
(71, 37),
(72, 34),
(72, 35),
(72, 36),
(72, 37);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` varchar(191) NOT NULL,
  `rating` double NOT NULL,
  `roomId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` varchar(191) DEFAULT NULL,
  `price` double NOT NULL,
  `rating` double NOT NULL DEFAULT 0,
  `isReady` tinyint(1) NOT NULL DEFAULT 0,
  `picture` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `name`, `description`, `price`, `rating`, `isReady`, `picture`) VALUES
(67, 'Deluxe', NULL, 1000000, 0, 1, NULL),
(71, 'Standart', NULL, 500000, 0, 1, NULL),
(72, 'Honeymoon', NULL, 2000000, 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roomonbundling`
--

CREATE TABLE `roomonbundling` (
  `bundlingId` int(11) NOT NULL,
  `roomId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rule`
--

CREATE TABLE `rule` (
  `id` int(11) NOT NULL,
  `isGeneral` tinyint(1) NOT NULL DEFAULT 1,
  `description` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rule`
--

INSERT INTO `rule` (`id`, `isGeneral`, `description`) VALUES
(3, 1, 'Pembayaran penuh pada saat Check-in'),
(4, 1, 'Pembatalan reservasi maksimal 1x24 jam sebelum tanggal penyewaan dengan melakukan pemberitahuan kepada pihak Asriloka. Jika lebih dari 1x24 jam akan dikenakan biaya 1 malam penyewaan\r\n'),
(6, 1, 'Sebelum menyewa, silahkan melakukan konfirmasi ketersediaan kamar kepada pihak Asriloka\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `ruleonbundling`
--

CREATE TABLE `ruleonbundling` (
  `bundlingId` int(11) NOT NULL,
  `ruleId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ruleonbundling`
--

INSERT INTO `ruleonbundling` (`bundlingId`, `ruleId`) VALUES
(23, 6),
(24, 6);

-- --------------------------------------------------------

--
-- Table structure for table `ruleonroom`
--

CREATE TABLE `ruleonroom` (
  `roomId` int(11) NOT NULL,
  `ruleId` int(11) NOT NULL,
  `assignedAt` datetime(3) NOT NULL DEFAULT current_timestamp(3),
  `assignedBy` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ruleonroom`
--

INSERT INTO `ruleonroom` (`roomId`, `ruleId`, `assignedAt`, `assignedBy`) VALUES
(67, 4, '2023-10-01 16:54:28.459', ''),
(71, 3, '2023-10-01 16:57:55.155', ''),
(72, 4, '2023-10-01 16:58:23.424', ''),
(72, 6, '2023-10-01 16:58:23.425', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `picture` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `dob` datetime(3) DEFAULT current_timestamp(3),
  `address` varchar(191) DEFAULT NULL,
  `role` enum('ADMIN','USER') NOT NULL DEFAULT 'USER',
  `token` varchar(191) DEFAULT 'undefined'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `picture`, `phone`, `dob`, `address`, `role`, `token`) VALUES
(1, 'Admin', 'admin1@asriloka.com', '$2y$10$sOyO5sIOdqKUI/aQ9567IuoTkZCCClTXUUyaaucfEpAn5JPlz564y', NULL, NULL, '2023-09-25 17:39:33.255', NULL, 'ADMIN', 'g+b+zzZyNeSq5+WszOgDjnjC8wyU+WFxwCDDkvFkVlY='),
(2, 'User', 'usertest@asriloka.com', '$2y$10$8QLNcqg5ujhpZAefgHD27OAFwcCReL5T34q8hhD7TCFCvvq2y77Dq', NULL, '1234567890', '2000-01-01 00:00:00.000', 'User Address', 'ADMIN', 'undefined'),
(3, 'Rahmat Hidayatullah', 'bokirsianpar95@gmail.com', '$2y$10$gkUqcx4v8ejX93BjekZO8uvDoa5GVkQFTAJcKuUysFf1ze4dpew5e', '1695724804-6512b5049435a.png', '085732030855', '2003-01-26 00:00:00.000', 'Dsn.Sidorembug Ds.Balongsari RT.13 RW.04\r\nKec. Gedeg', 'USER', 'c747b8015379ac1b24b80d9ed5ef9f47'),
(5, 'Rahmat Hidayatullah', 'a@b.com', '$2y$10$j9WeH38apElPO9v5a/U4tOLh4gyyB9aKa4zfmtP8voDyjEc4CqWGu', '1696054695-6517bda7413bd.png', NULL, '2023-09-30 13:18:15.316', NULL, 'USER', 'undefined'),
(6, 'Rahmat Hidayatullah', 'a@gmail.com', '$2y$10$VVp6XnfA.6GprYY14dPvB.ZLQxxkO4nPJZQO58s1FrxcdLEGBCfCq', NULL, '085732030855', '2023-09-30 00:00:00.000', 'Dsn.Sidorembug Ds.Balongsari RT.13 RW.04\r\nKec. Gedeg', 'USER', '03cc28c9ad2e891c5d990da59ad74ff3'),
(7, 'Rahmat Hidayatullah', 'user@user.com', '$2y$10$PCV6t8bLPAjdvzVXjHA4CuaJZLZ9fmzziLAfx5qwN6MuiWOKW3Oce', NULL, '085732030855', '2023-10-01 00:00:00.000', 'Dsn.Sidorembug Ds.Balongsari RT.13 RW.04\r\nKec. Gedeg', 'USER', 'NO0jJH4e0ObqcFVX7+JlD4ZMGvkLg84NBu/qd563y74=');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Booking_bundlingId_fkey` (`bundlingId`),
  ADD KEY `Booking_userId_fkey` (`userId`),
  ADD KEY `Booking_roomId_fkey` (`roomId`);

--
-- Indexes for table `bundling`
--
ALTER TABLE `bundling`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `capacity`
--
ALTER TABLE `capacity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `capacityonroom`
--
ALTER TABLE `capacityonroom`
  ADD PRIMARY KEY (`roomId`,`capacityId`),
  ADD KEY `CapacityOnRoom_capacityId_fkey` (`capacityId`);

--
-- Indexes for table `facility`
--
ALTER TABLE `facility`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facilityonbundling`
--
ALTER TABLE `facilityonbundling`
  ADD PRIMARY KEY (`bundlingId`,`facilityId`),
  ADD KEY `FacilityOnBundling_facilityId_fkey` (`facilityId`);

--
-- Indexes for table `facilityonroom`
--
ALTER TABLE `facilityonroom`
  ADD PRIMARY KEY (`roomId`,`facilityId`),
  ADD KEY `FacilityOnRoom_facilityId_fkey` (`facilityId`);

--
-- Indexes for table `generalinformation`
--
ALTER TABLE `generalinformation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pictureonbundling`
--
ALTER TABLE `pictureonbundling`
  ADD PRIMARY KEY (`bundlingId`,`pictureId`),
  ADD KEY `PictureOnBundling_pictureId_fkey` (`pictureId`);

--
-- Indexes for table `pictureonroom`
--
ALTER TABLE `pictureonroom`
  ADD PRIMARY KEY (`roomId`,`pictureId`),
  ADD KEY `PictureOnRoom_pictureId_fkey` (`pictureId`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Review_roomId_fkey` (`roomId`),
  ADD KEY `Review_userId_fkey` (`userId`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roomonbundling`
--
ALTER TABLE `roomonbundling`
  ADD PRIMARY KEY (`bundlingId`,`roomId`),
  ADD KEY `RoomOnBundling_roomId_fkey` (`roomId`);

--
-- Indexes for table `rule`
--
ALTER TABLE `rule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ruleonbundling`
--
ALTER TABLE `ruleonbundling`
  ADD PRIMARY KEY (`bundlingId`,`ruleId`),
  ADD KEY `RuleOnBundling_ruleId_fkey` (`ruleId`);

--
-- Indexes for table `ruleonroom`
--
ALTER TABLE `ruleonroom`
  ADD PRIMARY KEY (`roomId`,`ruleId`),
  ADD KEY `RuleOnRoom_ruleId_fkey` (`ruleId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `User_email_key` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `bundling`
--
ALTER TABLE `bundling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `capacity`
--
ALTER TABLE `capacity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `facility`
--
ALTER TABLE `facility`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `generalinformation`
--
ALTER TABLE `generalinformation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `picture`
--
ALTER TABLE `picture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `rule`
--
ALTER TABLE `rule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `Booking_roomId_fkey` FOREIGN KEY (`roomId`) REFERENCES `room` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `Booking_userId_fkey` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `capacityonroom`
--
ALTER TABLE `capacityonroom`
  ADD CONSTRAINT `CapacityOnRoom_capacityId_fkey` FOREIGN KEY (`capacityId`) REFERENCES `capacity` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `CapacityOnRoom_roomId_fkey` FOREIGN KEY (`roomId`) REFERENCES `room` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `facilityonbundling`
--
ALTER TABLE `facilityonbundling`
  ADD CONSTRAINT `FacilityOnBundling_bundlingId_fkey` FOREIGN KEY (`bundlingId`) REFERENCES `bundling` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FacilityOnBundling_facilityId_fkey` FOREIGN KEY (`facilityId`) REFERENCES `facility` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `facilityonroom`
--
ALTER TABLE `facilityonroom`
  ADD CONSTRAINT `FacilityOnRoom_facilityId_fkey` FOREIGN KEY (`facilityId`) REFERENCES `facility` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FacilityOnRoom_roomId_fkey` FOREIGN KEY (`roomId`) REFERENCES `room` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `pictureonbundling`
--
ALTER TABLE `pictureonbundling`
  ADD CONSTRAINT `PictureOnBundling_bundlingId_fkey` FOREIGN KEY (`bundlingId`) REFERENCES `bundling` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `PictureOnBundling_pictureId_fkey` FOREIGN KEY (`pictureId`) REFERENCES `picture` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `pictureonroom`
--
ALTER TABLE `pictureonroom`
  ADD CONSTRAINT `PictureOnRoom_pictureId_fkey` FOREIGN KEY (`pictureId`) REFERENCES `picture` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `PictureOnRoom_roomId_fkey` FOREIGN KEY (`roomId`) REFERENCES `room` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `Review_roomId_fkey` FOREIGN KEY (`roomId`) REFERENCES `room` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `Review_userId_fkey` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `roomonbundling`
--
ALTER TABLE `roomonbundling`
  ADD CONSTRAINT `RoomOnBundling_bundlingId_fkey` FOREIGN KEY (`bundlingId`) REFERENCES `bundling` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `RoomOnBundling_roomId_fkey` FOREIGN KEY (`roomId`) REFERENCES `room` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `ruleonbundling`
--
ALTER TABLE `ruleonbundling`
  ADD CONSTRAINT `RuleOnBundling_bundlingId_fkey` FOREIGN KEY (`bundlingId`) REFERENCES `bundling` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `RuleOnBundling_ruleId_fkey` FOREIGN KEY (`ruleId`) REFERENCES `rule` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `ruleonroom`
--
ALTER TABLE `ruleonroom`
  ADD CONSTRAINT `RuleOnRoom_roomId_fkey` FOREIGN KEY (`roomId`) REFERENCES `room` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `RuleOnRoom_ruleId_fkey` FOREIGN KEY (`ruleId`) REFERENCES `rule` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
