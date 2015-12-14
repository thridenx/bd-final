-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Dec 10, 2015 at 01:08 AM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `bd`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chat_id` int(11) NOT NULL,
  `name` varchar(11) COLLATE latin1_general_cs DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chat_id`, `name`) VALUES
(1, '0'),
(2, 'teamchat');

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE `meeting` (
  `meeting_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `chat_id` int(11) NOT NULL,
  `name` varchar(30) COLLATE latin1_general_cs NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `meeting`
--

INSERT INTO `meeting` (`meeting_id`, `user_id`, `team_id`, `chat_id`, `name`, `date`, `time`, `creation`) VALUES
(1, 2, 5, 2, 'Reunião de Emprego', '2015-12-09', '07:00:00', '2015-12-08 01:43:03');

-- --------------------------------------------------------

--
-- Table structure for table `meeting_topic`
--

CREATE TABLE `meeting_topic` (
  `meeting_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `meeting_topic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `message` text COLLATE latin1_general_cs NOT NULL,
  `chat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `team_id` int(11) NOT NULL,
  `name` varchar(30) COLLATE latin1_general_cs NOT NULL,
  `chat_id` int(11) NOT NULL,
  `workfield` varchar(30) COLLATE latin1_general_cs NOT NULL,
  `skills` text COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`team_id`, `name`, `chat_id`, `workfield`, `skills`) VALUES
(5, 'teamarizona', 1, 'design', 'graphic design and coding skillz');

-- --------------------------------------------------------

--
-- Table structure for table `team_user`
--

CREATE TABLE `team_user` (
  `relacao_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `team_user`
--

INSERT INTO `team_user` (`relacao_id`, `team_id`, `user_id`) VALUES
(1, 5, 2),
(3, 5, 3),
(4, 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `topic_id` int(11) NOT NULL,
  `task_description` text COLLATE latin1_general_cs,
  `done` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `name` varchar(70) COLLATE latin1_general_cs NOT NULL,
  `username` varchar(70) COLLATE latin1_general_cs NOT NULL,
  `email` varchar(80) COLLATE latin1_general_cs NOT NULL,
  `password` varchar(16) COLLATE latin1_general_cs NOT NULL,
  `birth` date DEFAULT NULL,
  `sex` varchar(10) COLLATE latin1_general_cs NOT NULL,
  `photo` varchar(1000) COLLATE latin1_general_cs NOT NULL,
  `website` varchar(100) COLLATE latin1_general_cs DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `username`, `email`, `password`, `birth`, `sex`, `photo`, `website`) VALUES
(2, 'Sérgio', 'thridenx', 'thridenx@hotmail.com', '123', '1994-04-12', 'male', '', NULL),
(3, 'Jéssica que não acabou', 'jekas', 'jekas@lalala.com', 'jekona', '2015-12-01', 'fêmea', '', NULL),
(4, 'Troy', 'boytoynamedtroy', 'troyzito@ratos.com', 'ratacona', '1994-04-13', 'macho', '', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `meeting`
--
ALTER TABLE `meeting`
  ADD PRIMARY KEY (`meeting_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `team_id` (`team_id`),
  ADD KEY `chat_id` (`chat_id`),
  ADD KEY `chat_id_2` (`chat_id`),
  ADD KEY `chat_id_3` (`chat_id`),
  ADD KEY `chat_id_4` (`chat_id`),
  ADD KEY `chat_id_5` (`chat_id`);

--
-- Indexes for table `meeting_topic`
--
ALTER TABLE `meeting_topic`
  ADD PRIMARY KEY (`meeting_topic_id`),
  ADD KEY `meeting_id` (`meeting_id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `chat_id` (`chat_id`,`user_id`),
  ADD KEY `chat_id_2` (`chat_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`team_id`),
  ADD KEY `chat_id` (`chat_id`);

--
-- Indexes for table `team_user`
--
ALTER TABLE `team_user`
  ADD PRIMARY KEY (`relacao_id`),
  ADD KEY `team_id` (`team_id`),
  ADD KEY `team_id_2` (`team_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`topic_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `meeting`
--
ALTER TABLE `meeting`
  MODIFY `meeting_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `meeting_topic`
--
ALTER TABLE `meeting_topic`
  MODIFY `meeting_topic_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `team_user`
--
ALTER TABLE `team_user`
  MODIFY `relacao_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `meeting`
--
ALTER TABLE `meeting`
  ADD CONSTRAINT `meeting_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `meeting_ibfk_2` FOREIGN KEY (`team_id`) REFERENCES `team` (`team_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `meeting_ibfk_3` FOREIGN KEY (`chat_id`) REFERENCES `chat` (`chat_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `meeting_topic`
--
ALTER TABLE `meeting_topic`
  ADD CONSTRAINT `meeting_topic_ibfk_1` FOREIGN KEY (`meeting_id`) REFERENCES `meeting` (`meeting_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `meeting_topic_ibfk_2` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`topic_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`chat_id`) REFERENCES `chat` (`chat_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `team_ibfk_1` FOREIGN KEY (`chat_id`) REFERENCES `chat` (`chat_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `team_user`
--
ALTER TABLE `team_user`
  ADD CONSTRAINT `team_user_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `team` (`team_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `team_user_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE;
