-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2022 at 02:32 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

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
  `adm_join_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `adm_password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adm_id`, `adm_name`, `adm_email`, `adm_join_date`, `adm_password`) VALUES
(1, 'Ella Arminta', 'admin@gmail.com', '2022-10-01 04:30:31', '$2y$10$i5usiBxAtRVugFL6G4RbP.cmdRXTsmhF5SGACFq8Gm9v83N0EIUn6'),
(4, 'Admin Kedua', 'admin2@gmail.com', '2022-10-01 04:38:56', '$2y$10$Stbeoh1a7yCIPP17Za43MuI6.GOaBu1CbAfjEeGDwMeVmMklii6R.'),
(5, 'ella Arminta', 'armintaella15@gmail.com', '2022-10-02 14:57:38', '$2y$10$O1ow4./KKAX8z/3iUXi6P.3hlTZeb02rNVh4p9yNlcLyy2/Jvg2ui'),
(6, 'matthew', 'matthew@gmail.com', '2022-10-02 15:16:44', '$2y$10$sx7AUzxv0eh3WTUucIR8WeYPBHHQse1HL6g1mIkj0f2yfliOZefY.');

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
(1, 'update', 'Ella Arminta updated home_title', '2022-10-26 19:56:34', 1, 'Are You Looking For A Great Product And Solution?'),
(2, 'update', 'Ella Arminta updated home_desc', '2022-10-26 19:56:44', 1, 'We provide products to suit your needs to support your business. To find out more, click the button below'),
(3, 'Add Faq', 'Ella Arminta added faq with the title : Lorem Ipsum dolor sit ? to client list.', '2022-10-26 19:58:54', 1, 'none'),
(4, 'Add Faq', 'Ella Arminta added faq with the title : Lorem Ipsum Dolor Sit ? to client list.', '2022-10-26 19:59:07', 1, 'none'),
(5, 'Add Faq', 'Ella Arminta added faq with the title : Lorem Ipsum Dolor Sit ? to client list.', '2022-10-26 19:59:20', 1, 'none'),
(6, 'Add Faq', 'Ella Arminta added faq with the title : Lorem Ipsum Dolor Sit? to client list.', '2022-10-26 19:59:34', 1, 'none'),
(7, 'Add Faq', 'Ella Arminta added faq with the title : Lorem Ipsum Dolor Sit? to client list.', '2022-10-26 19:59:47', 1, 'none'),
(8, 'add category', 'Ella Arminta has added a category named Rubber Industries', '2022-10-26 20:02:22', 1, 'Rubber Industries'),
(9, 'add category', 'Ella Arminta has added a category named Plastic Industries', '2022-10-26 20:02:44', 1, 'Plastic Industries'),
(10, 'add category', 'Ella Arminta has added a category named Die Casting', '2022-10-26 20:03:01', 1, 'Die Casting'),
(11, 'add category', 'Ella Arminta has added a category named Coating and Ink Industries', '2022-10-26 20:03:26', 1, 'Coating and Ink Industries'),
(12, 'add category', 'Ella Arminta has added a category named Acrylic Sheet', '2022-10-26 20:03:40', 1, 'Acrylic Sheet'),
(13, 'add subcategory', 'Ella Arminta has added a subcategori named Agent', '2022-10-26 20:14:10', 1, 'Agent'),
(14, 'add subcategory', 'Ella Arminta has added a subcategori named Fillers', '2022-10-26 20:14:17', 1, 'Fillers'),
(15, 'add subcategory', 'Ella Arminta has added a subcategori named Rubbers', '2022-10-26 20:14:32', 1, 'Rubbers'),
(16, 'add subcategory', 'Ella Arminta has added a subcategori named Acid', '2022-10-26 20:14:42', 1, 'Acid'),
(17, 'add subcategory', 'Ella Arminta has added a subcategori named Dispersion', '2022-10-26 20:15:01', 1, 'Dispersion'),
(18, 'add subcategory', 'Ella Arminta has added a subcategori named Agent', '2022-10-26 20:15:09', 1, 'Agent'),
(19, 'add subcategory', 'Ella Arminta has added a subcategori named Acid', '2022-10-26 20:15:23', 1, 'Acid'),
(20, 'add subcategory', 'Ella Arminta has added a subcategori named Others', '2022-10-26 20:15:31', 1, 'Others'),
(21, 'add subcategory', 'Ella Arminta has added a subcategori named Lubricant', '2022-10-26 20:15:47', 1, 'Lubricant'),
(22, 'delete subcategory', 'Ella Arminta has delete a subcategory named LB', '2022-10-26 20:15:59', 1, 'LB'),
(23, 'add subcategory', 'Ella Arminta has added a subcategori named Lubricant', '2022-10-26 20:16:09', 1, 'Lubricant'),
(24, 'add subcategory', 'Ella Arminta has added a subcategori named Fluid', '2022-10-26 20:16:21', 1, 'Fluid'),
(25, 'add subcategory', 'Ella Arminta has added a subcategori named Coating', '2022-10-26 20:16:30', 1, 'Coating'),
(26, 'add subcategory', 'Ella Arminta has added a subcategori named Resins', '2022-10-26 20:17:09', 1, 'Resins'),
(27, 'add subcategory', 'Ella Arminta has added a subcategori named Agents', '2022-10-26 20:17:24', 1, 'Agents'),
(28, 'add subcategory', 'Ella Arminta has added a subcategori named Fillers', '2022-10-26 20:17:35', 1, 'Fillers'),
(29, 'add subcategory', 'Ella Arminta has added a subcategori named Bio Chemicals', '2022-10-26 20:17:47', 1, 'Bio Chemicals'),
(30, 'add subcategory', 'Ella Arminta has added a subcategori named Glazings', '2022-10-26 20:18:19', 1, 'Glazings'),
(31, 'add subcategory', 'Ella Arminta has added a subcategori named Safety', '2022-10-26 20:18:28', 1, 'Safety'),
(32, 'add subcategory', 'Ella Arminta has added a subcategori named Other', '2022-10-26 20:18:37', 1, 'Other'),
(33, 'add subcategory', 'Ella Arminta has added a subcategori named Textile Chemicals', '2022-10-26 20:19:34', 1, 'Textile Chemicals'),
(34, 'add subcategory', 'Ella Arminta has added a subcategori named Abrasive Industry', '2022-10-26 20:19:55', 1, 'Abrasive Industry'),
(35, 'add subcategory', 'Ella Arminta has added a subcategori named Glass Industry', '2022-10-26 20:20:07', 1, 'Glass Industry'),
(36, 'add subcategory', 'Ella Arminta has added a subcategori named Building Materials Formulation', '2022-10-26 20:20:27', 1, 'Building Materials Formulation'),
(37, 'add subcategory', 'Ella Arminta has added a subcategori named Oil and Gas Industries', '2022-10-26 20:20:45', 1, 'Oil and Gas Industries'),
(38, 'delete product', 'Ella Arminta has delete a product with the code PPL', '2022-10-26 21:00:36', 1, 'PPL');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_code` varchar(100) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_img` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_code`, `cat_name`, `cat_img`, `status`) VALUES
(1, 'RI', 'Rubber Industries', 'data/category/rubber.jpg', 1),
(2, 'PI', 'Plastic Industries', 'data/category/plastic.jpg', 1),
(3, 'DC', 'Die Casting', 'data/category/casting.jpg', 1),
(4, 'CII', 'Coating and Ink Industries', 'data/category/ink.jpg', 1),
(5, 'AS', 'Acrylic Sheet', 'data/category/acrylic.jpg', 1),
(6, 'OI', 'Other Industries', '', 1);

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
(4, 'who_desc', 'We are one of the major players in the field of specialty chemicals for rubber, coating, cable, die casting and other industrial chemicals. We serve the needs of speciality chemicals from industrial users, to create additional value for the output product. We would like to provide our customers high quality products and satisfied servi'),
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
(18, 'address', 'Jl. Raya Serpong Km. 7 - Pakulonan Serpong Utara - Tanggerang Selatan Indonesia - 10000'),
(19, 'phone', 'Phone: +62 21 5398 318 '),
(20, 'email', 'Email: phoenix-spm@sumberphoenix.co.id  '),
(21, 'why_us_title1', 'Well Trained Marketing'),
(22, 'why_us_desc1', 'We have professional experts to recommend which products are suitable for developing your business'),
(23, 'why_us_title2', 'Trusted\n'),
(24, 'why_us_desc2', 'We are the company that Strong International Connection, Enable Us to Procure and Provide a Wide Range of Chemical Supply'),
(25, 'why_us_title3', 'Responsive Customer Service'),
(26, 'why_us_desc3', 'We are always communicative, friendly and always willing to help you improve your business for the better'),
(27, 'why_us_title4', 'Spacious Warehouse Facility'),
(28, 'why_us_desc4', 'We have a warehouse that can contains a lot of goods and with supporting facilities'),
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
(4, 'Lorem Ipsum Dolor Sit?', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus laboriosam quasi magni mollitia illum sint harum deleniti atque tenetur sapiente, quam sunt, molestiae unde ratione nemo velit! Molestiae, repellendus totam.'),
(5, 'Lorem Ipsum Dolor Sit?', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus laboriosam quasi magni mollitia illum sint harum deleniti atque tenetur sapiente, quam sunt, molestiae unde ratione nemo velit! Molestiae, repellendus totam.');

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
(1, 'Silane Coupling Agent', 'SILANE', 'data/product/download.jpeg', 'Adhesion promoters, or coupling agents, are chemicals that act at the interface between an organic polymer and an inorganic substrate to enhance adhesion ...', 'Any TIme', '5 Star', 1, 0, 1),
(2, 'Synthetic Rubbers', 'SR', 'data/product/download (1).jpeg', '      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum                                                      \n                                                        ', 'Free', '24 Hours a day', 1, 1, 1),
(3, ' Natural Rubbers', 'NR', 'data/product/download (2).jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'From Somewhere', '24 Hours', 1, 0, 0),
(4, 'Pigment Dispersion', 'PD', 'data/product/download (3).jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'The fastest delivery', 'Provide a 24 hour customer service', 1, 0, 0),
(5, 'Anti Scratch', 'AS', 'data/product/images.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'The fastest delivery', 'Provide a 24 hour customer service', 1, 0, 0),
(6, 'Slip Agent', 'SA', 'data/product/download (4).jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'The fastest delivery', 'Provide a 24 hour customer service', 1, 1, 0),
(7, 'Plastic Additives', 'PLA', 'data/product/download (5).jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'The fastest delivery', 'Provide a 24 hour customer service', 1, 0, 1),
(8, 'Mould Release Agent', 'MRA', 'data/product/download (6).jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'The fastest delivery', 'Provide a 24 hour customer service', 1, 0, 0),
(9, 'Resins', 'RS1', 'data/product/download (7).jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'The fastest delivery', 'Provide a 24 hour customer service', 1, 1, 0),
(10, 'Plunger Pellet Lubricant', 'PPL', 'data/product/download (8).jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'The fastest delivery', 'Provide a 24 hour customer service', 0, 0, 0),
(11, 'Dosing Machine for Plunger Lubricant', 'DMPL', 'data/product/download (9).jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'The fastest delivery', 'Provide a 24 hour customer service', 1, 0, 0),
(12, 'Mold Release', 'MR', 'data/product/images.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'The fastest delivery', 'Provide a 24 hour customer service', 1, 0, 0),
(13, ' Adhesion Promotors', 'AP', 'data/product/download (10).jpeg', '<p>Adhesion promoters, or coupling agents, are <strong>chemicals that act at the interface between an organic polymer and an inorganic substrate to enhance adhesion between the two materials</strong>.</p><p>&nbsp;</p><ol><li>Adhesion promoters, or coupling agents, are <strong>chemicals that act at the interface between an organic polymer and an inorganic substrate to enhance adhesion between the two materials</strong>.</li><li>Adhesion promoters, or coupling agents, are <strong>chemicals that act at the interface between an organic polymer and an inorganic substrate to enhance adhesion between the two materials</strong>.</li><li>Adhesion promoters, or coupling agents, are <strong>chemicals that act at the interface between an organic polymer and an inorganic substrate to enhance adhesion between the two materials</strong>.</li></ol>', 'The Fastest Delivery', '24 Hours', 1, 0, 1),
(14, 'Slipping Agents', 'SAS', 'data/product/download (11).jpeg', '<p>Additives, which enhance and reduce handling problems, are used extensively in the manufacture of polyolefin films. In their natural state, most polyolefins exhibit a degree of ‘tackiness,’ and therefore cannot be readily processed into packaging films without the presence of additives to ease their ability to “separate and slide.”</p><p>“Slip” additives are used to reduce a film’s resistance to sliding over itself or parts of converting equipment. Commercially important slips can be found in the chemical family known as amides, and are typically referred to as “fast bloom” (oleamide) and “slow bloom” (erucamide) additives. Other amides are used specifically for special processes (e.g. higher heat extrusion coating applications or customized mixtures where balancing slip and antiblock properties are critical.)</p><p>The effectiveness of slip additives are normally determined by the<strong> coefficient of friction (COF)</strong> it allows, which is measured using ASTM D-1894, “Standard Method of Test for Coefficient of Friction of Plastic Film.” COF is a ratio of the force required to slide one layer of film across another relative to the gravimetric force exerted on it. Loosely defined, films can be&nbsp;characterized as “low, medium, or high slip” as follows:</p>', 'The fastest delivery', 'Provide a 24 hour customer service', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_subcategory`
--

CREATE TABLE `product_subcategory` (
  `product_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_subcategory`
--

INSERT INTO `product_subcategory` (`product_id`, `subcategory_id`) VALUES
(1, 1),
(1, 4),
(2, 1),
(2, 2),
(2, 3),
(3, 3),
(3, 4),
(4, 5),
(5, 12),
(6, 5),
(6, 6),
(7, 8),
(8, 6),
(8, 7),
(8, 8),
(9, 7),
(9, 8),
(10, 10),
(11, 10),
(12, 12),
(13, 15),
(13, 16),
(14, 14);

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
(1, 1, 'AG1', 'Agent', 1),
(2, 1, 'FL', 'Fillers', 1),
(3, 1, 'RS', 'Rubbers', 1),
(4, 1, 'AC', 'Acid', 1),
(5, 2, 'DP', 'Dispersion', 1),
(6, 2, 'AG', 'Agent', 1),
(7, 2, 'AC2', 'Acid', 1),
(8, 2, 'OT', 'Others', 1),
(9, 2, 'LB', 'Lubricant', 0),
(10, 3, 'LC', 'Lubricant', 1),
(11, 3, 'FL2', 'Fluid', 1),
(12, 3, 'CT', 'Coating', 1),
(13, 4, 'RNS', 'Resins', 1),
(14, 4, 'AGS', 'Agents', 1),
(15, 4, 'FLRS', 'Fillers', 1),
(16, 4, 'BC', 'Bio Chemicals', 1),
(17, 5, 'GZ', 'Glazings', 1),
(18, 5, 'SF', 'Safety', 1),
(19, 5, 'OT2', 'Other', 1),
(20, 6, 'TX', 'Textile Chemicals', 1),
(21, 6, 'AI', 'Abrasive Industry', 1),
(22, 6, 'GI', 'Glass Industry', 1),
(23, 6, 'BMF', 'Building Materials Formulation', 1),
(24, 6, 'OGI', 'Oil and Gas Industries', 1);

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
(7, 'Lorem Ipsum', 'Lorem Ipsum', 'data/testimonials/Lorem IpsumLorem Ipsumcb260c790c1708d0404462d00a1f2a63.png', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', '2022-10-26 14:23:24', 2);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_subcategory`
--
ALTER TABLE `product_subcategory`
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `admin_log`
--
ALTER TABLE `admin_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `testi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
