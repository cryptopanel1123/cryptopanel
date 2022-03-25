-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2022 at 04:56 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cryptopanel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(64) NOT NULL,
  `pass` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `pass`) VALUES
(1, 'admin@admin.com', 'admin1123');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `date` datetime DEFAULT current_timestamp(),
  `title` varchar(50) DEFAULT NULL,
  `content` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `date`, `title`, `content`) VALUES
(56, '2022-03-21 15:22:04', 'What is DeFi, how does it work?', 'It\'s an umbrella term for the part of the crypto universe that is geared toward building a new, internet-native financial system, using blockchains to replace traditional intermediaries and trust mechanisms.'),
(57, '2022-03-21 15:23:14', 'Eco-friendly cryptos to watch out for this year.  ', 'With the exponential growth of assets, the crypto space has come a significant way from being considered environmentally dangerous, even if there is more to do.'),
(58, '2022-03-21 15:25:51', 'Crypto Price Prediction: Huge Bitcoin Forecast Rev', 'One veteran commodities investor turned bitcoin bull has predicted the bitcoin price could soar to $200,000 in just five years—pointing to a \"compounding effect\" that could drive momentum'),
(59, '2022-03-21 15:27:20', 'Biden’s Crypto Executive Order: Breakthrough Or Wo', 'The crypto world heaved a sigh of relief with President Biden’s new executive order on the industry. Those positive feelings are misplaced.');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `coin` varchar(20) NOT NULL,
  `price` double(18,8) NOT NULL,
  `amount` double(18,8) NOT NULL,
  `total` double(18,8) NOT NULL,
  `buy_sell` tinyint(1) NOT NULL,
  `placed_at` datetime NOT NULL DEFAULT current_timestamp(),
  `incline` tinyint(1) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `uid`, `coin`, `price`, `amount`, `total`, `buy_sell`, `placed_at`, `incline`) VALUES
(112, 75, 'BTC', 300.00000000, 0.10000000, 30.00000000, 1, '2022-02-26 18:08:49', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders_history`
--

CREATE TABLE `orders_history` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `coin` varchar(20) NOT NULL,
  `price` double(18,8) NOT NULL,
  `amount` double(18,8) NOT NULL,
  `total` double(18,8) NOT NULL,
  `buy_sell` tinyint(1) NOT NULL,
  `status` varchar(10) NOT NULL,
  `placed_at` datetime NOT NULL,
  `resolved_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_history`
--

INSERT INTO `orders_history` (`id`, `uid`, `coin`, `price`, `amount`, `total`, `buy_sell`, `status`, `placed_at`, `resolved_at`) VALUES
(1, 75, 'BTC', 41500.00000000, 10.00000000, 0.00024096, 0, 'SUCCESS', '2022-02-05 16:14:27', '2022-02-05 16:15:27'),
(2, 75, 'BTC', 41515.00000000, 10.00000000, 0.00024088, 0, 'SUCCESS', '2022-02-05 16:14:44', '2022-02-05 16:15:27'),
(3, 75, 'BTC', 41520.00000000, 10.00000000, 0.00024085, 0, 'SUCCESS', '2022-02-05 16:15:02', '2022-02-05 16:15:53'),
(4, 75, 'BTC', 30000.00000000, 10.00000000, 0.00033333, 0, 'FAILED', '2022-02-04 16:18:04', '2022-02-05 16:18:26'),
(5, 75, 'BTC', 41500.00000000, 0.10000000, 4150.00000000, 1, 'SUCCESS', '2022-02-05 16:22:17', '2022-02-05 16:22:35'),
(6, 75, 'BTC', 41760.00000000, 10.00000000, 0.00023946, 0, 'SUCCESS', '2022-02-05 21:29:06', '2022-02-05 21:30:41'),
(7, 75, 'BNB', 413.30000000, 10.00000000, 0.02419550, 0, 'SUCCESS', '2022-02-05 22:59:44', '2022-02-05 23:00:53'),
(8, 75, 'BTC', 41400.00000000, 11.00000000, 0.00026570, 0, 'SUCCESS', '2022-02-05 23:02:03', '2022-02-05 23:02:45'),
(9, 75, 'BTC', 41400.00000000, 11.00000000, 0.00026570, 0, 'SUCCESS', '2022-02-05 23:02:03', '2022-02-05 23:02:45'),
(10, 75, 'BTC', 43750.00000000, 10.00000000, 0.00022857, 0, 'SUCCESS', '2022-02-10 19:13:45', '2022-02-10 19:14:38'),
(11, 75, 'BTC', 43800.00000000, 10.00000000, 0.00022831, 0, 'SUCCESS', '2022-02-10 19:13:21', '2022-02-10 19:14:45'),
(12, 75, 'BTC', 43900.00000000, 10.00000000, 0.00022779, 0, 'FAILED', '2022-02-09 19:12:13', '2022-02-10 19:15:27'),
(13, 75, 'BTC', 43850.00000000, 1000.00000000, 0.02280502, 0, 'SUCCESS', '2022-02-10 19:13:07', '2022-02-10 19:16:11'),
(14, 75, 'BTC', 43700.00000000, 10.00000000, 0.00022883, 0, 'SUCCESS', '2022-02-10 19:14:33', '2022-02-10 19:17:06');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `assets` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `uid`, `assets`) VALUES
(17, 75, '{\"BTC\":0,\"ETH\":0,\"BNB\":0,\"XRP\":0,\"SOL\":0,\"DOT\":0,\"ADA\":0,\"LUNA\":0,\"SHIB\":0,\"DOGE\":0,\"USDT\":262}');

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `id` int(1) NOT NULL,
  `BTCUSDT` double(18,8) NOT NULL,
  `ETHUSDT` double(18,8) NOT NULL,
  `BNBUSDT` double(18,8) NOT NULL,
  `XRPUSDT` double(18,8) NOT NULL,
  `SOLUSDT` double(18,8) NOT NULL,
  `DOTUSDT` double(18,8) NOT NULL,
  `ADAUSDT` double(18,8) NOT NULL,
  `LUNAUSDT` double(18,8) NOT NULL,
  `SHIBUSDT` double(18,8) NOT NULL,
  `DOGEUSDT` double(18,8) NOT NULL,
  `last_update` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`id`, `BTCUSDT`, `ETHUSDT`, `BNBUSDT`, `XRPUSDT`, `SOLUSDT`, `DOTUSDT`, `ADAUSDT`, `LUNAUSDT`, `SHIBUSDT`, `DOGEUSDT`, `last_update`) VALUES
(1, 39337.99000000, 2807.55000000, 379.30000000, 0.77570000, 93.15000000, 18.13000000, 0.92000000, 73.93000000, 0.00002510, 0.12900000, '10:38:04');

-- --------------------------------------------------------

--
-- Table structure for table `revenue_stats`
--

CREATE TABLE `revenue_stats` (
  `id` int(1) NOT NULL DEFAULT 1,
  `revenue` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `revenue_stats`
--

INSERT INTO `revenue_stats` (`id`, `revenue`) VALUES
(1, 800.03);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(64) NOT NULL,
  `pass` varchar(64) NOT NULL,
  `registered_at` datetime NOT NULL DEFAULT current_timestamp(),
  `isRestricted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `pass`, `registered_at`, `isRestricted`) VALUES
