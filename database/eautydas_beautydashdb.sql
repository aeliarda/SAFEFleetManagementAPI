-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 25, 2021 at 06:44 AM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eautydas_beautydashdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminuser`
--

CREATE TABLE `adminuser` (
  `id` int(10) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `admin_level` int(10) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `mname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminuser`
--

INSERT INTO `adminuser` (`id`, `username`, `password`, `admin_level`, `fname`, `lname`, `mname`, `email`, `contact_number`, `status`, `date_created`, `date_modified`) VALUES
(1, 'admin', 'AdminM@ri3', 1, 'Marie', 'Fernandez', NULL, 'marie@beautydashph.com', '09223512654', 'active', NULL, NULL),
(2, 'asdasd', 'asdasd', NULL, 'Juan', 'Dela Cruz', NULL, 'juan.delacruz@gmail.com', '09223512654', 'active', '2021-03-15 08:44:56', '2021-04-01 14:22:15'),
(3, 'qwe', 'qwe', NULL, 'marjohn', 'salomon', 'andres', 'andres@gmail.com', '0956-999-9985', 'active', '2021-03-15 08:46:01', NULL),
(111, 'test', 'test', NULL, 'test', 'test', NULL, '', '123123', 'active', '2021-03-16 09:05:04', NULL),
(112, '3', '3', NULL, '3', '3', '3', '3@G.c', '3', 'active', '2021-04-01 13:43:02', NULL),
(113, '2', '2', NULL, '2', '222', '2', '2@g.c', '2', 'active', '2021-04-03 22:02:35', NULL),
(114, 'criselda', 'criselda', NULL, 'criselda', 'malubay', 'manalansan', 'criselda.m.malubay@gmail.com', '09196637154', 'active', '2021-04-12 19:42:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerIDNo` int(11) NOT NULL,
  `clastname` varchar(45) NOT NULL,
  `cfirstname` varchar(45) NOT NULL,
  `cmiddlename` varchar(45) DEFAULT NULL,
  `cbldghseNo` varchar(30) DEFAULT NULL,
  `cstreet` varchar(45) DEFAULT NULL,
  `cbrgy` varchar(45) DEFAULT NULL,
  `ctown` varchar(45) DEFAULT NULL,
  `cprovince` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customerorder`
--

CREATE TABLE `customerorder` (
  `OrdNo` int(11) NOT NULL,
  `customerIDNo` int(11) NOT NULL,
  `productCode` varchar(20) NOT NULL,
  `NoofProduct` int(11) DEFAULT NULL,
  `totalPrice` decimal(7,2) DEFAULT NULL,
  `orderDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `merchant`
--

