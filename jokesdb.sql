-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 04, 2024 at 03:11 AM
-- Server version: 5.7.24
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jokesdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `jokes_table`
--

CREATE TABLE `jokes_table` (
  `JokeID` int(11) NOT NULL,
  `Joke_question` varchar(500) NOT NULL,
  `Joke_answer` varchar(500) NOT NULL,
  `user_id` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jokes_table`
--

INSERT INTO `jokes_table` (`JokeID`, `Joke_question`, `Joke_answer`, `user_id`) VALUES
(1, 'What time is it when an elephant sits on your fence?', 'It\'s time to buy a new fence.', '13'),
(3, 'Why did the chicken cross the road?', 'To get to the other side.', '15'),
(4, 'What did the mother buffalo say to her son when she dropped him off at school?', 'Bison', '16'),
(5, 'Why did the chicken cross the playground?', 'To get to the other slide.', '13'),
(6, 'What happens to a frog\'s car when it breaks down?', 'It gets toad.', '15'),
(7, 'How does a frog start his car when the battery is dead?', 'He gets a jump start.', '16'),
(10, 'what to hear a joke?', 'Your life', '13'),
(17, 'Why can\'t you trust an atom?', 'They make up everything.', '15'),
(18, 'My sister bet me $100 that I couldn\'t make a car out of spagetti', 'You should have seen the look on her face when I drove pasta.', '16'),
(32, 'Cargo space?', 'No. Car no fly.', '31'),
(33, 'Cargo space?', 'No. Car no fly.', '32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` text NOT NULL,
  `password` text NOT NULL,
  `email_address` text,
  `admin_role` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `password`, `email_address`, `admin_role`) VALUES
(13, 'bill', 'password', 'bill.gates@microsoft.com', 1),
(15, 'kim', 'password', ' kim.ill@north.ko', 0),
(16, '   don   ', 'don', '   don.trump@whitehouse.gov   ', 0),
(17, 'bob', ' bob ', ' bob@microsoft.com', 0),
(18, ' melinda ', 'm', '  melinda.gates@microsoft.com ', 0),
(19, 'jim', 'jim', 'jim@msn.com', 0),
(28, 'jamie', 'pass', NULL, NULL),
(31, 'jlewis', '$2y$10$He0KM7vzqw4xWHeFwOLlrulmrNojiQl9BQFkcD2Wv0Y/1QchQY1Rq', NULL, NULL),
(32, 'jlewis159', '$2y$10$crDKTqPmRNOQLaKCpa/RjO7Mps0ThHc5FfZzS/oR322Byhn.XC1iy', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jokes_table`
--
ALTER TABLE `jokes_table`
  ADD PRIMARY KEY (`JokeID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jokes_table`
--
ALTER TABLE `jokes_table`
  MODIFY `JokeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
