-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2017 at 06:24 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `serveradmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

CREATE TABLE `credentials` (
  `id` int(10) NOT NULL,
  `server_name` varchar(200) NOT NULL,
  `server_ip` varchar(200) NOT NULL,
  `Protocol` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `pass_expiry` varchar(50) NOT NULL,
  `user_id` int(10) NOT NULL,
  `role` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credentials`
--

INSERT INTO `credentials` (`id`, `server_name`, `server_ip`, `Protocol`, `username`, `password`, `pass_expiry`, `user_id`, `role`, `time`) VALUES
(1, 'localhost', '192.168.0.16', 'mysql', 'root', 'j5k8w0KN&cK9?S6\\', '30', 1, 'admin', '2017-02-05 17:00:33');

-- --------------------------------------------------------

--
-- Table structure for table `imp_cmds`
--

CREATE TABLE `imp_cmds` (
  `id` int(10) NOT NULL,
  `title` varchar(200) NOT NULL,
  `command` text NOT NULL,
  `description` longtext NOT NULL,
  `username` varchar(50) NOT NULL,
  `user_id` int(10) NOT NULL,
  `role` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `imp_cmds`
--

INSERT INTO `imp_cmds` (`id`, `title`, `command`, `description`, `username`, `user_id`, `role`, `time`) VALUES
(0, 'ddasd', 'asssdada', 'dasdsdsada', 'admin', 1, 'admin', '2017-02-05 17:10:53');

-- --------------------------------------------------------

--
-- Table structure for table `imp_links`
--

CREATE TABLE `imp_links` (
  `id` int(10) NOT NULL,
  `title` varchar(200) NOT NULL,
  `link` text NOT NULL,
  `description` longtext NOT NULL,
  `username` varchar(50) NOT NULL,
  `user_id` int(10) NOT NULL,
  `role` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `imp_scripts`
--

CREATE TABLE `imp_scripts` (
  `id` int(10) NOT NULL,
  `title` varchar(200) NOT NULL,
  `script` longtext NOT NULL,
  `username` varchar(50) NOT NULL,
  `user_id` int(10) NOT NULL,
  `role` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `imp_scripts`
--

INSERT INTO `imp_scripts` (`id`, `title`, `script`, `username`, `user_id`, `role`, `time`) VALUES
(0, 'eeee', 'eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee\r\neeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee\r\n', '', 0, '', '2017-02-05 17:17:11');

-- --------------------------------------------------------

--
-- Table structure for table `server_list`
--

CREATE TABLE `server_list` (
  `id` int(10) NOT NULL,
  `server_name` varchar(250) NOT NULL,
  `server_ip` varchar(250) NOT NULL,
  `OS` varchar(100) DEFAULT 'Not Updated',
  `RAM` varchar(100) DEFAULT 'Not Updated',
  `CPU` varchar(100) DEFAULT 'Not Updated',
  `HDD` varchar(100) NOT NULL DEFAULT 'Not Updated',
  `Remark` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `server_list`
--

INSERT INTO `server_list` (`id`, `server_name`, `server_ip`, `OS`, `RAM`, `CPU`, `HDD`, `Remark`) VALUES
(1, 'localhost', '192.168.0.16', 'Centos', '5', '10.0', '240', 'Hello testing news');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(2000) NOT NULL,
  `email` varchar(150) NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `fname`, `lname`, `role`) VALUES
(1, 'admin', 'YCuhhuNj8lX3qAJqSf9iTpd402a53A6setYD7nDHhZXQ1GTEc+zMXzAG1g9scWZK2+HsiaK6CjQgQdMhIXODYg==', 'ammu@gmail.com', 'amrit', 'sharma', 'admin'),
(2, 'ammu145', 'SrIg/DnTETgAasjjzfpXBN8UAIKNAvrWIe23TbO3idGid/EFtbwds8lzJYJeYyxBhJHaR78RIlTOSTpdYpCoMg==', 'amrit@ffff.in', 'ammu', 'sharma', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `credentials`
--
ALTER TABLE `credentials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `server_list`
--
ALTER TABLE `server_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `credentials`
--
ALTER TABLE `credentials`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `server_list`
--
ALTER TABLE `server_list`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
