-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 22, 2017 at 11:06 PM
-- Server version: 5.1.73
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kumar_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `Blog_Post`
--

CREATE TABLE IF NOT EXISTS `Blog_Post` (
  `id` int(20) NOT NULL AUTO_INCREMENT COMMENT 'post id number',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'posts',
  `bodypost` varchar(5000) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Post body',
  `username` varchar(40) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Author of post',
  `date` varchar(40) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Date of post',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1009 ;

--
-- Dumping data for table `Blog_Post`
--

INSERT INTO `Blog_Post` (`id`, `title`, `bodypost`, `username`, `date`) VALUES
(1000, 'Intro', 'Hi everyone, welcome to the site', 'veniik', '2017-01-07'),
(1001, 'Turtle', 'Hulk!', 'jaykay07', '2017-05-13'),
(1002, 'Last Week!', 'So. Much. Math.', 'brianl', '2017-05-15 10:34:53'),
(1003, 'Star Wars Rocks!', 'Jedi yo....', 'brianl', '2017-02-20'),
(1004, 'Talking Dead', 'Carl, get in the house', 'veniik', '2017-02-16'),
(1005, 'Yo', 'Finals are rough....', 'brianl', '2017-05-15 20:43:46'),
(1006, 'junk', 'hi', 'brianl', '6/24/2018'),
(1007, 'FIrst Final', 'Is over with', 'brianl', '05/22/2017'),
(1008, 'Linear', 'We rocked it!', 'brianl', '05/22/2017');

-- --------------------------------------------------------

--
-- Table structure for table `blog_post_old`
--

CREATE TABLE IF NOT EXISTS `blog_post_old` (
  `id` int(20) NOT NULL COMMENT 'Post ID',
  `blog_id` int(20) NOT NULL COMMENT 'Blog Posts',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Titles',
  `bodypost` varchar(5000) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Body of posts',
  `author` varchar(40) COLLATE utf8_unicode_ci NOT NULL COMMENT 'User that wrote the post',
  `date` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Date/Time of post creation',
  PRIMARY KEY (`blog_id`),
  KEY `Author` (`author`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blog_post_old`
--

INSERT INTO `blog_post_old` (`id`, `blog_id`, `title`, `bodypost`, `author`, `date`) VALUES
(1000, 0, 'Intro', 'Hello there', 'veniik', '3/7/17'),
(1001, 1001, 'Turtle', 'Hulk!', 'jaykay07', '5/13/17'),
(0, 1002, 'Last Week of Spring Semester ''17', 'So. Much. Math.', 'brianl', '5/15/17'),
(0, 1003, 'Star Wars Rocks!', 'Jedi yo....', 'brianl', '2/20/17'),
(0, 1004, 'Talking Dead', 'Carl, get in the house', 'veniik', '2/16/17');

-- --------------------------------------------------------

--
-- Table structure for table `Comments`
--

CREATE TABLE IF NOT EXISTS `Comments` (
  `comment_id` int(20) NOT NULL AUTO_INCREMENT COMMENT 'Comment ID Number',
  `commentuser` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Name of user commenting',
  `bodycomment` varchar(5000) COLLATE utf8_unicode_ci NOT NULL COMMENT 'body of comment',
  `postid` int(11) NOT NULL COMMENT 'Post ID that comment is about',
  `date` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'date of comment',
  PRIMARY KEY (`comment_id`),
  KEY `Commentator` (`commentuser`,`postid`),
  KEY `reply_to_post_id` (`postid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9007 ;

--
-- Dumping data for table `Comments`
--

INSERT INTO `Comments` (`comment_id`, `commentuser`, `bodycomment`, `postid`, `date`) VALUES
(0, 'veniik', 'Franklin!', 1001, ''),
(2001, 'veniik', 'Tell me about it', 1002, ''),
(2002, 'jaykay07', 'y tho', 1002, ''),
(2003, 'brianl', 'Hulk smash!', 1001, ''),
(2004, 'neel5', 'Don''t drop it!', 1001, ''),
(8000, 'veniik', 'this is redic', 1005, '05/17/2017'),
(9000, 'brianl', 'hi! ', 1002, '05/17/2017'),
(9001, 'brianl', 'hi! ', 1002, '05/17/2017'),
(9002, 'brianl', 'and sith!', 1003, '05/17/2017'),
(9003, 'brianl', 'kjhkjg', 1005, '05/18/2017'),
(9004, 'brianl', 'Comment!', 1005, '05/18/2017'),
(9005, 'brianl', 'BAD COMMENT!', 1005, '05/22/2017'),
(9006, 'brianl', 'kjhfgjhgf', 1006, '05/22/2017');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `username` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'Usernames',
  `password` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'Passwords',
  `email_address` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'emails',
  `nickname` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'nicks',
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Users table';

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`username`, `password`, `email_address`, `nickname`) VALUES
('brianl', '327156ab287c6aa52c8670e13163fc1bf660add4', 'brianl@gmail.com', 'slamchez'),
('jaykay07', 'f76aabe36942b84306e88fe58f2e97f0d3f40d2a', 'jaykay07@gmail.com', 'jan'),
('neel5', 'a4b581b397d4fbc2bb4fbf28ac0d1fadc519bec7', 'neel5@gmail.com', 'neel'),
('rick_carl', '7877c971705637d5eafe695cb01aabaf2f259a47', 'rick_carl@gmail.com', 'duo'),
('veniik', 'eea6d925dc0bb4534d54d041f7f9d4b138b07907', 'veniik@gmail.com', 'venii');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_post_old`
--
ALTER TABLE `blog_post_old`
  ADD CONSTRAINT `blog_post_old_ibfk_1` FOREIGN KEY (`Author`) REFERENCES `Users` (`username`);

--
-- Constraints for table `Comments`
--
ALTER TABLE `Comments`
  ADD CONSTRAINT `Comments_ibfk_1` FOREIGN KEY (`commentuser`) REFERENCES `Users` (`username`),
  ADD CONSTRAINT `Comments_ibfk_2` FOREIGN KEY (`postid`) REFERENCES `Blog_Post` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
