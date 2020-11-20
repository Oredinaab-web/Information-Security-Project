-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2020 at 07:49 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `infosec`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminreg`
--

CREATE TABLE `adminreg` (
  `id` int(11) NOT NULL,
  `SupAdminId` varchar(255) NOT NULL,
  `AdminId` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Last_Name` varchar(255) NOT NULL,
  `First_Name` varchar(255) NOT NULL,
  `Birthday` varchar(255) NOT NULL,
  `Age` int(255) NOT NULL,
  `Marital_Stat` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone_No` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminreg`
--

INSERT INTO `adminreg` (`id`, `SupAdminId`, `AdminId`, `Password`, `Last_Name`, `First_Name`, `Birthday`, `Age`, `Marital_Stat`, `Gender`, `Email`, `Phone_No`) VALUES
(1, 'SUPAD', 'ADM15', '$2y$10$W3Md1m7cDuCoSJLEMaJYweSHk7fATiT9VdTYHQ0a3/xV.X2jCPkAy', 'Trono', 'MaryRose', '2020-10-12', 20, 'Married', 'Female', 'trons@gmail.com', 1234567891),
(3, 'SUPAD', 'ADM39', '$2y$10$8JUOclciVyOkA/ubjtjQZuYrM1PdcXClvB52eBgBW96GGxKvBFKrS', 'Oredina', 'Alfonso', '2000-04-12', 20, 'Single', 'Male', 'miguelalfonso140@gmail.com', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `auditlog`
--

CREATE TABLE `auditlog` (
  `id` int(11) NOT NULL,
  `Date` varchar(70) NOT NULL,
  `Time` varchar(70) NOT NULL,
  `Employee_ID` varchar(70) NOT NULL,
  `Action` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auditlog`
--

INSERT INTO `auditlog` (`id`, `Date`, `Time`, `Employee_ID`, `Action`) VALUES
(1, '2020/10/13', '09:47:22am', 'EMP14', 'Logged In'),
(3, '2020/10/13', '09:54:16am', 'EMP14', 'Updated Data'),
(10, '2020/10/13', '10:16:17am', 'EMP14', 'Changed Password'),
(16, '2020/10/13', '13:37:16pm', 'EMP14', 'Logged In'),
(17, '2020/10/13', '13:37:50pm', 'EMP14', 'Inserted Data'),
(21, '2020/10/13', '14:44:05pm', 'EMP14', 'Logged In'),
(25, '2020/10/13', '14:45:57pm', 'EMP14', 'Logged In'),
(26, '2020/10/13', '14:46:06pm', 'EMP14', 'Logged Out'),
(28, '2020/10/13', '14:48:05pm', 'EMP14', 'Logged In'),
(29, '2020/10/13', '14:49:14pm', 'EMP14', 'Logged Out'),
(30, '2020/10/26', '11:52:02am', 'EMP14', 'Logged In'),
(31, '2020/10/26', '11:52:30am', 'EMP14', 'Inserted Data'),
(32, '2020/10/26', '11:52:57am', 'EMP14', 'Logged Out'),
(33, '2020/10/26', '11:54:30am', 'EMP14', 'Logged In'),
(34, '2020/10/26', '11:54:33am', 'EMP14', 'Logged Out');

-- --------------------------------------------------------

--
-- Table structure for table `empreg`
--

CREATE TABLE `empreg` (
  `id` int(11) NOT NULL,
  `AdminId` varchar(255) NOT NULL,
  `EmpId` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Last_Name` varchar(255) NOT NULL,
  `First_Name` varchar(255) NOT NULL,
  `Birthday` varchar(255) NOT NULL,
  `Age` int(255) NOT NULL,
  `Marital_Stat` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone_No` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `empreg`
--

INSERT INTO `empreg` (`id`, `AdminId`, `EmpId`, `Password`, `Last_Name`, `First_Name`, `Birthday`, `Age`, `Marital_Stat`, `Gender`, `Email`, `Phone_No`) VALUES
(2, 'SUPAD', 'EMP14', '$2y$10$B1N3knCQ5mWt/CcwU0R9Fu44F4qH9uiLFS4dNWjeeFNy33RtSIB2G', 'Oredina', 'Alfonso Miguel', '2000-04-12', 20, 'Single', 'Male', 'miguelalfonso140@gmail.com', '09162296374'),
(3, 'ADM15', 'EMP72', '$2y$10$ZMo8E60waLLpPmjlF9GFkuSmXVUtI6hxul8MKFvg/Ov0jgKXmPkdO', 'Joon', 'Park', '2020-09-28', 25, 'Single', 'Male', 'parkjoon@gmail.com', '09123456987');

-- --------------------------------------------------------

--
-- Table structure for table `empregs`
--

CREATE TABLE `empregs` (
  `id` int(11) NOT NULL,
  `EmpId` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Last_Name` varchar(255) NOT NULL,
  `First_Name` varchar(255) NOT NULL,
  `Birthday` varchar(255) NOT NULL,
  `Age` int(255) NOT NULL,
  `Marital_Stat` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone_No` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `empregs`
--

INSERT INTO `empregs` (`id`, `EmpId`, `Password`, `Last_Name`, `First_Name`, `Birthday`, `Age`, `Marital_Stat`, `Gender`, `Email`, `Phone_No`) VALUES
(19, 'EMP67', '$2y$10$Fu.G5SvD/JBgvwkuCIvg2.Ur.x60eipf87P1IEObW/BUVCjbwiNW6', 'Oredina', 'Alfonso Miguel', '2020-09-07', 25, 'Single', 'Male', 'alal140@gmail.com', '12345678910'),
(21, 'EMP25', '$2y$10$lffZ8jMRIHRqa5t4ope9B.ShKhlMOFXx1HZSO9JQkA4iwVuUUimQ2', 'Oredina', 'Alfonso Miguel', '2020-10-06', 20, 'Single', 'Male', 'miguelalfonso140@gmail.com', '12345678910'),
(22, 'EMP96', '$2y$10$Y4X7KfuAkmdLi.RZOccJHeaOVGyG5z.ztUyJ3r9oeBtazSxF3RMji', 'Smith', 'John', '2000-06-07', 20, 'Single', 'Male', 'smith@gmail.com', '09123456788');

-- --------------------------------------------------------

--
-- Table structure for table `infoassurance`
--

CREATE TABLE `infoassurance` (
  `id` int(11) NOT NULL,
  `Emp_ID` varchar(25) NOT NULL,
  `Last_Name` varchar(25) NOT NULL,
  `First_Name` varchar(25) NOT NULL,
  `Type` varchar(25) NOT NULL,
  `Quantity` int(25) NOT NULL,
  `Time` varchar(25) NOT NULL,
  `Date` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `infoassurance`
--

INSERT INTO `infoassurance` (`id`, `Emp_ID`, `Last_Name`, `First_Name`, `Type`, `Quantity`, `Time`, `Date`) VALUES
(24, 'EMP14', 'Oredina', 'Alfonso', 'Chicken', 20, '09:32', '2020-09-09'),
(28, 'InfoProject', 'Oredina', 'Park', 'Chicken', 5, '14:25', '2020-10-23'),
(32, 'EMP14', 'Ramos', 'John', 'Beef', 15, '15:45', '2020-10-09'),
(33, 'EMP14', 'Oredina', 'Alfonso Miguel', 'Beef', 12, '13:46', '2020-10-27'),
(34, 'EMP14', 'Oredina', 'Alfonso Miguel', 'Pork', 12, '13:55', '2020-10-28');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `Emp_ID` varchar(60) NOT NULL,
  `Product_ID` varchar(60) NOT NULL,
  `Product` varchar(60) NOT NULL,
  `Product_Cat` varchar(60) NOT NULL,
  `Quantity` int(50) NOT NULL,
  `Time` varchar(60) NOT NULL,
  `Date` varchar(60) NOT NULL,
  `Price` int(50) NOT NULL,
  `Total` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `Emp_ID`, `Product_ID`, `Product`, `Product_Cat`, `Quantity`, `Time`, `Date`, `Price`, `Total`) VALUES
(1, 'EMP14', 'PROD1', 'Pizza', 'Bread', 12, '15:51', '2020-10-11', 120, 1440),
(3, 'EMP14', 'PROD1', 'Whole Bread', 'Bread', 15, '12:00', '2020-10-10', 50, 750),
(5, 'EMP14', 'PRBR04', 'Buns', 'Bread', 10, '13:26', '2020-10-11', 40, 400),
(6, 'EMP14', 'PROD4', 'Pizza', 'Bread', 10, '13:35', '2020-10-06', 100, 1000),
(7, 'EMP14', 'PROD5', 'Pizza', 'Bread', 5, '13:37', '2020-10-11', 120, 600),
(8, 'EMP14', 'PRBR01', 'Pizza', 'Bread', 12, '18:35', '2020-10-11', 120, 1440),
(9, 'EMP14', 'PRBR02', 'Whole Bread', 'Bread', 12, '09:53', '2020-10-13', 40, 480),
(10, 'EMP14', 'PRME03', 'Sausage', 'Meat', 25, '13:37', '2020-10-13', 300, 7500),
(11, 'EMP14', 'PRBR01', 'Pizza', 'Bread', 12, '11:52', '2020-10-26', 120, 1440);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `User` varchar(255) NOT NULL,
  `Pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `User`, `Pass`) VALUES
(1, 'InfoProject', '$2y$10$aUbV7aJoADQvCHtH1267AOja4bgMbJzaUzg0vEFOL4y3u9gHZrOcq');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`) VALUES
(41, 'miguelalfonso140@gmail.com', '7a1e872083469acccd871dfa625fc94bf3e59517bd83a07c08dda8e614185bd2978394f718bf8214bc48b12df06f8b759dbd'),
(42, 'miguelalfonso140@gmail.com', 'ee3d19393113b656308dbcf593e51d83a590eebbfc5f3b2a8af77205966d8d1c644bd622f7fdd4ea19ba2822ac798e7c8c1b'),
(43, 'miguelalfonso140@gmail.com', '4196bbcbc47e200fcc6c4da1813b4dab6bb88db278f4f5d559ff177a0909b50ced0b8946e4fca3cf9354acaaa2ab3bd90df1'),
(44, 'miguelalfonso140@gmail.com', 'ca1e8179ca7fd3f8cc7a3299a311e23229d809ffe7a1553b104c9fdd068cb106b00d9907bc0eb72016621e8db6ef680b0ab0'),
(45, 'osmond@gmail.com', '6987535f99b023d1fa7ade9426ba975f3f0af382b36894c60a37e2cae18e1c42fc314973ae0e591e81c8c504d9cf5a12c1e5'),
(46, 'miguelalfonso140@gmail.com', 'f35c8a1815f09ac96a28d30469930eb0f926a22b31e1fbc0825c2d580eaf6bb4255922b9356be1d1e7dc3d8adeac6b24d068'),
(47, 'miguelalfonso140@gmail.com', '0d61606d72858e3f09aab4c73767d19a9c4c331ac66f05d5af7b401de1294fc3117dce223677a2b001d8bb70044afb20e033'),
(48, 'miguelalfonso140@gmail.com', 'a085c8d688b6d1c8163b5cab15814cd1d32be78c5e296b1799414a8f9c796af9e0da78021608ebeba48cd65ea8eb95152dcf'),
(49, 'miguelalfonso140@gmail.com', '7f5e7686508bd3909a7a7bb0695f8a47231edc0d30013336284701d4e13e435177a3201b27f1da7e51945eb965583c4db939');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `Product_ID` varchar(50) NOT NULL,
  `Product` varchar(50) NOT NULL,
  `Price` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `Product_ID`, `Product`, `Price`) VALUES
(1, 'PRBR01', 'Pizza', '120'),
(2, 'PRBR02', 'Whole Bread', '40'),
(3, 'PRBR03', 'Wheat Bread', '60'),
(4, 'PRBR04', 'Buns', '40'),
(5, 'PRME01', 'Beef', '350'),
(6, 'PRME02', 'Pork', '200'),
(7, 'PRME03', 'Sausage', '300'),
(8, 'PRME04', 'Lamb', '400'),
(9, 'PRFI01', 'White Fish', '200'),
(10, 'PRFI02', 'Salmon', '300'),
(11, 'PRFI03', 'Tuna', '300'),
(12, 'PRDR01', 'Whole Milk', '75'),
(13, 'PRDR02', 'Low Fat Milk', '80'),
(14, 'PRDR03', 'Cheddar Cheese', '250'),
(15, 'PRDR04', 'Yogurt', '60'),
(16, 'PRBV01', 'Iced Tea', '30'),
(17, 'PRBV02', 'Coca Cola', '55'),
(18, 'PRBV03', 'Pepsi', '50');

-- --------------------------------------------------------

--
-- Table structure for table `superad`
--

CREATE TABLE `superad` (
  `id` int(11) NOT NULL,
  `Last_Name` varchar(70) NOT NULL,
  `First_Name` varchar(70) NOT NULL,
  `Email` varchar(70) NOT NULL,
  `Username` varchar(70) NOT NULL,
  `Password` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `superad`
--

INSERT INTO `superad` (`id`, `Last_Name`, `First_Name`, `Email`, `Username`, `Password`) VALUES
(1, 'Oredina', 'Alfonso', 'miguelalfonso140@gmail.com', 'SUPAD', '$2y$10$xC6hgyQtQ/MxHgUpqVuckOVHAr7Gc0AJE8gLq39mCj0L1W2YNd0HC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminreg`
--
ALTER TABLE `adminreg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auditlog`
--
ALTER TABLE `auditlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `empreg`
--
ALTER TABLE `empreg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `empregs`
--
ALTER TABLE `empregs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `infoassurance`
--
ALTER TABLE `infoassurance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `superad`
--
ALTER TABLE `superad`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminreg`
--
ALTER TABLE `adminreg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `auditlog`
--
ALTER TABLE `auditlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `empreg`
--
ALTER TABLE `empreg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `empregs`
--
ALTER TABLE `empregs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `infoassurance`
--
ALTER TABLE `infoassurance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `superad`
--
ALTER TABLE `superad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
