-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2022 at 08:37 AM
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
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dashboard`
--

CREATE TABLE `dashboard` (
  `id` int(11) NOT NULL,
  `coin_id` varchar(20) NOT NULL,
  `symbol` varchar(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `image` text NOT NULL,
  `current_price` int(19) NOT NULL,
  `market_cap` int(19) NOT NULL,
  `market_cap_rank` int(4) NOT NULL,
  `fully_diluted_valuation` int(19) NOT NULL,
  `total_volume` int(19) NOT NULL,
  `high_24h` int(19) NOT NULL,
  `low_24h` int(19) NOT NULL,
  `price_change_24h` float(11,5) NOT NULL,
  `price_change_percentage_24h` float(11,5) NOT NULL,
  `market_cap_change_24h` int(19) NOT NULL,
  `market_cap_change_percentage_24h` float(11,5) NOT NULL,
  `circulating_supply` int(19) NOT NULL,
  `total_supply` int(19) NOT NULL,
  `max_supply` int(19) NOT NULL,
  `ath` int(19) NOT NULL,
  `ath_change_percentage` float(11,5) NOT NULL,
  `ath_date` datetime NOT NULL,
  `atl` float(11,5) NOT NULL,
  `atl_change_percentage` float(11,5) NOT NULL,
  `atl_date` datetime NOT NULL,
  `roi` float(11,5) DEFAULT NULL,
  `last_updated` datetime NOT NULL,
  `sparkline_in_7d` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`sparkline_in_7d`)),
  `price_change_percentage_14d_in_currency` float(19,18) NOT NULL,
  `price_change_percentage_1h_in_currency` float(19,18) NOT NULL,
  `price_change_percentage_1y_in_currency` float(19,18) NOT NULL,
  `price_change_percentage_200d_in_currency` float(19,18) NOT NULL,
  `price_change_percentage_24h_in_currency` float(19,18) NOT NULL,
  `price_change_percentage_30d_in_currency` float(19,18) NOT NULL,
  `price_change_percentage_7d_in_currency` float(19,18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(17, 75, '{\"BTC\":0.9247185799999998,\"ETH\":1,\"BNB\":1.0241955,\"XRP\":1,\"SOL\":1,\"DOT\":1,\"ADA\":1,\"LUNA\":1,\"SHIB\":1,\"DOGE\":1,\"USDT\":8039}');

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
(1, 43724.91000000, 3129.31000000, 414.50000000, 0.85400000, 108.25000000, 21.07000000, 1.16500000, 55.26000000, 0.00003138, 0.15310000, '07:25:38');

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dashboard`
--
ALTER TABLE `dashboard`
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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `umail` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dashboard`
--
ALTER TABLE `dashboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `orders_history`
--
ALTER TABLE `orders_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `user_limit` FOREIGN KEY (`uid`) REFERENCES `user` (`id`);

--
-- Constraints for table `orders_history`
--
ALTER TABLE `orders_history`
  ADD CONSTRAINT `user_orders_history` FOREIGN KEY (`uid`) REFERENCES `user` (`id`);

--
-- Constraints for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD CONSTRAINT `user_portfolio` FOREIGN KEY (`uid`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
