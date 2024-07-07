-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2024 at 11:08 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `azure_condo`
--

-- --------------------------------------------------------

--
-- Table structure for table `accomodation`
--

CREATE TABLE `accomodation` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `room_no` varchar(10) NOT NULL,
  `floor_no` int(11) NOT NULL,
  `description` text NOT NULL,
  `f_size` int(11) NOT NULL,
  `good_for` int(11) NOT NULL,
  `max_of` int(11) NOT NULL,
  `no_of_bed` int(11) NOT NULL,
  `remarks` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accomodation`
--

INSERT INTO `accomodation` (`id`, `slug`, `name`, `room_no`, `floor_no`, `description`, `f_size`, `good_for`, `max_of`, `no_of_bed`, `remarks`, `date_created`, `date_updated`) VALUES
(1, 'Elijah_Mueller', 'Elijah Mueller', 'Veritatis ', 40, 'Et molestiae ab volu', 29, 5, 5, 0, 'Asperiores maxime re', '2024-07-07 06:21:12', '2024-07-07 06:33:31'),
(2, '', 'Jolie Clark', 'Aut rem do', 21, 'Eum eaque sit soluta', 6, 2, 2, 0, 'Eiusmod reprehenderi', '2024-07-07 08:20:22', '2024-07-07 08:20:22');

-- --------------------------------------------------------

--
-- Table structure for table `accomodation_amenity`
--

CREATE TABLE `accomodation_amenity` (
  `accomodation_id` int(11) NOT NULL,
  `amenity_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accomodation_amenity`
--

INSERT INTO `accomodation_amenity` (`accomodation_id`, `amenity_id`) VALUES
(2, 1),
(2, 2),
(2, 3),
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `accomodation_inclusion`
--

CREATE TABLE `accomodation_inclusion` (
  `accomodation_id` int(11) NOT NULL,
  `inclusion_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `amenity`
--

CREATE TABLE `amenity` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `amenity`
--

INSERT INTO `amenity` (`id`, `name`) VALUES
(1, 'Swimming Pool'),
(2, 'Basketball Court'),
(3, 'Parking Lot'),
(4, 'Pools');

-- --------------------------------------------------------

--
-- Table structure for table `inclusion`
--

CREATE TABLE `inclusion` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `accomodation_id` int(11) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `total_amount` decimal(10,0) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fname` varchar(150) NOT NULL,
  `mname` varchar(150) NOT NULL,
  `lname` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `contact_number` varchar(11) NOT NULL,
  `password` text NOT NULL,
  `user_type` tinyint(4) NOT NULL COMMENT '1=admin,2=customer',
  `is_verified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accomodation`
--
ALTER TABLE `accomodation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `amenity`
--
ALTER TABLE `amenity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inclusion`
--
ALTER TABLE `inclusion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accomodation`
--
ALTER TABLE `accomodation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `amenity`
--
ALTER TABLE `amenity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inclusion`
--
ALTER TABLE `inclusion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
