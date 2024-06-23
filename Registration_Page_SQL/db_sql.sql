-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

-- --------------------------------------------------------

--
-- Table structure for table `signup_registrationform`
--

CREATE TABLE `signup_registrationform01` (
--   `id` int(11) NOT NULL AUTO_INCREMENT,
  `First_Name` VARCHAR(255) NOT NULL,
  `Last_Name` VARCHAR(255) NOT NULL,
  `Address1` VARCHAR(255) NOT NULL,
  `Address2` VARCHAR(255) NOT NULL,
  `City` VARCHAR(255) NOT NULL,
  `State` VARCHAR(255) NOT NULL,
  `Postal_Code` VARCHAR(20) NOT NULL,
  `Phone_No` VARCHAR(20) NOT NULL,
  `Email_Address` VARCHAR(255) NOT NULL,
  `Reference` TEXT NOT NULL,
  `Feedback` TEXT NOT NULL,
  `Suggestions` TEXT NOT NULL,
  `Recommend` TEXT NOT NULL,
  `Reference1_Name` VARCHAR(255) NOT NULL,
  `Reference1_Address` VARCHAR(255) NOT NULL,
  `Reference1_Contact` VARCHAR(20) NOT NULL,
  `Reference2_Name` VARCHAR(255) NOT NULL,
  `Reference2_Address` VARCHAR(255) NOT NULL,
  `Reference2_Contact` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`First_Name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;
