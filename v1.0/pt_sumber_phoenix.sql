-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2022 at 08:28 AM
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
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `about_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `history` text NOT NULL,
  `experience` text NOT NULL,
  `philosophy` text NOT NULL,
  `purpose` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`about_id`, `login_id`, `title`, `description`, `history`, `experience`, `philosophy`, `purpose`) VALUES
(1, 1, 'Who Are We ?', 'We are one of the major players in the field of specialty chemicals for rubber, coating, cable, die casting and other industrial chemicals. We serve the needs of speciality chemicals from industrial users, to create additional value for the output product. We would like to provide our customers high quality products and satisfied service. ', 'PT.SUMBER PHOENIX MAKMUR was established in 2003 as importer of chemical raw materials and specials additives.', 'Years of international partnership combined with knowledge of the Indonesian market give the company a competitive advantage in providing comprehensive specialty chemical supply programs and service.', 'The company\'s business philosophy is Customer Satisfaction is Our Priority, and Creating Value for the Customer.', 'PT.SUMBER PHOENIX MAKMUR will continuously strive to develope complete product lines, improves its service, and create more value for its customers and suppliers.');

-- --------------------------------------------------------

--
-- Table structure for table `business_fields`
--

CREATE TABLE `business_fields` (
  `business_fields_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business_fields`
--

INSERT INTO `business_fields` (`business_fields_id`, `login_id`, `title`, `image`) VALUES
(1, 1, 'Rubber Industries', 'data/business_fields/0d3babee02924937a60d677cf475d7c3.jpg'),
(2, 1, 'Plastic Industries', 'data/business_fields/3aebcc97fcb2341dc757d3aafd01e81b.jpg'),
(3, 1, 'Die Casting', 'data/business_fields/fbe553e6e5a3e9c4cde127184147473f.jpg'),
(4, 1, 'Coating And Ink Industries', 'data/business_fields/647870a3d17f4808b348624f2c208f61.jpg'),
(5, 1, 'Acrylic Sheet', 'data/business_fields/da44c1901e0d4577b31df7bdab1c2456.jpg'),
(6, 1, 'Other Industries', 'data/business_fields/9e23f6e21288ab83d993a250b1c42707.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `business_fields_information`
--

CREATE TABLE `business_fields_information` (
  `business_fields_information_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business_fields_information`
--

INSERT INTO `business_fields_information` (`business_fields_information_id`, `login_id`, `title`, `description`) VALUES
(1, 1, 'Business Fields', 'We Provide so much product to distributed');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `faq_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `home_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sub_title` text NOT NULL,
  `home_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`home_id`, `login_id`, `title`, `sub_title`, `home_image`) VALUES
(1, 1, 'Are You Looking For A Great Product And Solution ?', 'We provide products to suit your needs to support your business. To find out more, click the button below', 'data/home/1b6c4998efbc1045452e47dc9e15dd99.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `statistics`
--

CREATE TABLE `statistics` (
  `statistics_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `total` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `statistics`
--

