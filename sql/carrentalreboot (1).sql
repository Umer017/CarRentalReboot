-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2022 at 06:17 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carrentalreboot`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AID` int(255) NOT NULL,
  `admin` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `authority` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AID`, `admin`, `password`, `authority`) VALUES
(1, 'admin', 'password', '');

-- --------------------------------------------------------

--
-- Table structure for table `carlisting`
--

CREATE TABLE `carlisting` (
  `VID` int(255) NOT NULL,
  `carname` varchar(255) NOT NULL,
  `modelno` varchar(255) NOT NULL,
  `noPlate` varchar(255) NOT NULL,
  `Discription` varchar(255) NOT NULL,
  `yearofmanufacruring` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `vehicletype` varchar(255) NOT NULL,
  `costperkm` int(255) NOT NULL,
  `noofseats` int(255) NOT NULL,
  `bootcapacity` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carlisting`
--

INSERT INTO `carlisting` (`VID`, `carname`, `modelno`, `noPlate`, `Discription`, `yearofmanufacruring`, `image`, `vehicletype`, `costperkm`, `noofseats`, `bootcapacity`, `status`) VALUES
(1, 'Maruti Alto', '800', 'MH20R1501', 'can go on long trips ', '2018', 'images/alto 800.webp', 'Hatchback', 7, 4, '177 liters', 'Available'),
(3, 'Renault Triber', ' RXT', 'MH21G1718', 'more seats , affordable , comfortable ', '2019', 'images/Renault triber.webp', 'MPV,SUV', 12, 6, '84 Liters', 'Available'),
(4, 'Maruti Baleno ', 'Sigma', 'MH02K2897', 'The New Baleno is created and perfected for inspiration. The stunning looks, indulgent features and luxurious interiors of the New Baleno make heads turn in the city.', '2017', 'images/baleno.webp', 'Hatchback', 12, 5, '339 L', 'Available'),
(5, 'Maruti Wagon R', 'VXI', 'MH05R1501', 'Easy ingress and egress Spacious cabin Cavernous boot with 341-litre space AMT with both engines options Safer: ABS standard, dual front airbags available as option on all variants.', '2017', 'images/Wagon-R.webp', 'Hatchback', 8, 4, '341L', 'Available'),
(6, 'Renault KWID ', ' RXT', 'MH20RS7456', 'Apart from metro cities, the inter-city road network in India packs more twists and surprises than an Abbas–Mustan movie. And if you live in such a city, here are the cars you should consider dr', '2018', 'images/renault kwid.webp', 'Hatchback,mini-SUV', 8, 4, '279 L', 'Available'),
(10, 'Mahindra', 'XUV700', 'MH20G1028', 'If you are in the market looking for any kind of SUV for your family, the XUV700 first gets all the basics right and then impress you with its segment-first features.', '2021', 'images/xuv700.webp', 'SUV', 20, 6, '425L', 'Available'),
(11, 'Audi ', 'Q7', 'MH20RH012', 'The Audi Q7 has 1 Petrol Engine on offer. The Petrol engine is 2995 cc . It is available with Automatic transmission.Depending upon the variant and fuel type the Q7 has a mileage of 11.21 kmpl . The Q7 is a 7 seater 6 cylinder car and has length of 5064mm', '2021', 'images/audi q7.webp', 'Super Luxury', 800, 6, '295 litres', 'Available'),
(16, 'Kia Sportage', '1x', 'MH20R2068', 'Kia Sportage is a stunning car. Better than I thought. Nice exterior and interior of the car. A good safety system. The car is coming soon on the floor and we are eagerly waiting for this beauty.', '2021', 'images/kia sports.webp', 'SUV', 250, 6, '279 L', 'Available'),
(17, 'Kia Sportage', 'x1', 'MH21G1718', 'Kia Sportage is a stunning car. Better than I thought. Nice exterior and interior of the car. A good safety system. The car is coming soon on the floor and we are eagerly waiting for this beauty.', '2021', 'images/kia sports.webp', 'SUV', 250, 5, '279 L', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(255) NOT NULL,
  `Customer` varchar(255) NOT NULL,
  `Subject` varchar(255) NOT NULL,
  `Querie` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `Customer`, `Subject`, `Querie`) VALUES