(75, 'darkexodus1123@gmail.com', '4b2ac83f954ecc67da649442683d8eac25135cf834615275c10b0d85233f41c5', '2022-02-04 23:09:41', 0);

-- --------------------------------------------------------

--
-- Table structure for table `withdraw`
--

CREATE TABLE `withdraw` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `amt` int(10) DEFAULT NULL,
  `bnk_num` int(18) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `scode` varchar(11) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `status` varchar(8) NOT NULL DEFAULT 'PENDING',
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `withdraw`
--

INSERT INTO `withdraw` (`id`, `uid`, `amt`, `bnk_num`, `name`, `scode`, `country`, `status`, `time`) VALUES
(44, 75, 4000, 123456789, 'DARK EXODUS', '12345678', 'India', 'APPROVED', '2022-02-26 09:26:37'),
(49, 75, 100, 123456789, 'asde weds', '12345678', 'United States', 'REJECTED', '2022-03-21 18:05:39'),
(51, 75, 250, 123456789, 'DARK EXODUS', '12345678', 'United States', 'PENDING', '2022-03-21 20:11:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_limit` (`uid`);

--
-- Indexes for table `orders_history`
--
ALTER TABLE `orders_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_limit` (`uid`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_portfolio` (`uid`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `revenue_stats`
--
ALTER TABLE `revenue_stats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `umail` (`email`);

--
-- Indexes for table `withdraw`
--
ALTER TABLE `withdraw`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_withdraw_restrict` (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `orders_history`
--
ALTER TABLE `orders_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `withdraw`
--
ALTER TABLE `withdraw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `user_orders` FOREIGN KEY (`uid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders_history`
--
ALTER TABLE `orders_history`
  ADD CONSTRAINT `user_orders_history` FOREIGN KEY (`uid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD CONSTRAINT `user_portfolio` FOREIGN KEY (`uid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `withdraw`
--
ALTER TABLE `withdraw`
  ADD CONSTRAINT `user_withdraw_restrict` FOREIGN KEY (`uid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
