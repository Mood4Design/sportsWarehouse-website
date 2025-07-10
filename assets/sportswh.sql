-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2025 at 05:20 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sportswh`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryId` int(11) NOT NULL,
  `categoryName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `categoryName`) VALUES
(1, 'Shoes'),
(2, 'Helmets'),
(3, 'Pants'),
(4, 'Tops'),
(5, 'Balls'),
(6, 'Equipment'),
(7, 'Training Gear'),
(8, 'Dress'),
(10, 'Jacket'),
(16, 'Coat');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employeeID` int(11) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `firstName` varchar(10) NOT NULL,
  `title` varchar(30) DEFAULT NULL,
  `titleOfCourtesy` varchar(25) DEFAULT NULL,
  `birthDate` datetime DEFAULT NULL,
  `hireDate` datetime DEFAULT NULL,
  `address` varchar(60) DEFAULT NULL,
  `city` varchar(15) DEFAULT NULL,
  `region` varchar(15) DEFAULT NULL,
  `postalCode` varchar(10) DEFAULT NULL,
  `country` varchar(15) DEFAULT NULL,
  `homePhone` varchar(24) DEFAULT NULL,
  `extension` varchar(4) DEFAULT NULL,
  `notes` mediumtext NOT NULL,
  `reportsTo` int(11) DEFAULT NULL,
  `photoPath` varchar(255) DEFAULT NULL,
  `salary` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employeeID`, `lastName`, `firstName`, `title`, `titleOfCourtesy`, `birthDate`, `hireDate`, `address`, `city`, `region`, `postalCode`, `country`, `homePhone`, `extension`, `notes`, `reportsTo`, `photoPath`, `salary`) VALUES
(1, 'Davolio', 'Nancy', 'Sales Representative', 'Ms.', '1948-12-08 00:00:00', '1992-05-01 00:00:00', '507 - 20th Ave. E.Apt. 2A', 'Seattle', 'WA', '98122', 'USA', '(206) 555-9857', '5467', 'Education includes a BA in psychology from Colorado State University in 1970.  She also completed \"The Art of the Cold Call.\"  Nancy is a member of Toastmasters International.', 2, 'nancyDavolio.jpg', 2954.55),
(2, 'Fuller', 'Andrew', 'Vice President, Sales', 'Dr.', '1952-02-19 00:00:00', '1992-08-14 00:00:00', '908 W. Capital Way', 'Tacoma', 'WA', '98401', 'USA', '(206) 555-9482', '3457', 'Andrew received his BTS commercial in 1974 and a Ph.D. in international marketing from the University of Dallas in 1981.  He is fluent in French and Italian and reads German.  He joined the company as a sales representative, was promoted to sales manager in January 1992 and to vice president of sales in March 1993.  Andrew is a member of the Sales Management Roundtable, the Seattle Chamber of Commerce, and the Pacific Rim Importers Association.', NULL, 'andrewFuller.jpg', 2254.49),
(3, 'Leverling', 'Janet', 'Sales Representative', 'Ms.', '1963-08-30 00:00:00', '1992-04-01 00:00:00', '722 Moss Bay Blvd.', 'Kirkland', 'WA', '98033', 'USA', '(206) 555-3412', '3355', 'Janet has a BS degree in chemistry from Boston College (1984).  She has also completed a certificate program in food retailing management.  Janet was hired as a sales associate in 1991 and promoted to sales representative in February 1992.', 2, 'janetLeverling.jpg', 3119.15),
(4, 'Peacock', 'Margaret', 'Sales Representative', 'Mrs.', '1937-09-19 00:00:00', '1993-05-03 00:00:00', '4110 Old Redmond Rd.', 'Redmond', 'WA', '98052', 'USA', '(206) 555-8122', '5176', 'Margaret holds a BA in English literature from Concordia College (1958) and an MA from the American Institute of Culinary Arts (1966).  She was assigned to the London office temporarily from July through November 1992.', 2, 'MargaretPeacock.jpg', 1861.08),
(5, 'Buchanan', 'Steven', 'Sales Manager', 'Mr.', '1955-03-04 00:00:00', '1993-10-17 00:00:00', '14 Garrett Hill', 'London', NULL, 'SW1 8JR', 'UK', '(71) 555-4848', '3453', 'Steven Buchanan graduated from St. Andrews University, Scotland, with a BSC degree in 1976.  Upon joining the company as a sales representative in 1992, he spent 6 months in an orientation program at the Seattle office and then returned to his permanent post in London.  He was promoted to sales manager in March 1993.  Mr. Buchanan has completed the courses \"Successful Telemarketing\" and \"International Sales Management.\"  He is fluent in French.', 2, 'StevenBuchanan.jpg', 1744.21),
(6, 'Suyama', 'Michael', 'Sales Representative', 'Mr.', '1963-07-02 00:00:00', '1993-10-17 00:00:00', 'Coventry House\r\nMiner Rd.', 'London', NULL, 'EC2 7JR', 'UK', '(71) 555-7773', '428', 'Michael is a graduate of Sussex University (MA, economics, 1983) and the University of California at Los Angeles (MBA, marketing, 1986).  He has also taken the courses \"Multi-Cultural Selling\" and \"Time Management for the Sales Professional.\"  He is fluent in Japanese and can read and write French, Portuguese, and Spanish.', 5, 'michaelSuyama.jpg', 2004.07),
(7, 'King', 'Robert', 'Sales Representative', 'Mr.', '1960-05-29 00:00:00', '1994-01-02 00:00:00', 'Edgeham Hollow\r\nWinchester Way', 'London', NULL, 'RG1 9SP', 'UK', '(71) 555-5598', '465', 'Robert King served in the Peace Corps and traveled extensively before completing his degree in English at the University of Michigan in 1992, the year he joined the company.  After completing a course entitled \"Selling in Europe,\" he was transferred to the London office in March 1993.', 5, 'robertKing.jpg', 1991.55),
(8, 'Callahan', 'Laura', 'Inside Sales Coordinator', 'Ms.', '1958-01-09 00:00:00', '1994-03-05 00:00:00', '4726 - 11th Ave. N.E.', 'Seattle', 'WA', '98105', 'USA', '(206) 555-1189', '2344', 'Laura received a BA in psychology from the University of Washington.  She has also completed a course in business French.  She reads and writes French.', 2, 'lauraCallahan.jpg', 2100.5),
(9, 'Dodsworth', 'Anne', 'Sales Representative', 'Ms.', '1966-01-27 00:00:00', '1994-11-15 00:00:00', '7 Houndstooth Rd.', 'London', NULL, 'WG2 7LT', 'UK', '(71) 555-4444', '452', 'Anne has a BA degree in English from St. Lawrence College.  She is fluent in French and German.', 5, 'anneDodsworth.jpg', 2333.33),
(13, 'Lee', 'Allan', 'Manager', 'Mr', '1980-06-30 00:00:00', '2025-05-30 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1, 'MarkAnderson.jpg', 200000),
(14, 'Lee', 'Hellen', 'Manager', 'Mrs', '2012-11-22 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'she is good', 1, 'CathyBrown.jpg', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `itemId` int(11) NOT NULL,
  `itemName` varchar(150) NOT NULL,
  `photo` varchar(250) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `salePrice` decimal(10,2) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `featured` tinyint(1) NOT NULL,
  `categoryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itemId`, `itemName`, `photo`, `price`, `salePrice`, `description`, `featured`, `categoryId`) VALUES
(1, 'Adidas Euro16 Top Soccer Ball', 'soccerBall.jpg', 46.00, 35.95, 'adidas Performance Euro 16 Official Match Soccer Ball, Size 5, White/Bright Blue/Solar', 1, 5),
(2, 'Pro-tec Classic Skate Helmet', 'skateHelmet.jpg', 70.00, 0.00, 'Get the classic Pro-Tec look with proven protection. Shop a wide range of skate, bmx & water helmets online at Pro-Tec Australia.', 1, 2),
(3, 'Nike sport 600ml Water Bottle', 'waterBottle.jpg', 17.50, 15.00, 'Rehydrate your body and revive your day with the Nike Sport 600ml Water Bottle. The asymmetrical, one-hand design provides easy grasping while the leakproof valve to prevent leakage. ', 1, 6),
(4, 'String ArmaPlus Boxing Gloves', 'boxingGloves.jpg', 79.95, NULL, 'Get the perfect hand feel with the anatomically designed square shouldered mould to help you feel every shot land.', 1, 7),
(5, 'Asics Gel Lethal Tigreor 8 IT Men\'s', 'footyBoots.jpg', 160.00, NULL, 'The GEL-Lethal Tigreor 8 IT is an advanced lightweight football boot designed for high performance and speed. This boot features HG10mm technology.', 1, 1),
(6, 'Asics GEL Kayano 27 Kids Running Shoes', 'runningShoes.jpg', 179.99, NULL, 'Asics refine running for the next generation of young athletes with the Asics GEL Kayano 27. The exceptional support and comfort of the Kayano return in a lighter even more comfortable runner thanks to the two-piece, Flightfoam Propel midsole. ', 0, 1),
(7, 'Adidas must have stripes tee', 'blackTop.jpg', 34.99, NULL, 'Built for busy training schedules, the adidas Boys Aeroready 3-Stripes Tee is a must have for budding young athletes.', 0, 4),
(8, 'Nike girls Futura Air tee', 'whitePinkTop.jpg', 29.99, 24.99, 'Your child will be motivated to perform her best at training in the Nike Girls Futura Air Tee. The comfortable, non-restrictive crew neckline offers durability, while the iconic Nike Air logo is featured across the front and on the sleeve to highlight her sporty vibe.', 0, 4),
(11, 'Adidas 3 stripes flare pants', 'tracksuit.jpg', 69.99, 55.99, 'Kick it old school this winter when you step out in the adidas Women\\\'s Tricot 3-Stripes Flare Pants. Ideal for post-gym wear, the stretchy tricot fabric allows you to move with ease as you recover from your big session.', 0, 3),
(12, 'White lace top', 'product3.jpg', 234.00, 210.00, 'White lace top, woven, has a round neck, short sleeves, has knitted lining attached', 0, 8),
(15, 'Red Dress Coat', 'product1_2.jpg', 350.00, 300.00, 'Red lace top, woven, has a round neck, short sleeves, has knitted lining attached', 0, 10),
(18, 'Red Dress Coat', 'product2_2.jpg', 350.00, 300.00, 'Red lace top, woven, has a round neck, short sleeves, has knitted lining attached', 0, 10),
(19, 'Blue Skirt', 'product4_2.jpg', 456.00, 368.00, 'Blee lace skirt, woven, has a round neck, short sleeves, has knitted lining attached', 0, 10),
(21, 'Ruche Dress', 'product3_2.jpg', 399.00, 299.00, 'is a fittted style.\r\nThis dress features a ruched bodies\r\nThis is a Limited Edition item.\r\nThis style runs true to size. 100% Silk.', 0, 8),
(25, 'Red Dress', 'product1.jpg', 265.00, 250.00, 'is a draped style.\r\nThis is a Limited Edition item.\r\nThis style runs true to size. 100% Silk.', 0, 16),
(26, 'WhiteTop', 'detailsquare3.jpg', 40.00, 25.00, 'This top features a tuck bodice\r\nThis is a Limited Edition item.\r\nThis style runs true to size. 90% Silk. 10% Cotton', 0, 16),
(28, 'Red Coat', 'basketsquare.jpg', 233.00, 123.00, 'good one', 0, 16);

-- --------------------------------------------------------

--
-- Table structure for table `orderitem`
--

CREATE TABLE `orderitem` (
  `itemId` int(11) NOT NULL,
  `shoppingOrderId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orderitem`
--

INSERT INTO `orderitem` (`itemId`, `shoppingOrderId`, `quantity`, `price`) VALUES
(2, 1, 1, 70.00),
(3, 1, 2, 15.00),
(3, 3, 1, 15.00),
(4, 2, 1, 79.95),
(8, 3, 1, 24.99),
(12, 3, 1, 210.00),
(25, 2, 1, 250.00),
(26, 2, 1, 25.00);

-- --------------------------------------------------------

--
-- Table structure for table `shoppingorder`
--

CREATE TABLE `shoppingorder` (
  `shoppingOrderId` int(11) NOT NULL,
  `orderDate` datetime NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `contactNumber` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `creditCardNumber` varchar(20) NOT NULL,
  `expiryDate` varchar(10) NOT NULL,
  `nameOnCard` varchar(50) NOT NULL,
  `csv` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `shoppingorder`
--

INSERT INTO `shoppingorder` (`shoppingOrderId`, `orderDate`, `firstName`, `lastName`, `address`, `contactNumber`, `email`, `creditCardNumber`, `expiryDate`, `nameOnCard`, `csv`) VALUES
(1, '2025-07-01 00:00:00', 'Allan', 'Lee', '9 Pawley Street', '0422293668', 'leallan69@gmail.com', '5555555555554444', '12/28', 'Allan Lee', '123'),
(2, '2025-07-02 00:00:00', 'Allan', '', '9 Pawley Street', '0422293668', 'leallan69@gmail.com', '', '', '', ''),
(3, '2025-07-02 00:00:00', 'Allan', 'Lee', 'Street', '0422293668', 'leallan69@gmail.com', '5555555555554444', '12/28', 'allan', '123');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `userName`, `password`) VALUES
(2, 'Allan', '$2y$10$IHatJC2EZKIzspgmQcfhkuhiyHh7b6sCXoHrE84.xnmHw5.1iVvua'),
(3, 'admin', '$2y$10$BXLfL.V8pfY3VDwroIht5uCDqQWHpuRn9TA6/UcuaGnCs76iM5ufa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`),
  ADD KEY `categoryId` (`categoryId`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employeeID`),
  ADD KEY `lastName` (`lastName`),
  ADD KEY `postalCode` (`postalCode`),
  ADD KEY `FK_employees_employees` (`reportsTo`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`itemId`),
  ADD KEY `itemId` (`itemId`),
  ADD KEY `FK_itemCategory` (`categoryId`);

--
-- Indexes for table `orderitem`
--
ALTER TABLE `orderitem`
  ADD PRIMARY KEY (`itemId`,`shoppingOrderId`),
  ADD KEY `shoppingOrderId` (`shoppingOrderId`);

--
-- Indexes for table `shoppingorder`
--
ALTER TABLE `shoppingorder`
  ADD PRIMARY KEY (`shoppingOrderId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `itemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `shoppingorder`
--
ALTER TABLE `shoppingorder`
  MODIFY `shoppingOrderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `FK_employees_employees` FOREIGN KEY (`reportsTo`) REFERENCES `employees` (`employeeID`);

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `FK_itemCategory` FOREIGN KEY (`categoryId`) REFERENCES `category` (`categoryId`);

--
-- Constraints for table `orderitem`
--
ALTER TABLE `orderitem`
  ADD CONSTRAINT `orderitem_ibfk_1` FOREIGN KEY (`itemId`) REFERENCES `item` (`itemId`),
  ADD CONSTRAINT `orderitem_ibfk_2` FOREIGN KEY (`shoppingOrderId`) REFERENCES `shoppingorder` (`shoppingOrderId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