INSERT INTO `statistics` (`statistics_id`, `login_id`, `title`, `total`, `content`) VALUES
(1, 1, 'Happy Clients', 234, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur nisi cupiditate totam, aliquam, eligendi quaerat labore adipisci eos nostrum debitis unde iure quia eveniet, incidunt beatae! Velit unde distinctio sunt!'),
(2, 1, 'Projects', 521, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur nisi cupiditate totam, aliquam, eligendi quaerat labore adipisci eos nostrum debitis unde iure quia eveniet, incidunt beatae! Velit unde distinctio sunt!'),
(3, 1, 'Years Of Support', 19, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur nisi cupiditate totam, aliquam, eligendi quaerat labore adipisci eos nostrum debitis unde iure quia eveniet, incidunt beatae! Velit unde distinctio sunt!'),
(4, 1, 'Workers', 50, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur nisi cupiditate totam, aliquam, eligendi quaerat labore adipisci eos nostrum debitis unde iure quia eveniet, incidunt beatae! Velit unde distinctio sunt!');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `team_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`team_id`, `login_id`, `name`, `position`, `image`) VALUES
(1, 1, 'Agus Handoko', 'Director', 'data/team/cb260c790c1708d0404462d00a1f2a63.png'),
(2, 1, 'Mark Robert', 'CFO', 'data/team/8c3718db2ab00a5bfa5c54131b0514fb.jpg'),
(3, 1, 'Daniel Davidson', 'CMO', 'data/team/133ea652aca37c001130ff89da8fd9ae.jpg'),
(4, 1, 'Roger Hartono', 'CTO', 'data/team/d83b1e8bba94cb86f4f109ee2ab3b6bd.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `team_info`
--

CREATE TABLE `team_info` (
  `team_info_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sub_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team_info`
--

INSERT INTO `team_info` (`team_info_id`, `login_id`, `title`, `sub_title`) VALUES
(1, 1, 'Team', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur molestiae nisi laboriosam quia mollitia commodi eos quas harum asperiores id distinctio nostrum exercitationem in earum, dicta dolor sint aut odio.');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `testimonial_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `testimonial` text NOT NULL,
  `image` text NOT NULL,
  `display` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`testimonial_id`, `login_id`, `name`, `about`, `testimonial`, `image`, `display`) VALUES
(1, 1, 'Lorem Ipsum', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequuntur vitae quos incidunt minima, perspiciatis quae obcaecati ut libero odio deserunt neque similique numquam maiores voluptate officiis labore iure laboriosam blanditiis!', 'data/testimonials/f3ccdd27d2000e3f9255a7e3e2c48800.jpg', 1),
(2, 1, 'Lorem Ipsum', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequuntur vitae quos incidunt minima, perspiciatis quae obcaecati ut libero odio deserunt neque similique numquam maiores voluptate officiis labore iure laboriosam blanditiis!', 'data/testimonials/156005c5baf40ff51a327f1c34f2975b.jpg', 1),
(3, 1, 'Lorem Ipsum', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequuntur vitae quos incidunt minima, perspiciatis quae obcaecati ut libero odio deserunt neque similique numquam maiores voluptate officiis labore iure laboriosam blanditiis!', 'data/testimonials/799bad5a3b514f096e69bbc4a7896cd9.jpg', 1),
(4, 1, 'Lorem Ipsum', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequuntur vitae quos incidunt minima, perspiciatis quae obcaecati ut libero odio deserunt neque similique numquam maiores voluptate officiis labore iure laboriosam blanditiis!', 'data/testimonials/d0096ec6c83575373e3a21d129ff8fef.jpg', 1),
(5, 1, 'Lorem Ipsum', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequuntur vitae quos incidunt minima, perspiciatis quae obcaecati ut libero odio deserunt neque similique numquam maiores voluptate officiis labore iure laboriosam blanditiis!', 'data/testimonials/032b2cc936860b03048302d991c3498f.jpg', 1),
(6, 1, 'Lorem Ipsum', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequuntur vitae quos incidunt minima, perspiciatis quae obcaecati ut libero odio deserunt neque similique numquam maiores voluptate officiis labore iure laboriosam blanditiis!', 'data/testimonials/18e2999891374a475d0687ca9f989d83.jpg', 1),
(7, 1, 'Lorem Ipsum', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequuntur vitae quos incidunt minima, perspiciatis quae obcaecati ut libero odio deserunt neque similique numquam maiores voluptate officiis labore iure laboriosam blanditiis!', 'data/testimonials/fe5df232cafa4c4e0f1a0294418e5660.jpg', 1),
(8, 1, 'Lorem Ipsum', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequuntur vitae quos incidunt minima, perspiciatis quae obcaecati ut libero odio deserunt neque similique numquam maiores voluptate officiis labore iure laboriosam blanditiis!', 'data/testimonials/8cda81fc7ad906927144235dda5fdf15.jpg', 1),
(9, 1, 'Christopher Matthew Susanto', 'Lorem Ipsum', 'HHHH', 'data/testimonials/f3ccdd27d2000e3f9255a7e3e2c48800.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `testimonial_info`
--

CREATE TABLE `testimonial_info` (
  `testimonial_info_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sub_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimonial_info`
--

INSERT INTO `testimonial_info` (`testimonial_info_id`, `login_id`, `title`, `sub_title`) VALUES
(1, 1, 'Testimonials', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dicta, deserunt dolore. Placeat corporis eos in veritatis modi nesciunt nihil earum minima a itaque commodi eligendi maxime, consequatur culpa cum nulla.');

-- --------------------------------------------------------

--
-- Table structure for table `why_us`
--

CREATE TABLE `why_us` (
  `why_us_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `why_us`
--

INSERT INTO `why_us` (`why_us_id`, `login_id`, `description`) VALUES
(1, 1, 'Customer Satisfaction is Our Priority!');

-- --------------------------------------------------------

--
-- Table structure for table `why_us_content`
--

CREATE TABLE `why_us_content` (
  `why_us_content_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `why_us_content`
--

INSERT INTO `why_us_content` (`why_us_content_id`, `login_id`, `title`, `description`) VALUES
(1, 1, 'Well Trained Marketing', 'We have professional experts to recommend which products are suitable for developing your business'),
(2, 1, 'Trusted', 'We are the company that Strong International Connection, Enable Us to Procure and Provide a Wide Range of Chemical Supply'),
(3, 1, 'Responsive Customer Service', 'We are always communicative, friendly and always willing to help you improve your business for the better'),
(4, 1, 'Spacious Warehouse Facility', 'We have a warehouse that can contains a lot of goods and with supporting facilities');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `business_fields`
--
ALTER TABLE `business_fields`
  ADD PRIMARY KEY (`business_fields_id`);

--
-- Indexes for table `business_fields_information`
--
ALTER TABLE `business_fields_information`
  ADD PRIMARY KEY (`business_fields_information_id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`home_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `statistics`
--
ALTER TABLE `statistics`
  ADD PRIMARY KEY (`statistics_id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`team_id`);

--
-- Indexes for table `team_info`
--
ALTER TABLE `team_info`
  ADD PRIMARY KEY (`team_info_id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`testimonial_id`);

--
-- Indexes for table `testimonial_info`
--
ALTER TABLE `testimonial_info`
  ADD PRIMARY KEY (`testimonial_info_id`);

--
-- Indexes for table `why_us`
--
ALTER TABLE `why_us`
  ADD PRIMARY KEY (`why_us_id`);

--
-- Indexes for table `why_us_content`
--
ALTER TABLE `why_us_content`
  ADD PRIMARY KEY (`why_us_content_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `business_fields`
--
ALTER TABLE `business_fields`
  MODIFY `business_fields_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `business_fields_information`
--
ALTER TABLE `business_fields_information`
  MODIFY `business_fields_information_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `home_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `statistics`
--
ALTER TABLE `statistics`
  MODIFY `statistics_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `team_info`
--
ALTER TABLE `team_info`
  MODIFY `team_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `testimonial_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `testimonial_info`
--
ALTER TABLE `testimonial_info`
  MODIFY `testimonial_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `why_us`
--
ALTER TABLE `why_us`
  MODIFY `why_us_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `why_us_content`
--
ALTER TABLE `why_us_content`
  MODIFY `why_us_content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