(5, 'Kakashi', 'Give some discounts ', 'need to be more affordable'),
(6, 'Gol D roger', 'add some more cars', 'please add more cars at low price range');

-- --------------------------------------------------------

--
-- Table structure for table `triprecords`
--

CREATE TABLE `triprecords` (
  `tripID` int(255) NOT NULL,
  `CID` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fromLocation` varchar(255) NOT NULL,
  `toLocation` varchar(255) NOT NULL,
  `departureDate` date NOT NULL,
  `returnDate` date NOT NULL,
  `distance` varchar(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `VID` int(255) NOT NULL,
  `noplate` varchar(255) NOT NULL,
  `modelno` varchar(255) NOT NULL,
  `carname` varchar(255) NOT NULL,
  `vehicletype` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `departureTime` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `triprecords`
--

INSERT INTO `triprecords` (`tripID`, `CID`, `username`, `mobile`, `email`, `fromLocation`, `toLocation`, `departureDate`, `returnDate`, `distance`, `amount`, `VID`, `noplate`, `modelno`, `carname`, `vehicletype`, `status`, `description`, `departureTime`) VALUES
(1, 2, 'Gol D roger', '9865752465', 'GolD@gmail.com ', 'jalna', 'Pune', '2022-02-01', '2022-02-02', '294', 3500, 1, 'MH20R1501', 'Maruti Alto', 'Maruti Alto', 'Hatchback', 'Rejected', '-', '00:00:00.000000'),
(2, 2, 'Gol D roger', '9865752465', 'GolD@gmail.com ', 'aurangabad', 'Pune', '2022-02-02', '2022-02-03', '237', 3000, 3, 'MH21G1718', 'Renault Triber', 'Renault Triber', 'MPV,SUV', 'Rejected', '-', '00:00:00.000000'),
(3, 3, 'Edward new gate', '9875264215', 'Edward@gmail.com ', 'aurangabad', 'Pune', '2022-02-03', '2022-02-06', '237', 3000, 3, 'MH21G1718', 'Renault Triber', 'Renault Triber', 'MPV,SUV', 'Rejected', '-', '00:00:00.000000'),
(4, 3, 'Edward new gate', '9875264215', 'Edward@gmail.com ', 'aurangabad', 'Pune', '2022-02-01', '2022-02-02', '237', 1659, 1, 'MH20R1501', '800', 'Maruti Alto', 'Hatchback', 'Rejected', '-', '00:00:00.000000'),
(5, 3, 'Edward new gate', '9875264215', 'Edward@gmail.com ', 'aurangabad', 'Pune', '2022-02-01', '2022-02-02', '237', 1896, 5, 'MH05R1501', 'VXI', 'Maruti Wagon R', 'Hatchback', 'Rejected', '-', '00:00:00.000000'),
(6, 4, 'Edward new gate', '9865752896', 'kof@gold.com ', 'beed', 'jalna', '2022-02-03', '2022-02-04', '100', 1100, 4, 'MH02K2897', 'Sigma', 'Maruti Baleno ', 'Hatchback', 'Rejected', '-', '00:00:00.000000'),
(8, 2, 'Gol D roger', '9865752465', 'GolD@gmail.com ', 'jalna', 'Pune', '2022-02-04', '2022-02-05', '294', 205800, 9, 'MH20R01', 'Dawn', 'Rolls Royce', 'Super Luxury', 'Accepted', '-', '00:00:00.000000'),
(9, 2, 'Gol D roger', '9865752465', 'GolD@gmail.com ', 'aurangabad', 'Pune', '2022-02-09', '2022-02-10', '', 0, 1, 'MH20R1501', '800', 'Maruti Alto', 'Hatchback', 'Rejected', '-', '00:00:00.000000'),
(10, 2, 'Gol D roger', '9865752465', 'GolD@gmail.com ', 'aurangabad', 'Pune', '2022-02-09', '2022-02-10', '0', 0, 1, 'MH20R1501', '800', 'Maruti Alto', 'Hatchback', 'Rejected', '-', '00:00:00.000000'),
(11, 2, 'Gol D roger', '9865752465', 'GolD@gmail.com ', 'jalna', 'aurangabad', '2022-02-08', '2022-02-09', '0', 0, 1, 'MH20R1501', '800', 'Maruti Alto', 'Hatchback', 'Rejected', '-', '00:00:00.000000'),
(12, 2, 'Gol D roger', '9865752465', 'GolD@gmail.com ', 'jalna', 'aurangabad', '2022-02-08', '2022-02-09', '0', 0, 1, 'MH20R1501', '800', 'Maruti Alto', 'Hatchback', 'Rejected', '-', '00:00:00.000000'),
(13, 2, 'Gol D roger', '9865752465', 'GolD@gmail.com ', 'jalna', 'aurangabad', '2022-02-08', '2022-02-09', '0', 0, 1, 'MH20R1501', '800', 'Maruti Alto', 'Hatchback', 'Rejected', '-', '00:00:00.000000'),
(14, 2, 'Gol D roger', '9865752465', 'GolD@gmail.com ', 'jalna', 'aurangabad', '2022-02-08', '2022-02-09', '0', 0, 1, 'MH20R1501', '800', 'Maruti Alto', 'Hatchback', 'Rejected', '-', '00:00:00.000000'),
(15, 2, 'Gol D roger', '9865752465', 'GolD@gmail.com ', 'jalna', 'aurangabad', '2022-02-08', '2022-02-09', '0', 0, 1, 'MH20R1501', '800', 'Maruti Alto', 'Hatchback', 'Rejected', '-', '00:00:00.000000'),
(16, 2, 'Gol D roger', '9865752465', 'GolD@gmail.com ', 'jalna', 'aurangabad', '2022-02-08', '2022-02-09', '0', 0, 1, 'MH20R1501', '800', 'Maruti Alto', 'Hatchback', 'Rejected', '-', '00:00:00.000000'),
(17, 2, 'Gol D roger', '9865752465', 'GolD@gmail.com ', 'jalna', 'aurangabad', '2022-02-08', '2022-02-09', '0', 0, 1, 'MH20R1501', '800', 'Maruti Alto', 'Hatchback', 'Rejected', '-', '00:00:00.000000'),
(18, 2, 'Gol D roger', '9865752465', 'GolD@gmail.com ', 'jalna', 'aurangabad', '2022-02-08', '2022-02-09', '0', 0, 1, 'MH20R1501', '800', 'Maruti Alto', 'Hatchback', 'Rejected', '-', '00:00:00.000000'),
(19, 2, 'Gol D roger', '9865752465', 'GolD@gmail.com ', 'jalna', 'aurangabad', '2022-02-08', '2022-02-09', '0', 0, 1, 'MH20R1501', '800', 'Maruti Alto', 'Hatchback', 'Rejected', '-', '00:00:00.000000'),
(20, 2, 'Gol D roger', '9865752465', 'GolD@gmail.com ', 'jalna', 'aurangabad', '2022-02-08', '2022-02-09', '0', 0, 1, 'MH20R1501', '800', 'Maruti Alto', 'Hatchback', 'Rejected', '-', '00:00:00.000000'),
(21, 2, 'Gol D roger', '9865752465', 'GolD@gmail.com ', 'ahmadnagar', 'beed', '2022-02-23', '2022-02-27', '0', 0, 11, 'MH20RH012', 'Q7', 'Audi ', 'Super Luxury', 'Rejected', '-', '00:00:00.000000'),
(22, 2, 'Gol D roger', '9865752465', 'GolD@gmail.com ', 'ahmadnagar', 'beed', '2022-02-23', '2022-02-27', '128', 89600, 11, 'MH20RH012', 'Q7', 'Audi ', 'Super Luxury', 'Rejected', '-', '00:00:00.000000'),
(23, 2, 'Gol D roger', '9865752465', 'GolD@gmail.com ', 'jalna', 'Pune', '2022-02-10', '2022-02-11', '294', 5880, 10, 'MH20G1028', 'XUV700', 'Mahindra', 'SUV', 'Rejected', '-', '00:00:00.000000'),
(24, 2, 'Gol D roger', '9865752465', 'GolD@gmail.com ', 'ahmadnagar', 'Pune', '2022-02-10', '2022-02-11', '121', 84700, 9, 'MH20R01', 'Dawn', 'Rolls Royce', 'Super Luxury', 'Rejected', '-', '00:00:00.000000'),
(25, 2, 'Gol D roger', '9865752465', 'GolD@gmail.com ', 'ahmadnagar', 'beed', '2022-02-12', '2022-02-13', '128', 896, 1, 'MH20R1501', '800', 'Maruti Alto', 'Hatchback', 'Rejected', '-', '00:00:00.000000'),
(26, 2, 'Gol D roger', '9865752465', 'GolD@gmail.com ', 'Pune', 'beed', '2022-02-15', '2022-02-16', '249', 2490, 3, 'MH21G1718', ' RXT', 'Renault Triber', 'MPV,SUV', 'Rejected', '-', '00:00:00.000000'),
(27, 5, 'Kakashi', '9865324751', 'Kakashi@123 ', 'Pune', 'jalna', '2022-02-15', '2022-02-16', '294', 2940, 3, 'MH21G1718', ' RXT', 'Renault Triber', 'MPV,SUV', 'Rejected', '-', '00:00:00.000000'),
(28, 5, 'Kakashi', '9865324751', 'Kakashi@123 ', 'aurangabad', 'Pune', '2022-02-16', '2022-02-17', '237', 4740, 10, 'MH20G1028', 'XUV700', 'Mahindra', 'SUV', 'Rejected', '-', '00:00:00.000000'),
(29, 5, 'Kakashi', '9865324751', 'Kakashi@123 ', 'ahmadnagar', 'Pune', '2022-02-15', '2022-02-16', '121', 968, 5, 'MH05R1501', 'VXI', 'Maruti Wagon R', 'Hatchback', 'Rejected', '-', '00:00:00.000000'),
(30, 5, 'Kakashi', '9865324751', 'Kakashi@123 ', 'Pune', 'aurangabad', '2022-02-10', '2022-02-12', '237', 2370, 3, 'MH21G1718', ' RXT', 'Renault Triber', 'MPV,SUV', 'Rejected', '-', '00:00:00.000000'),
(31, 6, 'rehan', '8645321545', 'rehan@123 ', 'jalna', 'Pune', '2022-02-16', '2022-02-17', '294', 235200, 11, 'MH20RH012', 'Q7', 'Audi ', 'Super Luxury', 'Requested', '-', '00:00:00.000000'),
(32, 5, 'Kakashi', '9865324751', 'Kakashi@123 ', 'aurangabad', 'Pune', '2022-02-24', '2022-02-25', '237', 1659, 1, 'MH20R1501', '800', 'Maruti Alto', 'Hatchback', 'Requested', '-', '00:00:00.000000'),
(33, 5, 'Kakashi', '9865324751', 'Kakashi@123 ', 'beed', 'Pune', '2022-02-18', '2022-02-19', '249', 2490, 3, 'MH21G1718', ' RXT', 'Renault Triber', 'MPV,SUV', 'Requested', '-', '00:00:00.000000'),
(34, 5, 'Kakashi', '9865324751', 'Kakashi@123 ', 'Pune', 'beed', '2022-02-28', '2022-03-01', '249', 2739, 4, 'MH02K2897', 'Sigma', 'Maruti Baleno ', 'Hatchback', 'Accepted', '-', '00:00:00.000000'),
(35, 2, 'Gol D roger', '9865752465', 'GolD@gmail.com ', 'aurangabad', 'Pune', '2022-03-02', '2022-03-02', '237', 1659, 1, 'MH20R1501', '800', 'Maruti Alto', 'Hatchback', 'Requested', '-', '00:00:00.000000'),
(36, 2, 'Gol D roger', '9865752465', 'GolD@gmail.com ', 'Pune', 'ahmadnagar', '2022-03-02', '2022-03-03', '121', 1210, 3, 'MH21G1718', ' RXT', 'Renault Triber', 'MPV,SUV', 'Requested', '-', '00:00:00.000000'),
(37, 5, 'Kakashi', '9865324751', 'Kakashi@123 ', 'ahmadnagar', 'Pune', '2022-03-05', '2022-03-06', '121', 96800, 11, 'MH20RH012', 'Q7', 'Audi ', 'Super Luxury', 'Requested', '-', '00:00:00.000000'),
(38, 5, 'Kakashi', '9865324751', 'Kakashi@123 ', 'jalna', 'ahmadnagar', '2022-03-06', '2022-03-07', '173', 2500, 4, 'MH02K2897', 'Sigma', 'Maruti Baleno ', 'Hatchback', 'Accepted', '-', '00:00:00.000000'),
(39, 5, 'Kakashi', '9865324751', 'Kakashi@123 ', 'Pune', 'beed', '2022-03-14', '2022-03-15', '249', 2739, 3, 'MH21G1718', ' RXT', 'Renault Triber', 'MPV,SUV', 'Requested', '-', '00:00:00.000000'),
(40, 5, 'Kakashi', '9865324751', 'Kakashi@123 ', 'ahmadnagar', 'jalna', '2022-03-16', '2022-03-17', '173', 3000, 3, 'MH21G1718', ' RXT', 'Renault Triber', 'MPV,SUV', 'Requested', '-', '00:00:00.000000'),
(41, 5, 'Kakashi', '9865324751', 'Kakashi@123 ', 'ahmadnagar', 'aurangabad', '2022-03-16', '2022-03-17', '0', 1000, 10, 'MH20G1028', 'XUV700', 'Mahindra', 'SUV', 'Requested', '-', '00:00:00.000000'),
(42, 5, 'Kakashi', '9865324751', 'Kakashi@123 ', 'jalna', 'aurangabad', '2022-03-18', '2022-03-18', '60', 660, 3, 'MH21G1718', ' RXT', 'Renault Triber', 'MPV,SUV', 'Requested', '-', '00:00:00.000000'),
(43, 2, 'Gol D roger', '9865752465', 'GolD@gmail.com ', 'Pune', 'jalna', '2022-04-26', '2022-04-27', '294', 2058, 1, 'MH20R1501', '800', 'Maruti Alto', 'Hatchback', 'Requested', '-', '17:41:00.000000'),
(44, 2, 'Gol D roger', '9865752465', 'GolD@gmail.com ', 'Pune', 'jalna', '2022-04-26', '2022-04-27', '294', 2058, 1, 'MH20R1501', '800', 'Maruti Alto', 'Hatchback', 'Requested', '-', '00:00:00.000000'),
(45, 2, 'Gol D roger', '9865752465', 'GolD@gmail.com ', 'Pune', 'aurangabad', '2022-04-26', '2022-04-27', '237', 2844, 3, 'MH21G1718', ' RXT', 'Renault Triber', 'MPV,SUV', 'Requested', '-', '00:00:00.000000'),
(46, 2, 'Gol D roger', '9865752465', 'GolD@gmail.com ', 'Pune', 'aurangabad', '2022-04-26', '2022-04-27', '237', 2844, 3, 'MH21G1718', ' RXT', 'Renault Triber', 'MPV,SUV', 'Requested', '-', '00:00:00.000000'),
(47, 2, 'Gol D roger', '9865752465', 'GolD@gmail.com ', 'Pune', 'aurangabad', '2022-04-26', '2022-04-27', '237', 2844, 3, 'MH21G1718', ' RXT', 'Renault Triber', 'MPV,SUV', 'Requested', '-', '00:00:00.000000'),
(48, 2, 'Gol D roger', '9865752465', 'GolD@gmail.com ', 'Pune', 'jalna', '2022-04-06', '2022-04-21', '294', 3528, 3, 'MH21G1718', ' RXT', 'Renault Triber', 'MPV,SUV', 'Requested', '-', '00:00:00.000000'),
(49, 2, 'Gol D roger', '9865752465', 'GolD@gmail.com ', 'Pune', 'ahmadnagar', '2022-04-06', '2022-04-20', '121', 1452, 3, 'MH21G1718', ' RXT', 'Renault Triber', 'MPV,SUV', 'Requested', '-', '00:00:00.000000'),
(50, 2, 'Gol D roger', '9865752465', 'GolD@gmail.com ', 'Pune', 'aurangabad', '2022-04-20', '2022-04-26', '237', 2844, 4, 'MH02K2897', 'Sigma', 'Maruti Baleno ', 'Hatchback', 'Requested', '-', '00:00:00.000000'),
(51, 2, 'Gol D roger', '9865752465', 'GolD@gmail.com ', 'Pune', 'aurangabad', '2022-04-20', '2022-04-26', '237', 2844, 4, 'MH02K2897', 'Sigma', 'Maruti Baleno ', 'Hatchback', 'Requested', '-', '16:49:00.000000'),
(52, 2, 'Gol D roger', '9865752465', 'GolD@gmail.com ', 'Pune', 'aurangabad', '2022-03-30', '2022-04-10', '237', 2844, 4, 'MH02K2897', 'Sigma', 'Maruti Baleno ', 'Hatchback', 'Requested', '-', '15:54:00.000000'),
(53, 2, 'Gol D roger', '9865752465', 'GolD@gmail.com ', 'Pune', 'jalna', '2022-04-26', '2022-04-27', '294', 2352, 6, 'MH20RS7456', ' RXT', 'Renault KWID ', 'Hatchback,mini-SUV', 'Requested', '-', '17:01:00.000000'),
(54, 2, 'Gol D roger', '9865752465', 'GolD@gmail.com ', 'Pune', 'aurangabad', '2022-04-26', '2022-04-28', '237', 1896, 6, 'MH20RS7456', ' RXT', 'Renault KWID ', 'Hatchback,mini-SUV', 'Requested', '-', '17:03:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `cPassword` varchar(255) NOT NULL,
  `id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `mobile`, `email`, `Password`, `cPassword`, `id`) VALUES
