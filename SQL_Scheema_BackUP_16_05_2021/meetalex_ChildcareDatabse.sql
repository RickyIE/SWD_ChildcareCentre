-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 16, 2021 at 07:37 AM
-- Server version: 5.7.23-23
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meetalex_ChildcareDatabse`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `activityId` int(11) NOT NULL,
  `activityTitle` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activityDetail` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imagePath` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`activityId`, `activityTitle`, `activityDetail`, `imagePath`) VALUES
(1, 'Drawing and Painting', 'Letting children run wild with paints and drawing tools allows them to experience their world in a sensory way and develop self-expression, whilst also developing pre-writing skills. Furthermore, it’s an invitation to learn about colours, mixing and good-old tidying up!', 'img\\activities\\drawing.png'),
(11, 'Sand', 'Sand play is a fantastic opportunity for the foundations of scientific learning, and developing self-confidence and physical development. Scooping, digging, pouring and sifting teaches children how things work, whilst also building their muscles and coordination. Done alongside a little pal, and it becomes about teamwork, sharing, and social skills.', 'img\\activities\\sand.png'),
(12, 'Water Play', 'Similar to sand play, water play enables children to experiment in a safe environment with basic concepts such as volume. Additionally, water play is great for learning consequences of actions. Add in some hand-eye coordination and physical strength, and water play is a firm favourite.', 'img\\activities\\water-play.png'),
(13, 'Play Dough', 'Let the children loose with a bunch of dressing-up clothes and props such as toy doctor’s kits, and let their imaginations run wild. Soon you’ll discover the budding doctor, vet, nurse, astronaut, chef or thespian. Dressing-up helps children to begin to make sense of the adult world, roles, and interests, as well as boosting social interaction. Not least, dressing-up helps to reinforce the self-care aspects of self-dressing which is essential for primary school life.', 'img\\activities\\play-dough.png'),
(14, 'Dress-Up and Role Play', 'Sand play is a fantastic opportunity for the foundations of scientific learning, and developing self-confidence and physical development. Scooping, digging, pouring and sifting teaches children how things work, whilst also building their muscles and coordination. Done alongside a little pal, and it becomes about teamwork, sharing, and social skills.', 'img\\activities\\dress-up.png'),
(15, 'Doll and Character Play', 'Sand play is a fantastic opportunity for the foundations of scientific learning, and developing self-confidence and physical development. Scooping, digging, pouring and sifting teaches children how things work, whilst also building their muscles and coordination. Done alongside a little pal, and it becomes about teamwork, sharing, and social skills.', 'img\\activities\\dolls.png'),
(16, 'Blocks, Jigsaws, and Shape Sorters', 'Playing with blocks, jigsaws, and shape sorters all lay the foundations of spatial thinking, logical reasoning, ordering, and recognising various shapes, sizes, and colours.', 'img\\activities\\blocks.png'),
(17, 'Music, Dancing, and Singing', 'Singing and music hugely help to develop language and form the basis of literacy skills, as well as basic mathematical concepts such as counting. Furthermore, they begin to develop rhythm, whilst also refining their listening skills. Dancing helps the child develop strength and flexibility, not to mention coordination.', 'img\\activities\\music.png'),
(18, 'Imaginative Play', 'All play should be imaginative, but we’re referring to the type of play that comes naturally to many children. Leave a small child with nothing but a random selection of objects and you’ll soon find them lost in a world of make-believe. Giving a child time and space for imaginative play is essential. It develops their imagination, which is important for literacy skills and intellectual reasoning. Additionally, it increases their sense of self, and self-esteem, as well as making sense of the world around them, as well as the ability to handle boredom.', 'img\\activities\\imaginative-play.png'),
(19, 'Running, Jumping, Climbing, Swinging', 'Young children have a compulsion to move. Allowing them to do so, and providing safe and age-appropriate challenges, allows them to increase their confidence as well as develop their resilience through risk-taking. Of course, gross motor skills also receive a mighty boost.', 'img\\activities\\running.png');

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `addressId` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `street` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `town` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `county` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `eircode` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`addressId`, `username`, `street`, `town`, `county`, `country`, `eircode`) VALUES
(5, 'evan.pickering@email.com', '20', 'Leopardstown', 'Dublin', 'Ireland', 'D18 W2R6'),
(6, 'robert.tracey@gmail.com', '20', 'Leopardstown', 'Dublin', 'Ireland', 'D18 W2R6'),
(7, 'James@gmail.com', '17 Violet Hill', 'Drive', 'Glasnevin', 'Ireland', 'D07 A2W9'),
(8, 'alex.member@gmail.com', ' 1103 Drive Road', 'Walkinstown', 'Dublin', 'Ireland', 'E99 E9E9'),
(9, 'agiffaut28@mlb.com', ' 20109 Reanor Road', 'Dooley Valley', 'Dublin 23', 'Ireland', 'E10 E0E0'),
(10, 'abasek2q@samsung.com', '11 Sean Du Pah', 'Suburb 11', 'Paris', 'France', 'E11 E1E1'),
(11, 'alex.member@test.com', '101 Member Street', 'Dublin 24', 'Dublin', 'Ireland', 'Eircode'),
(12, 'alex.admin@test.com', 'Admin Street', 'Tralee', 'Kerry', 'Ireland', 'Eircode'),
(13, 'robertpatricktracey@gmail.com', '20', 'Leopardstown', 'Dublin', 'Ireland', 'D18 W2R6');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryId` int(11) NOT NULL,
  `category` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `categoryDesc` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `category`, `categoryDesc`) VALUES
