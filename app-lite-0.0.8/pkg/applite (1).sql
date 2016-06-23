-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2016 at 10:56 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `applite`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `fill_date_dimension`(IN startdate DATE,IN stopdate DATE)
BEGIN
    DECLARE currentdate DATE;
    SET currentdate = startdate;
    WHILE currentdate < stopdate DO
        INSERT INTO time_dimension VALUES (
                        YEAR(currentdate)*10000+MONTH(currentdate)*100 + DAY(currentdate),
                        currentdate,
                        YEAR(currentdate),
                        MONTH(currentdate),
                        DAY(currentdate),
                        QUARTER(currentdate),
                        WEEKOFYEAR(currentdate),
                        DATE_FORMAT(currentdate,'%W'),
                        DATE_FORMAT(currentdate,'%M'),
                        'f',
                        CASE DAYOFWEEK(currentdate) WHEN 1 THEN 't' WHEN 7 then 't' ELSE 'f' END,
                        NULL);
        SET currentdate = ADDDATE(currentdate,INTERVAL 1 DAY);
    END WHILE;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
`id` bigint(20) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `acct_no` varchar(20) NOT NULL,
  `acct_name` varchar(20) NOT NULL,
  `acct_type` varchar(20) NOT NULL,
  `acct_balance` varchar(20) NOT NULL,
  `acct_web` varchar(20) NOT NULL,
  `acct_email` varchar(20) NOT NULL,
  `acct_address` varchar(20) NOT NULL,
  `acct_city` varchar(20) NOT NULL,
  `acct_state` varchar(20) NOT NULL,
  `acct_country` varchar(20) NOT NULL,
  `acct_postal_code` varchar(20) NOT NULL,
  `acct_phone` varchar(20) NOT NULL,
  `acct_created` varchar(20) NOT NULL,
  `acct_updated` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='viaCodeWriter' AUTO_INCREMENT=6 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `user_id`, `acct_no`, `acct_name`, `acct_type`, `acct_balance`, `acct_web`, `acct_email`, `acct_address`, `acct_city`, `acct_state`, `acct_country`, `acct_postal_code`, `acct_phone`, `acct_created`, `acct_updated`) VALUES
(1, '', '12345', 'Joe Garage', '', '', '', '', '', 'Atalanta', '', '', '', '', '', ''),
(2, '', '', 'Mack', '', '', '', '', '', 'Miami', '', '', '', '', '', ''),
(3, '', '', 'Bforte', 'Administrator', '555', '', 'bayon@gocodigo.com', '', '', '', '', '', '', '', ''),
(4, '', '3333', 'zombie', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, 'asdf', 'asdf', 'asdf', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` bigint(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `app_id` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `settings_id` varchar(20) NOT NULL,
  `acct_id` varchar(20) NOT NULL,
  `dt_created` varchar(20) NOT NULL,
  `dt_modified` varchar(20) NOT NULL,
  `parent_id` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='viaCodeWriter' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `app_id`, `username`, `password`, `settings_id`, `acct_id`, `dt_created`, `dt_modified`, `parent_id`) VALUES
(1, '', '', 'bforte', 'bforte', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `admin_old`
--

CREATE TABLE IF NOT EXISTS `admin_old` (
`id` bigint(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `app_id` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `settings_id` varchar(20) NOT NULL,
  `acct_id` varchar(20) NOT NULL,
  `dt_created` varchar(20) NOT NULL,
  `dt_modified` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='viaCodeWriter' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin_old`
--

INSERT INTO `admin_old` (`id`, `name`, `app_id`, `username`, `password`, `settings_id`, `acct_id`, `dt_created`, `dt_modified`) VALUES
(1, 'bayonforte', '', 'bforte', 'bforte', '', '3', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `bigdog`
--

CREATE TABLE IF NOT EXISTS `bigdog` (
`id` bigint(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `thing1` varchar(20) NOT NULL,
  `thing2` varchar(20) NOT NULL,
  `parent_id` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='viaCodeWriter' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `bigdog`
--

INSERT INTO `bigdog` (`id`, `name`, `thing1`, `thing2`, `parent_id`) VALUES
(1, 'red', '', '', ''),
(2, 'blue', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `littledog`
--

CREATE TABLE IF NOT EXISTS `littledog` (
`id` bigint(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `thing1` varchar(20) NOT NULL,
  `thing2` varchar(20) NOT NULL,
  `parent_id` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='viaCodeWriter' AUTO_INCREMENT=6 ;

--
-- Dumping data for table `littledog`
--

INSERT INTO `littledog` (`id`, `name`, `thing1`, `thing2`, `parent_id`) VALUES
(1, 'little blue', '', '', '2'),
(2, 'little red', '', '', '1'),
(3, 'little blue green', '', '', '2'),
(4, 'aqua', '', '', '2'),
(5, 'asdfasdfasdf', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` bigint(20) NOT NULL,
  `app_id` bigint(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `settings_id` bigint(20) NOT NULL,
  `contact_id` bigint(20) NOT NULL,
  `date` date NOT NULL,
  `last_modified` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='viaCodeWriter' AUTO_INCREMENT=9 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `app_id`, `username`, `password`, `settings_id`, `contact_id`, `date`, `last_modified`) VALUES
(6, 1001, 'joe_user', 'pass', 0, 0, '0000-00-00', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_old`
--
ALTER TABLE `admin_old`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bigdog`
--
ALTER TABLE `bigdog`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `littledog`
--
ALTER TABLE `littledog`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `admin_old`
--
ALTER TABLE `admin_old`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `bigdog`
--
ALTER TABLE `bigdog`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `littledog`
--
ALTER TABLE `littledog`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
