-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2019 at 12:02 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(100) NOT NULL,
  `book_name` varchar(70) DEFAULT NULL,
  `book_image` varchar(100) DEFAULT NULL,
  `book_author_name` varchar(50) DEFAULT NULL,
  `book_publication_name` varchar(50) DEFAULT NULL,
  `book_purchase_date` varchar(50) DEFAULT NULL,
  `book_price` varchar(10) DEFAULT NULL,
  `book_qty` int(5) DEFAULT NULL,
  `available_qty` int(5) DEFAULT NULL,
  `librarian_username` varchar(50) DEFAULT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_name`, `book_image`, `book_author_name`, `book_publication_name`, `book_purchase_date`, `book_price`, `book_qty`, `available_qty`, `librarian_username`, `datetime`) VALUES
(35, 'DATA STRUCTURES WITH  C', '20190721060520.jpg', 'Seymour Lipschutz', ' Tata McGraw-Hill Education India', '2019-07-04', '400', 10, 9, 'samibd', '2019-07-21 16:05:20'),
(36, 'Introduction to Algorithms', '20190721060733.jpg', 'Thomas H. Cormen ', 'MIT Press Ltd', '2019-07-05', '500', 10, 10, 'samibd', '2019-07-21 16:07:33'),
(37, ' Database System Concepts Database System Concepts', '20190721061003.jpg', 'Abraham Silberschatz ,S. Sudarshan,Henry Korth ,', 'McGraw-Hill Education', '2019-07-17', '400', 10, 9, 'samibd', '2019-07-21 16:10:03'),
(39, 'Data and Computer Communications', '20190721062038.jpg', ' William Stallings', 'Pearson Education (US)', '2019-07-05', '500', 10, 10, 'samibd', '2019-07-21 16:20:38'),
(40, 'Algorithms', '20190726102028.jpg', 'Pearson Education (US)', 'Kevin Wayne', '2011-07-26', '600', 10, 10, 'samibd', '2019-07-26 08:20:28'),
(41, 'Software Engineering', '20190726102526.jpg', '  Ian Sommerville', 'Pearson Education Limited', '2019-07-04', '1000', 10, 10, 'samibd', '2019-07-26 08:25:26'),
(42, 'Artificial Intelligence: A Modern Approach (Paperback)', '20190726103001.gif', 'Peter Norvig , Stuart J Russell', 'Pearson', '2019-07-09', '500', 10, 8, 'samibd', '2019-07-26 08:30:01'),
(43, 'à¦ªà¦¾à¦‡à¦¥à¦¨ à¦¦à¦¿à§Ÿà§‡ à¦ªà§à¦°à§‹à¦—à§à¦°à¦¾à¦®à¦¿à¦‚ à¦¶à§‡à', '20190726103442.jpg', 'à¦¤à¦¾à¦®à¦¿à¦® à¦¶à¦¾à¦¹à¦°à¦¿à§Ÿà¦¾à¦° à¦¸à§à¦¬', 'à¦¦à§à¦¬à¦¿à¦®à¦¿à¦• à¦ªà§à¦°à¦•à¦¾à¦¶à¦¨à§€', '2019-07-18', '400', 10, 8, 'samibd', '2019-07-26 08:34:42');

-- --------------------------------------------------------

--
-- Table structure for table `issue_book`
--

CREATE TABLE `issue_book` (
  `id` int(5) NOT NULL,
  `students_id` int(5) NOT NULL,
  `book_id` int(5) NOT NULL,
  `issue_date` varchar(20) NOT NULL,
  `book_return_date` varchar(20) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `issue_book`
--

INSERT INTO `issue_book` (`id`, `students_id`, `book_id`, `issue_date`, `book_return_date`, `date_time`) VALUES
(1, 1, 37, '26-07-19', '28-07-19', '2019-07-26 08:24:05'),
(2, 2, 42, '26-07-19', '', '2019-07-26 08:24:23'),
(3, 2, 40, '26-07-19', '27-07-19', '2019-07-26 08:25:41'),
(4, 4, 43, '26-07-19', '28-07-19', '2019-07-26 08:03:45'),
(5, 5, 42, '28-07-19', '', '2019-07-28 07:41:35'),
(6, 1, 35, '28-07-19', '28-07-19', '2019-07-28 07:40:15'),
(7, 3, 43, '28-07-19', '28-07-19', '2019-07-28 07:41:11'),
(8, 1, 41, '09-08-19', '09-08-19', '2019-08-09 07:21:06'),
(9, 2, 35, '09-08-19', '', '2019-08-09 07:23:59');

-- --------------------------------------------------------

--
-- Table structure for table `librarian`
--

CREATE TABLE `librarian` (
  `id` int(3) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `librarian`
--

INSERT INTO `librarian` (`id`, `firstname`, `lastname`, `email`, `username`, `password`, `datetime`) VALUES
(1, 'hasan', 'sami', 'sami12@gmail.com', 'samibd', '123456', '2019-07-10 09:13:16');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(6) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `department` varchar(6) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone_no` varchar(11) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `student_id`, `department`, `email`, `user_name`, `password`, `phone_no`, `image`, `status`, `date_time`) VALUES
(1, 'Abdullah Al ', 'Noman', 'Noman', 'CSE', 'riyadfiddat@gmail.com', 'riyadbd', '$2y$10$mr4KoZkMiM9G0u2HbxeqleUD/F1zH8WBxFVPH/mqoaPsZu/y7GeWK', '01860729935', NULL, 1, '2019-07-26 08:06:37'),
(2, 'Faizul Hasan ', ' Ehad', ' Ehad', 'CSE', 'ehad@gmail.com', 'ehad', '$2y$10$korOotqA.4uEJbfsRoDOGORa6drc7jixShxeQpictgkNCT/UPOOwC', '01860729935', NULL, 1, '2019-07-26 08:21:42'),
(3, 'Hasan', 'sami', 'CSE0106180', 'CSE', 'hasan@gmail.com', 'sami12', '$2y$10$ubIl797Q9sDi1EGrerD3I.cgrT19Ga94vNO9fhEYf9hVXSlVaoI0G', '01811877689', NULL, 1, '2019-07-26 08:27:21'),
(4, 'MD.', 'Junaed', 'CSE01306182', 'CSE', 'Junaed@gmail.com', 'junaedbd', '$2y$10$4EuBfZgMa2HqzPE2suaNUeGIifcYYGEbrihdJdTAd0gZSe5a9Onem', '01860729935', NULL, 1, '2019-07-26 08:01:50'),
(5, 'shafayet', 'nur', 'cse01306248', 'cse', 'shafayetabir217@gmail.com', 'shafayet217', '$2y$10$oGh2wJSKNnLlltiaXQmileu093VsE3uad2qpkk9es3LtY5yziCNBi', '01933648557', NULL, 1, '2019-07-28 07:39:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_book`
--
ALTER TABLE `issue_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `librarian`
--
ALTER TABLE `librarian`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `issue_book`
--
ALTER TABLE `issue_book`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `librarian`
--
ALTER TABLE `librarian`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
