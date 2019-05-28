-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 28, 2019 at 01:13 PM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `afterclass`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
                          `id` int(11) NOT NULL,
                          `post_id` int(11) NOT NULL,
                          `author` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
                       `id` int(11) NOT NULL,
                       `title` varchar(50) NOT NULL,
                       `content` longtext NOT NULL,
                       `author` varchar(20) NOT NULL,
                       `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `author`, `date`) VALUES
(2, 'Hello', 'Coucou', 'Pierre', '2019-05-28 13:06:32'),
(5, 'Hello', 'Coucou', '', '2019-05-28 13:06:32'),
(6, 'Hello', 'Coucou', '', '2019-05-28 13:07:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
                       `id` int(11) NOT NULL,
                       `mail` varchar(100) NOT NULL,
                       `username` varchar(20) NOT NULL,
                       `type` varchar(20) NOT NULL,
                       `password` varchar(72) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `mail`, `username`, `type`, `password`) VALUES
(19, 'pierre.secher@hetic.net', 'InSecker', 'user', 'TOTOTO'),
(20, 'pierresecher98@hetic.net', 'Test1', 'user', '$2y$10$KQakIpaCiXejT.s6KKGDhOkn5/5cf6DML495TJ9oehAA4nCB8niba'),
(21, 'trst@hetic.net', 'Test2', 'user', '$2y$10$mfbuMl5faFMqHsGxkSgSsO3n.h/VA9cGl7KqjxB7iGLd0G2KgcX8e'),
(22, 'Test3@hetic.net', 'Test3', 'user', '$2y$10$Ej4ACxoe4jVIraP4Rxu90e..guYCXjory3hP/YE3OKR0qy2dTAxpm'),
(23, 'Test4@hetic.net', 'Test4', 'user', '$2y$10$wiNoxUt7OKD9HZnCZRtJReOiNG0JrWE4fcTyEqnwokINO0c6sbPWC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