(1, 'Baby', 'from 3 months to 12 months'),
(2, 'Wobbler', 'from 1 to 2 years'),
(3, 'Toddler', 'from 2 to 3 years'),
(4, 'Preschool', 'from 3 to 5 years');

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

CREATE TABLE `children` (
  `childId` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstName` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastName` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `children`
--

INSERT INTO `children` (`childId`, `username`, `firstName`, `lastName`) VALUES
(1, 'roberttracey@email.com', 'Leon', 'Tracey'),
(2, 'roberttracey@email.com', 'Emily', 'Tracey'),
(3, 'roberttracey@email.com', 'Bobby', 'Tracey'),
(4, 'evan.pickering@email.com', 'Lily', 'Pickering'),
(5, 'evan.pickering@email.com', 'Peter', 'Pickering'),
(6, 'evan.pickering@email.com', 'James', 'Pickering');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contactId` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`contactId`, `name`, `email`, `phone`, `message`, `created`) VALUES
(23, 'test 2', 'email@email.test', 'number', 'test message 2', '2021-05-15 00:07:44'),
(24, 'test 2', 'email@email.test', 'number', 'test message 2', '2021-05-15 00:08:31'),
(26, '', '', '', '34343443434', '2021-05-15 01:36:58'),
(32, 'John Walsh', 'john.walsh@test.com', '', 'Please email me with the price and general t&c i would like to know more about your facility!', '2021-05-15 03:29:29'),
(33, 'Johhny Wise', 'email@email.test', '', 'Can you please et me know of a suitable time to call you during working hours ?', '2021-05-15 18:18:54');

-- --------------------------------------------------------

--
-- Table structure for table `daily_record`
--

CREATE TABLE `daily_record` (
  `recordId` int(11) NOT NULL,
  `childId` int(11) DEFAULT NULL,
  `temperature` float DEFAULT NULL,
  `breakfast` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lunch` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activityId` int(11) DEFAULT NULL,
  `created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `daily_record`
--

INSERT INTO `daily_record` (`recordId`, `childId`, `temperature`, `breakfast`, `lunch`, `activityId`, `created`) VALUES
(12, 1, 36.9, 'Cornflakes', 'Eggs and cheeses omelete', 17, '2021-05-02'),
(14, 1, 37.5, 'Fry', 'Chips', 12, '2021-05-03'),
(15, 2, 37, 'Eggs', 'Bagel', 15, '2021-05-03'),
(16, 3, 36.5, 'Fry', 'Roll', 16, '2021-05-03');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `eventId` int(11) NOT NULL,
  `eventTitle` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `eventDetail` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `startTime` datetime DEFAULT NULL,
  `endTime` datetime DEFAULT NULL,
  `imagePath` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`eventId`, `eventTitle`, `eventDetail`, `startTime`, `endTime`, `imagePath`) VALUES
