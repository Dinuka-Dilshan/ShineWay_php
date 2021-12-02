-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2021 at 05:35 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shineway`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `Vehicle_num` varchar(8) NOT NULL,
  `Booking_ID` int(20) NOT NULL,
  `Licen_num` varchar(10) NOT NULL,
  `Start_date` date NOT NULL,
  `Start_ODO` int(6) NOT NULL,
  `Package_Type` varchar(20) NOT NULL,
  `Cus_NIC` varchar(12) NOT NULL,
  `Discription` varchar(1000) NOT NULL,
  `Deposit_Amount` decimal(10,2) NOT NULL,
  `Advanced_Payment` decimal(10,2) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `End_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`Vehicle_num`, `Booking_ID`, `Licen_num`, `Start_date`, `Start_ODO`, `Package_Type`, `Cus_NIC`, `Discription`, `Deposit_Amount`, `Advanced_Payment`, `Status`, `End_date`) VALUES
('ZZZ-9999', 1, 'B1567899', '2021-11-18', 0, 'Daily Basis', '982510015V', '', '2500.00', '2500.00', 'Completed', '2021-11-20'),
('ZZZ-9999', 2, 'B1567899', '2021-11-18', 0, 'Daily Basis', '982510015V', '', '2500.00', '0.00', 'Completed', '2021-11-20'),
('ZZZ-9999', 3, 'B1567899', '2021-11-20', 0, 'Daily Basis', '982510015V', '', '2500.00', '0.00', 'Completed', '2021-11-22'),
('ZZZ-9999', 4, 'B1567899', '2021-11-26', 0, 'Weekly Basis', '982510015V', '', '2500.00', '0.00', 'Completed', '2021-11-28'),
('ZZZ-9999', 5, 'B1567899', '2021-11-27', 0, 'Daily Basis', '982510015V', '', '1000.00', '0.00', 'Completed', '2021-11-30'),
('ZZZ-9999', 6, 'B1567899', '2021-11-28', 0, 'Daily Basis', '982510015V', '', '1000.00', '0.00', 'Completed', '2021-11-30'),
('ZZZ-9999', 7, 'B1567899', '2021-11-28', 0, 'Daily Basis', '982510015V', '', '2500.00', '0.00', 'Completed', '2021-11-29'),
('ZZZ-9999', 9, 'B1567899', '2021-12-02', 0, 'Daily Basis', '982510015V', '', '2500.00', '2500.00', 'Completed', '2021-12-03'),
('ZZZ-9999', 10, 'B1567899', '2021-12-02', 0, 'Daily Basis', '982510015V', '', '2500.00', '1500.00', 'Completed', '2021-12-03'),
('ZZZ-9999', 11, 'B1567899', '2021-12-02', 0, 'Daily Basis', '982510015V', '', '2500.00', '2500.00', 'Completed', '2021-12-03'),
('ZZZ-9999', 12, 'B1567899', '2021-12-02', 0, 'Daily Basis', '982510015V', '', '2500.00', '1500.00', 'Completed', '2021-12-03'),
('ZZZ-9999', 13, 'B1567899', '2021-12-02', 0, 'Daily Basis', '982510015V', '', '2500.00', '1500.00', 'Completed', '2021-12-03');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Cus_NIC` varchar(12) NOT NULL,
  `Licen_num` varchar(10) NOT NULL,
  `Cus_name` varchar(20) NOT NULL,
  `Tel_num` varchar(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Cus_Address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Cus_NIC`, `Licen_num`, `Cus_name`, `Tel_num`, `Email`, `Cus_Address`) VALUES
