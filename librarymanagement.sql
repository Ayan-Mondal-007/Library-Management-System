-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2024 at 09:50 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `librarymanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `Admin_Username` varchar(100) NOT NULL,
  `Admin_Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`Admin_Username`, `Admin_Password`) VALUES
('OnlyAdmin', 'OnlyAdmin123');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `book_title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `isbn` varchar(255) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `pub_year` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` enum('Available','Issued') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_title`, `author`, `genre`, `isbn`, `publisher`, `pub_year`, `description`, `status`) VALUES
(1, 'PHP for the Web', 'Larry Ullman', 'WebDev', '3777789828', 'Peachpit Press', '2018-11-16', 'a comprehensive book in PHP development', 'Issued'),
(2, 'PHP and MYSQL', ' Luke Welling ', 'WebDev', '3777789878', 'Addison-Wesley', '2019-03-18', 'a comprehensive book for learning php and mysql..', 'Available'),
(3, 'Effective JavaScript', 'David Hermann', 'WebDev', '3777789857', 'LOREM', '2024-10-17', 'This book is praised for its realistic and elaborate examples, making it suitable for developers of all skill levels.', 'Available'),
(4, 'Effective C++', 'Scott Meyers', 'development', '3777789876', 'LOREM', '2005-01-01', 'lorem ipsum', 'Available'),
(5, 'The C++ Programming Language', 'Stanley Lippman, Josee Lajoie, and Barbara Moo', 'WebDev', '3777789577', 'LOREM', '2012-01-01', 'lorem ipsum', 'Available'),
(6, 'Head First Python', 'Paul Barry', 'WebDev', '54378845857', 'LOREM', '2010-01-02', 'A unique tutorial introduction to Python, focusing on core language fundamentals and using a visual approach to help learners understand the language.', 'Available'),
(7, 'The Object-oriented Scripting Language Ruby', 'Yukihiro “Matz” Matsumoto and Keiju Ishitsuka ', 'WebDev', '3777789828', 'LOREM', '1999-11-11', 'This book, written by Ruby’s creator, provides an in-depth look at the language’s design and syntax. It’s one of the earliest books on Ruby, published in Japan in 1999.', 'Available'),
(8, 'The C Book', ' Mike Banahan, Declan Brady, and Mark Doran', 'WebDev', '377778946', 'NA', '1991-11-11', ' This book, originally published by Addison Wesley in 1991, provides an in-depth guide to the C programming language. Although no longer in print, its content remains relevant today, making it a valuable resource for developers and programmers.', 'Available'),
(9, 'Effective Java', 'Joshua Bloch', 'WebDev', '37777895654', 'NA', '2008-01-02', 'This book is a must-have for experienced Java developers. It provides practical advice on how to write robust, maintainable, and efficient Java code, covering topics like design patterns, concurrency, and best practices.', 'Available'),
(10, 'Java: The Complete Reference', 'Herbert Schildt', 'WebDev', '3777789828', 'NA', '2012-11-11', 'This comprehensive book covers all aspects of Java programming, including syntax, semantics, and standard libraries. It’s suitable for both beginners and experienced developers who want to deepen their understanding of Java.', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `borrower`
--

CREATE TABLE `borrower` (
  `borrower_id` int(11) NOT NULL,
  `borrower_name` varchar(255) NOT NULL,
  `book_title` varchar(255) NOT NULL,
  `book_id` int(11) NOT NULL,
  `b_status` enum('Available','Issued') NOT NULL,
  `issue_date` date NOT NULL,
  `return_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `borrower`
--

INSERT INTO `borrower` (`borrower_id`, `borrower_name`, `book_title`, `book_id`, `b_status`, `issue_date`, `return_date`) VALUES
(4, 'Ayan Mondal', 'PHP', 1, 'Issued', '2024-10-17', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `registration_info`
--

CREATE TABLE `registration_info` (
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `stream` varchar(100) NOT NULL,
  `rollNum` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration_info`
--

INSERT INTO `registration_info` (`firstName`, `lastName`, `stream`, `rollNum`, `email`, `password`) VALUES
('Ayan', 'Mondal', 'BCA', '006-BCA-2023-089', 'ayan85839@gmail.com', '1234'),
('Chayan', 'Mondal', 'NA', 'NA', 'chayan1234@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `returned_records`
--

CREATE TABLE `returned_records` (
  `record_id` int(11) NOT NULL,
  `borrower_name` varchar(255) DEFAULT NULL,
  `book_title` varchar(255) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `return_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `returned_records`
--

INSERT INTO `returned_records` (`record_id`, `borrower_name`, `book_title`, `book_id`, `issue_date`, `return_date`) VALUES
(1, 'Ayan Mondal', 'PHP for the WEB', 1, '2024-10-17', '2024-10-17'),
(2, 'Ayan Mondal', 'PHP', 1, '2024-10-17', '2024-10-17'),
(3, 'Ayan Mondal', 'PHP', 1, '2024-10-17', '2024-10-17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`Admin_Username`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `borrower`
--
ALTER TABLE `borrower`
  ADD PRIMARY KEY (`borrower_id`);

--
-- Indexes for table `registration_info`
--
ALTER TABLE `registration_info`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `returned_records`
--
ALTER TABLE `returned_records`
  ADD PRIMARY KEY (`record_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `borrower`
--
ALTER TABLE `borrower`
  MODIFY `borrower_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `returned_records`
--
ALTER TABLE `returned_records`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
