-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2023 at 11:57 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pt_sumber_phoenix`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adm_id` int(11) NOT NULL,
  `adm_name` varchar(50) NOT NULL,
  `adm_email` varchar(255) NOT NULL,
  `adm_join_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `adm_password` text NOT NULL,
  `master` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adm_id`, `adm_name`, `adm_email`, `adm_join_date`, `adm_password`, `master`) VALUES
(1, 'admin', 'admin@gmail.com', '2022-11-18 07:12:30', '$2y$10$i5usiBxAtRVugFL6G4RbP.cmdRXTsmhF5SGACFq8Gm9v83N0EIUn6', 1),
(6, 'matthew', 'matthew@gmail.com', '2022-11-18 08:16:52', '$2y$10$sx7AUzxv0eh3WTUucIR8WeYPBHHQse1HL6g1mIkj0f2yfliOZefY.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_log`
--

CREATE TABLE `admin_log` (
  `log_id` int(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `log_desc` text NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `admin_id` int(11) NOT NULL,
  `prev_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_log`
--

INSERT INTO `admin_log` (`log_id`, `action`, `log_desc`, `time`, `admin_id`, `prev_data`) VALUES
(71, 'add product', 'admin has added a product with the code PC9', '2023-05-12 14:25:05', 1, 'PC9'),
(72, 'add product', 'admin has added a product with the code PC9', '2023-05-12 14:25:05', 1, 'PC9'),
(73, 'add product', 'admin has added a product with the code PC9', '2023-05-12 14:25:05', 1, 'PC9'),
(74, 'add product', 'admin has added a product with the code PC9', '2023-05-12 14:25:05', 1, 'PC9'),
(75, 'delete product', 'admin has delete a product with the code AP', '2023-05-13 18:40:28', 1, 'AP'),
(76, 'edit product', 'admin has edited a product with the code 20', '2023-05-13 21:05:46', 1, '20'),
(77, 'edit product', 'admin has edited a product with the code 20', '2023-05-13 21:05:46', 1, '20'),
(78, 'edit product', 'admin has edited a product with the code 20', '2023-05-13 21:05:46', 1, '20'),
(79, 'edit product', 'admin has edited a product with the code 20', '2023-05-13 21:05:46', 1, '20'),
(80, 'edit product', 'admin has edited a product with the code 20', '2023-05-13 21:05:46', 1, '20'),
(81, 'edit product', 'admin has edited a product with the code 20', '2023-05-13 21:05:46', 1, '20'),
(82, 'edit product', 'admin has edited a product with the code 20', '2023-05-13 21:07:41', 1, '20'),
(83, 'edit product', 'admin has edited a product with the code 20', '2023-05-13 21:07:41', 1, '20'),
(84, 'edit product', 'admin has edited a product with the code 20', '2023-05-13 21:07:41', 1, '20'),
(85, 'edit product', 'admin has edited a product with the code 20', '2023-05-13 21:07:41', 1, '20'),
(86, 'edit product', 'admin has edited a product with the code 20', '2023-05-13 21:07:41', 1, '20'),
(87, 'edit product', 'admin has edited a product with the code 20', '2023-05-13 21:07:41', 1, '20'),
(88, 'edit product', 'admin has edited a product with the code 20', '2023-05-13 21:11:01', 1, '20'),
(89, 'edit product', 'admin has edited a product with the code 20', '2023-05-13 21:11:01', 1, '20'),
(90, 'edit product', 'admin has edited a product with the code 20', '2023-05-13 21:11:01', 1, '20'),
(91, 'edit product', 'admin has edited a product with the code 20', '2023-05-13 21:11:01', 1, '20'),
(92, 'edit product', 'admin has edited a product with the code 20', '2023-05-13 21:11:01', 1, '20'),
(93, 'edit product', 'admin has edited a product with the code 20', '2023-05-13 21:11:01', 1, '20'),
(94, 'edit product', 'admin has edited a product with the code 20', '2023-05-13 21:17:37', 1, '20'),
(95, 'edit product', 'admin has edited a product with the code 20', '2023-05-13 21:17:37', 1, '20'),
(96, 'edit product', 'admin has edited a product with the code 20', '2023-05-13 21:17:37', 1, '20'),
(97, 'edit product', 'admin has edited a product with the code 20', '2023-05-13 21:17:37', 1, '20'),
(98, 'edit product', 'admin has edited a product with the code 20', '2023-05-13 21:17:37', 1, '20'),
(99, 'edit product', 'admin has edited a product with the code 20', '2023-05-13 21:17:37', 1, '20'),
(100, 'edit product', 'admin has edited a product with the code 20', '2023-05-13 21:19:18', 1, '20'),
(101, 'edit product', 'admin has edited a product with the code 20', '2023-05-13 21:19:18', 1, '20'),
(102, 'edit product', 'admin has edited a product with the code 20', '2023-05-13 21:19:18', 1, '20'),
(103, 'edit product', 'admin has edited a product with the code 20', '2023-05-13 21:19:18', 1, '20'),
(104, 'edit product', 'admin has edited a product with the code 20', '2023-05-13 21:19:18', 1, '20'),
(105, 'edit product', 'admin has edited a product with the code 20', '2023-05-13 21:19:18', 1, '20'),
(106, 'edit product', 'admin has edited a product with the code 20', '2023-05-13 21:20:37', 1, '20'),
(107, 'edit product', 'admin has edited a product with the code 20', '2023-05-13 21:20:37', 1, '20'),
(108, 'edit product', 'admin has edited a product with the code 20', '2023-05-13 21:20:37', 1, '20'),
(109, 'edit product', 'admin has edited a product with the code 20', '2023-05-13 21:20:37', 1, '20'),
(110, 'edit product', 'admin has edited a product with the code 20', '2023-05-13 21:20:37', 1, '20'),
(111, 'edit product', 'admin has edited a product with the code 20', '2023-05-13 21:20:37', 1, '20'),
(112, 'edit product', 'admin has edited a product with the code 20', '2023-05-13 21:22:50', 1, '20'),
(113, 'edit product', 'admin has edited a product with the code 20', '2023-05-13 21:22:50', 1, '20'),
(114, 'edit product', 'admin has edited a product with the code 20', '2023-05-13 21:22:50', 1, '20'),
(115, 'edit product', 'admin has edited a product with the code 20', '2023-05-13 21:22:50', 1, '20'),
(116, 'edit product', 'admin has edited a product with the code 20', '2023-05-13 21:22:50', 1, '20'),
(117, 'edit product', 'admin has edited a product with the code 20', '2023-05-13 21:22:50', 1, '20'),
(118, 'edit product', 'admin has edited a product with the code 9', '2023-05-13 21:23:29', 1, '9'),
(119, 'edit product', 'admin has edited a product with the code 9', '2023-05-13 21:23:29', 1, '9'),
(120, 'edit product', 'admin has edited a product with the code 9', '2023-05-13 21:23:29', 1, '9'),
(121, 'edit product', 'admin has edited a product with the code 5', '2023-05-13 21:31:42', 1, '5'),
(122, 'add product', 'admin has added a product with the code PS11', '2023-05-13 21:34:12', 1, 'PS11'),
(123, 'add product', 'admin has added a product with the code PS11', '2023-05-13 21:34:12', 1, 'PS11'),
(124, 'add product', 'admin has added a product with the code PS11', '2023-05-13 21:34:12', 1, 'PS11'),
(125, 'add product', 'admin has added a product with the code PS11', '2023-05-13 21:34:12', 1, 'PS11'),
(126, 'edit product', 'admin has edited a product with the code 21', '2023-05-13 21:34:59', 1, '21'),
(127, 'edit product', 'admin has edited a product with the code 21', '2023-05-13 21:38:14', 1, '21'),
(128, 'edit product', 'admin has edited a product with the code 21', '2023-05-13 21:38:14', 1, '21'),
(129, 'edit product', 'admin has edited a product with the code 21', '2023-05-13 21:38:46', 1, '21'),
(130, 'edit product', 'admin has edited a product with the code 21', '2023-05-13 21:38:46', 1, '21'),
(131, 'edit product', 'admin has edited a product with the code 21', '2023-05-13 21:38:46', 1, '21'),
(132, 'update', 'admin updated address', '2023-07-12 14:10:19', 1, 'Jl. Raya Serpong Km. 7 - Pakulonan Serpong Utara - Tanggerang Selatan Indonesia - 10000'),
(133, 'update', 'admin updated email', '2023-07-12 14:10:23', 1, 'phoenix-spm@sumberphoenix.co.id  '),
(134, 'delete category', 'admin has delete a category named CII', '2023-07-12 14:12:04', 1, 'CII'),
(135, 'delete category', 'admin has delete a category named AS', '2023-07-12 14:12:08', 1, 'AS'),
(136, 'delete category', 'admin has delete a category named CB', '2023-07-12 14:12:13', 1, 'CB'),
(137, 'delete category', 'admin has delete a category named DC', '2023-07-12 14:12:18', 1, 'DC'),
(138, 'delete category', 'admin has delete a category named NC', '2023-07-12 14:12:21', 1, 'NC'),
(139, 'delete category', 'admin has delete a category named OI', '2023-07-12 14:12:25', 1, 'OI'),
(140, 'delete category', 'admin has delete a category named PI', '2023-07-12 14:12:29', 1, 'PI'),
(141, 'delete category', 'admin has delete a category named RI', '2023-07-12 14:12:32', 1, 'RI'),
(142, 'delete category', 'admin has delete a category named TEST', '2023-07-12 14:12:35', 1, 'TEST'),
(143, 'delete product', 'admin has delete a product with the code PS11', '2023-07-12 14:12:40', 1, 'PS11'),
(144, 'delete product', 'admin has delete a product with the code PC9', '2023-07-12 14:12:43', 1, 'PC9'),
(145, 'delete product', 'admin has delete a product with the code PD11', '2023-07-12 14:12:45', 1, 'PD11'),
(146, 'delete product', 'admin has delete a product with the code SAS', '2023-07-12 14:12:48', 1, 'SAS'),
(147, 'delete product', 'admin has delete a product with the code MR', '2023-07-12 14:12:50', 1, 'MR'),
(148, 'delete product', 'admin has delete a product with the code DMPL', '2023-07-12 14:12:53', 1, 'DMPL'),
(149, 'delete product', 'admin has delete a product with the code RS1', '2023-07-12 14:12:55', 1, 'RS1'),
(150, 'delete product', 'admin has delete a product with the code MRA', '2023-07-12 14:12:57', 1, 'MRA'),
(151, 'delete product', 'admin has delete a product with the code PLA', '2023-07-12 14:13:00', 1, 'PLA'),
(152, 'delete product', 'admin has delete a product with the code SA', '2023-07-12 14:13:02', 1, 'SA'),
(153, 'delete product', 'admin has delete a product with the code AS', '2023-07-12 14:13:05', 1, 'AS'),
(154, 'delete product', 'admin has delete a product with the code PD', '2023-07-12 14:13:07', 1, 'PD'),
(155, 'delete product', 'admin has delete a product with the code NR', '2023-07-12 14:13:09', 1, 'NR'),
(156, 'delete product', 'admin has delete a product with the code SR', '2023-07-12 14:13:12', 1, 'SR'),
(157, 'delete product', 'admin has delete a product with the code SILANE', '2023-07-12 14:13:14', 1, 'SILANE'),
(158, 'add category', 'admin has added a category named Plastic Industries', '2023-07-12 14:15:59', 1, 'Plastic Industries'),
(159, 'delete category', 'admin has delete a category named PI', '2023-07-12 14:18:39', 1, 'PI'),
(160, 'delete category', 'admin has delete a category named DC', '2023-07-12 14:19:10', 1, 'DC'),
(161, 'delete category', 'admin has delete a category named PI', '2023-07-12 14:20:14', 1, 'PI'),
(162, 'add category', 'admin has added a category named Plastic Industries', '2023-07-12 14:20:36', 1, 'Plastic Industries'),
(163, 'add category', 'admin has added a category named Die Casting', '2023-07-12 14:20:51', 1, 'Die Casting'),
(164, 'add category', 'admin has added a category named Acrylic Sheet', '2023-07-12 14:22:59', 1, 'Acrylic Sheet'),
(165, 'add category', 'admin has added a category named Machinery', '2023-07-12 14:23:45', 1, 'Machinery'),
(166, 'add category', 'admin has added a category named Other Industry', '2023-07-12 14:25:03', 1, 'Other Industry'),
(167, 'add subcategory', 'admin has added a subcategori named Personal Care', '2023-07-12 14:25:26', 1, 'Personal Care'),
(168, 'add subcategory', 'admin has added a subcategori named Fibre Glass', '2023-07-12 14:25:40', 1, 'Fibre Glass'),
(169, 'add subcategory', 'admin has added a subcategori named Concret Additive', '2023-07-12 14:25:58', 1, 'Concret Additive'),
(170, 'delete category', 'admin has delete a category named SM', '2023-07-12 14:26:26', 1, 'SM'),
(171, 'add category', 'admin has added a category named Service Maintenance', '2023-07-12 14:29:14', 1, 'Service Maintenance'),
(172, 'add product', 'admin has added a product with the code SCA', '2023-07-12 14:42:41', 1, 'SCA'),
(173, 'reorder category', 'admin has reordered the category.', '2023-07-12 14:43:06', 1, ''),
(174, 'add subcategory', 'admin has added a subcategori named Rubber', '2023-07-12 14:43:55', 1, 'Rubber'),
(175, 'edit product', 'admin has edited a product with the code 22', '2023-07-12 14:44:08', 1, '22'),
(176, 'reorder category', 'admin has reordered the category.', '2023-07-12 14:44:37', 1, ''),
(177, 'add product', 'admin has added a product with the code SR', '2023-07-12 14:48:31', 1, 'SR'),
(178, 'add product', 'admin has added a product with the code NR', '2023-07-12 14:52:34', 1, 'NR'),
(179, 'add product', 'admin has added a product with the code RR', '2023-07-12 14:54:57', 1, 'RR'),
(180, 'add product', 'admin has added a product with the code MRA', '2023-07-12 15:01:35', 1, 'MRA'),
(181, 'add product', 'admin has added a product with the code SA', '2023-07-12 15:04:08', 1, 'SA'),
(182, 'add subcategory', 'admin has added a subcategori named Plastic Additives', '2023-07-12 16:06:02', 1, 'Plastic Additives'),
(183, 'add subcategory', 'admin has added a subcategori named Resins', '2023-07-12 16:06:27', 1, 'Resins'),
(184, 'add subcategory', 'admin has added a subcategori named Speciality Fillers', '2023-07-12 16:06:43', 1, 'Speciality Fillers'),
(185, 'add subcategory', 'admin has added a subcategori named Plastic Compounds', '2023-07-12 16:07:05', 1, 'Plastic Compounds'),
(186, 'add subcategory', 'admin has added a subcategori named Plastic Processing Aids', '2023-07-12 16:07:22', 1, 'Plastic Processing Aids'),
(187, 'add product', 'admin has added a product with the code PD', '2023-07-12 16:14:12', 1, 'PD'),
(188, 'add product', 'admin has added a product with the code AS', '2023-07-12 16:16:49', 1, 'AS'),
(189, 'add product', 'admin has added a product with the code SA1', '2023-07-12 16:23:16', 1, 'SA1'),
(190, 'edit product', 'admin has edited a product with the code 26', '2023-07-12 16:23:46', 1, '26'),
(191, 'edit product', 'admin has edited a product with the code 26', '2023-07-12 16:23:46', 1, '26'),
(192, 'add product', 'admin has added a product with the code ER', '2023-07-12 16:26:43', 1, 'ER'),
(193, 'add product', 'admin has added a product with the code PR', '2023-07-12 16:28:03', 1, 'PR'),
(194, 'add product', 'admin has added a product with the code PR1', '2023-07-12 16:29:13', 1, 'PR1'),
(195, 'edit product', 'admin has edited a product with the code 27', '2023-07-12 16:30:28', 1, '27'),
(196, 'edit product', 'admin has edited a product with the code 27', '2023-07-12 16:30:40', 1, '27'),
(197, 'edit product', 'admin has edited a product with the code 27', '2023-07-12 16:30:40', 1, '27'),
(198, 'add product', 'admin has added a product with the code T', '2023-07-12 16:31:55', 1, 'T'),
(199, 'add product', 'admin has added a product with the code M', '2023-07-12 16:32:38', 1, 'M'),
(200, 'add product', 'admin has added a product with the code P', '2023-07-12 16:33:44', 1, 'P'),
(201, 'add product', 'admin has added a product with the code G', '2023-07-12 16:34:48', 1, 'G'),
(202, 'add product', 'admin has added a product with the code L', '2023-07-12 16:35:35', 1, 'L'),
(203, 'edit product', 'admin has edited a product with the code 26', '2023-07-12 16:35:59', 1, '26'),
(204, 'edit product', 'admin has edited a product with the code 26', '2023-07-12 16:36:40', 1, '26'),
(205, 'edit product', 'admin has edited a product with the code 26', '2023-07-12 16:36:40', 1, '26'),
(206, 'edit product', 'admin has edited a product with the code 26', '2023-07-12 16:36:40', 1, '26'),
(207, 'edit product', 'admin has edited a product with the code 37', '2023-07-12 16:37:27', 1, '37'),
(208, 'edit product', 'admin has edited a product with the code 37', '2023-07-12 16:37:55', 1, '37'),
(209, 'add subcategory', 'admin has added a subcategori named Mold Lubricants', '2023-07-12 16:59:30', 1, 'Mold Lubricants'),
(210, 'add subcategory', 'admin has added a subcategori named Mold Release Agents', '2023-07-12 16:59:48', 1, 'Mold Release Agents'),
(211, 'add subcategory', 'admin has added a subcategori named Fluxes', '2023-07-12 16:59:55', 1, 'Fluxes'),
(212, 'edit product', 'admin has edited a product with the code 26', '2023-07-12 17:00:34', 1, '26'),
(213, 'edit product', 'admin has edited a product with the code 26', '2023-07-12 17:00:52', 1, '26'),
(214, 'edit product', 'admin has edited a product with the code 26', '2023-07-12 17:00:52', 1, '26'),
(215, 'edit product', 'admin has edited a product with the code 26', '2023-07-12 17:00:52', 1, '26'),
(216, 'delete product', 'admin has delete a product with the code SR', '2023-07-12 17:03:00', 1, 'SR'),
(217, 'add product', 'admin has added a product with the code SR', '2023-07-12 17:03:46', 1, 'SR'),
(218, 'add product', 'admin has added a product with the code PPL', '2023-07-12 17:04:58', 1, 'PPL'),
(219, 'add product', 'admin has added a product with the code DMPL', '2023-07-12 17:05:43', 1, 'DMPL'),
(220, 'add product', 'admin has added a product with the code CF', '2023-07-12 17:06:28', 1, 'CF'),
(221, 'add subcategory', 'admin has added a subcategori named Aquariums & Speciality Glazing', '2023-07-12 17:37:29', 1, 'Aquariums & Speciality Glazing'),
(222, 'add subcategory', 'admin has added a subcategori named Automotive & Transportation', '2023-07-12 17:37:46', 1, 'Automotive & Transportation'),
(223, 'add subcategory', 'admin has added a subcategori named Electronics & Communications', '2023-07-12 17:38:01', 1, 'Electronics & Communications'),
(224, 'add product', 'admin has added a product with the code ASCF', '2023-07-12 17:39:12', 1, 'ASCF'),
(225, 'add product', 'admin has added a product with the code ARM', '2023-07-12 17:40:04', 1, 'ARM'),
(226, 'add product', 'admin has added a product with the code ASRCWW', '2023-07-12 17:41:15', 1, 'ASRCWW'),
(227, 'add product', 'admin has added a product with the code CASFDIPO', '2023-07-12 17:42:23', 1, 'CASFDIPO'),
(228, 'add product', 'admin has added a product with the code ASEEC', '2023-07-12 17:43:09', 1, 'ASEEC'),
(229, 'add product', 'admin has added a product with the code ASLFHO', '2023-07-12 17:44:14', 1, 'ASLFHO'),
(230, 'add subcategory', 'admin has added a subcategori named Heat Treatment', '2023-07-12 17:47:51', 1, 'Heat Treatment'),
(231, 'add subcategory', 'admin has added a subcategori named Furnaces', '2023-07-12 17:48:05', 1, 'Furnaces'),
(232, 'add subcategory', 'admin has added a subcategori named Other', '2023-07-12 17:48:12', 1, 'Other'),
(233, 'add product', 'admin has added a product with the code HTF', '2023-07-12 17:48:55', 1, 'HTF'),
(234, 'add product', 'admin has added a product with the code NTF', '2023-07-12 17:49:39', 1, 'NTF'),
(235, 'add product', 'admin has added a product with the code MFA', '2023-07-12 17:50:20', 1, 'MFA'),
(236, 'add product', 'admin has added a product with the code DF', '2023-07-12 17:50:56', 1, 'DF'),
(237, 'add product', 'admin has added a product with the code DC', '2023-07-12 17:51:30', 1, 'DC'),
(238, 'add product', 'admin has added a product with the code FIS', '2023-07-12 17:52:04', 1, 'FIS'),
(239, 'add subcategory', 'admin has added a subcategori named Preventive Maintenance', '2023-07-12 18:05:07', 1, 'Preventive Maintenance'),
(240, 'add subcategory', 'admin has added a subcategori named Corrective Maintenance', '2023-07-12 18:05:24', 1, 'Corrective Maintenance'),
(241, 'add subcategory', 'admin has added a subcategori named Predictive Maintenace', '2023-07-12 18:05:43', 1, 'Predictive Maintenace'),
(242, 'add subcategory', 'admin has added a subcategori named Remedial Maintenace', '2023-07-12 18:05:55', 1, 'Remedial Maintenace'),
(243, 'add subcategory', 'admin has added a subcategori named Other Maintenance', '2023-07-12 18:06:06', 1, 'Other Maintenance'),
(244, 'add product', 'admin has added a product with the code IM', '2023-07-12 18:06:58', 1, 'IM'),
(245, 'add product', 'admin has added a product with the code OC', '2023-07-12 18:07:38', 1, 'OC'),
(246, 'add product', 'admin has added a product with the code RBP', '2023-07-12 18:08:38', 1, 'RBP'),
(247, 'add product', 'admin has added a product with the code AS1', '2023-07-12 18:09:31', 1, 'AS1'),
(248, 'add product', 'admin has added a product with the code EMS', '2023-07-12 18:10:45', 1, 'EMS'),
(249, 'add product', 'admin has added a product with the code FS', '2023-07-12 18:12:10', 1, 'FS'),
(250, 'add product', 'admin has added a product with the code FT', '2023-07-12 18:12:49', 1, 'FT'),
(251, 'add product', 'admin has added a product with the code WRA', '2023-07-12 18:14:31', 1, 'WRA'),
(252, 'add product', 'admin has added a product with the code AEA', '2023-07-12 18:15:14', 1, 'AEA'),
(253, 'set featured', 'admin has set feature for product named Drying Furnaces', '2023-07-12 18:16:24', 1, 'DF'),
(254, 'set featured', 'admin has set feature for product named Heat Treatment Furnaces', '2023-07-12 18:16:41', 1, 'HTF'),
(255, 'set featured', 'admin has set feature for product named Fabrication and installation services', '2023-07-12 18:16:59', 1, 'FIS'),
(256, 'set featured', 'admin has set feature for product named Dust Collectors', '2023-07-12 18:17:07', 1, 'DC'),
(257, 'set bestseller', 'admin has set best seller for product named Synthetic Rubbers', '2023-07-12 18:19:52', 1, 'SR'),
(258, 'set bestseller', 'admin has set best seller for product named Polyester Resin', '2023-07-12 18:19:58', 1, 'PR'),
(259, 'set bestseller', 'admin has set best seller for product named Adjusting Settings', '2023-07-12 18:20:06', 1, 'AS1'),
(260, 'set bestseller', 'admin has set best seller for product named Acrylic Sheet Cutting and Fabrication', '2023-07-12 18:20:13', 1, 'ASCF'),
(261, 'set bestseller', 'admin has set best seller for product named Mould Release Agent', '2023-07-12 18:20:24', 1, 'MRA'),
(262, 'set bestseller', 'admin has set best seller for product named Lubricants', '2023-07-12 18:20:36', 1, 'L'),
(263, 'update', 'admin updated who_desc', '2023-07-13 11:00:53', 1, 'We are one of the major players in the field of specialty chemicals for rubber, coating, cable, die casting and other industrial chemicals. We serve the needs of speciality chemicals from industrial users, to create additional value for the output product. We would like to provide our customers high quality products and satisfied servi'),
(264, 'update', 'admin updated who_desc', '2023-07-13 11:02:39', 1, 'Introducing our exceptional company, a leading force in the world of specialty chemicals! With a profound expertise in rubber, coating, cable, die casting, and various other industrial chemicals, we stand out among the competition. Our primary focus is catering to the specific needs of industrial users, enabling them to unlock greater value from their final products. We pride ourselves on delivering top-notch quality products and unparalleled customer satisfaction. And that\'s not all! We go the extra mile by offering exceptional service maintenance to ensure your continued success.'),
(265, 'update', 'admin updated why_us_desc4', '2023-07-13 11:07:40', 1, 'We have a warehouse that can contains a lot of goods and with supporting facilities'),
(266, 'update', 'admin updated why_us_desc4', '2023-07-13 11:08:38', 1, 'We have a spacious warehouse capable of housing a vast array of goods. Equipped with top-notch facilities and supported by our dedicated fleet, to streamlined a highly efficient shipping process.'),
(267, 'remove featured', 'admin has remove feature for product named Drying Furnaces', '2023-07-13 14:37:55', 1, 'DF'),
(268, 'reorder category', 'admin has reordered the category.', '2023-07-14 12:18:26', 1, ''),
(269, 'edit product', 'admin has edited a product with the code 29', '2023-07-14 15:02:05', 1, '29'),
(270, 'edit product', 'admin has edited a product with the code 29', '2023-07-14 15:02:12', 1, '29'),
(271, 'edit product', 'admin has edited a product with the code 59', '2023-07-14 15:02:48', 1, '59'),
(272, 'edit product', 'admin has edited a product with the code 63', '2023-07-14 16:33:32', 1, '63'),
(273, 'edit category', 'admin has edited a category with this Code PI', '2023-07-14 19:39:22', 1, 'PI'),
(274, 'edit category', 'admin has edited a category with this Code PI', '2023-07-14 19:39:46', 1, 'PI'),
(275, 'edit sub-category', 'admin has edited a sub-category with this ID P', '2023-07-14 19:39:46', 1, 'P'),
(276, 'edit sub-category', 'admin has edited a sub-category with this ID A', '2023-07-14 19:39:46', 1, 'A'),
(277, 'edit sub-category', 'admin has edited a sub-category with this ID ,', '2023-07-14 19:39:46', 1, ','),
(278, 'edit sub-category', 'admin has edited a sub-category with this ID  ', '2023-07-14 19:39:46', 1, ' '),
(279, 'edit sub-category', 'admin has edited a sub-category with this ID R', '2023-07-14 19:39:46', 1, 'R'),
(280, 'edit category', 'admin has edited a category with this Code PI', '2023-07-14 19:43:06', 1, 'PI'),
(281, 'edit sub-category', 'admin has edited a sub-category with this ID P', '2023-07-14 19:43:06', 1, 'P'),
(282, 'edit sub-category', 'admin has edited a sub-category with this ID A', '2023-07-14 19:43:06', 1, 'A'),
(283, 'edit sub-category', 'admin has edited a sub-category with this ID ,', '2023-07-14 19:43:06', 1, ','),
(284, 'edit sub-category', 'admin has edited a sub-category with this ID  ', '2023-07-14 19:43:06', 1, ' '),
(285, 'edit sub-category', 'admin has edited a sub-category with this ID R', '2023-07-14 19:43:06', 1, 'R'),
(286, 'edit category', 'admin has edited a category with this Code PI', '2023-07-14 19:44:21', 1, 'PI'),
(287, 'edit sub-category', 'admin has edited a sub-category with this ID P', '2023-07-14 19:44:21', 1, 'P'),
(288, 'edit sub-category', 'admin has edited a sub-category with this ID A', '2023-07-14 19:44:21', 1, 'A'),
(289, 'edit sub-category', 'admin has edited a sub-category with this ID ,', '2023-07-14 19:44:21', 1, ','),
(290, 'edit sub-category', 'admin has edited a sub-category with this ID  ', '2023-07-14 19:44:21', 1, ' '),
(291, 'edit sub-category', 'admin has edited a sub-category with this ID R', '2023-07-14 19:44:21', 1, 'R'),
(292, 'edit category', 'admin has edited a category data with this Code PI', '2023-07-14 20:16:24', 1, 'PI'),
(293, 'edit category', 'admin has edited a category data with this Code PI', '2023-07-14 20:16:40', 1, 'PI'),
(294, 'edit category', 'admin has edited a category data with this Code PI', '2023-07-14 20:16:50', 1, 'PI'),
(295, 'edit category', 'admin has edited a category data with this Code PI', '2023-07-14 20:17:00', 1, 'PI'),
(296, 'edit category', 'admin has edited a category data with this Code PI', '2023-07-14 20:19:05', 1, 'PI'),
(297, 'edit category', 'admin has edited a category data with this Code PI', '2023-07-14 20:19:15', 1, 'PI'),
(298, 'edit category', 'admin has edited a category data with this Code PI', '2023-07-14 20:19:55', 1, 'PI'),
(299, 'edit category', 'admin has edited a category data with this Code PI', '2023-07-14 20:20:04', 1, 'PI'),
(300, 'edit category', 'admin has edited a category data with this Code PI', '2023-07-14 20:20:20', 1, 'PI'),
(301, 'edit category', 'admin has edited a category data with this Code PI', '2023-07-14 20:21:32', 1, 'PI'),
(302, 'edit category', 'admin has edited a category data with this Code PI', '2023-07-14 20:22:04', 1, 'PI'),
(303, 'edit category', 'admin has edited a category data with this Code PI', '2023-07-14 20:24:38', 1, 'PI'),
(304, 'edit category', 'admin has edited a category data with this Code PI', '2023-07-14 20:25:15', 1, 'PI'),
(305, 'edit category', 'admin has edited a category data with this Code PI', '2023-07-14 20:25:52', 1, 'PI'),
(306, 'edit category', 'admin has edited a category data with this Code PI', '2023-07-14 20:35:47', 1, 'PI'),
(307, 'edit category', 'admin has edited a category data with this Code PI', '2023-07-14 20:36:04', 1, 'PI'),
(308, 'edit category', 'admin has edited a category data with this Code PI', '2023-07-14 20:43:20', 1, 'PI'),
(309, 'edit category', 'admin has edited a category data with this Code PI', '2023-07-14 20:43:58', 1, 'PI'),
(310, 'edit category', 'admin has edited a category data with this Code PI', '2023-07-14 20:46:09', 1, 'PI'),
(311, 'edit category', 'admin has edited a category data with this Code PI', '2023-07-14 20:46:40', 1, 'PI'),
(312, 'edit category', 'admin has edited a category data with this Code PI', '2023-07-14 20:48:13', 1, 'PI'),
(313, 'edit category', 'admin has edited a category data with this Code PI', '2023-07-14 20:49:27', 1, 'PI'),
(314, 'edit category', 'admin has edited a category data with this Code PI', '2023-07-14 20:49:57', 1, 'PI'),
(315, 'edit category', 'admin has edited a category data with this Code PI', '2023-07-14 20:57:30', 1, 'PI');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_code` varchar(100) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_img` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `order_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_code`, `cat_name`, `cat_img`, `status`, `order_by`) VALUES
(1, 'RI', 'Rubber Industries', 'data/category/rubber.jpg', 0, 8),
(2, 'PI', 'Plastic Industries', 'data/category/plastic.jpg', 0, 7),
(3, 'DC', 'Die Casting', 'data/category/casting.jpg', 0, 4),
(4, 'CII', 'Coating and Ink Industries', 'data/category/ink.jpg', 0, 1),
(5, 'AS', 'Acrylic Sheet', 'data/category/acrylic.jpg', 0, 2),
(6, 'OI', 'Other Industries', '', 0, 6),
(7, 'TC', 'Testing Category', '', 0, 0),
(8, 'H', 'Lorem ipsum', 'data/category/PETA depan x25 (1).png', 0, 0),
(9, 'H', 'Lorem ipsum 2', 'data/category/PETA depan x25 (1).png', 0, 0),
(10, 'TEST', 'Lorem ipsum 3', 'data/category/PETA depan x25 (1).png', 0, 0),
(11, 'TEST', 'Lorem ipsum 4', 'data/category/download (2).jpeg', 0, 9),
(12, 'NC', 'Lorem ipsum 5', 'data/category/Background.png', 0, 0),
(13, 'NC', 'Lorem ipsum 6', 'data/category/images.png', 0, 5),
(14, 'CB', 'Lorem ipsum 7', 'data/category/3.jpg', 0, 3),
(15, 'PI', 'Plastic Industries', 'data/category/plastic_industry.jpg', 0, 1),
(16, 'DC', 'Die Casting', '', 0, 2),
(17, 'PI', 'Plastic Industries', '', 0, 1),
(18, 'PI', 'Plastic Industries', 'data/product/1689340820-plastic_industry.jpg', 1, 1),
(19, 'DC', 'Die Casting', 'data/category/die_casting.jpeg', 1, 2),
(20, 'AS', 'Acrylic Sheet', 'data/category/Acrylic.jpg', 1, 3),
(21, 'M', 'Machinery', 'data/category/Machinery.jpg', 1, 4),
(22, 'OI', 'Other Industry', 'data/category/other_industry.jpeg', 1, 6),
(23, 'SM', 'Service Maintenance', '', 0, 6),
(24, 'SM', 'Service Maintenance', 'data/category/service_maintenance.jpg', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(11) NOT NULL,
  `client_logo` text NOT NULL,
  `client_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `client_logo`, `client_name`) VALUES
(1, 'client/agres.png', 'agres'),
(3, 'client/buhler.png', 'buhler'),
(4, 'client/ct-logistic.png', 'ct-logistic'),
(5, 'client/frigel.png', 'frigel'),
(6, 'client/namsiang-group.png', 'namsiang-group'),
(9, 'client/toyota.png', 'toyota'),
(10, 'client/AHM.png', 'AHM'),
(12, 'client/rhm.png', 'rhm');

-- --------------------------------------------------------

--
-- Table structure for table `company_profile`
--

CREATE TABLE `company_profile` (
  `id_fitur` int(11) NOT NULL,
  `fitur_name` text NOT NULL,
  `fitur_data` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company_profile`
--

INSERT INTO `company_profile` (`id_fitur`, `fitur_name`, `fitur_data`) VALUES
(1, 'home_title', 'Are You Looking For A Great Product And Solution ? '),
(2, 'home_desc', 'We provide products to suit your needs to support your business. To find out more, click the button below'),
(3, 'home_image', 'data/home/1b6c4998efbc1045452e47dc9e15dd99.jpg'),
(4, 'who_desc', 'We are a leading force in the specialty chemicals industry, specializing in rubber, coating, cable, die casting, and other industrial chemicals. Our primary focus is on meeting the unique demands of industrial users, adding significant value to their end products. Our commitment lies in delivering exceptional quality products and ensuring utmost customer satisfaction. Moreover, we go beyond just products and offer reliable maintenance services to our valued customers.'),
(5, 'history', 'PT.SUMBER PHOENIX MAKMUR was established in 2003 as importer of chemical raw materials and specials additives.'),
(6, 'experience', 'Years of international partnership combined with knowledge of the Indonesian market give the company a competitive advantage in providing comprehensive specialty chemical supply programs and service.'),
(7, 'philosophy', 'The company\'s business philosophy is Customer Satisfaction is Our Priority, and Creating Value for the Customer.'),
(8, 'purpose', 'PT.SUMBER PHOENIX MAKMUR will continuously strive to develope complete product lines, improves its service, and create more value for its customers and suppliers.'),
(9, 'who_title', 'Who Are We?'),
(10, 'why_desc', 'Customer Satisfaction is Our Priority!'),
(11, 'team_title', 'Team'),
(12, 'team_sub_title', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur molestiae nisi laboriosam quia mollitia commodi eos quas harum asperiores id distinctio nostrum exercitationem in earum, dicta dolor sint aut odio.'),
(13, 'testi_title', 'Testimonials'),
(14, 'testi_sub_title', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dicta, deserunt dolore. Placeat corporis eos in veritatis modi nesciunt nihil earum minima a itaque commodi eligendi maxime, consequatur culpa cum nulla.'),
(15, 'fields_title', 'Business Fields'),
(16, 'fields_desc', 'We Provide so much product to distributed'),
(17, 'newsletter_desc', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. '),
(18, 'address', 'Jl. Raya Serpong Km. 7 - Pakulonan Serpong Utara - Tanggerang Selatan Indonesia - 10000 '),
(19, 'phone', '+62 21 5398 318 '),
(20, 'email', 'Email: phoenix-spm@sumberphoenix.co.id   '),
(21, 'why_us_title1', 'Well Trained Marketing'),
(22, 'why_us_desc1', 'We have professional experts to recommend which products are suitable for developing your business'),
(23, 'why_us_title2', 'Trusted\n'),
(24, 'why_us_desc2', 'We are the company that Strong International Connection, Enable Us to Procure and Provide a Wide Range of Chemical Supply'),
(25, 'why_us_title3', 'Responsive Customer Service'),
(26, 'why_us_desc3', 'We are always communicative, friendly and always willing to help you improve your business for the better'),
(27, 'why_us_title4', 'Spacious Warehouse Facility'),
(28, 'why_us_desc4', 'We have a spacious warehouse to store an array of goods, supported with other facilities, and our dedicated fleet.'),
(29, 'statistics_total1', '234'),
(30, 'statistics_title1', 'Happy Clients'),
(31, 'statistics_desc1', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur nisi cupiditate totam, aliquam, eligendi quaerat labore adipisci eos nostrum debitis unde iure quia eveniet, incidunt beatae! Velit unde distinctio sunt!'),
(32, 'statistics_total2', '521'),
(33, 'statistics_title2', 'Projects'),
(34, 'statistics_desc2', '2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur nisi cupiditate totam, aliquam, eligendi quaerat labore adipisci eos nostrum debitis unde iure quia eveniet, incidunt beatae! Velit unde distinctio sunt!'),
(35, 'statistics_total3', '19'),
(36, 'statistics_title3', 'Years Of Support'),
(37, 'statistics_desc3', '3 Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur nisi cupiditate totam, aliquam, eligendi quaerat labore adipisci eos nostrum debitis unde iure quia eveniet, incidunt beatae! Velit unde distinctio sunt!'),
(38, 'statistics_total4', '50'),
(39, 'statistics_title4', 'Workers'),
(40, 'statistics_desc4', '4 Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur nisi cupiditate totam, aliquam, eligendi quaerat labore adipisci eos nostrum debitis unde iure quia eveniet, incidunt beatae! Velit unde distinctio sunt!'),
(42, 'logo', 'logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(255) NOT NULL,
  `emp_img` text NOT NULL,
  `emp_position` varchar(255) NOT NULL,
  `emp_insta` text NOT NULL,
  `emp_linkedin` text NOT NULL,
  `emp_facebook` text NOT NULL,
  `emp_twitter` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`emp_id`, `emp_name`, `emp_img`, `emp_position`, `emp_insta`, `emp_linkedin`, `emp_facebook`, `emp_twitter`) VALUES
(1, 'Agus Handoko', 'data/team/cb260c790c1708d0404462d00a1f2a63.png', 'Director', '#', '#', '#', '#'),
(2, 'Mark Robert', 'data/team/8c3718db2ab00a5bfa5c54131b0514fb.jpg', 'CFO', '#', '#', '#', '#'),
(3, 'Daniel Davidson', 'data/team/133ea652aca37c001130ff89da8fd9ae.jpg', 'CMO', '#', '#', '#', '#'),
(4, 'Roger Hartono', 'data/team/d83b1e8bba94cb86f4f109ee2ab3b6bd.jpg', 'CTO', '#', '#', '#', '#');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `faq_id` int(11) NOT NULL,
  `faq_thumbnail` text NOT NULL,
  `faq_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`faq_id`, `faq_thumbnail`, `faq_desc`) VALUES
(1, 'Lorem Ipsum dolor sit ?', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus laboriosam quasi magni mollitia illum sint harum deleniti atque tenetur sapiente, quam sunt, molestiae unde ratione nemo velit! Molestiae, repellendus totam.'),
(2, 'Lorem Ipsum Dolor Sit ?', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus laboriosam quasi magni mollitia illum sint harum deleniti atque tenetur sapiente, quam sunt, molestiae unde ratione nemo velit! Molestiae, repellendus totam.'),
(3, 'Lorem Ipsum Dolor Sit ?', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus laboriosam quasi magni mollitia illum sint harum deleniti atque tenetur sapiente, quam sunt, molestiae unde ratione nemo velit! Molestiae, repellendus totam.'),
(4, 'Lorem Ipsum Dolor Sit?', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus laboriosam quasi magni mollitia illum sint harum deleniti atque tenetur sapiente, quam sunt, molestiae unde ratione nemo velit! Molestiae, repellendus totam.');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id_msg` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `subject` varchar(300) NOT NULL,
  `msg` text NOT NULL,
  `timesent` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(100) NOT NULL DEFAULT 'read'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_code` varchar(100) NOT NULL,
  `product_img` text NOT NULL,
  `product_desc` text NOT NULL,
  `product_delivery` varchar(100) NOT NULL,
  `customer_service` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `best_seller` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_code`, `product_img`, `product_desc`, `product_delivery`, `customer_service`, `status`, `featured`, `best_seller`) VALUES
(1, 'Silane Coupling Agent', 'SILANE', 'data/product/download.jpeg', 'Adhesion promoters, or coupling agents, are chemicals that act at the interface between an organic polymer and an inorganic substrate to enhance adhesion ...', 'Any TIme', '5 Star', 0, 0, 1),
(2, 'Synthetic Rubbers', 'SR', 'data/product/download (1).jpeg', '      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum                                                      \n                                                        ', 'Free', '24 Hours a day', 0, 0, 1),
(3, ' Natural Rubbers', 'NR', 'data/product/download (2).jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'From Somewhere', '24 Hours', 0, 0, 0),
(4, 'Pigment Dispersion', 'PD', 'data/product/download (3).jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'The fastest delivery', 'Provide a 24 hour customer service', 0, 0, 0),
(5, 'Anti Scratch', 'AS', 'data/product/images.png', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>', 'The fastest delivery', 'Provide a 24 hour customer service', 0, 0, 0),
(6, 'Slip Agent', 'SA', 'data/product/download (4).jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'The fastest delivery', 'Provide a 24 hour customer service', 0, 1, 0),
(7, 'Plastic Additives', 'PLA', 'data/product/download (5).jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'The fastest delivery', 'Provide a 24 hour customer service', 0, 0, 1),
(8, 'Mould Release Agent', 'MRA', 'data/product/download (6).jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'The fastest delivery', 'Provide a 24 hour customer service', 0, 0, 0),
(9, 'Resins S1', 'RS1', 'data/product/1683987809-download (8).jpeg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum 200</p>', 'The fastest delivery', 'Provide a 24 hour customer service', 0, 1, 1),
(10, 'Plunger Pellet Lubricant', 'PPL', 'data/product/download (8).jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'The fastest delivery', 'Provide a 24 hour customer service', 0, 0, 0),
(11, 'Dosing Machine for Plunger Lubricant', 'DMPL', 'data/product/download (9).jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'The fastest delivery', 'Provide a 24 hour customer service', 0, 0, 0),
(12, 'Mold Release', 'MR', 'data/product/images.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'The fastest delivery', 'Provide a 24 hour customer service', 0, 0, 0),
(13, ' Adhesion Promotors', 'AP', 'data/product/download (10).jpeg', '<p>Adhesion promoters, or coupling agents, are <strong>chemicals that act at the interface between an organic polymer and an inorganic substrate to enhance adhesion between the two materials</strong>.</p><p>&nbsp;</p><ol><li>Adhesion promoters, or coupling agents, are <strong>chemicals that act at the interface between an organic polymer and an inorganic substrate to enhance adhesion between the two materials</strong>.</li><li>Adhesion promoters, or coupling agents, are <strong>chemicals that act at the interface between an organic polymer and an inorganic substrate to enhance adhesion between the two materials</strong>.</li><li>Adhesion promoters, or coupling agents, are <strong>chemicals that act at the interface between an organic polymer and an inorganic substrate to enhance adhesion between the two materials</strong>.</li></ol>', 'The Fastest Delivery', '24 Hours', 0, 0, 1),
(14, 'Slipping Agents', 'SAS', 'data/product/download (11).jpeg', '<p>Additives, which enhance and reduce handling problems, are used extensively in the manufacture of polyolefin films. In their natural state, most polyolefins exhibit a degree of ‘tackiness,’ and therefore cannot be readily processed into packaging films without the presence of additives to ease their ability to “separate and slide.”</p><p>“Slip” additives are used to reduce a film’s resistance to sliding over itself or parts of converting equipment. Commercially important slips can be found in the chemical family known as amides, and are typically referred to as “fast bloom” (oleamide) and “slow bloom” (erucamide) additives. Other amides are used specifically for special processes (e.g. higher heat extrusion coating applications or customized mixtures where balancing slip and antiblock properties are critical.)</p><p>The effectiveness of slip additives are normally determined by the<strong> coefficient of friction (COF)</strong> it allows, which is measured using ASTM D-1894, “Standard Method of Test for Coefficient of Friction of Plastic Film.” COF is a ratio of the force required to slide one layer of film across another relative to the gravimetric force exerted on it. Loosely defined, films can be&nbsp;characterized as “low, medium, or high slip” as follows:</p>', 'The fastest delivery', 'Provide a 24 hour customer service', 0, 0, 0),
(15, 'Hello', 'HL', 'data/product/DSC_0238.JPG', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'The Fastest Delivery', 'Provide a 24 hour customer service', 0, 0, 0),
(16, 'hello', 'HL', 'data/product/1668209558-DSC_0238.JPG', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'The Fastest Delivery', 'Provide a 24 hour customer service', 0, 0, 0),
(17, 'hello', 'HL', 'data/product/1668210483-DSC_0238.JPG', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'The Fastest Delivery', 'Provide a 24 hour customer service', 0, 0, 0),
(18, 'hello', 'HL', 'data/product/1668210592-DSC_0238.JPG', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'The Fastest Delivery', 'Provide a 24 hour customer service', 0, 0, 0),
(19, 'product 11', 'PD11', 'data/product/1668853730-homepage.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'The Fastest Delivery', 'Provide a 24 hour customer service', 0, 0, 0),
(20, 'Product 9 jadi 100', 'PC9', 'data/product/1683987770-CLOSING-WGG_VANESSA-2-1024x683.jpg', '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ducimus, natus. Nostrum dolorum, qui praesentium natus nam sint dicta illum eos necessitatibus ipsam? Quo doloremque quam earum vero provident rerum voluptatibus qui vel. Sapiente tempora ratione, quae voluptatum recusandae facere laborum repellat totam nihil explicabo fuga at pariatur nobis ex rerum, maiores earum perferendis!&nbsp;</p><p>Adipisci veritatis vel consequuntur, accusantium nulla animi doloremque nesciunt, a aspernatur quam in. Quibusdam atque ad quidem debitis, quae ea cupiditate minus doloremque facilis dolore error voluptate labore illum, odio earum ipsam aliquam recusandae doloribus magni porro dolorum laboriosam possimus explicabo? Exercitationem, velit? Quisquam hic maiores distinctio? 100</p>', '', '', 0, 0, 0),
(21, 'product 11', 'PS11', 'data/product/1683988499-download.jpeg', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non consectetur necessitatibus eos molestias adipisci impedit cupiditate ad pariatur iste. Culpa nemo illum dolor blanditiis laudantium amet officiis, tenetur voluptas accusamus magni, nisi ipsum? Necessitatibus, consectetur illo debitis fuga aut soluta tempore, natus ducimus amet corporis molestiae repellat iure quos nesciunt.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non consectetur necessitatibus eos molestias adipisci impedit cupiditate ad pariatur iste. Culpa nemo illum dolor blanditiis laudantium amet officiis, tenetur voluptas accusamus magni, nisi ipsum? Necessitatibus, consectetur illo debitis fuga aut soluta tempore, natus ducimus amet corporis molestiae repellat iure quos nesciunt.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non consectetur necessitatibus eos molestias adipisci impedit cupiditate ad pariatur iste. Culpa nemo illum dolor blanditiis laudantium amet officiis, tenetur voluptas accusamus magni, nisi ipsum? Necessitatibus, consectetur illo debitis fuga aut soluta tempore, natus ducimus amet corporis molestiae repellat iure quos nesciunt.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non consectetur necessitatibus eos molestias adipisci impedit cupiditate ad pariatur iste. Culpa nemo illum dolor blanditiis laudantium amet officiis, tenetur voluptas accusamus magni, nisi ipsum? Necessitatibus, consectetur illo debitis fuga aut soluta tempore, natus ducimus amet corporis molestiae repellat iure quos nesciunt.</p>', '', '', 0, 0, 0),
(22, 'Silane Coupling Agent', 'SCA', 'data/product/1689147761-silane_coupling_agent.jpg', '<p>Silane coupling agents are compounds whose molecules contain functional groups that bond with both organize and inorganic materials. A silane coupling agent acts as an intermediary that bonds organic materials to inorganic materials. This characteristic makes silane coupling agents helpful in improving the mechanical strength of composite materials, improving adhesion, and for resin modifications and surface modification.</p>', '', '', 1, 0, 0),
(23, 'Synthetic Rubbers', 'SR', 'data/product/1689148111-synthethic rubber.jpg', '<p>Synthetic rubber is an artificial elastomer. They are polymers synthesized from petroleum byproducts. About 32 million metric tons of rubbers are produced annually in the United States, and of that amount two-thirds are synthetic. Synthetic rubber, just like natural rubber, has many uses in the automotive industry for tires, door, and window profiles, seals such as O-rings and gaskets, hoses, belts, matting, and flooring.</p>', '', '', 0, 0, 0),
(24, 'Natural Rubbers', 'NR', 'data/product/1689148354-natural rubber.jpg', '<p>What is rubber and where does it come from? Rubber is a natural product produced by plants and is present in many of the goods used in our daily lives. Rubber has had an important role in human history, throughout the development of human civilizations. It still plays an important role, and that is why we need to search for new rubber sources. Nowadays, 99% of the natural rubber we use is extracted from a tree called Hevea brasiliensis</p>', '', '', 1, 0, 0),
(25, 'Reclaim Rubbers', 'RR', 'data/product/1689148497-reclaim rubber.png', '<p>Reclaimed rubber is a material, made from scrap or waste rubber, which is designed to replace or supplement new rubber in the manufacture of rubber products. The larger part of the reclaimed rubber produced is made by the alkali process in which ground scrap rubber is digested with sodium hydro-oxide solution and softeners under pressure for the threefold purpose of destroying the fabric, removing free sulfur, and plasticizing the rubber.</p>', '', '', 1, 0, 0),
(26, 'Mould Release Agent', 'MRA', 'data/product/1689148895-mould release agent.jpg', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '', '', 1, 0, 1),
(27, 'Stearic Acid', 'SA', 'data/product/1689149048-stearic_acid.jpg', '<p>Stearic acid is a long-chain fatty acid. It occurs in a variety of natural sources, including shea butter and coconut oil. Products containing stearic acid may be beneficial for the skin.</p><p>Multiple studies have shown that products containing stearic acid may benefit a person’s skin. Some natural sources that contain stearic acid, such as coconut oil and shea butter, have moisturizing and anti-inflammatory properties.</p>', '', '', 1, 0, 0),
(28, 'Pigment Dispersion', 'PD', 'data/product/1689153252-pigment_dispersion.jpg', '<p>Dispersion of pigments is a mechanical and chemical process by which we achieve improved physical performance characteristics while maximizing cost efficiency in the targeted application. Pigment dispersion generally refers to the particle size reduction of these colored, crystalline powders by mechanical means.</p>', '', '', 1, 0, 0),
(29, 'Anti Scratch', 'AS', 'data/product/1689153409-anti-scratch.jpg', '<p>The anti-scratch coating is a type of protective coating or film applied to an object\'s surface for mitigation against scratches. Scratches are small surface-level cuts left on a surface following interaction with a sharper object. Anti-scratch coatings provide scratch resistance by containing tiny microscopic materials with scratch-resistant properties.</p>', '', '', 1, 0, 0),
(30, 'Slip Agent', 'SA1', 'data/product/1689153796-slip agent.jpeg', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '', '', 1, 0, 0),
(31, 'Epoxy Resin', 'ER', 'data/product/1689154003-Epoxy Resin.jpg', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '', '', 1, 0, 0),
(32, 'Polyester Resin', 'PR', 'data/product/1689154083-polyester resin.jpeg', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '', '', 1, 0, 1),
(33, 'Polyurethane Resin', 'PR1', 'data/product/1689154153-polyurethane resin.jpg', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '', '', 1, 0, 0),
(34, 'Talc', 'T', 'data/product/1689154315-Talc.jpg', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '', '', 1, 0, 0),
(35, 'Mica', 'M', 'data/product/1689154358-Mica.jpg', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '', '', 1, 0, 0),
(36, 'Pipes', 'P', 'data/product/1689154424-pipes.jpeg', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '', '', 1, 0, 0),
(37, 'Gears', 'G', 'data/product/1689154488-Gears.jpg', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '', '', 1, 0, 0),
(38, 'Lubricants', 'L', 'data/product/1689154535-lubricants.jpeg', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '', '', 1, 0, 1),
(39, 'Synthetic Rubbers', 'SR', 'data/product/1689156226-synthethic rubber.jpg', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '', '', 1, 0, 1),
(40, 'Plunger Pellet Lubricant', 'PPL', 'data/product/1689156298-Plunger Pellet Lubricant.jpeg', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '', '', 1, 0, 0),
(41, 'Dosing Machine for Plunger Lubricant', 'DMPL', 'data/product/1689156343-Dosing Machine for Plunger Lubricant.jpeg', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '', '', 1, 0, 0),
(42, 'Cooper Flux', 'CF', 'data/product/1689156388-Cooper Flux.jpg', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '', '', 1, 0, 0),
(43, 'Acrylic Sheet Cutting and Fabrication', 'ASCF', 'data/product/1689158352-Acrylic sheet cutting and fabrication.jpeg', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '', '', 1, 0, 1),
(44, 'Aquarium Repair and Maintenance', 'ARM', 'data/product/1689158404-Aquarium repair and maintenance.jpg', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '', '', 1, 0, 0),
(45, 'Acrylic Sheet Replacement for Car Windows and Windshields', 'ASRCWW', 'data/product/1689158475-Acrylic sheet replacement for car windows and windshields.jpeg', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '', '', 1, 0, 0),
(46, 'Custom Acrylic Sheet Fabrication for Dashboards, Interior Panels, and Other', 'CASFDIPO', 'data/product/1689158543-Custom acrylic sheet fabrication for dashboards, interior panels, and other automotive parts.jpeg', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '', '', 1, 0, 0),
(47, 'Acrylic Sheet Enclosures for Electronic Components', 'ASEEC', 'data/product/1689158589-Acrylic sheet enclosures for electronic components.jpeg', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '', '', 1, 0, 0),
(48, 'Acrylic Sheet Lenses for Flashlights, Headlights, and OtherS', 'ASLFHO', 'data/product/1689158654-Acrylic sheet lenses for flashlights, headlights, and other electronic devices.jpg', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '', '', 1, 0, 0),
(49, 'Heat Treatment Furnaces', 'HTF', 'data/product/1689158935-Heat treatment furnaces.jpeg', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '', '', 1, 1, 0),
(50, 'Nitriding, Tempering Furnaces', 'NTF', 'data/product/1689158979-Nitriding, tempering furnaces.jpeg', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '', '', 1, 0, 0),
(51, 'Melting Furnaces for Aluminum', 'MFA', 'data/product/1689159020-Melting furnaces for aluminum.jpeg', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '', '', 1, 0, 0),
(52, 'Drying Furnaces', 'DF', 'data/product/1689159056-Drying furnaces.jpeg', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '', '', 1, 0, 0),
(53, 'Dust Collectors', 'DC', 'data/product/1689159090-Dust collectors.jpg', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '', '', 1, 1, 0),
(54, 'Fabrication and installation services', 'FIS', 'data/product/1689159124-Fabrication and installation services.jpeg', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '', '', 1, 1, 0),
(55, 'Inspecting the Machinery', 'IM', 'data/product/1689160018-inspecting the machinery.jpeg', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '', '', 1, 0, 0),
(56, 'Oil Change', 'OC', 'data/product/1689160058-changing the oil.jpg', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '', '', 1, 0, 0),
(57, 'Repairing Broken Parts', 'RBP', 'data/product/1689160118-epairing broken parts.jpg', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '', '', 1, 0, 0),
(58, 'Adjusting Settings', 'AS1', 'data/product/1689160171-adjusting settings.jpg', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '', '', 1, 0, 1),
(59, 'Emergency Maintenance Service', 'EMS', 'data/product/1689160245-emergency maintenace service.jpeg', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '', '', 1, 0, 0),
(60, 'Fiberglass Sheets', 'FS', 'data/product/1689160330-Fiberglass sheets.jpeg', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '', '', 1, 0, 0),
(61, 'Fiberglass Tubes', 'FT', 'data/product/1689160369-Fiberglass tubes.jpeg', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '', '', 1, 0, 0),
(62, 'Water-Reducing Admixtures', 'WRA', 'data/product/1689160471-Water-reducing admixtures.jpeg', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '', '', 1, 0, 0),
(63, 'Air-Entraining Admixtures', 'AEA', 'data/product/1689160514-Air-entraining admixtures.jpg', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '', '', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_subcategory`
--

CREATE TABLE `product_subcategory` (
  `ps_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_subcategory`
--

INSERT INTO `product_subcategory` (`ps_id`, `product_id`, `subcategory_id`) VALUES
(1, 1, 1),
(2, 1, 4),
(6, 3, 3),
(8, 4, 5),
(11, 6, 6),
(13, 8, 6),
(16, 10, 10),
(17, 11, 10),
(19, 13, 15),
(20, 13, 16),
(24, 18, 10),
(29, 2, 1),
(30, 2, 2),
(31, 2, 3),
(33, 3, 4),
(36, 6, 5),
(38, 7, 8),
(40, 8, 7),
(41, 8, 8),
(44, 12, 12),
(47, 14, 14),
(48, 15, 17),
(49, 15, 24),
(51, 18, 22),
(52, 19, 1),
(53, 20, 3),
(54, 20, 8),
(55, 20, 12),
(56, 20, 15),
(57, 20, 18),
(58, 20, 23),
(59, 9, 7),
(60, 9, 8),
(61, 9, 11),
(62, 5, 12),
(70, 21, 2),
(71, 21, 6),
(72, 21, 22),
(74, 22, 29),
(75, 23, 29),
(76, 24, 29),
(77, 25, 29),
(80, 28, 30),
(82, 30, 30),
(85, 31, 31),
(86, 32, 31),
(87, 33, 31),
(89, 27, 32),
(90, 27, 29),
(91, 34, 32),
(92, 35, 32),
(93, 36, 33),
(95, 38, 34),
(101, 37, 33),
(103, 26, 30),
(104, 26, 36),
(105, 26, 29),
(106, 39, 29),
(107, 40, 35),
(108, 41, 35),
(109, 42, 37),
(110, 43, 38),
(111, 44, 38),
(112, 45, 39),
(113, 46, 39),
(114, 47, 40),
(115, 48, 40),
(116, 49, 41),
(117, 50, 41),
(118, 51, 42),
(119, 52, 42),
(120, 53, 43),
(121, 54, 43),
(122, 55, 44),
(123, 56, 44),
(124, 57, 45),
(125, 58, 45),
(127, 60, 27),
(128, 61, 27),
(129, 62, 28),
(132, 29, 30),
(133, 59, 48),
(134, 63, 28);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `sub_id` int(11) NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `sub_code` varchar(100) NOT NULL,
  `sub_name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`sub_id`, `cat_id`, `sub_code`, `sub_name`, `status`) VALUES
(1, 1, 'AG1', 'Agent', 0),
(2, 1, 'FL', 'Fillers', 0),
(3, 1, 'RS', 'Rubbers', 0),
(4, 1, 'AC', 'Acid', 0),
(5, 2, 'DP', 'Dispersion', 0),
(6, 2, 'AG', 'Agent', 0),
(7, 2, 'AC2', 'Acid', 0),
(8, 2, 'OT', 'Others', 0),
(9, 2, 'LB', 'Lubricant', 0),
(10, 3, 'LC', 'Lubricant', 0),
(11, 3, 'FL2', 'Fluid', 0),
(12, 3, 'CT', 'Coating', 0),
(13, 4, 'RNS', 'Resins', 0),
(14, 4, 'AGS', 'Agents', 0),
(15, 4, 'FLRS', 'Fillers', 0),
(16, 4, 'BC', 'Bio Chemicals', 0),
(17, 5, 'GZ', 'Glazings', 0),
(18, 5, 'SF', 'Safety', 0),
(19, 5, 'OT2', 'Other', 0),
(20, 6, 'TX', 'Textile Chemicals', 0),
(21, 6, 'AI', 'Abrasive Industry', 0),
(22, 6, 'GI', 'Glass Industry', 0),
(23, 6, 'BMF', 'Building Materials Formulation', 0),
(24, 6, 'OGI', 'Oil and Gas Industries', 0),
(25, 11, 'HAI', 'test', 0),
(26, 22, 'PC', 'Personal Care', 1),
(27, 22, 'FG', 'Fibre Glass', 1),
(28, 22, 'CA', 'Concret Additive', 1),
(29, 22, 'R', 'Plastic Processing Aids', 1),
(30, 18, 'PA', 'Plastic Additives', 1),
(31, 18, 'R1', 'Resins', 1),
(32, 18, 'SF', 'Speciality Fillers', 1),
(33, 18, 'PC1', 'Plastic Compounds', 1),
(34, 18, 'PPA', 'Plastic Processing Aids', 1),
(35, 19, 'ML', 'Mold Lubricants', 1),
(36, 19, 'MRA', 'Mold Release Agents', 1),
(37, 19, 'F', 'Fluxes', 1),
(38, 20, 'ASG', 'Aquariums & Speciality Glazing', 1),
(39, 20, 'AT', 'Automotive & Transportation', 1),
(40, 20, 'EC', 'Electronics & Communications', 1),
(41, 21, 'HT', 'Heat Treatment', 1),
(42, 21, 'F1', 'Furnaces', 1),
(43, 21, 'O', 'Other', 1),
(44, 24, 'PM', 'Preventive Maintenance', 1),
(45, 24, 'CM', 'Corrective Maintenance', 1),
(46, 24, 'PM1', 'Predictive Maintenace', 1),
(47, 24, 'RM', 'Remedial Maintenace', 1),
(48, 24, 'OM', 'Other Maintenance', 1);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `testi_id` int(11) NOT NULL,
  `testi_name` varchar(300) NOT NULL,
  `testi_intro` varchar(300) NOT NULL,
  `testi_pp` text NOT NULL,
  `testi_isi` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`testi_id`, `testi_name`, `testi_intro`, `testi_pp`, `testi_isi`, `timestamp`, `status`) VALUES
(1, 'Lorem Ipsum', 'Lorem Ipsum', 'data/testimonials/Lorem IpsumLorem Ipsumfe5df232cafa4c4e0f1a0294418e5660.jpg', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', '2022-10-26 14:22:02', 2),
(2, 'Lorem Ipsum', 'Lorem Ipsum', 'data/testimonials/Lorem IpsumLorem Ipsum18e2999891374a475d0687ca9f989d83.jpg', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', '2022-10-26 14:22:17', 2),
(3, 'Lorem Ipsum', 'Lorem Ipsum', 'data/testimonials/Lorem IpsumLorem Ipsum032b2cc936860b03048302d991c3498f.jpg', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', '2022-10-26 14:22:29', 2),
(4, 'Lorem Ipsum', 'Lorem Ipsum', 'data/testimonials/Lorem IpsumLorem Ipsum799bad5a3b514f096e69bbc4a7896cd9.jpg', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', '2022-10-26 14:22:41', 2),
(5, 'Lorem Ipsum', 'Lorem Ipsum', 'data/testimonials/Lorem IpsumLorem Ipsum156005c5baf40ff51a327f1c34f2975b.jpg', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', '2022-10-26 14:22:54', 2),
(6, 'Lorem Ipsum', 'Lorem Ipsum', 'data/testimonials/Lorem IpsumLorem Ipsumd0096ec6c83575373e3a21d129ff8fef.jpg', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', '2022-10-26 14:23:06', 2),
(7, 'Lorem Ipsum', 'Lorem Ipsum', 'data/testimonials/Lorem IpsumLorem Ipsumcb260c790c1708d0404462d00a1f2a63.png', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', '2022-10-26 14:23:24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `updates`
--

CREATE TABLE `updates` (
  `upd_id` int(11) NOT NULL,
  `upd_title` varchar(300) NOT NULL,
  `upd_sub` text NOT NULL,
  `adm_name` varchar(500) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `upd_pict` text NOT NULL,
  `upd_body` text NOT NULL,
  `status` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `updates`
--

INSERT INTO `updates` (`upd_id`, `upd_title`, `upd_sub`, `adm_name`, `timestamp`, `upd_pict`, `upd_body`, `status`) VALUES
(2, 'Lorem, Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Ab, Expedita Est', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae impedit porro voluptatum!', 'Christopher Matthew Susanto', '2022-11-19 10:48:08', 'data/update/1668854888-warehouse.jpeg', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p>&nbsp;</p><p>Why do we use it?\n</p><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><p>&nbsp;</p><p>Where does it come from?\n</p><p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p>&nbsp;</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 'deleted'),
(3, 'Lorem, Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Ab, Expedita Est', 'Lorem, Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Ab, Expedita Est', 'Christopher Matthew Susanto', '2022-11-19 10:53:00', 'data/update/1668867227-homepage.png', 'Lorem, Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Ab, Expedita Est', 'deleted'),
(4, 'Lorem, Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Ab, Expedita Est', 'Lorem, Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Ab, Expedita Est', 'Christopher Matthew Susanto', '2022-11-19 15:25:07', 'data/update/1668871507-warehouse.jpeg', 'Lorem, Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Ab, Expedita Est', 'deleted'),
(5, 'FIGHT COVID TOGERHER', 'go away covid', 'Christopher Matthew Susanto', '2022-11-19 15:49:55', 'data/update/1668872995-covid.jpeg', '<p>Since the outbreak of COVID-19,&nbsp;<a href=\"https://news.sky.com/story/coronavirus-rise-in-demand-for-hand-sanitisers-and-hygiene-products-11948021\">sales of hand sanitizers have soared</a>. It’s become such a sought-after product that pharmacies and supermarkets have started&nbsp;<a href=\"https://www.bbc.co.uk/news/uk-51729012\">limiting the number</a>&nbsp;that people can buy at one time. Though hand sanitizers can help reduce our risk of catching certain infections, not all hand sanitizers are equally effective against coronavirus.Washing with warm water and soap remains the&nbsp;<a href=\"https://www.ncbi.nlm.nih.gov/pmc/articles/PMC3249958/\">gold standard for hand hygiene</a>&nbsp;and preventing the spread of infectious diseases. Washing with warm water (not cold water) and soap removes oils from our hands that can harbour microbes.Hand sanitizers can also protect against disease-causing microbes, especially in situations when&nbsp;<a href=\"https://www.fda.gov/consumers/if-soap-and-water-are-not-available-hand-sanitizers-may-be-good-alternative\">soap and water aren’t available</a>.&nbsp;</p>', 'published'),
(6, 'Lorem, Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Ab, Expedita Est', 'Lorem, Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Ab, Expedita Est', 'Christopher Matthew Susanto', '2022-11-19 15:50:38', 'data/update/1668873038-holiday.jpeg', '<p>Dear Valued Customer, in anticipating of the forthcoming Idul Fitri 1443H, PT. Rena Haniem Mulia will not be operating during 26 Apr 2022&nbsp; - 08 May 2022 and at 11 May 2022 we will Start delivery process&nbsp;We are requesting all our valued customers for assistance in providing us with an early schedule of your supply needs prior to and after the holidays. This is to ensure all your needs are taken care of during the above mention period and avoid any delays in supplies. We take this opportunity to thank you, our valued customer for your valued patronage and cooperation. Stay safe, do take care of your health and protect others. Hopefully this covid-19 situation will end soon.&nbsp;</p>', 'deleted'),
(7, 'STAY SAFE, WEAR YOUR MASK!', 'Lorem, Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Ab, Expedita Est', 'Christopher Matthew Susanto', '2022-11-19 15:51:11', 'data/update/1668873071-mask.jpeg', '<p>To help flatten the COVID-19 curve, the government is now urging people to wear face masks whenever they are out in public. The new recommendation is an update from the previous guidelines and is in line with the World Health Organization’s (WHO) latest recommendation. Previously, Indonesia complied with the WHO’s recommendations that face masks only be worn by medical professionals and sick people in order to prevent a supply shortage.&nbsp;The public can wear cloth masks, or masks made from other materials, as long as they can prevent the spread of saliva droplets when speaking.&nbsp;</p>', 'featured'),
(8, 'Samsung promises to be even faster with updates next year', 'Google released Android 13 on August 15, and Samsung\'s first One UI 5 update based on Android 13 went out to the Galaxy S22 family on October 24, two months and almost ten days later. And from that point on, the Korean company has updated a myriad of devices until today.', 'Christopher Matthew Susanto', '2022-11-20 00:05:23', 'data/update/1668902723-samsung.jpg', '<p>The rollout of One UI 5 has thus been the fastest ever for Samsung, and the Korean company has been pretty impressive in the way it tried to cover as many devices as possible and not just stick with a few flagships this year and leave the mid-rangers for 2023. And yet, next year it wants to do even better.</p><p><br>Samsung published a post in Korea today bragging about how quick it\'s been to get One UI 5 out there to as many devices as possible, and to assure us that it\'s aiming to bring future One UI versions even faster and to more devices at the same time.</p><p>While that\'s not an actual, concrete promise, we have no doubt the company means what it says, from what we\'ve seen this year software updates are finally top priority for Samsung, as they should be. It went from one of the worst Android OEMs when it comes to updates to one of, if not <i>the</i> best, in a matter of just a few years, and it\'s looking like it wants to improve things further, which can only be great news for its customers.</p>', 'featured'),
(9, 'Microsoft fixes Windows Kerberos auth issues in emergency updates', 'Auth issues on impacted Windows versions', 'Christopher Matthew Susanto', '2022-11-20 00:06:44', 'data/update/1668902804-samsung.jpg', '<p>You can find detailed WSUS deployment instructions on the&nbsp;<a href=\"https://docs.microsoft.com/en-us/windows-server/administration/windows-server-update-services/manage/wsus-and-the-catalog-site#the-microsoft-update-catalog-site\">WSUS and the Catalog Site</a>&nbsp;and Configuration Manager instructions on the&nbsp;<a href=\"https://docs.microsoft.com/en-us/mem/configmgr/sum/get-started/synchronize-software-updates#import-updates-from-the-microsoft-update-catalog\">Import updates from the Microsoft Update Catalog</a>&nbsp;page.</p><p>\"If you are using security only updates for these versions of Windows Server, you only need to install these standalone updates for the month of November 2022,\" Microsoft added.</p><p>\"If you are using Monthly rollup updates, you will need to install both the standalone updates listed above to resolve this issue, and install the Monthly rollups released November 8, 2022 to receive the quality updates for November 2022.\"</p><p>Two years ago, Redmond addressed&nbsp;<a href=\"https://www.bleepingcomputer.com/news/microsoft/microsoft-fixes-windows-kerberos-authentication-issues-in-oob-update/\">similar Kerberos auth problems</a>&nbsp;affecting Windows systems&nbsp;<a href=\"https://www.bleepingcomputer.com/news/microsoft/windows-kerberos-authentication-breaks-due-to-security-updates/\">caused by security updates</a>&nbsp;released with the November 2020 Patch Tuesday.</p><p><i>Update&nbsp;November 18,&nbsp;21:26 EST: Added link to&nbsp;Windows Server 2008 R2 SP1 standalone update.</i></p>', 'featured'),
(10, 'Seribu Lebih Rumah Tangga di Sukabumi Terima Bantuan Sambungan Listrik Gratis', 'Seribu Lebih Rumah Tangga di Sukabumi Terima Bantuan Sambungan Listrik Gratis', 'Christopher Matthew Susanto', '2022-11-20 00:08:13', 'data/update/1668902893-seribu.jpg', '<p>Sebanyak 1.678 rumah tangga di Kabupaten Sukabumi, Jawa Barat mendapatkan sambungan listrik gratis melalui Program Bantuan Pasang Baru Listrik (BPBL). Bantuan ini merupakan program Kementerian Energi dan Sumber Daya Mineral (ESDM) hasil sinergi dengan Dewan Perwakilan Rakyat Republik Indonesia (DPR RI) dan ditujukan untuk masyarakat tidak mampu.</p><p>Direktur Pembinaan Pengusahaan Ketenagalistrikan Kementerian ESDM, Jisman Hutajulu, mengungkapkan di Provinsi Jawa Barat terdapat sebanyak 14.304 rumah tangga yang direncanakan memperoleh bantuan sambungan listrik gratis.</p><p>\"Kementerian ESDM telah merencanakan sebanyak 14.304 rumah tangga calon penerima BPBL untuk Provinsi Jawa Barat, di mana untuk Kabupaten Sukabumi akan mendapatkan 1.678 sambungan rumah tangga yang tersebar di 19 kecamatan,\" ujar Jisman pada Peresmian dan Penyalaan Pertama Program BPBL Provinsi Jawa Barat, di Desa Sirnajaya, Kecamatan Warungkiara, Kabupaten Sukabumi, Jumat (18/11/2022).</p><p>Jisman menambahkan bahwa sasaran program BPBL adalah masyarakat yang sudah ada jaringan listrik di desanya tapi belum sanggup untuk membayar biaya pemasangan instalasi listrik di rumahnya.</p><p>Dalam kesempatan yang sama, Anggota Komisi VII DRP RI Ribka Tjiptaning Proletariyati mengatakan pentingnya elektrifikasi dalam kehidupan masyarakat.</p>', 'published'),
(11, 'Gempa Pangandaran dirasakan hingga Sukabumi Jabar', 'Sukabumi, Jabar (ANTARA) - Getaran gempa bumi dengan magnitudo 5,3 yang berpusat di Kabupaten Pangandaran, Jawa Barat, pada Minggu (20/11) pukul 01.28 WIB juga dirasakan warga di Kota dan Kabupaten Sukabumi, Jabar.', 'Christopher Matthew Susanto', '2022-11-20 00:09:38', 'data/update/1668902978-gempa.jpeg', '<p>\"Kami masih melakukan pemantauan pasca-gempa,\" kata Kepala Pelaksana BPBD Kota Sukabumi Imran Wardhani, di Sukabumi, Minggu.</p><p>&nbsp;</p><p>Berdasarkan data BMKG gempa berlokasi di 8.11 LS-107.87 BT 82 kilometer barat daya Kabupaten Pangandaran dengan kedalaman 24 kilometer.</p><p><br><br>Berita ini telah tayang di Antaranews.com dengan judul: <a href=\"https://www.antaranews.com/berita/3254561/gempa-pangandaran-dirasakan-hingga-sukabumi\"><strong>Gempa Pangandaran dirasakan hingga Sukabumi</strong></a></p><p>Pewarta : Aditia Aulia Rohman<br>Editor: Hernawan Wahyudono<br>COPYRIGHT © ANTARA 2022</p>', 'published'),
(12, 'Sabtu, Positif COVID-19 di Indonesia meningkat 6.383 kasus', 'Petugas Satpol pp memberikan sosialisasi pembatasan jam malam kepada pedagang di kawasan Margonda, Depok, Jawa Barat, Senin (31/8/2020). Pemkot Depok menerapkan pembatasan jam malam yakni batas operasional pukul 18.00 WIB untuk pertokoan, pukul 20.00 WIB untuk aktivitas warga, dan pukul 21.00 WIB untuk kurir barang, terkait meningkatnya angka kasus positif dalam dua minggu terakhir. ANTARA FOTO/Asprilla Dwi Adha/aww.', 'Christopher Matthew Susanto', '2022-11-20 00:10:54', 'data/update/1668903054-covid2.jpg', '<p>Total kasus konfirmasi positif COVID-19 di Indonesia bertambah sekitar <a href=\"tel:6603195\">6.603.195</a>&nbsp;orang.&nbsp;Angka tersebut diikuti kenaikan kasus aktif sebanyak 1.444 orang. Hingga kini, 62.728 pasien COVID-19 mendapat perawatan medis.<br>&nbsp;</p><p>DKI Jakarta mencatat angka tertinggi kasus konfirmasi positif dari COVID-19 paling banyak dibandingkan provinsi lainnya sebanyak 2.628 orang.</p><p>Kemudian angka meninggal dunia akibat COVID-19 bertambah 25 orang pada hari ini, menjadikan total korban sebanyak 159.348 orang.</p>', 'published'),
(13, 'Artemis: Nasa expects humans to live on Moon this decade', 'Humans could stay on the Moon for lengthy periods during this decade, a Nasa official has told the BBC.', 'Christopher Matthew Susanto', '2022-11-20 00:12:45', 'data/update/1668903165-nasa.jpeg', '<p>Howard Hu, who leads the Orion lunar spacecraft programme for the agency, said habitats would be needed to support scientific missions.</p><p>He told Sunday with Laura Kuenssberg that Wednesday\'s launch of the Artemis rocket, which carries Orion, was a \"historic day for human space flight\".</p><p>Orion is currently about 134,000km (83,300 miles) from the Moon.</p>', 'published'),
(14, 'Sulit Kontrol Emosi? Ini 5 Cara Mengatasi Emotionally Unavailable!', 'Kamu harus percaya pada diri sendiri', 'Christopher Matthew Susanto', '2022-11-20 00:14:42', 'data/update/1668903282-emosi.jpg', '<h2>Sulit \nKontrol Emosi? Ini 5 Cara Mengatasi&nbsp;Emotionally Unavailable!</h2>\n\n<p><i>Kamu harus percaya pada diri sendiri</i></p><p><img src=\"https://cdn.idntimes.com/content-images/community/2022/11/pexels-pixabay-262075-2e4f418ea2815135699d2d70124d41f7-f90a3e31085649b914723f9aa51ca397_600x400.jpg\" alt=\"Sulit Kontrol Emosi? Ini 5 Cara Mengatasi&nbsp;Emotionally Unavailable!\">\n<br><i>Ilustrasi sedang murung (pexels.com/Pixabay)</i></p><p>Pernahkah kamu merasa sulit untuk mengenal, mengekspresikan, bahkan mengontrol <a href=\"https://www.idntimes.com/life/inspiration/abay-asyamar-1/musuh-emosi-penghancur-diri-c1c2\">emosi</a>? Kondisi ini disebut dengan&nbsp;<i>emotionally unavailable.&nbsp;</i>Selain sulit mengkespresikannya, kamu juga sulit menyimpan perasaan untuk orang lain.</p><blockquote><p>\"<i>Emotionally unavailable&nbsp;</i>mengacu pada kondisi gak mampu untuk mempertahankan ikatan emosional dengan orang lain. Wujudnya bisa berupa rasa gak peduli dan kurangnya komitmen,\" jelas Stacey Laura Lloyd, seorang <i>relationship writer </i>berpengalaman, dilansir&nbsp;<i>Brides.</i></p></blockquote>', 'published'),
(15, '7 Cowok Yellow Flag di Drakor, Bikin Panen Air Mata!', 'Akhir kisah cinta yang tragis', 'Christopher Matthew Susanto', '2022-11-20 00:17:11', 'data/update/1668903431-drakor.jpg', '<p>Persoalan cinta dalam <a href=\"https://www.idntimes.com/tag/drakor\">drakor</a> memang terlihat cukup rumit. Alur ceritanya selalu dipenuhi dengan teka-teki yang tak terduga.</p><p>Salah satunya adalah kemunculan <a href=\"https://www.idntimes.com/tag/karakter-cowok\">cowok&nbsp;</a><i>yellow flag&nbsp;</i>di drakor. Mereka digambarkan sebagai karakter utama yang kerap meninggal kemudian. Kisah cintanya tragis dan menyedihkan, deh! Meski demikian, cowok&nbsp;<i>yellow flag&nbsp;</i>di drakor tak membosankan dan mampu hipnotis penonton setia.&nbsp;</p><p>Berikut ini deretan cowok&nbsp;<i>yellow flag&nbsp;</i>di drakor yang kisah cintanya patut kamu ikuti. Meski berujung menyedihkan, tapi perjuangan mereka patut ditiru!</p><h2>1. Poong Woon Ho - 20th Century Girl</h2><p><img src=\"https://cdn.idntimes.com/content-images/community/2022/11/314475152-809810493602594-1065050154273189902-n1-e19c76cf1b28908665001625bb727ae6-c9e7aa7eb5333b5b81ea468f5cac76d0.jpg\" alt=\"7 Cowok Yellow Flag di Drakor, Bikin Panen Air Mata!\"></p><i>Poong Un Ho dalam drama 20th Century Girl (instagram.com/netflixkr)</i><p>Drama 20th Century Girl mengisahkan tentang perjalanan cinta pertama remaja SMA dengan latar tahun 90-an. Woon Ho (diperankan oleh Byeon Woo Seok) merasakan benih-benih cinta yang tumbuh sejak kedekatannya dengan remaja ceria dan bersemangat bernama kepada Bo Ra (diperankan oleh Kim You Jong).</p><p>Woon Ho dan Bo Ra memiliki rasa cinta yang sama dan sering menghabiskan waktu bersama. Sampai suatu ketika, ia harus pergi meninggalkan Korea dan berpisah dengan Bo Ra. Namun, siapa sangka jika perpisahan tersebut menjadi akhir kisah cinta mereka. Woon Ho dikabarkan meninggal sebelum sempat menemui Bo Ra, perempuan yang sangat dicintainya.</p><p><br>&nbsp;</p>', 'published'),
(16, 'Song Kang Bakal Adain Fan Meeting di Indonesia, Kapan Tuh?', 'Gak sabar ah, pengen ketemu ayang Song Kang~', 'Christopher Matthew Susanto', '2022-11-20 00:18:10', 'data/update/1668903490-songkang.png', '<p>Song Kang dipastikan akan segera kunjungi Indonesia. Ia dilaporkan akan mengadakan fan meeting untuk ketemu langsung sama SONGPYEON (sebutan untuk fans Song Kang) Indonesia.</p><p>Dari unggahan terbaru, promotor IME Indonesia dilaporkan memang Song Kang bakal mengadakan jumpa fans. Namun sayangnya, untuk waktu, informasi harga tiket serta&nbsp;<i>seatplan</i>-nya masih belum diinformasikan.</p><p><br>&nbsp;</p>', 'published'),
(17, '5 Manfaat Hidup Pisah dari Keluarga bagi Jomblo, Bisa Lebih Produktif', 'Gak usah nunggu nikah atau punya rumah', 'Christopher Matthew Susanto', '2022-11-20 00:19:44', 'data/update/1668903584-rumah.jpg', '<p>Kapan waktu yang tepat untuk seorang anak keluar dari rumah orangtua dan menjalani kehidupannya sendiri? Sebenarnya tidak ada aturan yang pasti. Namun sebaiknya saat kamu sudah siap atau setidaknya cukup umur, mulailah belajar tinggal sendiri.</p><p>Jangan tunggu sampai kamu menikah baru siap-siap pindah, kecuali ketika orangtua sedang sakit dan tak ada yang merawatnya. Justru selagi kamu jomblo, keluar dari rumah keluarga punya sejumlah manfaat. Berikut ini di antaranya!</p><h2>1. Meningkatkan produktivitas</h2>', 'published'),
(18, '5 Sebab Hadiah dari Ayah Tak Terlupakan, Kamu Masih Menyimpannya?', 'Kasih juga buat anakmu nanti', 'Christopher Matthew Susanto', '2022-11-20 00:21:02', 'data/update/1668903662-ayah.jpg', '<p>Adakah hadiah dari ayah yang masih kamu simpan hingga saat ini? Misalnya, mainan, boneka, atau <i>jersey</i>?&nbsp;Hadiah dari ayah memang bisa membekas mendalam pada perasaan anak.<br><br>Oleh sebab itu, kelak kamu menjadi ayah pun gak perlu ragu untuk memberi anak hadiah sekalipun pasanganmu sudah menyiapkan sesuatu untuknya. Ini dia lima sebab, mengapa kamu masih menyimpan hadiah dari ayah. Istimewa!</p><h2>1. Ayah jarang memberi hadiah dibandingkan ibu</h2><p><img src=\"https://cdn.idntimes.com/content-images/community/2022/11/fromandroid-18b283dabfdeace1b4e6e6661f8a27f7.jpg\" alt=\"5 Sebab Hadiah dari Ayah Tak Terlupakan, Kamu Masih Menyimpannya?\"></p><i>ilustrasi hadiah dari ayah (pexels.com/cottonbro studio)</i><p>Jarangnya ayah memberikan hadiah secara langsung pada anak bukan artinya ia pelit. Akan tetapi bisa karena hampir seluruh penghasilannya telah diberikan pada istri. Atau, ayah terlalu sibuk dan tinggal terpisah dari keluarga.<br><br>Maka begitu ayah memberikan kado, anak biasanya akan terus mengingatnya. Itu menjadi kenangan manis bagi anak sampai masa dewasanya. Kalau hadiah dari ibu malah bisa terasa biasa saja saking seringnya ia memberi anak berbagai hal.</p>', 'published'),
(19, 'Golongan Darah Dapat Memengaruhi Kepribadian? Ini Kata Ahli', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ut aliquet metus. Maecenas facilisis tortor ac facilisis pellentesque. Nulla accumsan.', 'admin', '2023-07-13 04:52:35', 'data/update/1689223955-golongan-darah.jpeg', '<p><strong>Ketsueki-gata dan teori kepribadian golongan darah</strong><br>Konsep ini menunjukkan bahwa ciri-ciri kepribadian Anda dapat dikaitkan dengan salah satu dari empat golongan darah dalam Sistem Pengelompokan Darah ABO. Menurut teori, perbedaan permukaan sel darah pada setiap golongan darah dapat menciptakan respon biologis berbeda yang membentuk kepribadian Anda.<br><br><strong>Sejarah teori kepribadian golongan darah</strong><br><br>Teori kepribadian golongan darah pertama kali diperkenalkan pada tahun 1929 ketika profesor Tokeji Furukawa menerbitkan studi tentang temperamen dan golongan darah. Dalam penelitiannya, Furukawa mengaitkan kepribadian dengan golongan darah yang berbeda.</p><p>Furukawa mempresentasikan statistik awal untuk teorinya berdasarkan sampel populasi kecil. Setelah dipublikasikan, bukti tersebut kemudian dipertanyakan karena kemungkinan pengaruh politik dan ukuran sampel yang terlalu kecil yang digunakan dalam penelitian.<br><br>Namun, teori kepribadian golongan darah tetap ada. Penelitian ini dibawa ke komunitas ilmiah untuk kedua kalinya pada tahun 1970-an oleh peneliti dan jurnalis independen Masahiko Nomi.</p><p><strong>Apakah golongan darah mempengaruhi kepribadian?</strong><br>Sejak kemunculan konsep ini di Jepang pada akhir 1920-an, teori kepribadian golongan darah telah menjadi subjek banyak penelitian di seluruh dunia. Saat ini, tidak ada bukti ilmiah yang mendukung hubungan sebab-akibat antara golongan darah seseorang dan ciri-ciri kepribadian.<br><br>Bahkan menggunakan metode investigasi saat ini, sebuah studi tahun 2021 yang memeriksa golongan darah dan kepribadian tidak menunjukkan korelasi yang signifikan.<br><br><strong>Apakah ada hubungan sama sekali antara kepribadian dan golongan darah?</strong><br>Meskipun sebagian besar penelitian menunjukkan bahwa golongan darah tidak memengaruhi kepribadian secara langsung, beberapa ahli masih percaya bahwa mungkin ada lebih banyak cerita daripada apa yang mengalir melalui pembuluh darah Anda.<br><br>Pada 2015, sebuah studi memandang kepribadian melalui kacamata hubungan antara golongan darah dan genetika.<br><br>Menurut penulis penelitian, golongan darah tertentu tampaknya memiliki kemungkinan genetik yang lebih besar untuk memproduksi bahan kimia dalam tubuh yang dapat memengaruhi impulsif dan pencarian sensasi.<br><br>Dengan cara ini, para peneliti menyarankan bahwa golongan darah mungkin terkait dengan kepribadian. Namun, ini tidak berarti bahwa golongan darah adalah penyebab perkembangan kepribadian.<br><br><strong>Golongan darah dan kepribadiannya</strong><br><br>Terlepas dari sifat kontroversial dari teori kepribadian golongan darah, konsep Furukawa tetap menjadi kepercayaan yang tersebar luas di seluruh dunia.<br><br>Teori kepribadian golongan darah menggunakan Sistem Pengelompokan Darah ABO. Sistem standar ini mengkategorikan golongan darah menjadi empat kelompok:<br><br>-Golongan darah A<br>-Golongan darah B<br>-Golongan darah AB<br>-Golongan darah O<br><br>Golongan darah Anda ditentukan oleh adanya antigen, atau penanda permukaan, pada sel Anda. Penanda ini berkomunikasi dengan sistem kekebalan Anda untuk membuat Anda tetap sehat. Mereka memberi tahu tubuh Anda sel mana yang milik Anda, mana yang tidak berbahaya, dan mana yang tidak termasuk di sana.<br><br><strong>Berikut ini analisa tentang kepribadian seseorang menurut golongan darah:</strong><br><br>Ciri-ciri kepribadian golongan darah A<br><br>Cerdik<br>-Setia<br>-Peka<br>-Kooperatif<br>-Terorganisir<br>-Konsisten<br>-Kreatif<br>-Keras kepala<br>-Dapat diandalkan<br>-Dapat dipercaya<br><br>Ciri-ciri kepribadian golongan darah B</p><p>-Penuh semangat<br>-Riang dan Ceria<br>-Penentu<br>-Empatik<br>-Hiper-fokus<br>-Rajin giat<br>-Egois<br>-Tidak kooperatif<br>-Ambisius</p><p>Ciri-ciri kepribadian golongan darah AB<br><br>-Populer<br>-Merawat<br>-Diandalkan<br>-Rasional<br>-Ragu<br>-Kritis<br>-Egois<br>-Ramah<br>-Pelupa</p><p>Jika Anda memiliki golongan darah AB, teori kepribadian golongan darah menunjukkan bahwa Anda mungkin memiliki campuran antara golongan darah A dan B.<br><br>Ciri-ciri kepribadian golongan darah O<br><br>-Percaya diri<br>-Intuitif<br>-Dermawan<br>-Baik<br>-Optimis<br>-Cemburu<br>-Tidak peka<br>-Arogan<br>-Tidak dapat diprediksi<br><br><strong>Pro dan kontra teori kepribadian golongan darah</strong><br><br>Dalam karya aslinya, Furukawa berusaha menjelaskan proses psikologis melalui proses fisiologis.</p><p><strong>Pro</strong><br>Meskipun tidak ada bukti pasti yang menunjukkan bahwa golongan darah dapat secara langsung membentuk kepribadian Anda, proses fisik dalam tubuh Anda dapat memengaruhi pikiran, perasaan, dan perilaku Anda.</p><p>Ketidakseimbangan kimiawi, misalnya, dapat menyebabkan fluktuasi suasana hati. Karena suasana hati Anda sering dikaitkan dengan kepribadian Anda, mudah untuk melihat bagaimana mereka dapat diikat bersama.<br><br>Teori kepribadian golongan darah mungkin tidak didukung oleh penelitian ilmiah, tetapi hal itu membawa perhatian pada bagaimana tubuh dapat mempengaruhi pikiran dan sebaliknya.<br><br><strong>Kontra</strong><br><br>Namun, kelemahan dari teori dengan banyak pengikut tetapi tidak ada dukungan empiris adalah bahwa teori tersebut sering kali dapat memengaruhi kehidupan orang tanpa sebab.</p><p>Di Jepang misalnya, teori kepribadian golongan darah masih diterima secara luas. Orang mungkin mendasarkan banyak keputusan besar dalam hidup pada golongan darah, seperti pernikahan, pekerjaan dan pilihan karier, keselarasan politik lingkaran sosial dan aliansi.</p><p>Teori kepribadian golongan darah Furukawa bahkan telah membawa praktik budaya di Jepang yang dikenal sebagai \"bura-hara,\" yang merupakan diskriminasi atau pelecehan golongan darah.</p><p><strong>Hubungan golongan darah dengan kesehatan</strong><br><br>Meskipun saat ini tidak ada bukti ilmiah yang mendukung gagasan bahwa kepribadian Anda mungkin secara langsung dipengaruhi oleh golongan darah Anda, beberapa aspek kesehatan fisik mungkin terkait dengan golongan darah Anda.<br><br>Penelitian dari tahun 2021 menunjukkan bahwa sebanyak 49 penyakit dapat dipengaruhi oleh golongan darah - dan khususnya, terkait dengan golongan darah ABO.</p>', 'featured'),
(20, ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ac imperdiet nisl. Nam tincidunt vehicula ornare. Quisque eu vestibulum nisl. Ut sit amet porta est. Curabitur vel dictum metus, vitae elementum purus. Donec et nunc auctor, vehicula lacus sit amet, auctor eros. Sed et tincidunt eros, ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ut aliquet metus. Maecenas facilisis tortor ac facilisis pellentesque. Nulla accumsan.', 'admin', '2023-07-13 06:11:46', 'data/update/1689228706-Air-entraining admixtures.jpg', '', 'deleted');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `admin_log`
--
ALTER TABLE `admin_log`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `admin_id_fk` (`admin_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `company_profile`
--
ALTER TABLE `company_profile`
  ADD PRIMARY KEY (`id_fitur`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id_msg`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_subcategory`
--
ALTER TABLE `product_subcategory`
  ADD PRIMARY KEY (`ps_id`),
  ADD KEY `product_id_fk` (`product_id`),
  ADD KEY `subcat_id_fk` (`subcategory_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`sub_id`),
  ADD KEY `cat_id_fk` (`cat_id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`testi_id`);

--
-- Indexes for table `updates`
--
ALTER TABLE `updates`
  ADD PRIMARY KEY (`upd_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `admin_log`
--
ALTER TABLE `admin_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=316;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `company_profile`
--
ALTER TABLE `company_profile`
  MODIFY `id_fitur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id_msg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `product_subcategory`
--
ALTER TABLE `product_subcategory`
  MODIFY `ps_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `testi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `updates`
--
ALTER TABLE `updates`
  MODIFY `upd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_log`
--
ALTER TABLE `admin_log`
  ADD CONSTRAINT `admin_id_fk` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`adm_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `product_subcategory`
--
ALTER TABLE `product_subcategory`
  ADD CONSTRAINT `product_id_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `subcat_id_fk` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`sub_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `cat_id_fk` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;