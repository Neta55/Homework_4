-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2019 at 05:57 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todolist`
--

-- --------------------------------------------------------

--
-- Table structure for table `todotab`
--

CREATE TABLE `todotab` (
  `id` int(11) NOT NULL,
  `todotasks` varchar(10000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `todoDone` tinyint(1) DEFAULT 0,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `todotab`
--

INSERT INTO `todotab` (`id`, `todotasks`, `todoDone`, `created`, `user_ID`) VALUES
(1, 'Izveidot datubāzi ar divām tabulām', 1, '2019-12-15 13:07:19', 1),
(2, 'Pagatavot pusdienas', 1, '2019-12-15 13:12:54', 1),
(4, 'Uztaisīt stilu listi', 1, '2019-12-15 13:14:56', 1),
(5, 'Nopirkt pārveidotāju USB C tipa uz HDMI, lai varētu parādīt uz ekrāna', 1, '2019-12-15 13:16:56', 1),
(6, 'Parādīt tā, lai nekas nenobruktu!', 0, '2019-12-15 13:17:21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hash` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `hash`, `created`) VALUES
(1, 'Ineta', '$2y$10$Dj4.9ZMvmOOEqQLwaIiZXexbRdy/6Ma6RAkh76CJ3UgpnvdYn1PCu', '2019-12-15 13:05:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `todotab`
--
ALTER TABLE `todotab`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `todotab`
--
ALTER TABLE `todotab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `todotab`
--
ALTER TABLE `todotab`
  ADD CONSTRAINT `todotab_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
