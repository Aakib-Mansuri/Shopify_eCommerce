-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2024 at 02:23 PM
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
-- Database: `shopify_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `cartdetails`
--

CREATE TABLE `cartdetails` (
  `UserId` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categorydetails`
--

CREATE TABLE `categorydetails` (
  `CategoryId` int(5) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `SubCategory` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorydetails`
--

INSERT INTO `categorydetails` (`CategoryId`, `Name`, `SubCategory`) VALUES
(1, 'Electronics & Appliances', 'Mobile Accessories'),
(2, 'Clothing & Accessories', 'Women\'s Garments'),
(4, 'Medicines', 'Generics'),
(5, 'Hardware & Sanitaryware', 'Kitchen & Bath Fittings'),
(6, 'Food', 'Food - Staples'),
(7, 'Electronics & Appliances', 'Smartphone'),
(9, 'Clothing & Accessories', 'Men\'s Garments'),
(10, 'Clothing & Accessories', 'Kid\'s Garments'),
(11, 'Electronics & Appliances', 'Mobile Protection'),
(12, 'Footwear', 'Men\'s Footwear'),
(13, 'Footwear', 'Women\'s Footwear'),
(14, 'Footwear', 'Boys Footwear'),
(15, 'Medicines', 'Ethicals'),
(16, 'Medicines', 'Medical Devices'),
(17, 'Hardware & Sanitaryware', 'Pumps and Accesories'),
(18, 'Hardware & Sanitaryware', 'Power & Hand Tools'),
(19, 'Food', 'Fruits & Vegetables'),
(20, 'Food', 'Meat');

-- --------------------------------------------------------

--
-- Table structure for table `logindetails`
--

CREATE TABLE `logindetails` (
  `UserId` int(5) NOT NULL,
  `UserName` varchar(25) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `UserType` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logindetails`
--

INSERT INTO `logindetails` (`UserId`, `UserName`, `Password`, `UserType`) VALUES
(3, 'root123', '$2y$10$P5Lfbqxs0M5d4kYup2gOdeYTPJg/QQKQjSwH0rFGnG6p7cGepUFdO', 0),
(4, 'aakib123', '$2y$10$.6wK53nYINpRxFDowfp9HOa3D/3US.dd.SBQHxDNjTo4olOHF6XFy', 1),
(6, 'hammad123', '$2y$10$B7Bic8ipY2M90KaUhc0LPuGJTEPeqvlJxfT1UrNg5GlybUc4Qk75q', 1),
(7, 'soham123', '$2y$10$28P5.qnXTOvItQ.ZNVBwxuaKv.ixUqkBNJNZIRL8bSzj/UMmMiXZm', 1),
(10, 'pathaan123', '$2y$10$qtqG7dI44lslZNyOL8uN/uwyuljbLihX.bhQizjgskM4WCbPrxcX6', 1),
(11, 'sk123', '$2y$10$7m23kvVkH0FM/Zh790PqteggbDJNJK1Ziyxc.63/DbBMgUWbfVn46', 1),
(12, 'abc123', '$2y$10$piMLW3Z2vjkyk82u46pZEOdiBMKgPhCjFFD7yrf9VNchofy1/kKKW', 1);

-- --------------------------------------------------------

--
-- Table structure for table `productdetails`
--

CREATE TABLE `productdetails` (
  `ProductId` int(5) NOT NULL,
  `CategoryId` int(5) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Price` double NOT NULL,
  `Quantity` int(5) NOT NULL,
  `ImageUrl` varchar(255) NOT NULL,
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productdetails`
--

INSERT INTO `productdetails` (`ProductId`, `CategoryId`, `Name`, `Description`, `Price`, `Quantity`, `ImageUrl`, `Status`) VALUES
(9, 7, 'Realme 11 Pro+', 'Additional Upto 12GB Dynamic RAM, 200 MP SuperZoom Camera With OIS, Curved Display of 120 Hz, 100W SUPERVOOC Adapter, Designed With Premium Vegan Leather, 7050 5G Chipset Dimensity, 32MP Sony Front Camera', 29869, 24, '../Product Images/2023-07-29 Realme 11 Pro+.jpg', 'Live'),
(10, 12, 'Vector X Ranger Tennis', 'With the growing demand of good health and fitness, Vector X comes up with innovations each day. Whether its hard core fitness or trying your hands on your favorite sport, we are there for you.', 869, 5, '../Product Images/2023-07-29 Vector X Ranger Tennis.jpg', 'Live'),
(14, 7, 'Apple iPhone 15', 'DYNAMIC ISLAND COMES TO IPHONE 15 — Dynamic Island bubbles up alerts and Live Activities — so you don’t miss them while you’re doing something else. 48MP MAIN CAMERA WITH 2X TELEPHOTO — The 48MP Main camera shoots in super-high resolution.', 89900, 24, '../Product Images/2023-09-21 Apple iPhone 15.jpg', 'Live'),
(15, 7, 'Samsung Galaxy S23', '200MP. Wow-worthy resolution - Resolution on the Wide-angle Camera has nearly doubled, delivering strikingly clear photos. Low light. Camera. Action - A Pro-grade Camera grabs brighter photos and video, dusk to dawn.', 134999, 24, '../Product Images/2023-09-21 Samsung Galaxy S23.jpg', 'Live'),
(16, 1, 'Apple Watch Ultra', 'EXTREMELY RUGGED, INCREDIBLY CAPABLE — 49-millimetre corrosion-resistant titanium case. Larger Digital Crown and more accessible buttons. 100-metre water resistance. FOR OUTDOOR ADVENTURERS — Redesigned Compass app delivers all-new views and functionality', 82999, 14, '../Product Images/2023-09-21 Apple Watch Ultra Smart Watch.jpg', 'Live'),
(17, 1, 'boAt Rockerz 558', 'The mighty 500mAh battery capacity offers a superior playback time of up to 20 Hours It has been ergonomically designed and structured as an over-ear headphone to provide the best user experience.', 1999, 8, '../Product Images/2023-09-21 boAt Rockerz 558 Bluetooth.jpg', 'Live'),
(18, 1, 'Amazon Basics Earbuds', 'Playback - Enjoy up to 36 hours of music with the strong battery backup. Fast charge - With the fast-charging feature, you can get 100 minutes of uninterrupted playing time after charging the earbuds for only 10 minutes.', 849, 24, '../Product Images/2023-09-21 Amazon Basics True Wireless Earbuds.jpg', 'Live'),
(19, 11, 'Amazon Basics Frosted', 'QUALITY MATERIAL - Hybrid technology that is made of a best Quality Material. CAMERA PROTECTION - Raised camera bump protect phone camera from scratches. MODERN DESIGN - Elegant Design perfectly uses the advantages of the scratch-resistant material.', 799, 28, '../Product Images/2023-09-21 Amazon Basics Frosted.jpg', 'Live'),
(20, 11, 'Muchacho 9H Privacy', 'The Tempered Glass covers the full Screen Even the Curved Edges of the Mobile. The Original Gorilla Screen guard offers Bubble Free Application and Protects the Mobile Screen from Scratches. The Original Gorilla Screen guard offers Bubble Free Application', 699, 50, '../Product Images/2023-09-21 Muchacho 9H Privacy.jpg', 'Live'),
(21, 11, 'BEVY Camera Protector', 'Premium Iphone 14 Pro Camera Protector - Made of high-quality, durable tempered glass. Does Not Affects Image Quality - 99.99% transparency preserves the original image quality. Protects the camera lens from scratches, cracks, and other types of damage.', 279, 35, '../Product Images/2023-09-21 BEVY Iphone Camera Protector.jpg', 'Live'),
(22, 13, 'Puma Womens Enzo 2', 'Sole: Rubber, Closure: Lace-Up, Fit Type: Regular, Shoe Width: Medium, Age Range Description: Adult, Department Name: Womens; Water Resistance Level: Not Water Resistant; Style Name: Flat; Toe Style: Round Toe.', 2629, 14, '../Product Images/2023-09-28 Puma Womens Enzo 2 Metal WN\'s Running Shoe.jpg', 'Live'),
(23, 13, 'Bata Woody Pump Heels', 'Look effortlessly stylish by wearing this pair of Pumps featuring an eye-catching design and a refined appeal. A perfect choice to flaunt a classy style wherever you go. ', 1883, 9, '../Product Images/2023-10-02 Bata Woody Pump Heels.jpg', 'Live'),
(24, 9, 'Lymio Casual Shirt for Men', 'Made with premium materials our range of shirts offers the perfect balance of comfort, quality and style. Whether you need a casual, party, or beach wear, our versatile collection offers a variety of colors, patterns, and designs suitable for it all.', 349, 23, '../Product Images/2023-10-02 Lymio Casual Shirt for Men.jpg', 'Live'),
(25, 9, 'Leriya Fashion Unisex Night Dress', 'The Leriya Fashion Night Dress is a trendy and comfortable sleepwear option for both men and women. This nightwear set features a colorful tie-dye design, making it a perfect addition to your summer wardrobe.', 499, 48, '../Product Images/2023-10-02 Leriya Fashion Unisex Night Dress.jpg', 'Live'),
(26, 2, 'Preneum Women Georgette Aqua', 'Give your closet a makeover with this stylish Preneum dress. When you\'re going to an art gallery opening or the theater, wear this printed beautiful piece with platform heels and a trendy clutch.', 689, 8, '../Product Images/2023-10-02 Preneum Women Georgette Aqua.jpg', 'Live'),
(27, 4, 'The Yoga Man Lab Piles Matrix Complete Kit', 'How To Use: Just take Matrix Vein & Rectum Capsule schedule which comes along with the pack.', 2499, 8, '../Product Images/2023-10-02 The Yoga Man Lab Piles Matrix Complete Kit.jpg', 'Live'),
(28, 15, 'BATES’ Guide to Physical Examination', 'Dr. Uzma Firdaus, placed among the admired leaders at the Department of Paediatrics, Jawaharlal Nehru Medical College, Aligarh Muslim University, Aligarh, has been an instrumental force in driving the department in diverse capacities.', 1092, 24, '../Product Images/2023-10-02 BATES’ Guide to Physical Examination.jpg', 'Live'),
(29, 16, 'Microtone Stethoscope', 'Resilient next-generation tubing retains its shape and flexibility even after folding tightly into a pocket. It provides longer stethoscope life due to improved resistance to skin oils and alcohol, and is less likely to pick up stains.', 999, 34, '../Product Images/2023-10-02 Microtone Stethoscope.jpg', 'Live'),
(30, 16, 'IS IndoSurgicals', 'Taylor reflex hammer elicits myotatic and plantar responses with ease and enhances patient comfort. Precisely balanced handle provides increased control of percussion force for accurate examinations.', 249, 43, '../Product Images/2023-10-02 IS IndoSurgicals.jpg', 'Live');

-- --------------------------------------------------------

--
-- Table structure for table `salesorder`
--

CREATE TABLE `salesorder` (
  `OrderId` int(5) NOT NULL,
  `DateTime` date NOT NULL,
  `UserId` int(5) NOT NULL,
  `Amount` double NOT NULL,
  `BillStatus` varchar(25) DEFAULT NULL CHECK (`BillStatus` in ('Generated','Not Generate')),
  `OrderStatus` varchar(25) DEFAULT NULL CHECK (`OrderStatus` in ('Pending','In Transit','Delivered','Cancelled'))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salesorder`
--

INSERT INTO `salesorder` (`OrderId`, `DateTime`, `UserId`, `Amount`, `BillStatus`, `OrderStatus`) VALUES
(2, '2023-09-23', 4, 93297, 'Generated', 'Cancelled'),
(3, '2023-09-23', 6, 217998, 'Generated', 'In Transit'),
(4, '2023-09-23', 6, 1999, 'Generated', 'Delivered'),
(5, '2023-09-23', 4, 1738, 'Generated', 'Cancelled'),
(8, '2023-09-27', 4, 29869, 'Not Generate', 'Cancelled'),
(9, '2023-09-28', 4, 869, 'Not Generate', 'Cancelled'),
(10, '2023-09-28', 6, 8756, 'Not Generate', 'Cancelled'),
(11, '2023-09-28', 6, 5258, 'Not Generate', 'Cancelled'),
(12, '2023-09-28', 4, 5258, 'Generated', 'Delivered'),
(13, '2023-09-28', 4, 5258, 'Not Generate', 'Cancelled'),
(14, '2023-09-28', 4, 36845, 'Generated', 'Delivered'),
(15, '2023-10-02', 10, 2589, 'Generated', 'Pending'),
(16, '2023-10-02', 10, 89900, 'Generated', 'In Transit'),
(17, '2023-10-02', 10, 84566, 'Generated', 'Delivered'),
(18, '2023-10-02', 11, 4007, 'Not Generate', 'Pending'),
(19, '2023-10-02', 11, 1999, 'Not Generate', 'Pending'),
(20, '2023-10-02', 4, 3597, 'Not Generate', 'Pending'),
(21, '2023-10-02', 12, 2881, 'Not Generate', 'Pending'),
(22, '2023-10-02', 12, 4998, 'Generated', 'Delivered'),
(23, '2023-12-15', 3, 869, 'Not Generate', 'Cancelled'),
(24, '2023-12-15', 4, 869, 'Not Generate', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `salesorderdetails`
--

CREATE TABLE `salesorderdetails` (
  `OrderId` int(5) NOT NULL,
  `ProductId` int(5) NOT NULL,
  `Quantity` int(5) NOT NULL,
  `Amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salesorderdetails`
--

INSERT INTO `salesorderdetails` (`OrderId`, `ProductId`, `Quantity`, `Amount`) VALUES
(2, 14, 1, 89900),
(2, 17, 1, 1999),
(2, 20, 2, 1398),
(3, 15, 1, 134999),
(3, 16, 1, 82999),
(4, 17, 1, 1999),
(5, 10, 2, 1738),
(8, 9, 1, 29869),
(9, 10, 1, 869),
(10, 10, 1, 869),
(10, 22, 3, 7887),
(11, 22, 2, 5258),
(12, 22, 2, 5258),
(13, 22, 2, 5258),
(14, 9, 1, 29869),
(14, 10, 1, 869),
(14, 18, 1, 849),
(14, 22, 2, 5258),
(15, 28, 1, 1092),
(15, 29, 1, 999),
(15, 30, 2, 498),
(16, 14, 1, 89900),
(17, 10, 1, 869),
(17, 16, 1, 82999),
(17, 24, 2, 698),
(18, 22, 1, 2629),
(18, 26, 2, 1378),
(19, 17, 1, 1999),
(20, 17, 1, 1999),
(20, 19, 2, 1598),
(21, 23, 1, 1883),
(21, 25, 2, 998),
(22, 27, 2, 4998),
(23, 10, 1, 869),
(24, 10, 1, 869);

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `UserId` int(5) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `ContactNumber` varchar(10) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`UserId`, `Name`, `ContactNumber`, `Email`, `Address`) VALUES
(3, 'Aakib Mansuri', '9586006974', 'aakibsammansuri42@gmail.com', 'Sarkhej Road'),
(4, 'Aakib Mansuri', '9586006974', 'aakibsammansuri42@gmail.com', '22/2 savanduplex, near  tauhid park-2, fatehwadi, sarkhej road'),
(6, 'Hammad Sunsara', '7015231090', 'hs@gmail.com', 'Gujarat'),
(7, 'Soham Vashani', '9016231091', 'vashani1@gmail.com', 'Rajkot'),
(10, 'Yashar Pathaan', '1234567890', 'pathaan@gmail.com', 'near iskon, s.g. highway, ahmedabad, gujarat.'),
(11, 'salman khan', '0000112233', 'sk.production@gmail.com', 'Mumbai'),
(12, 'abc', '1122334455', 'abc.check@mail.com', 'Kolkata, india.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cartdetails`
--
ALTER TABLE `cartdetails`
  ADD PRIMARY KEY (`UserId`,`ProductId`),
  ADD KEY `ProductId` (`ProductId`);

--
-- Indexes for table `categorydetails`
--
ALTER TABLE `categorydetails`
  ADD PRIMARY KEY (`CategoryId`);

--
-- Indexes for table `logindetails`
--
ALTER TABLE `logindetails`
  ADD PRIMARY KEY (`UserId`);

--
-- Indexes for table `productdetails`
--
ALTER TABLE `productdetails`
  ADD PRIMARY KEY (`ProductId`),
  ADD KEY `CategoryId` (`CategoryId`);

--
-- Indexes for table `salesorder`
--
ALTER TABLE `salesorder`
  ADD PRIMARY KEY (`OrderId`),
  ADD KEY `Foreign key User` (`UserId`) USING BTREE;

--
-- Indexes for table `salesorderdetails`
--
ALTER TABLE `salesorderdetails`
  ADD PRIMARY KEY (`OrderId`,`ProductId`),
  ADD KEY `salesorderdetails_ibfk_2` (`ProductId`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorydetails`
--
ALTER TABLE `categorydetails`
  MODIFY `CategoryId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `logindetails`
--
ALTER TABLE `logindetails`
  MODIFY `UserId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `productdetails`
--
ALTER TABLE `productdetails`
  MODIFY `ProductId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `salesorder`
--
ALTER TABLE `salesorder`
  MODIFY `OrderId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cartdetails`
--
ALTER TABLE `cartdetails`
  ADD CONSTRAINT `cartdetails_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `logindetails` (`UserId`),
  ADD CONSTRAINT `cartdetails_ibfk_2` FOREIGN KEY (`ProductId`) REFERENCES `productdetails` (`ProductId`);

--
-- Constraints for table `productdetails`
--
ALTER TABLE `productdetails`
  ADD CONSTRAINT `productdetails_ibfk_1` FOREIGN KEY (`CategoryId`) REFERENCES `categorydetails` (`CategoryId`);

--
-- Constraints for table `salesorder`
--
ALTER TABLE `salesorder`
  ADD CONSTRAINT `salesorder_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `userdetails` (`UserId`);

--
-- Constraints for table `salesorderdetails`
--
ALTER TABLE `salesorderdetails`
  ADD CONSTRAINT `salesorderdetails_ibfk_1` FOREIGN KEY (`OrderId`) REFERENCES `salesorder` (`OrderId`),
  ADD CONSTRAINT `salesorderdetails_ibfk_2` FOREIGN KEY (`ProductId`) REFERENCES `productdetails` (`ProductId`);

--
-- Constraints for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD CONSTRAINT `userdetails_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `logindetails` (`UserId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