CREATE TABLE `merchant` (
  `merchantIDNo` int(11) NOT NULL,
  `merchantName` varchar(255) DEFAULT NULL,
  `merchantBranch` varchar(255) DEFAULT NULL,
  `merchantLname` varchar(255) DEFAULT NULL,
  `merchantFname` varchar(255) DEFAULT NULL,
  `merchantMname` varchar(255) DEFAULT NULL,
  `merchantContact` varchar(255) DEFAULT NULL,
  `userContactNo` varchar(255) DEFAULT NULL,
  `merchantEmail` varchar(255) DEFAULT NULL,
  `merchantUsername` varchar(255) DEFAULT NULL,
  `merchantPassword` varchar(255) DEFAULT NULL,
  `merchantImgPath` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `merchant`
--

INSERT INTO `merchant` (`merchantIDNo`, `merchantName`, `merchantBranch`, `merchantLname`, `merchantFname`, `merchantMname`, `merchantContact`, `userContactNo`, `merchantEmail`, `merchantUsername`, `merchantPassword`, `merchantImgPath`, `status`, `date_created`, `date_modified`) VALUES
(1, 'Fisher Supermarket', 'Quezon City', 'Felipe', 'Suzette', '', '02-82941566', '09322524560', 'suzette.felipe@fishermall.com.ph', 'fisherSupermarket', 'f1sherMarketQC', 'Fisher Supermarket_1617554365.jpg', 'active', '2021-04-03 22:58:17', '2021-04-05 00:39:25');

-- --------------------------------------------------------

--
-- Table structure for table `merchantproductinventory`
--

CREATE TABLE `merchantproductinventory` (
  `merchantIDNo` int(11) NOT NULL,
  `prodcode` varchar(20) NOT NULL,
  `noOfStocks` int(11) DEFAULT NULL,
  `stockIn` int(11) DEFAULT NULL,
  `stockOut` int(11) DEFAULT NULL,
  `productImage` longblob,
  `productImagePath` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productid` int(11) NOT NULL,
  `productcatid` int(11) DEFAULT NULL,
  `subcatid` int(11) DEFAULT NULL,
  `productname` varchar(255) DEFAULT NULL,
  `productbrand` varchar(255) DEFAULT NULL,
  `productsize` varchar(255) DEFAULT NULL,
  `productprice` decimal(7,2) DEFAULT NULL,
  `productdesc` varchar(1000) DEFAULT NULL,
  `productdirection` varchar(1000) DEFAULT NULL,
  `productimgpath` varchar(255) DEFAULT NULL,
  `UOM` varchar(15) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productid`, `productcatid`, `subcatid`, `productname`, `productbrand`, `productsize`, `productprice`, `productdesc`, `productdirection`, `productimgpath`, `UOM`, `status`, `date_created`, `date_modified`) VALUES
(1, 1, 1, 'MULTIVITAMINS', 'ENERVON', '30 Tablets', 199.00, 'Nutritional supplement to help promote increased energy and enhance the immune system. Treatment of vitamin B-complex and vitamin C deficiencies.\r\n', 'Take one capsule once a day or as recommended by a health professional.\r\n', 'MULTIVITAMINS_1617637519.jpg', NULL, 'active', '2021-04-05 23:45:19', NULL),
(2, 2, 8, 'Vitamin E Daily Hydrating Lotion ', 'ST IVES', '612ML', 199.00, 'For all types of skin Dermatologically tested\r\n', 'Apply lotion all over your body and hands as often as needed.\r\n', 'Vitamin E Daily Hydrating Lotion _1617668461.jpg', NULL, 'active', '2021-04-06 08:21:01', NULL),
(3, 3, 11, 'Clean Matte Pressed Powder in Buff Beige', 'COVER GIRL', '', 299.00, 'COVERGIRL’S Clean Matte Pressed Powder is infused with oil absorbers to help oily skin looking fresh and shine-free. This oil-free formula won’t clog pores making it a perfect texture for sensitive skin.\r\n', '', 'Clean Matte Pressed Powder in Buff Beige_1617668695.jpg', NULL, 'active', '2021-04-06 08:24:55', NULL),
(4, 4, 16, 'Gentle Exfoliating Beauty Bar Moisturising Milk ', 'DOVE', '100g', 62.00, '', '', 'Gentle Exfoliating Beauty Bar Moisturising Milk _1618185080.jpg', NULL, 'active', '2021-04-06 08:25:29', '2021-04-12 07:51:20');

-- --------------------------------------------------------

--
-- Table structure for table `productcategory`
--

CREATE TABLE `productcategory` (
  `productcatid` int(11) NOT NULL,
  `productcatcode` varchar(50) DEFAULT NULL,
  `productcatname` varchar(50) DEFAULT NULL,
  `productcatorder` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productcategory`
--

INSERT INTO `productcategory` (`productcatid`, `productcatcode`, `productcatname`, `productcatorder`, `status`, `date_created`, `date_modified`) VALUES
(1, 'HC', 'Health Care', 1, 'active', '2021-04-05 08:44:56', '2021-05-07 20:03:37'),
(2, 'SC', 'Skin Care', 2, 'active', '2021-04-05 08:44:56', '2021-04-06 19:29:56'),
(3, 'M', 'Make-up', 3, 'active', '2021-04-05 08:44:56', '2021-04-06 19:11:33'),
(4, 'PC', 'Personal Care', 4, 'active', '2021-04-05 08:44:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rider`
--

CREATE TABLE `rider` (
  `riderIDNo` int(11) NOT NULL,
  `rlastname` varchar(45) DEFAULT NULL,
  `rfirstname` varchar(45) DEFAULT NULL,
  `rmiddlename` varchar(45) DEFAULT NULL,
  `rbldghseNo` varchar(45) DEFAULT NULL,
  `rstreet` varchar(45) DEFAULT NULL,
  `rbrgy` varchar(45) DEFAULT NULL,
  `rtown` varchar(45) DEFAULT NULL,
  `rprovince` varchar(45) DEFAULT NULL,
  `rcontactno` int(15) DEFAULT NULL,
  `rage` int(3) DEFAULT NULL,
  `rbirthdate` date DEFAULT NULL,
  `rcivilstatus` varchar(255) DEFAULT NULL,
  `rnbipoliceclearance` varchar(255) DEFAULT NULL,
  `rvalidid` varchar(255) DEFAULT NULL,
  `rbarangayclearance` varchar(255) DEFAULT NULL,
  `rdriverslicenseid` varchar(255) DEFAULT NULL,
  `rorcr` varchar(255) DEFAULT NULL,
  `ridertype` varchar(255) DEFAULT NULL,
  `rplateno` varchar(10) DEFAULT NULL,
  `rimgpath` varchar(1000) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rider`
--

INSERT INTO `rider` (`riderIDNo`, `rlastname`, `rfirstname`, `rmiddlename`, `rbldghseNo`, `rstreet`, `rbrgy`, `rtown`, `rprovince`, `rcontactno`, `rage`, `rbirthdate`, `rcivilstatus`, `rnbipoliceclearance`, `rvalidid`, `rbarangayclearance`, `rdriverslicenseid`, `rorcr`, `ridertype`, `rplateno`, `rimgpath`, `status`, `date_created`, `date_modified`) VALUES
(1, 'NAMIN', 'ABRAHAM', 'A', 'Blk 27B', 'Lot 28 Phase 2 Southville 5', 'Pinugay', 'Baras', 'Rizal', 2147483647, 40, '1980-09-16', 'Married', 'N530IAPM08-L1212535', 'SSS - 33-5987415-9', '', 'NO1 -10-001863', 'OR-1997166371\r\nCR-296117684', 'Motorcycle', 'EXAM1111', 'NAMIN_1617704351.jpg', 'active', '2021-04-04 21:23:17', '2021-04-06 18:19:45'),
(2, 'Geronimo', 'Reybert', 'D', 'Blk 6 Lot 15', '', 'Pinagsama', 'Taguig City', '', 2147483647, 45, '1976-01-11', 'Married', 'N530IAPM08-L1212535', 'Philhealth - 03050128952', '', 'DO4-03-000152', 'OR-1997166371\r\nCR-296117684', 'Motorcycle', 'EXAM2222', 'Geronimo_1617542897.jpg', 'active', '2021-04-04 21:28:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `subcatid` int(11) NOT NULL,
  `subcatname` varchar(255) DEFAULT NULL,
  `productcatid` int(11) DEFAULT NULL,
  `subcatorder` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`subcatid`, `subcatname`, `productcatid`, `subcatorder`, `status`, `date_created`, `date_modified`) VALUES
(1, 'Vitamins &amp; Supplements', 1, 1, 'active', '2021-04-05 08:44:56', NULL),
(2, 'Over-the-counter', 1, 2, 'active', '2021-04-05 08:44:56', NULL),
(3, 'Beauty Supplements', 1, 3, 'active', '2021-04-05 08:44:56', NULL),
(4, 'Family Planning', 1, 4, 'active', '2021-04-05 08:44:56', NULL),
(5, 'Facial Cleansers', 2, 1, 'active', '2021-04-05 08:44:56', NULL),
(6, 'Face Mask and Eye Mask', 2, 2, 'active', '2021-04-05 08:44:56', NULL),
(7, 'Lip care', 2, 3, 'active', '2021-04-05 08:44:56', NULL),
(8, 'Hand and Body Lotion', 2, 4, 'active', '2021-04-05 08:44:56', NULL),
(9, 'Beauty Implements', 3, 1, 'active', '2021-04-05 08:44:56', NULL),
(10, 'Eyes', 3, 2, 'active', '2021-04-05 08:44:56', NULL),
(11, 'Face', 3, 3, 'active', '2021-04-05 08:44:56', NULL),
(12, 'Lips', 3, 4, 'active', '2021-04-05 08:44:56', NULL),
(13, 'Bath', 4, 1, 'active', '2021-04-05 08:44:56', NULL),
(14, 'Oral Care', 4, 2, 'active', '2021-04-05 08:44:56', NULL),
(15, 'Paper goods and Cotton', 4, 3, 'active', '2021-04-05 08:44:56', NULL),
(16, 'Sanitary Protection', 4, 4, 'active', '2021-04-05 08:44:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usercategory`
--

CREATE TABLE `usercategory` (
  `UserCatCode` varchar(25) NOT NULL,
  `userCatDesc` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `vehicleIDNo` int(11) NOT NULL,
  `riderIDNo` int(11) DEFAULT NULL,
  `vehicleType` varchar(30) NOT NULL,
  `vehicleDesc` varchar(45) DEFAULT NULL,
  `radiusAllowedMax` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vehicleIDNo`, `riderIDNo`, `vehicleType`, `vehicleDesc`, `radiusAllowedMax`) VALUES
(1, NULL, 'WAVE 100', 'BLACK WITH GOLD', 100),
(2, NULL, 'WAVE 120', 'WHITE AND BLUE', 150),
(3, NULL, 'MIO SPORTY', 'GRAY BLACK', 180);

-- --------------------------------------------------------

--
-- Table structure for table `xuser`
--

CREATE TABLE `xuser` (
  `xUserID` varchar(40) NOT NULL,
  `userCatCode` varchar(20) NOT NULL,
  `merchantIDNO` int(11) DEFAULT NULL,
  `lastname` varchar(40) DEFAULT NULL,
  `firstname` varchar(40) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminuser`
--
ALTER TABLE `adminuser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerIDNo`);

--
-- Indexes for table `customerorder`
--
ALTER TABLE `customerorder`
  ADD PRIMARY KEY (`OrdNo`),
  ADD KEY `customerID_idx` (`customerIDNo`);

--
-- Indexes for table `merchant`
--
ALTER TABLE `merchant`
  ADD PRIMARY KEY (`merchantIDNo`);

--
-- Indexes for table `merchantproductinventory`
--
ALTER TABLE `merchantproductinventory`
  ADD PRIMARY KEY (`merchantIDNo`,`prodcode`),
  ADD KEY `prodcode_idx` (`prodcode`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productid`) USING BTREE;

--
-- Indexes for table `productcategory`
--
ALTER TABLE `productcategory`
  ADD PRIMARY KEY (`productcatid`) USING BTREE;

--
-- Indexes for table `rider`
--
ALTER TABLE `rider`
  ADD PRIMARY KEY (`riderIDNo`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`subcatid`);

--
-- Indexes for table `usercategory`
--
ALTER TABLE `usercategory`
  ADD PRIMARY KEY (`UserCatCode`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`vehicleIDNo`);

--
-- Indexes for table `xuser`
--
ALTER TABLE `xuser`
  ADD PRIMARY KEY (`xUserID`),
  ADD KEY `fk_userCat_idx` (`userCatCode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminuser`
--
ALTER TABLE `adminuser`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `merchant`
--
ALTER TABLE `merchant`
  MODIFY `merchantIDNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `productcategory`
--
ALTER TABLE `productcategory`
  MODIFY `productcatid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rider`
--
ALTER TABLE `rider`
  MODIFY `riderIDNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `subcatid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `vehicleIDNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customerorder`
--
ALTER TABLE `customerorder`
  ADD CONSTRAINT `customerID` FOREIGN KEY (`customerIDNo`) REFERENCES `customer` (`customerIDNo`);

--
-- Constraints for table `xuser`
--
ALTER TABLE `xuser`
  ADD CONSTRAINT `fk_userCat` FOREIGN KEY (`userCatCode`) REFERENCES `usercategory` (`UserCatCode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