(1, 'Shoe Box Appeal', 'The Team Hope Christmas Shoebox Appeal is an annual campaign where thousands of people across Ireland donate shoeboxes filled with gifts for children affected by poverty in Africa or Eastern Europe.', '2021-01-18 10:00:00', '2021-01-18 12:00:00', 'img/events/shoebox-appeal.jpeg'),
(2, 'Magician Day', 'Genie Mackers is a team of magicians, face painters, balloon artists, storytellers and actors that bring party games, magic and laughter to kids birthday parties and more, all the way from Magic Land! Each entertainer arrives as your chosen theme/character and remains in character throughout.', '2021-02-01 09:00:00', '2021-02-01 10:00:00', 'img/events/magician-day.jpg'),
(3, 'Dublin Zoo', 'Dublin Zoo, in Phoenix Park, Dublin, is a zoo in Ireland, and one of Dublin\'s most popular attractions. Established and designed in 1830 by Decimus Burton, it opened the following year. The zoo describes its role as conservation, study, and education.', '2021-02-10 09:00:00', '2021-02-10 13:00:00', 'img/events/dublin-zoo.jpg'),
(4, 'Glenroe Farm', 'Family-run venue with a variety of farm animals plus petting zoo, farmhouse museum and playground.', '2021-03-02 09:00:00', '2021-03-02 13:00:00', 'img/events/glenroe-farm.jpg'),
(5, 'Imaginosity', 'Under 9s learn as they play explore the different areas that are set up to encourage discovery.', '2021-03-16 10:30:00', '2021-03-16 12:30:00', 'img/events/imaginosity.png'),
(6, 'Library Day', 'National Libraries Day is an annual event dedicated to the celebration of libraries and librarians.', '2021-04-01 09:00:00', '2021-04-01 13:00:00', 'img/events/library-day.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `fee`
--

CREATE TABLE `fee` (
  `feeId` int(11) NOT NULL,
  `registrationId` int(11) DEFAULT NULL,
  `feeAmount` decimal(15,2) DEFAULT NULL,
  `isPaid` tinyint(1) DEFAULT NULL,
  `paidDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fee`
--

INSERT INTO `fee` (`feeId`, `registrationId`, `feeAmount`, `isPaid`, `paidDate`) VALUES
(1, 1, 25.50, 1, '2021-05-15'),
(2, 2, 30.50, 1, '2021-05-15'),
(3, 3, 29.30, NULL, NULL),
(4, 1, 41.10, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `parentId` int(11) DEFAULT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `accessLevel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `parentId`, `title`, `link`, `accessLevel`) VALUES
(1, 0, 'Home', 'index.php', 3),
(2, 0, 'About Us', 'index.php', 3),
(3, 0, 'Events', 'events.php', 3),
(4, 0, 'Contact Us', 'contact-us.php', 3),
(5, 0, 'Parent', 'index.php', 3),
(6, 0, 'Admin', 'index.php', 1),
(7, 2, 'Our Services', 'services.php', 3),
(8, 2, 'Our Activities', 'activities.php', 3),
(9, 5, 'Registration', 'registration.php', 3),
(10, 5, 'Day Details', 'day-details.php', 2),
(11, 5, 'Testimonials', 'testimonial.php', 3),
(12, 5, 'Add Testimonial', 'testimonial_add.php', 2),
(13, 6, 'Index Edit', 'index-edit.php', 1),
(14, 6, 'Registration Edit', 'registration-edit.php', 1),
(15, 6, 'Day Details Edit', 'day-details-edit.php', 1),
(16, 6, 'Testimonial Manage', 'testimonial_manage.php', 1),
(17, 6, 'Contact Us Manage', 'contact-us-manage.php', 1),
(18, 2, 'Special Offers', 'offers.php', 3);

-- --------------------------------------------------------

--
-- Table structure for table `phone`
--

CREATE TABLE `phone` (
  `phoneId` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `phone`
--

INSERT INTO `phone` (`phoneId`, `username`, `phone`) VALUES
(9, 'evan.pickering@email.com', '+353868798210'),
(10, 'evan.pickering@email.com', '+353868798210'),
(11, 'robert.tracey@gmail.com', '+353868798210'),
(12, 'robert.tracey@gmail.com', '+353868798210'),
(13, 'James@gmail.com', '018342181'),
(14, 'James@gmail.com', '0834048545'),
(15, 'alex.member@test.com', '01-1234567'),
(16, 'alex.member@test.com', '0891234567'),
(17, 'alex.admin@test.com', '01-1234567'),
(18, 'alex.admin@test.com', '0891234567'),
(19, 'robertpatricktracey@gmail.com', '+353868798210'),
(20, 'robertpatricktracey@gmail.com', '+353868798210');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `registrationId` int(11) NOT NULL,
  `categoryId` int(11) DEFAULT NULL,
  `days` float DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`registrationId`, `categoryId`, `days`, `isActive`, `username`) VALUES
(1, 1, 0, 1, 'evan.pickering@email.com'),
(2, 3, 0, 1, 'evan.pickering@email.com'),
(3, 2, 0.5, 1, 'evan.pickering@email.com'),
(4, 1, 3, 1, 'evan.pickering@email.com');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `serviceId` int(11) NOT NULL,
  `serviceTitle` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `serviceDetail` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imagePath` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`serviceId`, `serviceTitle`, `serviceDetail`, `imagePath`) VALUES
(2, 'Part-Time', 'Part-time day care service means a pre-school service offering a structured day care service for pre-school children for a total of more than 3.5 hours and less than 5 hours per day, which may include a pre school service.', 'img/services/part-time-01.svg'),
(3, 'After-School', 'The After-School Child Care Scheme (ASCC) supports low-income people to return to work. The scheme provides subsidised after-school childcare places to people with children of primary school age who find employment, increase their employment or take up a place on an employment support scheme.', 'img/services/afterschool-01.svg'),
(6, 'Full-Time', 'This is a structured care service for more than 5 hours per day and may include a sessional service. Some may also include an after-school facility. In full day care, sleeping arrangements and food preparation must meet standards laid down by Tusla. Providers include day nurseries and crèches', 'img/services/full-time-01.svg');

-- --------------------------------------------------------

--
-- Table structure for table `special_offer`
--

CREATE TABLE `special_offer` (
  `offerId` int(11) NOT NULL,
  `offerTitle` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `offerDetail` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imagePath` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `special_offer`
--

INSERT INTO `special_offer` (`offerId`, `offerTitle`, `offerDetail`, `imagePath`) VALUES
(1, 'ECCE Scheme', 'The Early Childhood Care and Education (ECCE) Scheme provides early childhood care and education for children of pre-school age.', 'img/services/full-time-01 - Copy.svg'),
(2, 'Second child 10 percent discount', '10 percent off the cost of second child registered.', 'img/services/early-learning-01.svg'),
(3, 'Easter camp discount', 'We are now offering a discount on our 2021 easter camp.', 'img/services/early-learning-01.svg'),
(4, 'Summer camp discount', 'We are now offering a discount on our 2021 easter camp.', 'img/services/early-learning-01.svg'),
(5, 'Early enrollment discount', 'Register early for 2022, and get a 15 percent discount.', 'img/services/updates-img.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `testimonialId` int(11) NOT NULL,
  `COMMENT` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parentEmail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `serviceName` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` date DEFAULT NULL,
  `isDisplayed` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`testimonialId`, `COMMENT`, `parentEmail`, `serviceName`, `created`, `isDisplayed`) VALUES
(1, 'This is a wonderful place', 'alex.member@gmail.com', 'Playtime', '2021-05-01', 1),
(2, 'I want my money back', 'alex.member@gmail.com', 'Feeding', '2016-01-01', 1),
(3, 'My child had such a wonderful time.', 'alex.member@gmail.com', 'Food fighting', '2017-02-03', 1),
(5, 'Lorem ipsum dolor sit amet. Aperiam consectetur delectus inventore porro rerum sit veritatis!', 'alex.member@gmail.com', 'Doing Stuff', '2022-11-11', 1),
(6, 'Test Testimonial 1 - This is a testimonial to be used as a placeholder review !', 'abasek2q@samsung.com', 'Activity 1', '1998-11-11', 1),
(7, 'Test Testimonial 2 - This is a testimonial to be used as a placeholder review !', 'abasek2q@samsung.com', 'Activity 2', '2003-11-11', 1),
(8, 'Test Testimonial 3 - This is a testimonial to be used as a placeholder review !', 'abasek2q@samsung.com', 'Activity 3', '1993-11-11', 1),
(9, 'Test Testimonial 4 - This is a testimonial to be used as a placeholder review !', 'abasek2q@samsung.com', 'Activity 4', '1991-11-11', 1),
(10, 'Test Testimonial 5 - This is a testimonial to be used as a placeholder review !', 'abasek2q@samsung.com', 'Activity 5', '1998-11-11', 1),
(11, 'Test Testimonial 6 - This is a testimonial to be used as a placeholder review !', 'abasek2q@samsung.com', 'Activity 6', '1995-11-11', 1),
(12, 'Test Testimonial 7 - This is a testimonial to be used as a placeholder review !', 'abasek2q@samsung.com', 'Activity 7', '1998-11-11', 1),
(13, 'Test Testimonial 8 - This is a testimonial to be used as a placeholder review !', 'abasek2q@samsung.com', 'Activity 8', '1999-11-11', 1),
(14, 'Test Testimonial 9 - This is a testimonial to be used as a placeholder review !', 'abasek2q@samsung.com', 'Activity 9', '2011-11-11', 1),
(15, 'Test Testimonial 10 - This is a testimonial to be used as a placeholder review !', 'abasek2q@samsung.com', 'Activity 10', '2017-11-11', 1),
(16, 'Test Testimonial 11 - This is a testimonial to be used as a placeholder review !', 'agiffaut28@mlb.com', 'Activity 1', '2020-11-11', 1),
(17, 'Test Testimonial 12 - This is a testimonial to be used as a placeholder review !', 'agiffaut28@mlb.com', 'Activity 2', '2021-11-11', 1),
(18, 'Test Testimonial 13 - This is a testimonial to be used as a placeholder review !', 'agiffaut28@mlb.com', 'Activity 3', '2015-11-11', 1),
(19, 'Test Testimonial 14 - This is a testimonial to be used as a placeholder review !', 'agiffaut28@mlb.com', 'Activity 4', '2008-11-11', 1),
(20, 'Test Testimonial 15 - This is a testimonial to be used as a placeholder review !', 'agiffaut28@mlb.com', 'Activity 5', '2009-11-11', 1),
(21, 'Test Testimonial 16 - This is a testimonial to be used as a placeholder review !', 'agiffaut28@mlb.com', 'Activity 6', '2007-11-11', 1),
(22, 'Test Testimonial 17 - This is a testimonial to be used as a placeholder review !', 'agiffaut28@mlb.com', 'Activity 7', '2005-11-11', 1),
(23, 'Test Testimonial 18 - This is a testimonial to be used as a placeholder review !', 'agiffaut28@mlb.com', 'Activity 8', '2014-11-11', 1),
(24, 'Test Testimonial 19 - This is a testimonial to be used as a placeholder review !', 'agiffaut28@mlb.com', 'Activity 9', '2014-11-11', 1),
(25, 'Test Testimonial 20 - This is a testimonial to be used as a placeholder review !', 'agiffaut28@mlb.com', 'Activity 10', '2012-11-11', 1),
(64, 'Hello dear world i hav to say that the time my child spend in this lovely enviroment was nothing short of amazing.', 'abasek2q@samsung.com', 'Doll and Character Play', '2021-05-14', 1),
(65, 'I really feel that my child was cared for in the best posible way in this childcare !', 'abasek2q@samsung.com', 'Drawing and Painting', '2021-05-14', 1),
(66, 'I really feel that my child was cared for in the best posible way in this childcare !', 'abasek2q@samsung.com', 'Drawing and Painting', '2021-05-14', 1),
(67, 'I really feel that my child was cared for in the best posible way in this childcare !', 'abasek2q@samsung.com', 'Drawing and Painting', '2021-05-14', 1),
(68, 'When my child walk in to your daycare it was a shy little boy. But after spending a few months there it felt so welcome and it made a lot of new friends. He is much more confident now and has many friends on the playground.', 'abasek2q@samsung.com', 'Sand', '2021-05-14', 1),
(69, 'When my child walk in to your daycare it was a shy little boy. But after spending a few months there it felt so welcome and it made a lot of new friends. He is much more confident now and has many friends on the playground.', 'abasek2q@samsung.com', 'Sand', '2021-05-14', 1),
(70, 'This is one of the activities my daughter loves i hope that she will be an artist one day. Or maybe a famous movie star \"', 'abasek2q@samsung.com', 'Doll and Character Play', '2021-05-15', 1),
(71, 'This is one of the activities my daughter loves i hope that she will be an artist one day. Or maybe a famous movie star \"', 'abasek2q@samsung.com', 'Doll and Character Play', '2021-05-15', 1),
(72, 'This is one of the activities my daughter loves i hope that she will be an artist one day. Or maybe a famous movie star \"', 'alex.member@test.com', 'Doll and Character Play', '2021-05-15', 1),
(73, 'Truly an amazing experience for my child. It always has so much fun with the new friends it made.', 'alex.member@test.com', 'Water Play', '2021-05-15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `testimonial_panels`
--

CREATE TABLE `testimonial_panels` (
  `panel_id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'Empty',
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'Empty',
  `testimonial` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'Empty',
  `activity` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'Empty',
  `date` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'Empty',
  `county` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'Empty',
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'Empty'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `testimonial_panels`
--

INSERT INTO `testimonial_panels` (`panel_id`, `first_name`, `last_name`, `testimonial`, `activity`, `date`, `county`, `country`) VALUES
(1, 'Alex', 'Memberson', 'This is a wonderful place', 'Playtime', '2021-05-01', 'Dublin', 'Ireland'),
(2, 'Arlena', 'Basek', 'When my child walk in to your daycare it was a shy little boy. But after spending a few months there it felt so welcome and it made a lot of new friends. He is much more confident now and has many friends on the playground.', 'Sand', '2021-05-14', 'Paris', 'France'),
(3, 'Aeriell', 'Giffaut', 'Test Testimonial 19 - This is a testimonial to be used as a placeholder review !', 'Activity 9', '2014-11-11', 'Dublin 23', 'Ireland'),
(4, 'Arlena', 'Basek', 'Hello dear world i hav to say that the time my child spend in this lovely enviroment was nothing short of amazing.', 'Doll and Character Play', '2021-05-14', 'Paris', 'France');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstName` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastName` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `userTypeId` int(11) DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `firstName`, `lastName`, `password`, `userTypeId`, `isActive`) VALUES
('abasek2q@samsung.com', 'Arlena', 'Basek', 'Password@1', 2, 1),
('ablasingq@mashable.com', 'Angela', 'Blasing', 'Password@1', 2, 1),
('abrockton2r@yellowbook.com', 'Ailene', 'Brockton', 'Password@1', 2, 1),
('agiffaut28@mlb.com', 'Aeriell', 'Giffaut', 'Password@1', 2, 2),
('agofton2l@wix.com', 'Augusto', 'Gofton', 'Password@1', 2, 1),
('akinchlea15@ox.ac.uk', 'Aurlie', 'Kinchlea', 'Password@1', 1, 2),
('alex.admin@test.com', 'Aleksandar', 'Admin', '$2y$10$d1UBLwk4OrVJj0qsHdP10u8eTqNFa6FuF7LNdJtmF.9h9kfzpVpMu', 1, 1),
('alex.member@gmail.com', 'Alex', 'Memberson', 'Password@1', 2, 1),
('alex.member@test.com', 'Aleksandar', 'Member', '$2y$10$i.LwF/1W1NjVNJeeZG3qHOlDLSCN5DGCodZGwVwwnx2IAab2yo1Xy', 2, 1),
('alex.public@test.email', 'Alex', 'Publicson', 'Password@1', 3, 1),
('amuckian2b@flickr.com', 'Annabelle', 'Muckian', 'Password@1', 1, 2),
('athurlingo@prnewswire.com', 'Arabella', 'Thurling', 'Password@1', 1, 2),
('avonhagt2h@examiner.com', 'Aretha', 'von Hagt', 'Password@1', 2, 2),
('awheelwright2g@twitpic.com', 'Aurel', 'Wheelwright', 'Password@1', 2, 1),
('awittg@yelp.com', 'Andonis', 'Witt', 'Password@1', 1, 2),
('bchritchleyc@bloglines.com', 'Boothe', 'Chritchley', 'Password@1', 2, 1),
('bfryers16@123-reg.co.uk', 'Bathsheba', 'Fryers', 'Password@1', 2, 2),
('blomath25@fema.gov', 'Becca', 'Lomath', 'Password@1', 2, 1),
('bobby.tracey@email.com', 'Bobby', 'Tracey', 'P@55w0rd!', 2, 1),
('bplatt8@exblog.jp', 'Brigitte', 'Platt', 'Password@1', 2, 2),
('bsalzburg26@answers.com', 'Boothe', 'Salzburg', 'Password@1', 1, 2),
('bshowen1h@privacy.gov.au', 'Bordie', 'Showen', 'Password@1', 2, 2),
('canscotts@wunderground.com', 'Chuck', 'Anscott', 'Password@1', 1, 2),
('ccaldayrou1@naver.com', 'Chickie', 'Caldayrou', 'Password@1', 2, 1),
('cderoecke@samsung.com', 'Corbet', 'De Roeck', 'Password@1', 1, 1),
('cfilinkov1a@tamu.edu', 'Cristina', 'Filinkov', 'Password@1', 1, 2),
('chainningn@japanpost.jp', 'Chickie', 'Hainning', 'Password@1', 2, 1),
('cholbie2i@tamu.edu', 'Cazzie', 'Holbie', 'Password@1', 2, 1),
('clarenson17@chronoengine.com', 'Clair', 'Larenson', 'Password@1', 2, 2),
('cmcffaden1n@bbc.co.uk', 'Cristal', 'McFfaden', 'Password@1', 1, 2),
('craven1p@seesaa.net', 'Chilton', 'Raven', 'Password@1', 2, 1),
('cshurlockf@angelfire.com', 'Candra', 'Shurlock', 'Password@1', 1, 2),
('cskupinskix@last.fm', 'Coop', 'Skupinski', 'Password@1', 1, 2),
('dberriball2n@imdb.com', 'Debbi', 'Berriball', 'Password@1', 1, 1),
('dclayson23@amazon.co.uk', 'Doralynn', 'Clayson', 'Password@1', 1, 2),
('dheakeyr@accuweather.com', 'Dosi', 'Heakey', 'Password@1', 1, 2),
('dsowrey11@google.ca', 'Dallis', 'Sowrey', 'Password@1', 1, 1),
('dsuddick1t@apple.com', 'Dur', 'Suddick', 'Password@1', 1, 2),
('ecurmi1j@reverbnation.com', 'Esmeralda', 'Curmi', 'Password@1', 1, 2),
('emily.tracey@email.com', 'Emily', 'Tracey', 'P@55w0rd!', 2, 1),
('eparsonagem@last.fm', 'Ezechiel', 'Parsonage', 'Password@1', 1, 2),
('eswainger2j@angelfire.com', 'Elisabet', 'Swainger', 'Password@1', 1, 2),
('evan.pickering@email.com', 'Evan', 'Pickering', '$2y$10$YxXcp2Dnx.TLMpSChJpOfO2BKVInx16F9wWdTwXm1ZxFFGOqZdT4.', 2, 1),
('fcaverhill0@paginegialle.it', 'Francine', 'Caverhill', 'Password@1', 2, 1),
('fstebbin1b@com.com', 'Fenelia', 'Stebbin', 'Password@1', 2, 1),
('ftatem5@dropbox.com', 'Fairfax', 'Tatem', 'Password@1', 2, 2),
('gboliver29@globo.com', 'Genvieve', 'Boliver', 'Password@1', 2, 2),
('gdregan2m@va.gov', 'Gardener', 'Dregan', 'Password@1', 2, 2),
('gdrewett24@soup.io', 'Geoff', 'Drewett', 'Password@1', 1, 2),
('hdemongev@yandex.ru', 'Henrik', 'Demonge', 'Password@1', 1, 1),
('hdorrian13@free.fr', 'Hailee', 'Dorrian', 'Password@1', 1, 1),
('hhawleyi@archive.org', 'Hilde', 'Hawley', 'Password@1', 1, 2),
('hreingery@japanpost.jp', 'Hurleigh', 'Reinger', 'Password@1', 2, 1),
('hstoffela@domainmarket.com', 'Hildagard', 'Stoffel', 'Password@1', 2, 2),
('James@gmail.com', 'James', 'Walsh', '$2y$10$JTGKRU9yuc7RdwXs7l/waudBkJndbWOM7fVAXtqZRmMzlIFeKxIN6', 1, 1),
('jbromley1x@mtv.com', 'Jeanette', 'Bromley', 'Password@1', 1, 2),
('jcaw27@1und1.de', 'Joycelin', 'Caw', 'Password@1', 1, 2),
('jgoltl@163.com', 'Jessamine', 'Golt', 'Password@1', 1, 1),
('jpitcaithlyz@spiegel.de', 'Jenna', 'Pitcaithly', 'Password@1', 1, 1),
('jshilstoned@shareasale.com', 'Jeromy', 'Shilstone', 'Password@1', 1, 2),
('jviel2d@pinterest.com', 'Jorey', 'Viel', 'Password@1', 2, 2),
('kcammiemilek@feedburner.com', 'Karlan', 'Cammiemile', 'Password@1', 1, 2),
('kdeshorts1q@pinterest.com', 'Karalee', 'Deshorts', 'Password@1', 1, 1),
('kmayberry1m@nps.gov', 'Keen', 'Mayberry', 'Password@1', 1, 1),
('kmckenzieh@omniture.com', 'Kala', 'McKenzie', 'Password@1', 1, 2),
('ktunesi1v@infoseek.co.jp', 'Kendra', 'Tunesi', 'Password@1', 1, 1),
('laddy4@photobucket.com', 'Leonhard', 'Addy', 'Password@1', 1, 1),
('ldellcasa1r@list-manage.com', 'Lammond', 'Dell Casa', 'Password@1', 1, 1),
('ldoulden9@bravesites.com', 'Licha', 'Doulden', 'Password@1', 2, 1),
('leon.tracey@email.com', 'Leon', 'Tracey', '123456789', 1, 1),
('lkrollmanw@i2i.jp', 'Livvie', 'Krollman', 'Password@1', 1, 1),
('lledger1c@merriam-webster.com', 'Lucius', 'Ledger', 'Password@1', 2, 2),
('lshafto2a@dagondesign.com', 'Lorette', 'Shafto', 'Password@1', 1, 1),
('lsimonutti18@state.tx.us', 'Larissa', 'Simonutti', 'Password@1', 2, 1),
('lspilsburie2o@jigsy.com', 'Lars', 'Spilsburie', 'Password@1', 1, 1),
('mbarz1i@slashdot.org', 'Maggee', 'Barz', 'Password@1', 2, 1),
('mbernardo19@dropbox.com', 'Margaretha', 'Bernardo', 'Password@1', 1, 1),
('mcoode1d@diigo.com', 'Morly', 'Coode', 'Password@1', 1, 2),
('mhadnyb@washington.edu', 'Maurise', 'Hadny', 'Password@1', 1, 1),
('mmerdewu@about.me', 'Mitchel', 'Merdew', 'Password@1', 1, 2),
('mpowton1g@ezinearticles.com', 'Mathew', 'Powton', 'Password@1', 2, 1),
('mproschke14@etsy.com', 'Melissa', 'Proschke', 'Password@1', 2, 1),
('ncavozzi7@nydailynews.com', 'Naomi', 'Cavozzi', 'Password@1', 1, 1),
('nslaghtt@gravatar.com', 'Nadia', 'Slaght', 'Password@1', 1, 1),
('nstrowger2p@aboutads.info', 'Northrop', 'Strowger', 'Password@1', 1, 2),
('nwager1e@google.co.jp', 'Natassia', 'Wager', 'Password@1', 1, 2),
('okenealy22@discovery.com', 'Oliver', 'Kenealy', 'Password@1', 2, 2),
('pkiebes20@flickr.com', 'Panchito', 'Kiebes', 'Password@1', 1, 1),
('pscolding10@4shared.com', 'Phillis', 'Scolding', 'Password@1', 2, 1),
('rblofield1f@columbia.edu', 'Rosella', 'Blofield', 'Password@1', 1, 2),
('rdmtrovic1o@vistaprint.com', 'Ransom', 'Dmtrovic', 'Password@1', 2, 1),
('reliez2k@sourceforge.net', 'Rosalind', 'Eliez', 'Password@1', 1, 1),
('rfrickey21@t-online.de', 'Richardo', 'Frickey', 'Password@1', 1, 2),
('rgrieveson1k@google.it', 'Royal', 'Grieveson', 'Password@1', 1, 2),
('rhallgarth2c@bloomberg.com', 'Rourke', 'Hallgarth', 'Password@1', 2, 2),
('rlegrand12@princeton.edu', 'Ruperta', 'Le Grand', 'Password@1', 1, 2),
('rnote1l@google.ru', 'Rosalia', 'Note', 'Password@1', 1, 1),
('robert.tracey@gmail.com', 'Robert', 'Tracey', '$2y$10$NTUKmVnVSgVH0Njc5WCPGODsIMuLAiaTYIjgLYyevKAxPMaqpeR3y', 1, 1),
('robertpatricktracey@gmail.com', 'Robert', 'Tracey', '$2y$10$ghFS0BvVvzIcg1dGHFGZ6eGeJSqOM6mCDKl8PbRaAkU5MqPlvMTUy', 1, 1),
('roberttracey@email.com', 'Robert', 'Tracey', '123456789', 1, 1),
('rpriestland1z@hud.gov', 'Rey', 'Priestland', 'Password@1', 1, 1),
('rsummersett2f@blog.com', 'Reinhold', 'Summersett', 'Password@1', 2, 1),
('sdagnallp@theguardian.com', 'Sebastiano', 'Dagnall', 'Password@1', 1, 1),
('sdurant2@e-recht24.de', 'Steffane', 'Durant', 'Password@1', 1, 2),
('slowde1w@latimes.com', 'Sherwood', 'Lowde', 'Password@1', 1, 1),
('sprecious3@va.gov', 'Saidee', 'Precious', 'Password@1', 2, 2),
('ssuddell6@hubpages.com', 'Stillman', 'Suddell', 'Password@1', 2, 1),
('test@test.com', 'Aleksandar', 'Mladenov', '$2y$10$7rka4COCt6RrkH9st90kle5.nJ6ucjWq/LoqOuPAmyg9Zlo31WSYK', 2, 1),
('wlilywhite2e@google.com.au', 'Westbrooke', 'Lilywhite', 'Password@1', 1, 1),
('wmilstead1y@accuweather.com', 'Wallis', 'Milstead', 'Password@1', 2, 1),
('wyakovliv1u@ebay.co.uk', 'Winslow', 'Yakovliv', 'Password@1', 2, 2),
('zmadrellj@acquirethisname.com', 'Zora', 'Madrell', 'Password@1', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `userTypeId` int(11) NOT NULL,
  `userType` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `userTypeDesc` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`userTypeId`, `userType`, `userTypeDesc`) VALUES
(1, 'Admin', 'Admin users can edit the site.'),
(2, 'Parent', 'Parent can access the site and view child information.'),
(3, 'Public', 'Defualt type given to users before the logon so they can view the site.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`activityId`);

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`addressId`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `children`
--
ALTER TABLE `children`
  ADD PRIMARY KEY (`childId`),
  ADD KEY `parentEmail` (`username`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contactId`);

--
-- Indexes for table `daily_record`
--
ALTER TABLE `daily_record`
  ADD PRIMARY KEY (`recordId`),
  ADD KEY `childId` (`childId`),
  ADD KEY `activityId` (`activityId`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`eventId`);

--
-- Indexes for table `fee`
--
ALTER TABLE `fee`
  ADD PRIMARY KEY (`feeId`),
  ADD KEY `registrationId` (`registrationId`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phone`
--
ALTER TABLE `phone`
  ADD PRIMARY KEY (`phoneId`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`registrationId`),
  ADD KEY `categoryId` (`categoryId`),
  ADD KEY `parentEmail` (`username`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`serviceId`);

--
-- Indexes for table `special_offer`
--
ALTER TABLE `special_offer`
  ADD PRIMARY KEY (`offerId`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`testimonialId`),
  ADD KEY `parentEmail` (`parentEmail`);

--
-- Indexes for table `testimonial_panels`
--
ALTER TABLE `testimonial_panels`
  ADD PRIMARY KEY (`panel_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD KEY `userTypeId` (`userTypeId`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`userTypeId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `activityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `addressId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `children`
--
ALTER TABLE `children`
  MODIFY `childId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contactId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `daily_record`
--
ALTER TABLE `daily_record`
  MODIFY `recordId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `eventId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `fee`
--
ALTER TABLE `fee`
  MODIFY `feeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `phone`
--
ALTER TABLE `phone`
  MODIFY `phoneId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `registrationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `serviceId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `special_offer`
--
ALTER TABLE `special_offer`
  MODIFY `offerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `testimonialId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `testimonial_panels`
--
ALTER TABLE `testimonial_panels`
  MODIFY `panel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `userTypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Constraints for table `children`
--
ALTER TABLE `children`
  ADD CONSTRAINT `children_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Constraints for table `daily_record`
--
ALTER TABLE `daily_record`
  ADD CONSTRAINT `daily_record_ibfk_1` FOREIGN KEY (`childId`) REFERENCES `children` (`childId`),
  ADD CONSTRAINT `daily_record_ibfk_2` FOREIGN KEY (`activityId`) REFERENCES `activity` (`activityId`);

--
-- Constraints for table `fee`
--
ALTER TABLE `fee`
  ADD CONSTRAINT `fee_ibfk_1` FOREIGN KEY (`registrationId`) REFERENCES `registration` (`registrationId`);

--
-- Constraints for table `phone`
--
ALTER TABLE `phone`
  ADD CONSTRAINT `phone_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Constraints for table `registration`
--
ALTER TABLE `registration`
  ADD CONSTRAINT `registration_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `category` (`categoryId`),
  ADD CONSTRAINT `registration_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Constraints for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD CONSTRAINT `testimonial_ibfk_1` FOREIGN KEY (`parentEmail`) REFERENCES `user` (`username`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`userTypeId`) REFERENCES `user_type` (`userTypeId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
