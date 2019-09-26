-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2019 at 08:37 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `orcacomment`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `comment` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `comment`, `date`, `parent_id`) VALUES
(218, 'John Doe', 'johndoe@gmail.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo a blanditiis fuga rem! Expedita maiores praesentium soluta est repellat minus doloribus, perspiciatis qui hic nemo illum necessitatibus mollitia deleniti sit.\r\n', '2019-09-25', 0),
(219, 'John Doe', 'johndoe@gmail.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo a blanditiis fuga rem! Expedita maiores praesentium soluta est repellat minus doloribus, perspiciatis qui hic nemo illum necessitatibus mollitia deleniti sit.', '2019-09-25', 218),
(220, 'Foo Bar', 'foobar@gmail.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo a blanditiis fuga rem! Expedita maiores praesentium soluta est repellat minus doloribus, perspiciatis qui hic nemo illum necessitatibus mollitia deleniti sit.', '2019-09-25', 218),
(222, 'John Dough', 'johndoe@gmail.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo a blanditiis fuga rem! Expedita maiores praesentium soluta est repellat minus doloribus, perspiciatis qui hic nemo illum necessitatibus mollitia deleniti sit.', '2019-09-25', 221);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=264;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