('umer shaikh', '7507889886', 'umershaikh025@gmail.com', '$2y$10$WsPhcf5Sz1d0J9yNlhZf..7FV.hYEwCzkMWfmnnx1kSulNSVvCNbS', '$2y$10$XDOm6qFy.MB0khtYKipC7u6/6bqIqOoBTXOjzLuQSn7kLFpyPVAEC', 1),
('Gol D roger', '9865752465', 'GolD@gmail.com', '$2y$10$3CMZ7mdX/O.go/Pk.yXeTeL4vFsN5me9y/e2xOeFTCnYk2CliVHwe', '$2y$10$VrsRegkvuZ788zhb7vX6wOc.De6EMTSZvMFR.kKPjBGpELEsu82uq', 2),
('Edward new gate', '9875264215', 'Edward@gmail.com', '$2y$10$WUy0Lll6mdU6OEf9n8kij.xcDWvgeey6iaXvG0JHV5BeTgbEbb9Ku', '$2y$10$8Jq8bM06h8TfyDBh5CXh1.6mqivSseTsO9SEypPuDXvv5T/oy63me', 3),
('Edward new gate', '9865752896', 'kof@gold.com', '$2y$10$.GrwFwxYQBL.iicqACEaQeXsfUkdzdrRbC.YTqRHBHA5Vr9Ee4JnO', '$2y$10$WWRS6LxqpwEOSP.HLm5o2ePIySZ7s/jZJJqExHigY2MSgal1JxBwK', 4),
('Kakashi', '9865324751', 'Kakashi@123', '$2y$10$vb//sCGRLLU3KjVSxqqiyOFnunanUJr9bxPmNcBZtdrVzCo4KjS8q', '$2y$10$/LHuaHOeGvhbFjyRS5kxXOgaLasAfkJTkXDpy8E/Zo.jlVY0U/.MS', 5),
('rehan', '8645321545', 'rehan@123', '$2y$10$rKbZmla2mBZ0qFvgwvLGq.jyFcQEVB4NWWOISvX5Rpga4HiPqfj2O', '$2y$10$7.GzeHMl1wSNKymkg2NeAe0lSeFcm7UiTnbOJmB.8k9tkwiKm6rrW', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AID`);

--
-- Indexes for table `carlisting`
--
ALTER TABLE `carlisting`
  ADD PRIMARY KEY (`VID`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `triprecords`
--
ALTER TABLE `triprecords`
  ADD PRIMARY KEY (`tripID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carlisting`
--
ALTER TABLE `carlisting`
  MODIFY `VID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `triprecords`
--
ALTER TABLE `triprecords`
  MODIFY `tripID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
