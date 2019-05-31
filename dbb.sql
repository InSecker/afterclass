-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 31, 2019 at 12:27 PM
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
(46, 'API YouTube API problem with insert to database', 'I wanted to make a connection to Youtube analytics which writes data to the database can be mysql or mariodb. Unfortunately, I have a problem with automatic authorization, you have a solution to this problem. It can be a script in php.\r\n\r\nSkorzystałem z kodu Harvey Connor: YouTube Analytics API php Samples', 'Pierre', '2019-05-31 12:00:15', 4),
(47, 'Selecting an element not next to an element?', 'Currently i am trying to animate a div. I want to try and start the div using the :checked pseudo. I don\'t want the div I am transforming to be right next to the checkbox(for aesthetic reasons). So I currently have two div\'s that I am using. One for the checkbox and the other as a stage to play div\'s I want to animate/transform.\r\n\r\nI know you can select elements that are below another element as long as they are the child of the same element using, div + div{}.\r\n\r\nBut I am wondering if there is another way to select any element after a pseudo element goes into affect on another element(that is not in the same parent)?\r\n\r\nPure CSS or SCSS if their is a way. I know with Jquery I can easily do what I want but I want to stay away from JS for now, if there is another way.', 'Pierre', '2019-05-31 12:01:21', 2),
(48, 'Is node js Node js code visible to client side', 'I heard that node js can be used in server side. I used jsp before. Inside jsp page java code is invisible to client. If node js is just javascript, then how it remains invisible to client?', 'Pierre', '2019-05-31 12:03:19', 5),
(49, 'echo php', 'Salut\r\n\r\ncomment marche le echo en PHP ?\r\n\r\n<?php echo \"salut\";?>', 'teddylebg', '2019-05-31 12:17:00', 4);

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
(26, 'pierre.secher@hetic.net', 'Pierre', 'user', '$2y$10$jhdbAXuIw999Xo0zjOrzree6etQql0rLm2BDdz9J7yoRFgyxNDPI6'),
(27, 'samir94@hetic.net', 'Samir', 'user', '$2y$10$eNXfUn6TujdGsxY9XJ1afOkr8X/t2W/LmN57Us1YMq3Csd9FBN98y'),
(29, 'teddyboirin@hetic.net', 'teddylebg', 'user', '$2y$10$xynBxyQdMYI7PspLM6WYlO3tw3CYaaWQw2SyfoIcBby3KrvVsFBVe');

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
(35, 20, 'post', 'Test4', 'down'),
(36, 26, 'post', 'tareum', 'down'),
(37, 24, 'post', 'tareum', 'down'),
(38, 9, 'post', 'tareum', 'up'),
(39, 27, 'post', 'tareum', 'down'),
(40, 22, 'post', 'tareum', 'up'),
(41, 48, 'post', 'Pierre', 'up'),
(42, 47, 'post', 'Pierre', 'up'),
(43, 46, 'post', 'Pierre', 'up'),
(44, 48, 'post', 'Samir', 'up'),
(45, 47, 'post', 'teddylebg', 'up');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
