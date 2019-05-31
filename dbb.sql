-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 30, 2019 at 03:41 PM
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
                          `author` varchar(20) NOT NULL,
                          `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                          `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `date`, `content`) VALUES
(1, 12, 'tareum', '2019-05-29 16:20:07', 'samir'),
(2, 12, 'tareum', '2019-05-29 16:20:09', 'same'),
(3, 13, 'Test6', '2019-05-30 10:04:06', 'Coucouuuuu'),
(4, 13, 'Test6', '2019-05-30 10:16:10', 'hello'),
(5, 18, 'Test4', '2019-05-30 13:52:10', 'C\'est naze'),
(6, 25, 'Test4', '2019-05-30 15:12:59', 'bla'),
(7, 24, 'Test4', '2019-05-30 15:22:22', 'Hello');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
                       `id` int(11) NOT NULL,
                       `title` varchar(50) NOT NULL,
                       `content` longtext NOT NULL,
                       `author` varchar(20) NOT NULL,
                       `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                       `tag` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `author`, `date`, `tag`) VALUES
(6, 'Hello', 'Coucou', '', '2019-05-28 13:07:22', NULL),
(9, 'Hello', 'Coucou', 'Test5', '2019-05-28 13:54:39', NULL),
(12, 'J\'ai une question', 'Salut à tous je me demandais si ce que j\'étais en train de faire est vraiment utile ou non... Je suis déjà en retard sur le planning de la soirée', 'Test4', '2019-05-28 18:35:26', NULL),
(15, 'Test', 'Test', 'Test6', '2019-05-30 10:40:14', NULL),
(16, 'Test', 'Test', 'Test6', '2019-05-30 10:40:17', NULL),
(17, 'Test', 'Test', 'Test6', '2019-05-30 10:40:19', NULL),
(18, 'Test', 'Test', 'Test6', '2019-05-30 10:40:21', NULL),
(19, '', '', 'Test4', '2019-05-30 13:52:32', NULL),
(20, 'Test', 'test', 'Test4', '2019-05-30 13:53:31', NULL),
(21, 'qdsfgh', 'qsdfgh', 'Test4', '2019-05-30 13:54:29', NULL),
(22, 'Hello', 'GGGGG', 'Test4', '2019-05-30 14:10:41', NULL),
(24, 'Test catégorie', 'TESTSTSTSTSTTSTSS', 'Test4', '2019-05-30 14:14:00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
                      `id` int(11) NOT NULL,
                      `label` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `label`) VALUES
(1, 'Outils Design'),
(2, 'HTML5 / CSS'),
(3, 'JavaScript'),
(4, 'PHP'),
(5, 'Node.js'),
(6, 'MySQL'),
(7, 'UI / UX'),
(8, 'Stage / Alternance'),
(9, 'Autre'),
(10, 'Web Design');

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
(23, 'Test4@hetic.net', 'Test4', 'user', '$2y$10$wiNoxUt7OKD9HZnCZRtJReOiNG0JrWE4fcTyEqnwokINO0c6sbPWC'),
(24, 'test5@hetic.net', 'Test5', 'user', '$2y$10$8u3GLme1cEO5R47pAnyfnuxgV6PJCo6Lc8Pi8Z/GeSBHFUHCtTTs2'),
(25, 'samir.chalal@hetic.net', 'tareum', 'user', '$2y$10$VwjdkUeQ9S304dsI2CQBW.AWl/0.i1NVo/mOQiLdl3dTrbHiwYfua');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
                       `id` int(11) NOT NULL,
                       `ref_id` int(11) NOT NULL,
                       `ref` varchar(20) NOT NULL,
                       `user` varchar(20) NOT NULL,
                       `vote` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `ref_id`, `ref`, `user`, `vote`) VALUES
(22, 12, 'post', 'Test5', 'down'),
(23, 9, 'post', 'Test5', 'down'),
(24, 6, 'post', 'Test5', 'down'),
(25, 12, 'post', 'Test4', 'down'),
(26, 9, 'post', 'Test4', 'down'),
(27, 6, 'post', 'Test4', 'down'),
(28, 6, 'post', 'tareum', 'up'),
(29, 12, 'post', 'tareum', 'up'),
(30, 12, 'post', 'Test6', 'up'),
(31, 9, 'post', 'Test6', 'up'),
(32, 6, 'post', 'Test6', 'up'),
(33, 25, 'post', 'Test4', 'up'),
(34, 18, 'post', 'Test4', 'up'),
(35, 20, 'post', 'Test4', 'down');

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
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
