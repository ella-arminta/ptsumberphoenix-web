-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2023 at 04:51 PM
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
  `adm_join_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `adm_password` text NOT NULL,
  `master` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adm_id`, `adm_name`, `adm_email`, `adm_join_date`, `adm_password`, `master`) VALUES
(1, 'Ella Arminta', 'admin@gmail.com', '2022-11-18 07:12:30', '$2y$10$i5usiBxAtRVugFL6G4RbP.cmdRXTsmhF5SGACFq8Gm9v83N0EIUn6', 1),
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
(38, 'delete product', 'Ella Arminta has delete a product with the code PPL', '2022-10-26 21:00:36', 1, 'PPL'),
(39, 'delete category', 'Ella Arminta has delete a category named H', '2022-10-28 08:48:56', 1, 'H'),
(40, 'add category', 'Ella Arminta has added a category named HAI', '2022-10-28 08:49:21', 1, 'HAI'),
(41, 'add category', 'Ella Arminta has added a category named Test', '2022-10-28 08:50:50', 1, 'Test'),
(42, 'delete category', 'Ella Arminta has delete a category named TEST', '2022-10-28 08:50:57', 1, 'TEST'),
(43, 'delete category', 'Ella Arminta has delete a category named TC', '2022-10-28 09:05:03', 1, 'TC'),
(44, 'delete category', 'Ella Arminta has delete a category named H', '2022-10-28 09:15:42', 1, 'H'),
(45, 'add category', 'Ella Arminta has added a category named TEST', '2022-10-28 09:23:43', 1, 'TEST'),
(46, 'add subcategory', 'Ella Arminta has added a subcategori named test', '2022-10-28 09:24:08', 1, 'test'),
(47, 'add category', 'Ella Arminta has added a category named New Category', '2022-11-11 18:09:42', 1, 'New Category'),
(48, 'delete category', 'Ella Arminta has delete a category named NC', '2022-11-11 18:11:28', 1, 'NC'),
(49, 'add category', 'Ella Arminta has added a category named New Category', '2022-11-11 18:12:43', 1, 'New Category'),
(50, 'delete product', 'Ella Arminta has delete a product with the code HL', '2022-11-12 06:25:09', 1, 'HL'),
(51, 'delete product', 'Ella Arminta has delete a product with the code HL', '2022-11-12 06:47:37', 1, 'HL'),
(52, 'delete product', 'Ella Arminta has delete a product with the code HL', '2022-11-12 06:49:17', 1, 'HL'),
(53, 'delete product', 'Ella Arminta has delete a product with the code HL', '2022-11-12 06:50:25', 1, 'HL'),
(54, 'add category', 'Ella Arminta has added a category named cat baru', '2022-11-14 11:33:54', 1, 'cat baru'),
(55, 'delete testi', 'Ella Arminta has deleted testimony from Lorem Ipsum', '2022-11-18 13:09:30', 1, '7'),
(56, 'delete faq', 'Ella Arminta has deleted faq with the title Lorem Ipsum Dolor Sit? from faq list.', '2022-11-18 13:12:06', 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus laboriosam quasi magni mollitia illum sint harum deleniti atque tenetur sapiente, quam sunt, molestiae unde ratione nemo velit! Molestiae, repellendus totam.'),
(57, 'Reorder Category', 'Ella Arminta has reordered the category.', '2022-11-18 13:20:44', 1, ''),
(58, 'set bestseller', 'Ella Arminta has set best seller for product named Slipping Agents', '2022-11-18 13:29:05', 1, 'SAS'),
(59, 'remove bestseller', 'Ella Arminta has remove best seller for product named Slipping Agents', '2022-11-18 13:29:20', 1, 'SAS'),
(60, 'set featured', 'Ella Arminta has set feature for product named Slipping Agents', '2022-11-18 13:30:43', 1, 'SAS'),
(61, 'remove featured', 'Ella Arminta has remove feature for product named Slipping Agents', '2022-11-18 13:30:53', 1, 'SAS'),
(62, 'delete admin', 'Ella Arminta deleted Admin Kedua from admin', '2022-11-18 15:11:18', 1, 'Admin Kedua'),
(63, 'delete admin', 'Ella Arminta deleted ella Arminta from admin', '2022-11-18 15:12:10', 1, 'ella Arminta'),
(64, 'addAdmin', 'Ella Arminta added Admin one as an admin', '2022-11-18 15:15:24', 1, 'none'),
(65, 'delete admin', 'Ella Arminta deleted Admin one from admin', '2022-11-18 15:15:51', 1, 'Admin one'),
(66, 'addAdmin', 'Ella Arminta added Admin one as an admin', '2022-11-18 15:16:16', 1, 'none'),
(67, 'delete admin', 'Ella Arminta deleted Admin one from admin', '2022-11-18 15:16:24', 1, 'Admin one'),
(68, 'read message', 'Ella Arminta has read the message with subject of hai', '2022-11-18 17:05:51', 1, '2'),
(69, 'read message', 'Ella Arminta has read the message with subject of hai', '2022-11-18 17:10:05', 1, '2'),
(70, 'add product', 'Ella Arminta has added a product with the code PD11', '2022-11-19 17:28:50', 1, 'PD11'),
(71, 'reorder category', 'Ella Arminta has reordered the category.', '2022-11-22 21:14:54', 1, ''),
(72, 'add product', 'Ella Arminta has added a product with the code BJ', '2023-01-15 21:50:16', 1, 'BJ'),
(73, 'add product', 'Ella Arminta has added a product with the code BJ', '2023-01-15 21:50:16', 1, 'BJ'),
(74, 'delete product', 'Ella Arminta has delete a product with the code BJ', '2023-01-15 21:51:32', 1, 'BJ'),
(75, 'update', 'Ella Arminta updated address', '2023-01-15 22:00:30', 1, 'Jl. Raya Serpong Km. 7 - Pakulonan Serpong Utara - Tanggerang Selatan Indonesia - 10000'),
(76, 'update', 'Ella Arminta updated phone', '2023-01-15 22:00:45', 1, '+62 21 5398 318 '),
(77, 'update', 'Ella Arminta updated phone', '2023-01-15 22:00:54', 1, 'Phone: +62 21 5398 318  3'),
(78, 'update', 'Ella Arminta updated email', '2023-01-15 22:01:03', 1, 'phoenix-spm@sumberphoenix.co.id  '),
(79, 'update', 'Ella Arminta updated email', '2023-01-15 22:01:11', 1, 'Email: phoenix-spm@sumberphoenix.co.id a'),
(80, 'update', 'Ella Arminta updated phone', '2023-01-15 22:01:18', 1, 'Phone: +62 21 5398 318 '),
(81, 'update', 'Ella Arminta updated address', '2023-01-15 22:01:26', 1, 'Jl. Raya Serpong Km. 7 - Pakulonan Serpong Utara - Tanggerang Selatan Indonesia - 1120 ');

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
(1, 'RI', 'Rubber Industries', 'data/category/rubber.jpg', 1, 8),
(2, 'PI', 'Plastic Industries', 'data/category/plastic.jpg', 1, 7),
(3, 'DC', 'Die Casting', 'data/category/casting.jpg', 1, 4),
(4, 'CII', 'Coating and Ink Industries', 'data/category/ink.jpg', 1, 2),
(5, 'AS', 'Acrylic Sheet', 'data/category/acrylic.jpg', 1, 3),
(6, 'OI', 'Other Industries', '', 1, 6),
(7, 'TC', 'Testing Category', '', 0, 0),
(8, 'H', 'Hai', 'data/category/PETA depan x25 (1).png', 0, 0),
(9, 'H', 'HAI', 'data/category/PETA depan x25 (1).png', 0, 0),
(10, 'TEST', 'Test', 'data/category/PETA depan x25 (1).png', 0, 0),
(11, 'TEST', 'TEST', 'data/category/download (2).jpeg', 1, 9),
(12, 'NC', 'New Category', 'data/category/Background.png', 0, 0),
(13, 'NC', 'New Category', 'data/category/images.png', 1, 5),
(14, 'CB', 'cat baru', 'data/category/3.jpg', 1, 1);

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
(18, 'address', 'Jl. Raya Serpong Km. 7 - Pakulonan Serpong Utara - Tanggerang Selatan Indonesia - 100000'),
(19, 'phone', 'Phone: +62 21 5398 318'),
(20, 'email', 'Email: phoenix-spm@sumberphoenix.co.id'),
(21, 'why_us_title1', 'Well Trained Marketing'),
(22, 'why_us_desc1', 'We have professional experts to recommend which products are suitable for developing your business'),
(23, 'why_us_title2', 'Trusted\n'),
(24, 'why_us_desc2', 'We are the company that Strong International Connection, Enable Us to Procure and Provide a Wide Range of Chemical Supply'),
(25, 'why_us_title3', 'Responsive Customer Service'),
(26, 'why_us_desc3', 'We are always communicative, friendly and always willing to help you improve your business for the better'),
(27, 'why_us_title4', 'Spacious Warehouse Facility'),
(28, 'why_us_desc4', 'We have a warehouse that can contains a lot of goods and with supporting facilities'),
(29, 'statistics_total1', '234'),
(30, 'statistics_title1', 'Happy Clients 1'),
(31, 'statistics_desc1', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur nisi cupiditate totam, aliquam, eligendi quaerat labore adipisci eos nostrum debitis unde iure quia eveniet, incidunt beatae! Velit unde distinctio sunt! 1'),
(32, 'statistics_total2', '521'),
(33, 'statistics_title2', 'Projects 2'),
(34, 'statistics_desc2', '2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur nisi cupiditate totam, aliquam, eligendi quaerat labore adipisci eos nostrum debitis unde iure quia eveniet, incidunt beatae! Velit unde distinctio sunt! 2'),
(35, 'statistics_total3', '19'),
(36, 'statistics_title3', 'Years Of Support 3'),
(37, 'statistics_desc3', '3 Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur nisi cupiditate totam, aliquam, eligendi quaerat labore adipisci eos nostrum debitis unde iure quia eveniet, incidunt beatae! Velit unde distinctio sunt! 3'),
(38, 'statistics_total4', '50'),
(39, 'statistics_title4', 'Workers'),
(40, 'statistics_desc4', '4 Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur nisi cupiditate totam, aliquam, eligendi quaerat labore adipisci eos nostrum debitis unde iure quia eveniet, incidunt beatae! Velit unde distinctio sunt!'),
(42, 'logo', 'logo.png'),
(44, 'instagram', 'https://www.instagram.com/sumberphoenixmakmur.id/'),
(45, 'linkedin', 'linklinkedin'),
(46, 'facebook', 'linkfacebook'),
(47, 'twitter', 'linktwitter');

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
(1, 'Agus Handoko', 'data/team/cb260c790c1708d0404462d00a1f2a63.png', 'Director', 'https://www.instagram.com/ellaarminta/', 'https://www.linkedin.com/in/ella-arminta-601863222/', 'https://web.facebook.com/login.php?next=https%3A%2F%2Fweb.facebook.com%2Fsettings', 'https://twitter.com/genta_petra?lang=en'),
(2, 'Mark Robert', 'data/team/8c3718db2ab00a5bfa5c54131b0514fb.jpg', 'CFO', 'https://www.instagram.com/ellaarminta/', 'https://www.linkedin.com/in/ella-arminta-601863222/', 'https://web.facebook.com/login.php?next=https%3A%2F%2Fweb.facebook.com%2Fsettings', 'https://twitter.com/genta_petra?lang=en'),
(3, 'Daniel Davidson', 'data/team/133ea652aca37c001130ff89da8fd9ae.jpg', 'CMO', 'https://www.instagram.com/ellaarminta/', 'https://www.linkedin.com/in/ella-arminta-601863222/', 'https://web.facebook.com/login.php?next=https%3A%2F%2Fweb.facebook.com%2Fsettings', 'https://twitter.com/genta_petra?lang=en'),
(4, 'Roger Hartono', 'data/team/d83b1e8bba94cb86f4f109ee2ab3b6bd.jpg', 'CTO', 'https://www.instagram.com/ellaarminta/', 'https://www.linkedin.com/in/ella-arminta-601863222/', 'https://web.facebook.com/login.php?next=https%3A%2F%2Fweb.facebook.com%2Fsettings', 'https://twitter.com/genta_petra?lang=en');

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

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id_msg`, `name`, `email`, `subject`, `msg`, `timesent`, `status`) VALUES
(1, 'ella', 'brigittaella15@gmail.com', 'hai', 'hai\r\nhai', '2022-11-18 09:08:04', 'seen'),
(2, 'leon', 'leonbenediktus@gmail.com', 'hai', 'hai ini leon terima kaish telah memberikan yang terbaik', '2022-11-18 10:02:08', 'seen');

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
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `best_seller` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_code`, `product_img`, `product_desc`, `status`, `featured`, `best_seller`) VALUES
(1, 'Silane Coupling Agent', 'SILANE', 'data/product/download.jpeg', 'Adhesion promoters, or coupling agents, are chemicals that act at the interface between an organic polymer and an inorganic substrate to enhance adhesion ...', 1, 0, 1),
(2, 'Synthetic Rubbers', 'SR', 'data/product/download (1).jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum                                                      \n                                                        ', 1, 0, 1),
(3, ' Natural Rubbers', 'NR', 'data/product/download (2).jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 1, 0, 0),
(4, 'Pigment Dispersion', 'PD', 'data/product/download (3).jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 1, 0, 0),
(5, 'Anti Scratch', 'AS', 'data/product/images.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 1, 0, 0),
(6, 'Slip Agent', 'SA', 'data/product/download (4).jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 1, 1, 0),
(7, 'Plastic Additives', 'PLA', 'data/product/download (5).jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 1, 0, 1),
(8, 'Mould Release Agent', 'MRA', 'data/product/download (6).jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 1, 0, 0),
(9, 'Resins', 'RS1', 'data/product/download (7).jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 1, 1, 1),
(10, 'Plunger Pellet Lubricant', 'PPL', 'data/product/download (8).jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 0, 0, 0),
(11, 'Dosing Machine for Plunger Lubricant', 'DMPL', 'data/product/download (9).jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 1, 0, 0),
(12, 'Mold Release', 'MR', 'data/product/images.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 1, 0, 0),
(13, ' Adhesion Promotors', 'AP', 'data/product/download (10).jpeg', '<p>Adhesion promoters, or coupling agents, are <strong>chemicals that act at the interface between an organic polymer and an inorganic substrate to enhance adhesion between the two materials</strong>.</p><p>&nbsp;</p><ol><li>Adhesion promoters, or coupling agents, are <strong>chemicals that act at the interface between an organic polymer and an inorganic substrate to enhance adhesion between the two materials</strong>.</li><li>Adhesion promoters, or coupling agents, are <strong>chemicals that act at the interface between an organic polymer and an inorganic substrate to enhance adhesion between the two materials</strong>.</li><li>Adhesion promoters, or coupling agents, are <strong>chemicals that act at the interface between an organic polymer and an inorganic substrate to enhance adhesion between the two materials</strong>.</li></ol>', 1, 0, 1),
(14, 'Slipping Agents', 'SAS', 'data/product/download (11).jpeg', '<p>Additives, which enhance and reduce handling problems, are used extensively in the manufacture of polyolefin films. In their natural state, most polyolefins exhibit a degree of ‘tackiness,’ and therefore cannot be readily processed into packaging films without the presence of additives to ease their ability to “separate and slide.”</p><p>“Slip” additives are used to reduce a film’s resistance to sliding over itself or parts of converting equipment. Commercially important slips can be found in the chemical family known as amides, and are typically referred to as “fast bloom” (oleamide) and “slow bloom” (erucamide) additives. Other amides are used specifically for special processes (e.g. higher heat extrusion coating applications or customized mixtures where balancing slip and antiblock properties are critical.)</p><p>The effectiveness of slip additives are normally determined by the<strong> coefficient of friction (COF)</strong> it allows, which is measured using ASTM D-1894, “Standard Method of Test for Coefficient of Friction of Plastic Film.” COF is a ratio of the force required to slide one layer of film across another relative to the gravimetric force exerted on it. Loosely defined, films can be&nbsp;characterized as “low, medium, or high slip” as follows:</p>', 1, 0, 0),
(15, 'Hello', 'HL', 'data/product/DSC_0238.JPG', '<p>hai</p><p>hai</p><p>hai</p><p>hai</p><p>huahah</p>', 0, 0, 0),
(16, 'hello', 'HL', 'data/product/1668209558-DSC_0238.JPG', '<p>hai</p><p>hi</p>', 0, 0, 0),
(17, 'hello', 'HL', 'data/product/1668210483-DSC_0238.JPG', '<p>hola</p><p>hola</p><p>hola</p>', 0, 0, 0),
(18, 'hello', 'HL', 'data/product/1668210592-DSC_0238.JPG', '<p>hola</p><p>hola</p><p>hola</p>', 0, 0, 0),
(19, 'product 11', 'PD11', 'data/product/1668853730-homepage.png', '<p>hai</p><p>hai</p><p>hai</p><p>&nbsp;</p><p>hai</p><p>hai</p><p>ahi</p>', 1, 0, 0),
(20, 'Baju', 'BJ', 'data/product/1673794216-seribu.jpg', '<p>ini baju yang keren banget</p>', 0, 0, 0);

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
(14, 14),
(15, 17),
(15, 24),
(18, 10),
(18, 22),
(19, 1),
(20, 1),
(20, 8);

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
(24, 6, 'OGI', 'Oil and Gas Industries', 1),
(25, 11, 'HAI', 'test', 1);

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
(7, 'Lorem Ipsum', 'Lorem Ipsum', 'data/testimonials/Lorem IpsumLorem Ipsumcb260c790c1708d0404462d00a1f2a63.png', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', '2022-10-26 14:23:24', 0),
(8, 'Ella', 'hai', 'data/testimonials/Ellahaimain-bg3.jpg', 'd d d d d d d d d d d d d d d d d d d d d dd d d d d d d d dd d d d d dd d d d d dd d d d d d d dd d d d d d d d d d d  d  d d d d d d d d d d d d d d d d d d d d d dd d d d d d d d dd d d d d dd d d d d dd d d d d d ', '2023-01-15 15:28:26', 1);

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
(2, 'Lorem, Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Ab, Expedita Est', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae impedit porro voluptatum!', 'Ella Arminta', '2022-11-19 10:48:08', 'data/update/1668854888-warehouse.jpeg', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p>&nbsp;</p><p>Why do we use it?\n</p><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><p>&nbsp;</p><p>Where does it come from?\n</p><p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p>&nbsp;</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 'featured'),
(3, 'hai 2', 'hai 2', 'Ella Arminta', '2022-11-19 10:53:00', 'data/update/1668867227-homepage.png', '<p>hai</p><p>2</p><p>hia</p><p>2</p><p>hai</p><p>2</p><p>hai</p>', 'deleted'),
(4, 'hai', 'hai', 'Ella Arminta', '2022-11-19 15:25:07', 'data/update/1668871507-warehouse.jpeg', '<p>hai</p>', 'published'),
(5, 'FIGHT COVID TOGERHER', 'go away covid', 'Ella Arminta', '2022-11-19 15:49:55', 'data/update/1668872995-covid.jpeg', '<p>Since the outbreak of COVID-19,&nbsp;<a href=\"https://news.sky.com/story/coronavirus-rise-in-demand-for-hand-sanitisers-and-hygiene-products-11948021\">sales of hand sanitizers have soared</a>. It’s become such a sought-after product that pharmacies and supermarkets have started&nbsp;<a href=\"https://www.bbc.co.uk/news/uk-51729012\">limiting the number</a>&nbsp;that people can buy at one time. Though hand sanitizers can help reduce our risk of catching certain infections, not all hand sanitizers are equally effective against coronavirus.Washing with warm water and soap remains the&nbsp;<a href=\"https://www.ncbi.nlm.nih.gov/pmc/articles/PMC3249958/\">gold standard for hand hygiene</a>&nbsp;and preventing the spread of infectious diseases. Washing with warm water (not cold water) and soap removes oils from our hands that can harbour microbes.Hand sanitizers can also protect against disease-causing microbes, especially in situations when&nbsp;<a href=\"https://www.fda.gov/consumers/if-soap-and-water-are-not-available-hand-sanitizers-may-be-good-alternative\">soap and water aren’t available</a>.&nbsp;</p>', 'featured'),
(6, 'IDUL FITRI 1443H HOLIDAY', 'idul fitri', 'Ella Arminta', '2022-11-19 15:50:38', 'data/update/1668873038-holiday.jpeg', '<p>Dear Valued Customer, in anticipating of the forthcoming Idul Fitri 1443H, PT. Rena Haniem Mulia will not be operating during 26 Apr 2022&nbsp; - 08 May 2022 and at 11 May 2022 we will Start delivery process&nbsp;We are requesting all our valued customers for assistance in providing us with an early schedule of your supply needs prior to and after the holidays. This is to ensure all your needs are taken care of during the above mention period and avoid any delays in supplies. We take this opportunity to thank you, our valued customer for your valued patronage and cooperation. Stay safe, do take care of your health and protect others. Hopefully this covid-19 situation will end soon.&nbsp;</p>', 'featured'),
(7, 'STAY SAFE, WEAR YOUR MASK!', 'gws', 'Ella Arminta', '2022-11-19 15:51:11', 'data/update/1668873071-mask.jpeg', '<p>To help flatten the COVID-19 curve, the government is now urging people to wear face masks whenever they are out in public. The new recommendation is an update from the previous guidelines and is in line with the World Health Organization’s (WHO) latest recommendation. Previously, Indonesia complied with the WHO’s recommendations that face masks only be worn by medical professionals and sick people in order to prevent a supply shortage.&nbsp;The public can wear cloth masks, or masks made from other materials, as long as they can prevent the spread of saliva droplets when speaking.&nbsp;</p>', 'featured'),
(8, 'Samsung promises to be even faster with updates next year', 'Google released Android 13 on August 15, and Samsung\'s first One UI 5 update based on Android 13 went out to the Galaxy S22 family on October 24, two months and almost ten days later. And from that point on, the Korean company has updated a myriad of devices until today.', 'Ella Arminta', '2022-11-20 00:05:23', 'data/update/1668902723-samsung.jpg', '<p>The rollout of One UI 5 has thus been the fastest ever for Samsung, and the Korean company has been pretty impressive in the way it tried to cover as many devices as possible and not just stick with a few flagships this year and leave the mid-rangers for 2023. And yet, next year it wants to do even better.</p><p><br>Samsung published a post in Korea today bragging about how quick it\'s been to get One UI 5 out there to as many devices as possible, and to assure us that it\'s aiming to bring future One UI versions even faster and to more devices at the same time.</p><p>While that\'s not an actual, concrete promise, we have no doubt the company means what it says, from what we\'ve seen this year software updates are finally top priority for Samsung, as they should be. It went from one of the worst Android OEMs when it comes to updates to one of, if not <i>the</i> best, in a matter of just a few years, and it\'s looking like it wants to improve things further, which can only be great news for its customers.</p>', 'published'),
(9, 'Microsoft fixes Windows Kerberos auth issues in emergency updates', 'Auth issues on impacted Windows versions', 'Ella Arminta', '2022-11-20 00:06:44', 'data/update/1668902804-samsung.jpg', '<p>You can find detailed WSUS deployment instructions on the&nbsp;<a href=\"https://docs.microsoft.com/en-us/windows-server/administration/windows-server-update-services/manage/wsus-and-the-catalog-site#the-microsoft-update-catalog-site\">WSUS and the Catalog Site</a>&nbsp;and Configuration Manager instructions on the&nbsp;<a href=\"https://docs.microsoft.com/en-us/mem/configmgr/sum/get-started/synchronize-software-updates#import-updates-from-the-microsoft-update-catalog\">Import updates from the Microsoft Update Catalog</a>&nbsp;page.</p><p>\"If you are using security only updates for these versions of Windows Server, you only need to install these standalone updates for the month of November 2022,\" Microsoft added.</p><p>\"If you are using Monthly rollup updates, you will need to install both the standalone updates listed above to resolve this issue, and install the Monthly rollups released November 8, 2022 to receive the quality updates for November 2022.\"</p><p>Two years ago, Redmond addressed&nbsp;<a href=\"https://www.bleepingcomputer.com/news/microsoft/microsoft-fixes-windows-kerberos-authentication-issues-in-oob-update/\">similar Kerberos auth problems</a>&nbsp;affecting Windows systems&nbsp;<a href=\"https://www.bleepingcomputer.com/news/microsoft/windows-kerberos-authentication-breaks-due-to-security-updates/\">caused by security updates</a>&nbsp;released with the November 2020 Patch Tuesday.</p><p><i>Update&nbsp;November 18,&nbsp;21:26 EST: Added link to&nbsp;Windows Server 2008 R2 SP1 standalone update.</i></p>', 'published'),
(10, 'Seribu Lebih Rumah Tangga di Sukabumi Terima Bantuan Sambungan Listrik Gratis', 'Seribu Lebih Rumah Tangga di Sukabumi Terima Bantuan Sambungan Listrik Gratis', 'Ella Arminta', '2022-11-20 00:08:13', 'data/update/1668902893-seribu.jpg', '<p>Sebanyak 1.678 rumah tangga di Kabupaten Sukabumi, Jawa Barat mendapatkan sambungan listrik gratis melalui Program Bantuan Pasang Baru Listrik (BPBL). Bantuan ini merupakan program Kementerian Energi dan Sumber Daya Mineral (ESDM) hasil sinergi dengan Dewan Perwakilan Rakyat Republik Indonesia (DPR RI) dan ditujukan untuk masyarakat tidak mampu.</p><p>Direktur Pembinaan Pengusahaan Ketenagalistrikan Kementerian ESDM, Jisman Hutajulu, mengungkapkan di Provinsi Jawa Barat terdapat sebanyak 14.304 rumah tangga yang direncanakan memperoleh bantuan sambungan listrik gratis.</p><p>\"Kementerian ESDM telah merencanakan sebanyak 14.304 rumah tangga calon penerima BPBL untuk Provinsi Jawa Barat, di mana untuk Kabupaten Sukabumi akan mendapatkan 1.678 sambungan rumah tangga yang tersebar di 19 kecamatan,\" ujar Jisman pada Peresmian dan Penyalaan Pertama Program BPBL Provinsi Jawa Barat, di Desa Sirnajaya, Kecamatan Warungkiara, Kabupaten Sukabumi, Jumat (18/11/2022).</p><p>Jisman menambahkan bahwa sasaran program BPBL adalah masyarakat yang sudah ada jaringan listrik di desanya tapi belum sanggup untuk membayar biaya pemasangan instalasi listrik di rumahnya.</p><p>Dalam kesempatan yang sama, Anggota Komisi VII DRP RI Ribka Tjiptaning Proletariyati mengatakan pentingnya elektrifikasi dalam kehidupan masyarakat.</p>', 'published'),
(11, 'Gempa Pangandaran dirasakan hingga Sukabumi Jabar', 'Sukabumi, Jabar (ANTARA) - Getaran gempa bumi dengan magnitudo 5,3 yang berpusat di Kabupaten Pangandaran, Jawa Barat, pada Minggu (20/11) pukul 01.28 WIB juga dirasakan warga di Kota dan Kabupaten Sukabumi, Jabar.', 'Ella Arminta', '2022-11-20 00:09:38', 'data/update/1668902978-gempa.jpeg', '<p>\"Kami masih melakukan pemantauan pasca-gempa,\" kata Kepala Pelaksana BPBD Kota Sukabumi Imran Wardhani, di Sukabumi, Minggu.</p><p>&nbsp;</p><p>Berdasarkan data BMKG gempa berlokasi di 8.11 LS-107.87 BT 82 kilometer barat daya Kabupaten Pangandaran dengan kedalaman 24 kilometer.</p><p><br><br>Berita ini telah tayang di Antaranews.com dengan judul: <a href=\"https://www.antaranews.com/berita/3254561/gempa-pangandaran-dirasakan-hingga-sukabumi\"><strong>Gempa Pangandaran dirasakan hingga Sukabumi</strong></a></p><p>Pewarta : Aditia Aulia Rohman<br>Editor: Hernawan Wahyudono<br>COPYRIGHT © ANTARA 2022</p>', 'published'),
(12, 'Sabtu, Positif COVID-19 di Indonesia meningkat 6.383 kasus', 'Petugas Satpol pp memberikan sosialisasi pembatasan jam malam kepada pedagang di kawasan Margonda, Depok, Jawa Barat, Senin (31/8/2020). Pemkot Depok menerapkan pembatasan jam malam yakni batas operasional pukul 18.00 WIB untuk pertokoan, pukul 20.00 WIB untuk aktivitas warga, dan pukul 21.00 WIB untuk kurir barang, terkait meningkatnya angka kasus positif dalam dua minggu terakhir. ANTARA FOTO/Asprilla Dwi Adha/aww.', 'Ella Arminta', '2022-11-20 00:10:54', 'data/update/1668903054-covid2.jpg', '<p>Total kasus konfirmasi positif COVID-19 di Indonesia bertambah sekitar <a href=\"tel:6603195\">6.603.195</a>&nbsp;orang.&nbsp;Angka tersebut diikuti kenaikan kasus aktif sebanyak 1.444 orang. Hingga kini, 62.728 pasien COVID-19 mendapat perawatan medis.<br>&nbsp;</p><p>DKI Jakarta mencatat angka tertinggi kasus konfirmasi positif dari COVID-19 paling banyak dibandingkan provinsi lainnya sebanyak 2.628 orang.</p><p>Kemudian angka meninggal dunia akibat COVID-19 bertambah 25 orang pada hari ini, menjadikan total korban sebanyak 159.348 orang.</p>', 'published'),
(13, 'Artemis: Nasa expects humans to live on Moon this decade', 'Humans could stay on the Moon for lengthy periods during this decade, a Nasa official has told the BBC.', 'Ella Arminta', '2022-11-20 00:12:45', 'data/update/1668903165-nasa.jpeg', '<p>Howard Hu, who leads the Orion lunar spacecraft programme for the agency, said habitats would be needed to support scientific missions.</p><p>He told Sunday with Laura Kuenssberg that Wednesday\'s launch of the Artemis rocket, which carries Orion, was a \"historic day for human space flight\".</p><p>Orion is currently about 134,000km (83,300 miles) from the Moon.</p>', 'published'),
(14, 'Sulit Kontrol Emosi? Ini 5 Cara Mengatasi Emotionally Unavailable!', 'Kamu harus percaya pada diri sendiri', 'Ella Arminta', '2022-11-20 00:14:42', 'data/update/1668903282-emosi.jpg', '<h2>Sulit Kontrol Emosi? Ini 5 Cara Mengatasi&nbsp;Emotionally Unavailable!</h2><p><i>Kamu harus percaya pada diri sendiri</i></p><p><img src=\"https://cdn.idntimes.com/content-images/community/2022/11/pexels-pixabay-262075-2e4f418ea2815135699d2d70124d41f7-f90a3e31085649b914723f9aa51ca397_600x400.jpg\" alt=\"Sulit Kontrol Emosi? Ini 5 Cara Mengatasi&nbsp;Emotionally Unavailable!\"><i>Ilustrasi sedang murung (pexels.com/Pixabay)</i></p><p>Pernahkah kamu merasa sulit untuk mengenal, mengekspresikan, bahkan mengontrol <a href=\"https://www.idntimes.com/life/inspiration/abay-asyamar-1/musuh-emosi-penghancur-diri-c1c2\">emosi</a>? Kondisi ini disebut dengan&nbsp;<i>emotionally unavailable.&nbsp;</i>Selain sulit mengkespresikannya, kamu juga sulit menyimpan perasaan untuk orang lain.</p><blockquote><p>\"<i>Emotionally unavailable&nbsp;</i>mengacu pada kondisi gak mampu untuk mempertahankan ikatan emosional dengan orang lain. Wujudnya bisa berupa rasa gak peduli dan kurangnya komitmen,\" jelas Stacey Laura Lloyd, seorang <i>relationship writer </i>berpengalaman, dilansir&nbsp;<i>Brides.</i></p></blockquote>', 'published'),
(15, '7 Cowok Yellow Flag di Drakor, Bikin Panen Air Mata!', 'Akhir kisah cinta yang tragis', 'Ella Arminta', '2022-11-20 00:17:11', 'data/update/1668903431-drakor.jpg', '<p>Persoalan cinta dalam <a href=\"https://www.idntimes.com/tag/drakor\">drakor</a> memang terlihat cukup rumit. Alur ceritanya selalu dipenuhi dengan teka-teki yang tak terduga.</p><p>Salah satunya adalah kemunculan <a href=\"https://www.idntimes.com/tag/karakter-cowok\">cowok&nbsp;</a><i>yellow flag&nbsp;</i>di drakor. Mereka digambarkan sebagai karakter utama yang kerap meninggal kemudian. Kisah cintanya tragis dan menyedihkan, deh! Meski demikian, cowok&nbsp;<i>yellow flag&nbsp;</i>di drakor tak membosankan dan mampu hipnotis penonton setia.&nbsp;</p><p>Berikut ini deretan cowok&nbsp;<i>yellow flag&nbsp;</i>di drakor yang kisah cintanya patut kamu ikuti. Meski berujung menyedihkan, tapi perjuangan mereka patut ditiru!</p><h2>1. Poong Woon Ho - 20th Century Girl</h2><p><img src=\"https://cdn.idntimes.com/content-images/community/2022/11/314475152-809810493602594-1065050154273189902-n1-e19c76cf1b28908665001625bb727ae6-c9e7aa7eb5333b5b81ea468f5cac76d0.jpg\" alt=\"7 Cowok Yellow Flag di Drakor, Bikin Panen Air Mata!\"><i>Poong Un Ho dalam drama 20th Century Girl (instagram.com/netflixkr)</i></p><p>Drama 20th Century Girl mengisahkan tentang perjalanan cinta pertama remaja SMA dengan latar tahun 90-an. Woon Ho (diperankan oleh Byeon Woo Seok) merasakan benih-benih cinta yang tumbuh sejak kedekatannya dengan remaja ceria dan bersemangat bernama kepada Bo Ra (diperankan oleh Kim You Jong).</p><p>Woon Ho dan Bo Ra memiliki rasa cinta yang sama dan sering menghabiskan waktu bersama. Sampai suatu ketika, ia harus pergi meninggalkan Korea dan berpisah dengan Bo Ra. Namun, siapa sangka jika perpisahan tersebut menjadi akhir kisah cinta mereka. Woon Ho dikabarkan meninggal sebelum sempat menemui Bo Ra, perempuan yang sangat dicintainya.</p><p><br>&nbsp;</p>', 'published'),
(16, 'Song Kang Bakal Adain Fan Meeting di Indonesia, Kapan Tuh?', 'Gak sabar ah, pengen ketemu ayang Song Kang~', 'Ella Arminta', '2022-11-20 00:18:10', 'data/update/1668903490-songkang.png', '<p>Song Kang dipastikan akan segera kunjungi Indonesia. Ia dilaporkan akan mengadakan fan meeting untuk ketemu langsung sama SONGPYEON (sebutan untuk fans Song Kang) Indonesia.</p><p>Dari unggahan terbaru, promotor IME Indonesia dilaporkan memang Song Kang bakal mengadakan jumpa fans. Namun sayangnya, untuk waktu, informasi harga tiket serta&nbsp;<i>seatplan</i>-nya masih belum diinformasikan.</p><p><br>&nbsp;</p>', 'published'),
(17, '5 Manfaat Hidup Pisah dari Keluarga bagi Jomblo, Bisa Lebih Produktif', 'Gak usah nunggu nikah atau punya rumah', 'Ella Arminta', '2022-11-20 00:19:44', 'data/update/1668903584-rumah.jpg', '<p>Kapan waktu yang tepat untuk seorang anak keluar dari rumah orangtua dan menjalani kehidupannya sendiri? Sebenarnya tidak ada aturan yang pasti. Namun sebaiknya saat kamu sudah siap atau setidaknya cukup umur, mulailah belajar tinggal sendiri.</p><p>Jangan tunggu sampai kamu menikah baru siap-siap pindah, kecuali ketika orangtua sedang sakit dan tak ada yang merawatnya. Justru selagi kamu jomblo, keluar dari rumah keluarga punya sejumlah manfaat. Berikut ini di antaranya!</p><h2>1. Meningkatkan produktivitas</h2>', 'published'),
(18, '5 Sebab Hadiah dari Ayah Tak Terlupakan, Kamu Masih Menyimpannya?', 'Kasih juga buat anakmu nanti', 'Ella Arminta', '2022-11-20 00:21:02', 'data/update/1668903662-ayah.jpg', '<p>Adakah hadiah dari ayah yang masih kamu simpan hingga saat ini? Misalnya, mainan, boneka, atau <i>jersey</i>?&nbsp;Hadiah dari ayah memang bisa membekas mendalam pada perasaan anak.<br><br>Oleh sebab itu, kelak kamu menjadi ayah pun gak perlu ragu untuk memberi anak hadiah sekalipun pasanganmu sudah menyiapkan sesuatu untuknya. Ini dia lima sebab, mengapa kamu masih menyimpan hadiah dari ayah. Istimewa!</p><h2>1. Ayah jarang memberi hadiah dibandingkan ibu</h2><p><img src=\"https://cdn.idntimes.com/content-images/community/2022/11/fromandroid-18b283dabfdeace1b4e6e6661f8a27f7.jpg\" alt=\"5 Sebab Hadiah dari Ayah Tak Terlupakan, Kamu Masih Menyimpannya?\"><i>ilustrasi hadiah dari ayah (pexels.com/cottonbro studio)</i></p><p>Jarangnya ayah memberikan hadiah secara langsung pada anak bukan artinya ia pelit. Akan tetapi bisa karena hampir seluruh penghasilannya telah diberikan pada istri. Atau, ayah terlalu sibuk dan tinggal terpisah dari keluarga.<br><br>Maka begitu ayah memberikan kado, anak biasanya akan terus mengingatnya. Itu menjadi kenangan manis bagi anak sampai masa dewasanya. Kalau hadiah dari ibu malah bisa terasa biasa saja saking seringnya ia memberi anak berbagai hal.</p>', 'published');

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
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `company_profile`
--
ALTER TABLE `company_profile`
  MODIFY `id_fitur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

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
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `testi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `updates`
--
ALTER TABLE `updates`
  MODIFY `upd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
