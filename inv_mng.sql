-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 14 Αυγ 2019 στις 19:00:04
-- Έκδοση διακομιστή: 10.3.16-MariaDB
-- Έκδοση PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `inv_mng`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `activity`
--

CREATE TABLE `activity` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `notes` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `brand` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `barcode` varchar(200) COLLATE utf8_bin NOT NULL,
  `notes` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `color` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `size` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `price` float DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  `expires_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Άδειασμα δεδομένων του πίνακα `item`
--

INSERT INTO `item` (`id`, `name`, `brand`, `barcode`, `notes`, `color`, `size`, `price`, `stock`, `date_created`, `expires_at`) VALUES
(1, 'Υαλοκαθαριστήρες 50cm E321A', 'Bosch', '223-135-882-A3CK', 'Πολύ καλή ποιότητα', 'red', NULL, 7.5, 20, '2019-08-14 15:55:58', '2050-08-31'),
(2, 'Ζάντες Raptor 0.8m ', 'Honda', '326-452-129-FF12', '            ', 'silver', NULL, 85.9, 11, '2019-08-14 15:57:31', NULL);

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`);

--
-- Ευρετήρια για πίνακα `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `barcode` (`barcode`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT για πίνακα `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Περιορισμοί για άχρηστους πίνακες
--

--
-- Περιορισμοί για πίνακα `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `item_id` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