('606433371V', 'B1567899', 'Dinuka Dilshan', '0702629599', 'Jadinukadilshan@gmail.com', 'Lion house, Near The Lake ,'),
('606433373V', 'B1567899', 'Dinuka Dilshan', '0702629599', 'Jadinukadilshan@gmail.com', 'Lion house, Near The Lake ,'),
('606433378V', 'B1567899', 'Dinuka Dilshan', '0702629599', 'Jadinukadilshan@gmail.com', 'Lion house, Near The Lake ,'),
('632533873V', 'B44266334', 'Roshan', '0764567890', 'nir123@gmail.com', 'Makola'),
('691843553V', 'B4163726', 'Saman', '0112897443', 'saman2@gmail.com', 'Kelaniya'),
('721833542V', 'B4457348', 'Sunil', '0774879356', 'sunl32@gmail.com', 'Kelaniya'),
('733885813V', 'B1334354', 'Neetha', '0723456780', 'neetha@gmail.com', 'Gampaha'),
('967253367V', 'B4678976', 'Priya', '0776544444', 'priya3@gmail.com', 'Colombo'),
('976243553V', 'B4189636', 'John', '0724567890', 'john@yahoo.com', 'Kaluthara'),
('976357896V', 'B44266334', 'Roshan', '0764567890', 'nir123@gmail.com', 'Makola'),
('982510015v', 'B1567899', 'Dinuka Dilshan', '0702629599', 'Jadinukadilshan@gmail.com', 'Lion house, Near The Lake ,');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `ID` int(11) NOT NULL,
  `Owner_NIC` varchar(40) NOT NULL,
  `Salute` varchar(20) NOT NULL,
  `Owner_name` varchar(60) NOT NULL,
  `Tel_num` varchar(10) NOT NULL,
  `Owner_Email` varchar(50) NOT NULL,
  `Owner_Address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`ID`, `Owner_NIC`, `Salute`, `Owner_name`, `Tel_num`, `Owner_Email`, `Owner_Address`) VALUES
(1, '985630807V', 'Ms', 'Sajee Rodrigo', '0766656889', 'sanduu@gmail.com', 'Kelaniya'),
(2, '975430904V', 'Mr', 'Avishka rodrigo', '0716995773', 'avishka@gmail.com', 'Kaluthara'),
(3, '996734896V', 'Ms', 'Sajee ', '0764636828', 'sajee@yahoo.com', 'Gonawala'),
(4, '956328796V', 'Ms', 'Ann mariyan', '0774567834', 'Ann12@gmail.com', 'Colombo'),
(5, '986530908V', 'Ms', 'Rusiri rodrigo', '0112915689', 'rusiri@yahoo.com', 'Kadawatha'),
(6, '975237905V', 'Mr', 'Joana del', '0761234567', 'Joana@gmail.com', 'Kiribathgoda'),
(7, '975430904V', 'Ms', 'Avishka rodrigo', '0716995773', 'avishka@gmail.com', 'Kaluthara'),
(23, '982510015V', '', 'Dinuka Dilshan', '0702629599', 'Jadinukadilshan@gmail.com', 'Lion house, Near The Lake ,');

-- --------------------------------------------------------

--
-- Table structure for table `owner_payment`
--

CREATE TABLE `owner_payment` (
  `Owner_NIC` varchar(12) NOT NULL,
  `payment_date` varchar(10) NOT NULL,
  `Payment_ID` varchar(11) NOT NULL,
  `vechicle_Num` varchar(11) NOT NULL,
  `Owner_pay_Amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owner_payment`
--

INSERT INTO `owner_payment` (`Owner_NIC`, `payment_date`, `Payment_ID`, `vechicle_Num`, `Owner_pay_Amount`) VALUES
('975430904V', '7/31/2021', '1', '148-8910', '7500.00'),
('606433373V', '7/31/2021', '2', '134-6563', '15000.00'),
('610321836V', '7/31/2021', '3', 'CAI-3353', '15000.00'),
('996734896V', '7/31/2021', '4', 'CAI-4578', '15000.00'),
('956328796V', '7/31/2021', '5', 'CBA-3400', '30000.00'),
('986530908V', '7/31/2021', '6', 'GHI-3450', '0.00'),
('975237905V', '7/31/2021', '7', 'GHI-2378', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `Booking_ID` int(11) NOT NULL,
  `Amount` decimal(10,2) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`Booking_ID`, `Amount`, `date`) VALUES
(1, '15000.00', '2021-10-18'),
(2, '15000.00', '2021-11-18'),
(3, '15000.00', '2021-11-20'),
(4, '12000.00', '2021-11-26'),
(5, '20000.00', '2021-11-28'),
(6, '15000.00', '2021-11-28'),
(7, '10000.00', '2021-11-28'),
(9, '10000.00', '2021-12-02'),
(10, '10000.00', '2021-12-02'),
(11, '10000.00', '2021-12-02'),
(12, '10000.00', '2021-12-02'),
(13, '10000.00', '2021-12-02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `NIC` varchar(12) NOT NULL,
  `name` varchar(25) NOT NULL,
  `user_type` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `Telephone` varchar(10) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `isFirstTimeUser` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `username`, `password`, `NIC`, `name`, `user_type`, `email`, `Telephone`, `Address`, `isFirstTimeUser`) VALUES
(18, '', 'e19d5cd5af0378da05f63f891c7467af', '985630807V', 'victoria pedretti', 'User', 'victoriapedretti@gmail.com', '0702629599', 'Lion house, Near The Lake ,', 0),
(3, 'dinuka', 'e19d5cd5af0378da05f63f891c7467af', '982510015V', 'Dinuka Dilshan', 'Admin', 'jadinukadilshan@gmail.com', '0702629599', 'Lion house, akuressa', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `Vehicle_num` varchar(10) NOT NULL,
  `Brand` varchar(40) NOT NULL,
  `Model` varchar(40) NOT NULL,
  `Type` varchar(10) NOT NULL,
  `Engine_Num` varchar(40) NOT NULL,
  `Chassis_Num` varchar(40) NOT NULL,
  `Owner_NIC` varchar(12) NOT NULL,
  `Reg_Date` varchar(40) NOT NULL,
  `Owner_Condi` varchar(200) NOT NULL,
  `Daily_price` decimal(10,2) NOT NULL,
  `Daily_KM` int(6) NOT NULL,
  `Weekly_price` decimal(10,2) NOT NULL,
  `Weekly_KM` int(6) NOT NULL,
  `Monthly_price` decimal(10,2) NOT NULL,
  `Monthly_KM` int(6) NOT NULL,
  `Extrakm_price` decimal(10,2) NOT NULL,
  `Owner_payment` decimal(10,2) NOT NULL,
  `Starting_odo` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`Vehicle_num`, `Brand`, `Model`, `Type`, `Engine_Num`, `Chassis_Num`, `Owner_NIC`, `Reg_Date`, `Owner_Condi`, `Daily_price`, `Daily_KM`, `Weekly_price`, `Weekly_KM`, `Monthly_price`, `Monthly_KM`, `Extrakm_price`, `Owner_payment`, `Starting_odo`) VALUES
('148-8910', 'Yamaha', 'Ray ZR', 'Bike', 'F4SN356789012', 'BI4EUB61S00223344', '975430904V', '5/4/2021', 'Do not allow for dogs', '150.00', 80, '140.00', 400, '120.00', 1600, '25.00', '7500.00', 1469),
('CAI-3353', 'Suzuki', 'Alto', 'Car', 'F8DN3447380', 'MA3EUA61S00669654', '610321836V', '8/5/2021', 'Do not allow for dogs', '2000.00', 200, '1800.00', 1200, '1600.00', 6000, '50.00', '15000.00', 22140),
('CAI-4578', 'Suzuki', 'Wagon R', 'Car', 'F5DN6781234', 'MA3EUA82S00665577', '996734896V', '8/5/2021', 'Do not allow for dogs ', '1250.00', 200, '1150.00', 1200, '1100.00', 6000, '50.00', '15000.00', 14678),
('CAJ-2242', 'Suzuki', 'celerio', 'Car', 'F8DN3221234', 'MA3EUA87S00225511', '870862768V', '6/10/2021', 'Do not allow for pets', '1500.00', 100, '1400.00', 600, '1200.00', 2200, '50.00', '35000.00', 12540),
('CBA-3400', 'Toyota', 'Hiace KDH 201', 'Van', 'H8DN3451234', 'VA4EUA67X00998822', '956328796V', '8/5/2021', 'Do not allow for Dogs', '2500.00', 150, '2300.00', 500, '2200.00', 1600, '60.00', '30000.00', 14500),
('CBD-6572', 'Suzuki', 'Wagon R', 'Car', 'F6DN7812340', 'MA3EUA71S88772244', '982510015V', '5/4/2021', 'Do not allow for pets', '1500.00', 100, '1400.00', 600, '1250.00', 2000, '50.00', '34000.00', 12578),
('GHI-2378', 'Nissan', 'Caravan', 'Van', 'F8GUI123456', 'K71234GUIA006', '975237905V', '8/6/2021', 'Do not allow for dogs', '1200.00', 150, '1100.00', 700, '1000.00', 1750, '40.00', '25000.00', 13650),
('GHI-3450', 'Toyota', 'MasterAce', 'Van', 'F5DN3565780', 'VA8EHA82S44332211', '986530908V', '6/15/2021', 'Do not allow for dogs', '1000.00', 150, '900.00', 1200, '800.00', 6000, '45.00', '20000.00', 14520),
('KAH-0012', 'Nissan', 'Almera', 'Car', 'GUH123456678', 'MA8UA61S45678', '812364985V', '3/25/2021', 'Do not allow for pets', '1250.00', 100, '1200.00', 650, '1100.00', 1500, '40.00', '30000.00', 11789),
('ZZZ-9999', 'BMW', 'ninet', 'Bike', '', '', '985630807V', '', '', '5000.00', 0, '28000.00', 0, '120000.00', 0, '0.00', '30000.00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`Booking_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Cus_NIC`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `owner_payment`
--
ALTER TABLE `owner_payment`
  ADD PRIMARY KEY (`Payment_ID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`Booking_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`Vehicle_num`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `Booking_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `Booking_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=301;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
