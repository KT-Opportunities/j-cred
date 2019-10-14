-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2019 at 09:55 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jcred`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_preferences`
--

CREATE TABLE `bank_preferences` (
  `id` int(11) NOT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `account_type` varchar(255) DEFAULT NULL,
  `account_holder` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank_preferences`
--

INSERT INTO `bank_preferences` (`id`, `user_email`, `bank`, `account_number`, `account_type`, `account_holder`) VALUES
(1, 'ray@gmail.com', 'Standard Bank', '1234567', 'Savings', 'Holang Makhumisane'),
(2, 'dawn@gmail.com', '', '', '', ''),
(3, 'doe@doe.com', 'African Bank', '19182828384', 'current', 'Doe Mortu'),
(4, 'koni@gmail.com', 'Stand V', '000111251455', NULL, 'Koni Sitsula'),
(5, 'vhua@gmail.com', 'standard banek', '522246225', NULL, 'vhua sitsula'),
(6, 'nompfa@gmail.com', 'absa', '022655845', NULL, 'nompfa sitsula'),
(7, 'koni@gmail.com', 'Stand V', '000111251455', NULL, 'Koni Sitsula'),
(8, 'konoi@gmail.com', 'absa', '000111251455', NULL, 'Koni Sitsula'),
(9, 'vhuawe@gmail.com', 'Standard Bank', '15222566', NULL, 'Vhuawelo Sitsula'),
(10, 'vhuawe@gmail.com', 'Standard Bank', '00012585255', NULL, 'Vhuawelo Sitsula'),
(11, 'muofhe@gmail.com', 'ABSA', '77784555', NULL, 'muofhe mundalamo'),
(12, 'vhuyo@gmail.com', 'Standard Bank', '00012585255', NULL, 'Sitsula Vhuyo'),
(13, 'vhuyo@ktopportunities.co.za', 'Standard Bank', '15222566', NULL, 'koni sitsula'),
(14, 'tshisi@gmail.com', 'Standard Bank', '00012585255', NULL, 'Vhuawelo Sitsula'),
(15, 'tshisi@gmail.com', 'Standard Bank', '00012585255', NULL, 'koni sitsula'),
(16, 'koni@gmail.com', 'ABSA', '15222566', NULL, 'tshisikhawe sitsula'),
(17, 'koni@gmail.com', 'Standard Bank', '00012585255', NULL, 'koni sitsula'),
(18, 'koni@gmail.com', 'Standard Bank', '00012585255', NULL, 'tshisikhawe sitsula'),
(19, 'vhuyo@gmail.com', 'Standard Bank', '89995455', NULL, 'koni sitsula');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `email`, `document`) VALUES
(1, 'koni@gmail.com', 'L_assets/documents/Peosa.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `employment_details`
--

CREATE TABLE `employment_details` (
  `id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `employer` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `gross` varchar(255) DEFAULT NULL,
  `nett` varchar(255) DEFAULT NULL,
  `industry` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `frequency` varchar(255) DEFAULT NULL,
  `day` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employment_details`
--

INSERT INTO `employment_details` (`id`, `user_email`, `status`, `employer`, `phone`, `gross`, `nett`, `industry`, `position`, `time`, `contact`, `frequency`, `day`) VALUES
(1, 'ray@gmail.com', 'Employed Full Time', 'KT Opportunities', '0799832548', '10000', '1000', 'IT', 'Developer', '1 year', '011 011 0111', 'Monthly', '31'),
(2, 'dawn@gmail.com', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(4, 'doe@doe.com', 'full time', 'Raymond Mortu', '0833832282', '50000', '45000', 'civil engineer', 'manager', '2years', '0110029837', 'monthly', '31'),
(5, 'koni@gmail.com', 'Employed', NULL, '0729756814', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'vhua@gmail.com', 'Employed', NULL, '0729756814', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'nompfa@gmail.com', 'Employed', NULL, '0729756845', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'koni@gmail.com', 'Employed', NULL, '0729756845', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'konoi@gmail.com', 'Employed', NULL, '0729756814', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'vhuawe@gmail.com', 'Employeed', NULL, '072659874', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'vhuawe@gmail.com', 'Employeed', NULL, '0767672963', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'muofhe@gmail.com', 'Employed', NULL, '072986412', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'vhuyo@gmail.com', 'Employeed', NULL, '0767672963', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'vhuyo@ktopportunities.co.za', 'Employed', NULL, '0729756814', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'tshisi@gmail.com', 'Employeed', NULL, '0729756814', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'tshisi@gmail.com', 'Employeed', NULL, '0729756814', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'koni@gmail.com', 'Employed', NULL, '0767672963', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'koni@gmail.com', 'Employed', NULL, '0729756814', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'koni@gmail.com', 'Employed', NULL, '0729756814', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'vhuyo@gmail.com', 'Employeed', NULL, '0729756814', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `date_added` datetime(6) DEFAULT CURRENT_TIMESTAMP(6),
  `fullname` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT 'admin12',
  `type` varchar(255) NOT NULL,
  `org` varchar(255) NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `cover` varchar(100) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `date_added`, `fullname`, `phone`, `email`, `address`, `city`, `code`, `password`, `type`, `org`, `avatar`, `cover`, `logo`) VALUES
(6, '2019-03-14 11:35:39.987965', 'Raymond Mortu', '0799832549', 'ray@gmail.com', 'SBTI building 220 2nd st, Halfway House', 'Midrand', '1685', '12345', 'Super-Super-Admin', 'VHUYO ORG', '', '', ''),
(7, '2019-03-14 11:35:39.987965', 'Raymond Doe Mortu', '0736532113', 'doe@gmail.com', '383 Willow Crest, Sagewood st, Noordwyk', 'Cape Town', '1686', '123456', 'Admin', 'Legal Hint', 'L_assets/images/avatar/gif1.gif', 'L_assets/images/cover/cool-wallpaper-4.jpg', ''),
(8, '2019-03-14 11:35:39.987965', 'doe Mortu', '0736532113', 'doe@doe.com', '383 willo rod', 'midrand', '1938', '123456', 'lendee', 'VHUYO ORG', '', '', ''),
(9, '2019-03-14 11:35:39.987965', 'k Joe', '0728372288', 'joe@gmai.com', '', '', '', '123456', 'investor', 'Legal Hint', '', '', ''),
(23, '2019-03-14 11:35:39.987965', 'Joe Dre', '0736532113', 'joe@gmail.com', '383 Willow Crest, Sagewood st, Noordwyk', 'Cape Town', '1092', '1844156d4166d94387f1a4ad031ca5fa', 'Super-Super-Admin', '', '', '', ''),
(40, '2019-03-29 08:31:18.363347', 'tshisikhawe sitsula', '0767672963', 'tshisi@gmail.com', 'P.O.BOX 2794 ', 'SIBASA', '568', 'admin12', 'Super-Admin', 'TSHISI ORGANIZATION', '', '', 'L_assets/images/logos/c3.png'),
(41, '2019-03-29 11:38:28.060081', 'koni sitsula', '0729756814', 'vhuyo@gmail.com', 'P.O.BOX 2794 ', 'SIBASA', '855', 'admin12', 'Super-Admin', 'VHUYO ORG', '', '', 'L_assets/images/logos/c5.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank_preferences`
--
ALTER TABLE `bank_preferences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employment_details`
--
ALTER TABLE `employment_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank_preferences`
--
ALTER TABLE `bank_preferences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employment_details`
--
ALTER TABLE `employment_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
