-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2020 at 08:00 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flipbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `21stcenturylibraryseries`
--

CREATE TABLE `21stcenturylibraryseries` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actual_price` int(11) DEFAULT NULL,
  `offer_price` int(11) DEFAULT NULL,
  `sale` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `in_stock` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` int(11) DEFAULT NULL,
  `categories` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories_id` int(11) DEFAULT NULL,
  `review` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `21stcenturylibraryseries`
--

INSERT INTO `21stcenturylibraryseries` (`id`, `book_title`, `book_path`, `thumb_img`, `product_img`, `product_details`, `actual_price`, `offer_price`, `sale`, `in_stock`, `sku`, `categories`, `tags`, `description`, `additional_info`, `categories_id`, `review`, `created_at`, `updated_at`) VALUES
(1, 'Airplanes', 'book_157.pdf', 'thumb_157.jpeg', NULL, 'Series: Language Arts Explorer: Its cool to learn about countries, No pf Pages: 32 pages, Publisher: Aries Books International. (January 1, 2019), Author: Nancy Robinson Masters, Language: English, Copyright: 2019, Graphics: Full Color Photographs', 280, 165, 'Yes', '1000', 157, 'Picture Books, Early Concepts with Experiments', 'airplanes', 'Airplane', 'Weight: 9.6 g, Dimensions: 7.5 × 9.5 × 4 cm', 23, '0', NULL, NULL),
(2, 'Animation', 'book_160.pdf', 'thumb_160.jpeg', NULL, 'Age : 3 and up, Series: Language Arts Explorer: Career Science, No pf Pages: 32 pages, Publisher: Aries Books International. (January 1, 2019), Author: Trudi Strain, Language: English, Copyright: 2019, Graphics: Full Color Photographs', 280, 165, 'Yes', '1000', 160, 'The Career Series, Picture Books', 'Animation', 'Somewhere along the way, something happened to give art that crucial kick that gave life to still images: motion. The art of animation, both hand-drawn and computer-animated, has a long and rich history spanning nearly a century of experimentation and innovation. This book helps students understand the role innovation has played in the development of animation industry.', 'Weight: 9.6 g, Dimensions: 7.5 × 9.5 × 4 cm', 23, '0', NULL, NULL),
(3, 'Artificial Limbs', 'book_162.pdf', 'thumb_162.jpeg', NULL, 'Age : 3 and up, Series: Language Arts Explorer: Science, No pf Pages: 32 pages, Publisher: Aries Books International. (January 1, 2019), Author: Susan H Gray, Language: English, Copyright: 2019, Graphics: Full Color Photographs', 280, 165, 'Yes', '1000', 162, 'Science Explorer, Sports', 'Artificial Limbs', 'Everyday doctors perform artificial limb replacements that were unheard of only a few years ago. They continue to make advances that improve people’s lives. Using artificial limbs as an example, this book challenges kids to think about innovation and how anything is possible.', 'Weight: 9.6 g, Dimensions: 7.5 × 9.5 × 4 cm', 23, '0', NULL, NULL),
(4, 'Cargo Ships', 'book_169.pdf', 'thumb_169.jpeg', NULL, 'Age : 3 and up, Series: Language Arts Explorer: General, No pf Pages: 32 pages, Publisher: Aries Books International. (January 1, 2019), Author: James M, Language: English, Copyright: 2019, Graphics: Full Color Photographs', 280, 165, 'Yes', '1000', 169, 'Habits and Essentials', 'Cargo Ships', 'We hear a lot about the new global economy. How does it work? How are we able to transport so many products around the world? How have innovations in the development of Cargo Ships fueled the global economy? Find the answers to these questions and more when you take a look at cargo ships from a new perspective.', 'Weight: 9.6 g, Dimensions: 7.5 × 9.5 × 4 cm', 23, '0', NULL, NULL),
(5, 'Cars', 'book_94.pdf', 'thumb_94.jpeg', NULL, 'Age : 3 and up, Series: Language Arts Explorer: Habits and Essentials, No pf Pages: 32 pages, Publisher: Aries Books International. (January 1, 2019), Author: James M Flammang, Language: English, Copyright: 2019, Graphics: Full Color Photographs', 280, 165, 'Yes', '1000', 94, 'Habits and Essentials, Picture Books', 'Cars', 'You may have traveled thousands of miles in your family’s car. Did you know that some parts of that car might have traveled halfway around the world before the car ended up in your family’s garage? Look inside to find out more about how cars are manufactured by companies in many different countries.', 'Weight: 9.6 g, Dimensions: 7.5 × 9.5 × 4 cm', 23, '0', NULL, NULL),
(6, 'Disease Control', 'book_172.pdf', 'thumb_172.jpeg', NULL, 'Age : 3 and up, Series: Language Arts Explorer: Science, No pf Pages: 32 pages, Publisher: Aries Books International. (January 1, 2019), Author: Susan H, Language: English, Copyright: 2019, Graphics: Full Color Photographs', 280, 165, 'Yes', '1000', 172, 'Science Explorer, Early Concepts with Experiments', 'Disease Control', 'There is a war raging that you may not be aware of, the fight to prevent the spread of diseases. Everyday health care professionals are focused on controlling the spread of disease. This book exposes students to the innovatative tools and techniques healthcare professionals use to track, control, and combat the spread of dangerous diseases.', 'Weight: 9.6 g, Dimensions: 7.5 × 9.5 × 4 cm', 23, '0', NULL, NULL),
(7, 'Emergency Care', 'book_178.pdf', 'thumb_178.jpeg', NULL, 'Age : 3 and up, Series: Language Arts Explorer: Habits and Essentials, No pf Pages: 32 pages, Publisher: Aries Books International. (January 1, 2019), Author: Susan H, Language: English, Copyright: 2019, Graphics: Full Color Photographs', 280, 165, 'Yes', '1000', 178, 'Habits and Essentials', 'Emergency Care', 'When a medical emergency occurs, seconds often make the difference between life and death. Every day, people are saved as the results of improvements in diagnosis and care. Read this book to explore the many advancements that have occurred in emergency care and the role innovation played in their development.', 'Weight: 9.6 g, Dimensions: 7.5 × 9.5 × 4 cm', 23, '0', NULL, NULL),
(8, 'Hearing', 'book_186.pdf', 'thumb_186.jpeg', NULL, 'Age : 3 and up, Series: Language Arts Explorer: Science, No pf Pages: 32 pages, Publisher: Aries Books International. (January 1, 2019), Author: Susan H Gray, Language: English, Copyright: 2019, Graphics: Full Color Photographs', 280, 165, 'Yes', '1000', 186, 'Science Explorer, Habits and Essentials', 'Hearing', 'There have been many advances developed to help improves peoples hearing. How have these advances occurred? What role has innovation played in their development? This book helps kids understand the concept of innovation and how it can be used to help overcome and solve many problems.', 'Weight: 9.6 g, Dimensions: 7.5 × 9.5 × 4 cm', 23, '0', NULL, NULL),
(9, 'Junk Food', 'book_188.pdf', 'thumb_188.jpeg', NULL, 'Age : 3 and up, Series: Language Arts Explorer: Habits and Essentials, No pf Pages: 32 pages, Publisher: Aries Books International. (January 1, 2019), Author: James M Flammang, Language: English, Copyright: 2019, Graphics: Full Color Photographs', 280, 165, 'Yes', '1000', 188, 'Habits and Essentials', 'Junk Food', 'Examines the basic concepts of junk food through the lens of the latest scientific studies and finding. Provides tools for evaluating conflicting and ever changing ideas.', 'Weight: 9.6 g, Dimensions: 7.5 × 9.5 × 4 cm', 23, '0', NULL, NULL),
(10, 'Movies', 'book_191.pdf', 'thumb_191.jpeg', NULL, 'Age : 3 and up, Series: Language Arts Explorer:Career Science, No pf Pages: 32 pages, Publisher: Aries Books International. (January 1, 2019), Author: Annie Buckley, Language: English, Copyright: 2019, Graphics: Full Color Photographs', 280, 165, 'Yes', '1000', 191, 'The Career Series, Picture Books', 'Movies', 'Kids have always loved movies. But the way they make, access, buy, and listen to movies has changed radically over the years. What has driven this change? Innovation! This book uses Movies to get students to think critically about the impact of innovation.', 'Weight: 9.6 g, Dimensions: 7.5 × 9.5 × 4 cm', 23, '0', NULL, NULL),
(11, 'Music', 'book_192.pdf', 'thumb_192.jpeg', NULL, 'Age : 3 and up Series: Language Arts Explorer:Career Science No pf Pages: 32 pages Publisher: Aries Books International. (January 1, 2019) Author: Annie Buckley Language: English Copyright: 2019 Graphics: Full Color Photographs', 280, 165, 'Yes', '1000', 192, 'Habits and Essentials, The Career Series, Picture Books', 'Music', 'Kids have always loved music. But the way they make, access, buy, and listen to music has changed radically over the years. What has driven this change? Innovation! This book uses Music to get students to think critically about the impact of innovation.', 'Weight: 9.6 g, Dimensions: 7.5 × 9.5 × 4 cm', 23, '0', NULL, NULL),
(12, 'Obesity', 'book_195.pdf', 'thumb_195.jpeg', NULL, 'Age : 3 and up, Series: Language Arts Explorer: Habits and Essentials, No pf Pages: 32 pages, Publisher: Aries Books International. (January 1, 2019), Author: Toney Aliman, Language: English, Copyright: 2019, Graphics: Full Color Photographs', 280, 165, 'Yes', '1000', 195, 'Science Explorer, Habits and Essentials', 'Obesity', 'Examines the basic concepts of obesity through the lens of the latest scientific studies and finding. Provides tools for evaluating conflicting and ever changing ideas.', 'Weight: 9.6 g, Dimensions: 7.5 × 9.5 × 4 cm', 23, '0', NULL, NULL),
(13, 'Passenger Ships', 'book_196.pdf', 'thumb_196.jpeg', NULL, 'Age : 3 and up, Series: Language Arts Explorer: General, No pf Pages: 32 pages, Publisher: Aries Books International. (January 1, 2019), Author: Judy Alter, Language: English, Copyright: 2019, Graphics: Full Color Photographs', 280, 165, 'Yes', '1000', 196, 'Habits and Essentials', 'Passenger Ships', 'Rock climbing walls, swimming pools, mini golf courses, ice skating rinks are now available on passenger ships. How do they do it? Who comes up with the next new thing? What role does innovation play in the development of the next generation of passenger ships? This “Innovation in Transportation” book, Passenger Ships, takes a look at the people and creative ideas that have changed the way we think about passenger ships.', 'Weight: 9.6 g, Dimensions: 7.5 × 9.5 × 4 cm', 23, '0', NULL, NULL),
(14, 'Photography', 'book_197.pdf', 'thumb_197.jpeg', NULL, 'Age : 3 and up, Series: Language Arts Explorer: Career Science, No pf Pages: 32 pages, Publisher: Aries Books International. (January 1, 2019), Author: Annie Buckley, Language: English, Copyright: 2019, Graphics: Full Color Photographs', 280, 165, 'Yes', '1000', 197, 'The Career Series, Picture Books', 'Photography', 'Photography is so much a part of life today that the average person my encounter more than 1,000 camera images a day. Cameras are now integrated with cell phones, digital images can be sent instantly to almost anywhere in the world. How is this possible? Innovation! This book helps students understand the role innovation has played in the development of the camera.', 'Weight: 9.6 g, Dimensions: 7.5 × 9.5 × 4 cm', 23, '0', NULL, NULL),
(15, 'Radio', 'book_200.pdf', 'thumb_200.jpeg', NULL, 'Age : 3 and up, Series: Language Arts Explorer: Habits and Essentials, No pf Pages: 32 pages, Publisher: Aries Books International. (January 1, 2019), Author: Philip Brooks, Language: English, Copyright: 2019, Graphics: Full Color Photographs', 280, 165, 'Yes', '1000', 200, 'Habits and Essentials, The Career Series, Picture Books', 'Radio', 'Radio has been commercially available since the late 1800’s. But today’s radio is has evolved greatly over the last 200 years. What factors drove this evolution? Using a product that kids are familiar with, Radio, this book introduces kids to the concept of innovation and its impact on their everyday life.', 'Weight: 9.6 g, Dimensions: 7.5 × 9.5 × 4 cm', 23, '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `animalinvaders`
--

CREATE TABLE `animalinvaders` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actual_price` int(11) DEFAULT NULL,
  `offer_price` int(11) DEFAULT NULL,
  `sale` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `in_stock` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` int(11) DEFAULT NULL,
  `categories` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories_id` int(11) DEFAULT NULL,
  `review` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `blog_content` varchar(2000) DEFAULT NULL,
  `created_by` varchar(250) DEFAULT NULL,
  `categories` varchar(250) DEFAULT NULL,
  `tags` varchar(250) DEFAULT NULL,
  `created_on` time DEFAULT current_timestamp(),
  `updated_on` time DEFAULT NULL,
  `slug` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `blog_content`, `created_by`, `categories`, `tags`, `created_on`, `updated_on`, `slug`) VALUES
(10, 'Top Tips: Age 3–5', '<p>At this stage your child will still be enjoying picture books of all kinds to share with you, but will probably start bringing home simple decodable books from school too. Decodable books are designed for your child to read and practise phonics. So, here are a few tips to make sure you make the most of all these different types of books.</p>\r\n\r\n<p><strong>Tip 1: Read together every day</strong></p>\r\n\r\n<p>Try a short reading time when you are reading (newspaper, magazine, book, on?screen) and your child is too. It&rsquo;s good to start this habit of quiet reading time early, however short to begin with!</p>\r\n\r\n<p><strong>Tip 2:Talk about the book before you begin reading</strong></p>\r\n\r\n<p>Before reading a book together, always talk about the title, the pictures and the information on the cover (front and back). If it&rsquo;s new, ask what your child thinks the book might be about. If it&rsquo;s an old favourite then talk about the bits you love most! Don&rsquo;t worry if some books get chosen again and again!</p>\r\n\r\n<p><strong>Tip 3:Read with different voices</strong></p>\r\n\r\n<p>When reading aloud use lots of expression and try different voices for different characters. Get your child to join in with bits too, such as, &lsquo;They pulled and they pulled!&rsquo; and &lsquo;Fee, fi, fo, fom&hellip;&rsquo;. See if your child can copy you!</p>\r\n\r\n<p><strong>Tip 4:Ask each other questions</strong></p>\r\n\r\n<p>Talk about the stories and information books when you&rsquo;ve finished reading together and ask questions. What did you like best? Why did the tiger let Floppy go? Have you ever played a trick on anybody? Get your child to ask you questions too.</p>\r\n\r\n<p><strong>Tip 5:Retell stories and events</strong></p>\r\n\r\n<p>Ask your child about things that happened at school or with their friends. Sometimes, after you&rsquo;ve shared a story or watched a TV programme, ask your child to tell you about it. Help them by asking What happened first? What next? And then what?</p>', 'Little Prodigy', 'Fiction, Novels', 'Fiction, Novels', '15:39:09', NULL, 'top-tips-age-35');

-- --------------------------------------------------------

--
-- Table structure for table `blogcommentreplies`
--

CREATE TABLE `blogcommentreplies` (
  `id` int(11) NOT NULL,
  `comment_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogcommentreplies`
--

INSERT INTO `blogcommentreplies` (`id`, `comment_id`, `user_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 18, 2, 'reply comment 1', '2020-08-02 02:09:13', '2020-08-02 02:09:13'),
(2, 19, 2, 'reply 2', '2020-08-02 02:10:08', '2020-08-02 02:10:08'),
(3, 18, 2, 'reply 1', '2020-08-02 02:14:46', '2020-08-02 02:14:46'),
(4, 18, 2, 'reply 111', '2020-08-02 02:15:13', '2020-08-02 02:15:13'),
(5, 18, 2, 'reply 112', '2020-08-02 02:15:31', '2020-08-02 02:15:31'),
(6, 18, 2, 'reply 113', '2020-08-02 02:15:39', '2020-08-02 02:15:39'),
(7, 19, 2, 'reply 12', '2020-08-02 02:15:47', '2020-08-02 02:15:47'),
(8, 19, 2, 'reply 14', '2020-08-02 02:15:52', '2020-08-02 02:15:52'),
(9, 18, 2, NULL, '2020-08-02 02:16:57', '2020-08-02 02:16:57'),
(10, 18, 2, 'rest 1', '2020-08-02 02:17:05', '2020-08-02 02:17:05'),
(11, 18, 2, NULL, '2020-08-02 02:17:27', '2020-08-02 02:17:27'),
(12, 18, 2, NULL, '2020-08-02 02:17:29', '2020-08-02 02:17:29'),
(13, 18, 2, NULL, '2020-08-02 02:17:45', '2020-08-02 02:17:45'),
(14, 18, 2, NULL, '2020-08-02 02:17:46', '2020-08-02 02:17:46'),
(15, 18, 2, NULL, '2020-08-02 02:18:28', '2020-08-02 02:18:28'),
(16, 18, 2, 'test reply 111', '2020-08-02 02:18:34', '2020-08-02 02:18:34'),
(17, 18, 2, 'test reply 213123', '2020-08-02 02:24:39', '2020-08-02 02:24:39'),
(18, 19, 2, 'new reply 1', '2020-08-02 02:25:30', '2020-08-02 02:25:30'),
(19, 19, 2, 'new reply 2', '2020-08-02 02:25:38', '2020-08-02 02:25:38'),
(20, 19, 2, 'new reply 4', '2020-08-02 02:25:44', '2020-08-02 02:25:44'),
(21, 18, 2, 'test c reply 1114', '2020-08-02 02:26:36', '2020-08-02 02:26:36'),
(22, 18, 2, 'test c reply 222222', '2020-08-02 02:26:45', '2020-08-02 02:26:45'),
(23, NULL, NULL, NULL, '2020-08-07 02:45:10', '2020-08-07 02:45:10'),
(24, NULL, NULL, NULL, '2020-08-07 02:45:20', '2020-08-07 02:45:20');

-- --------------------------------------------------------

--
-- Table structure for table `blogcomments`
--

CREATE TABLE `blogcomments` (
  `id` int(10) UNSIGNED NOT NULL,
  `comments` varchar(2000) DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `post_id` int(11) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `email` varchar(100) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogcomments`
--

INSERT INTO `blogcomments` (`id`, `comments`, `user_id`, `post_id`, `created_at`, `email`, `website`, `name`, `updated_at`) VALUES
(1, NULL, 2, 1, '2020-07-30 01:58:44', 'test@test.com', 'asdas', 'suguna', '2020-07-30 01:58:44'),
(2, 'New content', 2, 1, '2020-07-30 02:04:02', 'test@test.com', 'fdsdfsdf', 'suguna', '2020-07-30 02:04:02'),
(3, 'cvxcvxc', 2, 1, '2020-07-30 02:04:20', 'xcv', 'xcvxcv', 'suguna', '2020-07-30 02:04:20'),
(4, 'xvsfsfd', 2, 1, '2020-07-30 02:06:24', 'test@test.com', 'sdfsdfsdf', 'suguna', '2020-07-30 02:06:24'),
(5, 'zcxcz', 2, 1, '2020-07-30 02:07:48', 'test@test.com', 'czxczxcz', 'suguna', '2020-07-30 02:07:48'),
(6, 'zczxc', 2, 1, '2020-07-30 02:09:17', 'test@test.com', 'zxczx', 'suguna', '2020-07-30 02:09:17'),
(7, 'zczxc', 2, 1, '2020-07-30 02:15:27', 'test@test.com', 'zxczx', 'suguna', '2020-07-30 02:15:27'),
(8, 'cggnvn', 2, 1, '2020-07-30 02:24:34', 'nmb', 'mn', 'suguna', '2020-07-30 02:24:34'),
(9, 'cggnvn', 2, NULL, '2020-07-30 02:24:41', 'nmb@ada.com', 'mn', 'suguna', '2020-07-30 02:24:41'),
(10, 'cggnvn', 2, 1, '2020-07-30 02:24:42', 'nmb@ada.com', 'mn', 'suguna', '2020-07-30 02:24:42'),
(11, 'cggnvn', 2, NULL, '2020-07-30 02:25:13', 'nmb@ada.com', 'mn', 'suguna', '2020-07-30 02:25:13'),
(12, 'cggnvn', 2, NULL, '2020-07-30 02:25:17', 'nmb@ada.com', 'mn', 'suguna', '2020-07-30 02:25:17'),
(13, 'cggnvn', 2, NULL, '2020-07-30 02:26:19', 'nmb@ada.com', 'mn', 'suguna', '2020-07-30 02:26:19'),
(14, 'test', 2, 1, '2020-07-30 02:28:21', 'test@test.com', 'test.com', 'suguna', '2020-07-30 02:28:21'),
(15, 'test', 2, 1, '2020-07-30 02:28:22', 'test@test.com', 'test.com', 'suguna', '2020-07-30 02:28:22'),
(16, 'test', 2, 1, '2020-07-30 02:29:01', 'test@test.com', 'test.com', 'suguna', '2020-07-30 02:29:01'),
(17, 'test comment', 2, 1, '2020-07-30 03:22:34', 'test@test.com', 'website@mail.com', 'suguna', '2020-07-30 03:22:34'),
(18, 'test 123', 4, 10, '2020-08-03 06:11:24', 'pmrlsivas@gmail.com', NULL, 'siva', '2020-08-03 06:11:24'),
(19, 'Lovely Tips for my kid. Thank you 🙂', NULL, 10, '2020-08-09 23:51:50', 'test@test.com', NULL, 'Anonymous', '2020-08-09 23:51:50');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(20) UNSIGNED NOT NULL,
  `series_name` varchar(200) DEFAULT NULL,
  `series_desc` varchar(2000) DEFAULT NULL,
  `series_table_name` varchar(100) DEFAULT NULL,
  `no_of_books` int(20) UNSIGNED DEFAULT 0,
  `age_group` varchar(50) DEFAULT NULL,
  `banner_img` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `series_name`, `series_desc`, `series_table_name`, `no_of_books`, `age_group`, `banner_img`) VALUES
(1, 'KIDS CAN RE-CYCLE - PICTURE SERIES', 'Children from 2-11 can understand moral habits and other essentials through pictures and info-graphics to understand relationships and boundaries within their environment. The 21st Century Basic Skills readers support the development of reading skills as they introduce students to vocabulary and content they will use for a lifetime. Let your young readers discover the joy of recycling in such a young age as they build reading fluency.', 'KIDSCANRECYCLE', 7, '3-5 Years', 'E:\\xampp\\tmp\\phpFAD7.tmp'),
(2, 'WHAT\'S YOUR HEALTHY PLATE- PICTURE SERIES', 'This new picture series highlights what is your healthy plate for children? Age 3-5! By introducing dairy, Fruits, Vegetables, Essential grains, Protein, Oil & Fats This leveled reader helps the young child understand the importance of their healthy plate as a part of a balanced diet.', 'whatsyourhealthyplate', 1, '3-5 Years', 'E:\\xampp\\tmp\\phpF7A9.tmp'),
(3, 'PICTURE BOOKS', 'A Picture Book combines visual and verbal narratives in a book format, most often aimed at young children from 3-5. The images in picture books use a range of media such as oil paints, acrylics, watercolor, and pencil. Picture books tend to have two functions in the lives of children: they are first read to young children by adults, and then children read them themselves once they begin learning to read', 'picturebooks', 1, '3-5 Years', 'E:\\xampp\\tmp\\php879.tmp'),
(4, 'PLANETS SERIES- PICTURE SERIES', 'The 21st Century Junior Library: Solar System series introduces young readers to the wonders of the planets in our solar system. Through engaging text and dramatic full-color photographs and spacecraft images, students will be taken on a fascinating tour of our solar system’s eight planets and their moons. Each book contains information about the planet including its relationship to the sun and other planets, key characteristics, history, and other fun, relevant facts.', 'planetsseries', 0, '4-10 Years', 'E:\\xampp\\tmp\\php894.tmp'),
(5, 'GROWING PLANTS- PICTURE SERIES', 'Beautiful photographs combined with easy-to-read text make this series a good choice for young aspiring botanists. This engaging series provides the right amount of information on how plants grow, why they need sun, and how plants are used in food, clothing, and medicine.', 'growingplants', 0, '3-6 Years', 'E:\\xampp\\tmp\\phpE64E.tmp'),
(6, 'HOW DID THAT GET TO MY TABLE-PICTURE SERIES', 'In this series, readers are exposed to the key concepts of production, distribution, and consumption. Each book examines a product or service that kids see or use every day and follows it from raw material to finished goods. The series helps students understand the inter-connectedness of the environment in which they live.', 'howdidthatgettomytable', 0, '3-8 Years', 'E:\\xampp\\tmp\\php9DB4.tmp'),
(7, 'HOW DID THAT GET TO MY HOUSE - PICTURE SERIES', 'Kids have so many questions. Where is the Internet? How does electricity work? Where does gas come from? How does water get into the house? This series provides readers with a scientific foundation to pique interest in the physical world in which we live.', 'howdidthatgettomyhouse', 0, '4-8 Years', 'E:\\xampp\\tmp\\php4F42.tmp'),
(8, 'CHARACTER EDUCATION -PICTURE SERIES', 'This eight-book series teaches children about human values including respect, fairness, responsibility, and sportsmanship. The Character Education series is intended to help build a foundation for students to develop into morally responsible, self-disciplined citizens.', 'charactereducation', 0, '3-6 Years', 'E:\\xampp\\tmp\\phpDD9E.tmp'),
(9, 'HOW DOES THAT FLY? -PICTURE SERIES', 'Kids are very interested in aviation and how things fly. In this series, bright, engaging photos and clear, inviting text will captivate young readers as they explore these wonderful flying machines. \r\nThe series contains a mix of aircraft from gliders, hot air balloons and blimps, to supersonic fighter planes and bombers, to helicopters and propeller planes. While the stunning photos draw students into the book, the text exposes them to the science of flight. This set will be a winner for both avid and hard-to-reach readers.', 'howdoesthatfly', 0, '3-5 Years', 'E:\\xampp\\tmp\\php4921.tmp'),
(10, 'FARM ANIMAL SERIES- PICTURE SERIES', 'Farm animals are fascinating to kids of all ages. The series introduces young readers to animals that can be found on farms, such as pigs, sheep, horses, and cows, and describes the ways in which the animals help people.', 'farmanimalseries', 0, '3-6 Years', 'E:\\xampp\\tmp\\php2903.tmp'),
(11, 'WHAT DOES THIS DO? - PICTURE SERIES', 'Kids are fascinated with what machines do. From building skyscrapers to putting out fires, from tearing down old houses to hauling loads of gravel and rocks, heavy equipment is everywhere. Engaging text and appealing photos will encourage kids to read and learn about how these machines work.', 'whatdoesthisdo', 0, '3-5 Years', 'E:\\xampp\\tmp\\phpFB38.tmp'),
(12, 'WHAT SHOUD I DO? - PICTURE SERIES', 'What should you do at the pool to stay safe? How should you cross a busy street? What should you do if you are approached by a stranger? How should you play safely on the playground? Books in the Community Connections: What Should I Do? series introduce children to key safety topics. Clear, age- appropriate text combined with relevant photographs make this a must-have series for all school and public libraries.', 'whatshoudido', 0, '3-5 Years', 'E:\\xampp\\tmp\\phpEE92.tmp'),
(13, 'HOW TO WRITE SERIES', 'Writing is an important skill that kids use almost every day. Whether they’re working on a school report or writing about their day, the Language Arts Explorer Junior: Writing Series has tips and tricks that will help them become writing experts.', 'howtowriteseries', 0, '5-15 Years', 'E:\\xampp\\tmp\\phpC193.tmp'),
(14, 'LEARNING ONLINE ETIQUETTE', 'The Learning online Information Explorer series provides readers with the tools they need to FIND, ORGANIZE, and SHARE information clearly and effectively. Activities designed to help readers explore all kinds of information sources on the Internet are included in each chapter. Readers are encouraged to think critically as they conduct research, collaborate with fellow students, and present their findings in new and interesting ways.', 'learningonlineetiquette', 0, '6-15 Years', 'E:\\xampp\\tmp\\phpB809.tmp'),
(15, 'MATHS-DO IT WITH NUMBERS', 'This offering is an addition to our popular Real World Math series which reviewers have been calling “extraordinary, outstanding, and innovative.” The series takes a cross- curricular approach by combining math and geography & Sports. The main text covers important concepts in Sports and Geography while innovative math challenge questions encourage students to use their math skills to reinforce the information presented in the text. The solutions to each of the math challenges are clearly explained in the back of the book.', 'maths', 0, '7-12  Years', 'E:\\xampp\\tmp\\phpFDAA.tmp'),
(16, 'JUNIOR SCIENTISTS - SERIES', 'Science exploration should not be limited to conducting experiments in a laboratory. Science is fun and can be done anywhere! In this new series, young scientists are taught that experiments using the scientific method can be conducted in everyday places like the gym, car, kitchen, or at the beach. Each book contains entertaining, easy-to-follow hands- on experiments that introduce readers to science and\r\nthe scientific method. Bright, cool drawings paired with clear “how to” photos will make these book’s a hit with the budding scientists in your classroom. \r\nDo your students learn by experimenting? Do they want to find out more about how scientists work? Then the Science Explorer Junior books are right for your library! Through thinking and observation skills, your students will enjoy activities that will help them learn about everything from rocks and soil to magnets and solar energy. The Science Explorer Junior series is must for all the junior scientists in your school.\r\n', 'juniorscientists', 0, '7-15 Years', 'E:\\xampp\\tmp\\phpA1A.tmp'),
(17, 'HOW DID THEY BUILD THAT?? - PICTURE SERIES', 'From an early age, kids love to build things. This engaging series will capture the attention of young readers as they learn about how things are built. The series focuses on items that students encounter every day, from roads and bridges to skyscrapers and stadiums. This series is sure to educate and entertain kids as they learn about the world around them.', 'howdidtheybuildthat', 0, '5-12 Years', 'E:\\xampp\\tmp\\php2EB5.tmp'),
(18, 'HOW DO WE LIVE TOGETHER - PICTURE SERIES', 'This series in the Community Connections library opens young eyes to the bustling world around them and gently encourages early learning. Boys and girls will see how animal mothers care for their young, where the various creatures live, what they eat and how they behave. Readers are encouraged to think critically about how we share our back yards with these fascinating animals.', 'howdowelivetogether', 0, '5-12 Years', 'E:\\xampp\\tmp\\phpE73E.tmp'),
(19, 'COOL CAREERS', 'The Careers series introduces young readers to many career choices. There are a total of 72 different careers for children to read upon. Each book in the series provides students with an overview of what it is like to work within an organization like a hospital or farm, and then profiles several careers within the institution. \r\n\r\nThe Innovation in Entertainment series explores the role that innovation has played in changing the way that people are entertained. This series takes a look at the people and the creative ideas that have changed Careers. These books have exposed students to emerging careers in science, vocational and technical education, and new “green” jobs. \r\n\r\nCool Arts Careers\r\n\r\nWe are pleased to announce the addition of Cool Arts Careers following the same successful format. This series focuses on careers in film, TV, dance, fashion, and music. Students will gain a new perspective on these jobs, and gain a better understanding of the path needed to follow their dreams of a career in the arts. \r\nCareer & Technical Education\r\nThe focus of the series is on careers that are projected to grow over the next several years and that are attainable without a four-year college degree. Each title explorers what it takes to enter the field, compensation ranges, and a “day in the life” look at the career.', 'coolcareers', 0, '8-15 Years', 'E:\\xampp\\tmp\\php3AC9.tmp'),
(20, 'SCIENCE EXPLORER', 'The Science Explorer library provides readers with the opportunity for a hands-on experience with the world around us. These books use the scientific method to explore everything from the rocks and soil beneath our feet to the simple machines that make our lives easier. Readers are encouraged to think like scientists as they ask questions, gather information, and conduct experiments. \r\nScience Lab delves into the science of earth and space, life, and technology, while engaging readers in the process of scientific inquiry. Each book in the series uses the voice of a scientist or lab technician to take the reader through several fictional, but fact-based experiments. Through the journal notes of the narrator’s own problem, prediction, experiment, and results, the readers will see the scientific process in action.', 'scienceexplorer', 0, '7-15 Years', 'E:\\xampp\\tmp\\phpB768.tmp'),
(21, 'HEALTHY FOR LIFE', 'The Healthy for Life series introduces readers to exciting sports that can be part of a healthy and active lifestyle. These engaging titles promote good physical health for students while examining issues like why exercise is important and how leadership is used in sports.', 'healthyforlife', 0, '8-15 Years', 'E:\\xampp\\tmp\\php770F.tmp'),
(22, 'GLOBAL PERSPECTIVES', 'The Global Perspectives series introduces readers to social and scientific topics that impact people and communities around the world. Students are encouraged to think, seek out additional information, and get involved. Written in engaging narrative format, the text provides a truly global perspective on many issues.', 'globalperspectives', 0, '8-15 Years', 'E:\\xampp\\tmp\\php5933.tmp'),
(23, '21ST CENTURY LIBRARY SERIES', 'The Innovation in Entertainment series explores the role that innovation has played in changing the way that people are entertained. This series takes a look at the people and the creative ideas that have changed this industry. \r\nThe Innovation in Medicine series explores the role innovation has played in medicine and how people’s lives and health have improved as a result. Life expectancy has increased by some 28 years in the last century. \r\nThe Innovation in Transportation series takes a look at people and creative ideas that have changed the way that we travel and transport products. The series answers questions like:', '21stcenturylibraryseries', 15, '8-15 Years', 'E:\\xampp\\tmp\\php1928.tmp'),
(24, 'REAL WORLD SCIENCE', 'This 10-book series provides students with background on key concepts in science. Each title includes hands-on exercises aimed at engaging students in the process and developing skills that are essential to scientific discoveries and learning.', 'realworldscience', 0, '8-15 Years', 'E:\\xampp\\tmp\\phpB663.tmp'),
(25, 'NATURAL DISASTERS', 'Natural Disasters series shows readers how they can use their math skills to learn more about the 21st Century world that we live in. Each title in the series provides students with information on specific natural disasters and highlights the role math plays in studying these important environmental phenomena. Grade appropriate math challenge questions encourage students to use their math skills to reinforce the information presented in the text. The solution to the challenges is clearly explained in the back of the book.', 'naturaldisasters', 0, '8-15 Years', 'E:\\xampp\\tmp\\phpB45C.tmp'),
(26, 'POWER UP - SERIES', 'Students in today’s world are barraged with news about our future energy needs. What does going green, energy independence, or alternative energy really mean? This important series from Little Prodigy Books helps students understand the pros and cons of existing and emerging energy sources, giving students a better understanding of the debate over our energy strategies.', 'powerup', 0, '8-15 Years', 'E:\\xampp\\tmp\\php5948.tmp'),
(27, 'SAVE THE PLANET - SERIES', 'At last—an effective language arts series that bridges the curriculum gaps! \r\nEach book sends the reader on a fact-finding mission, posing an initial challenge and concluding with questions and answers. Through engaging, interactive scenarios, learners can experiment with text prediction, purpose-driven research, and creative problem solving—all critical thinking skills—while learning about ways to care for our planet.', 'savetheplanet', 0, '8-15 Years', 'E:\\xampp\\tmp\\phpFA1D.tmp'),
(28, 'GLOBAL PRODUCTS', 'The Global Products series introduces readers to important concepts needed to understand their place in the global economy of the 21st Century. The books in the series both inform and challenge, encouraging the young reader to consider everything from where the components of a product are made, to the long-term impact of globalization on the world in which they will grow up.', 'globalproducts', 0, '8-14 Years', 'E:\\xampp\\tmp\\php58F2.tmp'),
(29, 'ANIMAL INVADERS', 'Animal Invaders offers animal titles that do much more than simply profile kid-popular wildlife. This series explores animals that were on the endangered species list, but are on the way back to recovery. While developing critical thinking skills, students discover why the species became endangered and what was done to help them survive — as well as the ramifications of success.', 'animalinvaders', 0, '7-15 Years', 'E:\\xampp\\tmp\\php272.tmp'),
(30, 'ITS COOL TO LEARN ABOUT COUNTRIES', 'Have your children ever wanted to explore a different country and learn more about its culture? With this informative series they’ll get the inside scoop on nations around the world, including everything from their governments to the holidays they celebrate. Learn about languages, holidays, and foods with fun activities and recipes. Use maps and graphs to study the countries’ geography and economy. Students will become Social Studies Explorers and tour the 16 most populated countries in the world!', 'itscooltolearnaboutcountries', 0, '7-15 Years', 'E:\\xampp\\tmp\\php83E7.tmp'),
(33, 'testtest', 'testtest', 'testtest', 1, '-6', 'E:\\xampp\\tmp\\php9ED3.tmp');

-- --------------------------------------------------------

--
-- Table structure for table `charactereducation`
--

CREATE TABLE `charactereducation` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actual_price` int(11) DEFAULT NULL,
  `offer_price` int(11) DEFAULT NULL,
  `sale` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `in_stock` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` int(11) DEFAULT NULL,
  `categories` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories_id` int(11) DEFAULT NULL,
  `review` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coolcareers`
--

CREATE TABLE `coolcareers` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actual_price` int(11) DEFAULT NULL,
  `offer_price` int(11) DEFAULT NULL,
  `sale` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `in_stock` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` int(11) DEFAULT NULL,
  `categories` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories_id` int(11) DEFAULT NULL,
  `review` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `farmanimalseries`
--

CREATE TABLE `farmanimalseries` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actual_price` int(11) DEFAULT NULL,
  `offer_price` int(11) DEFAULT NULL,
  `sale` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `in_stock` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` int(11) DEFAULT NULL,
  `categories` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories_id` int(11) DEFAULT NULL,
  `review` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forestseries`
--

CREATE TABLE `forestseries` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actual_price` int(11) DEFAULT NULL,
  `offer_price` int(11) DEFAULT NULL,
  `sale` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `in_stock` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` int(11) DEFAULT NULL,
  `categories` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories_id` int(11) DEFAULT NULL,
  `review` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forestseries`
--

INSERT INTO `forestseries` (`id`, `book_title`, `thumb_img`, `product_img`, `product_details`, `actual_price`, `offer_price`, `sale`, `in_stock`, `sku`, `categories`, `tags`, `description`, `additional_info`, `categories_id`, `review`, `created_at`, `updated_at`) VALUES
(1, 'Book Title', '51GKFxlFaML.jpg', '51GKFxlFaML.jpg', 'adasdasd', 250, 100, 'Yes', 'yes', 2433, NULL, 'tr,asda,asdasd', 'asdhj test asasda', 'jasudasdnn', 29, 'review text', NULL, NULL),
(2, 'Book Title', '51GKFxlFaML.jpg', '51GKFxlFaML.jpg', 'adasdasd', 250, 100, 'Yes', 'yes', 2435, NULL, 'tr,asda,asdasd', 'asdhj test asasda', 'jasudasdnn', 29, 'review text', NULL, NULL),
(3, 'Book Title', '51GKFxlFaML.jpg', '51GKFxlFaML.jpg', 'adasdasd', 250, 100, 'Yes', 'yes', 2437, NULL, 'tr,asda,asdasd', 'asdhj test asasda', 'jasudasdnn', 29, 'review text', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `globalperspectives`
--

CREATE TABLE `globalperspectives` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actual_price` int(11) DEFAULT NULL,
  `offer_price` int(11) DEFAULT NULL,
  `sale` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `in_stock` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` int(11) DEFAULT NULL,
  `categories` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories_id` int(11) DEFAULT NULL,
  `review` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `globalproducts`
--

CREATE TABLE `globalproducts` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actual_price` int(11) DEFAULT NULL,
  `offer_price` int(11) DEFAULT NULL,
  `sale` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `in_stock` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` int(11) DEFAULT NULL,
  `categories` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories_id` int(11) DEFAULT NULL,
  `review` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `growingplants`
--

CREATE TABLE `growingplants` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actual_price` int(11) DEFAULT NULL,
  `offer_price` int(11) DEFAULT NULL,
  `sale` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `in_stock` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` int(11) DEFAULT NULL,
  `categories` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories_id` int(11) DEFAULT NULL,
  `review` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `healthyforlife`
--

CREATE TABLE `healthyforlife` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actual_price` int(11) DEFAULT NULL,
  `offer_price` int(11) DEFAULT NULL,
  `sale` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `in_stock` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` int(11) DEFAULT NULL,
  `categories` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories_id` int(11) DEFAULT NULL,
  `review` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `historyseries`
--

CREATE TABLE `historyseries` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actual_price` int(11) DEFAULT NULL,
  `offer_price` int(11) DEFAULT NULL,
  `sale` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `in_stock` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` int(11) DEFAULT NULL,
  `categories` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories_id` int(11) DEFAULT NULL,
  `review` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `historyseries`
--

INSERT INTO `historyseries` (`id`, `book_title`, `thumb_img`, `product_img`, `product_details`, `actual_price`, `offer_price`, `sale`, `in_stock`, `sku`, `categories`, `tags`, `description`, `additional_info`, `categories_id`, `review`, `created_at`, `updated_at`) VALUES
(1, 'History title 1', '2.jpg', '6.jpg', 'Details 1', 250, 120, 'Yes', '20', 12312, 'cat1, cat2, cat3', 'tag1, tag2, tag3', 'Desc 1', 'Add info 1', 35, '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `howdidthatgettomyhouse`
--

CREATE TABLE `howdidthatgettomyhouse` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actual_price` int(11) DEFAULT NULL,
  `offer_price` int(11) DEFAULT NULL,
  `sale` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `in_stock` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` int(11) DEFAULT NULL,
  `categories` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories_id` int(11) DEFAULT NULL,
  `review` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `howdidthatgettomytable`
--

CREATE TABLE `howdidthatgettomytable` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actual_price` int(11) DEFAULT NULL,
  `offer_price` int(11) DEFAULT NULL,
  `sale` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `in_stock` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` int(11) DEFAULT NULL,
  `categories` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories_id` int(11) DEFAULT NULL,
  `review` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `howdidtheybuildthat`
--

CREATE TABLE `howdidtheybuildthat` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actual_price` int(11) DEFAULT NULL,
  `offer_price` int(11) DEFAULT NULL,
  `sale` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `in_stock` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` int(11) DEFAULT NULL,
  `categories` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories_id` int(11) DEFAULT NULL,
  `review` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `howdoesthatfly`
--

CREATE TABLE `howdoesthatfly` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actual_price` int(11) DEFAULT NULL,
  `offer_price` int(11) DEFAULT NULL,
  `sale` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `in_stock` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` int(11) DEFAULT NULL,
  `categories` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories_id` int(11) DEFAULT NULL,
  `review` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `howdowelivetogether`
--

CREATE TABLE `howdowelivetogether` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actual_price` int(11) DEFAULT NULL,
  `offer_price` int(11) DEFAULT NULL,
  `sale` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `in_stock` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` int(11) DEFAULT NULL,
  `categories` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories_id` int(11) DEFAULT NULL,
  `review` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `howtowriteseries`
--

CREATE TABLE `howtowriteseries` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actual_price` int(11) DEFAULT NULL,
  `offer_price` int(11) DEFAULT NULL,
  `sale` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `in_stock` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` int(11) DEFAULT NULL,
  `categories` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories_id` int(11) DEFAULT NULL,
  `review` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `itscooltolearnaboutcountries`
--

CREATE TABLE `itscooltolearnaboutcountries` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actual_price` int(11) DEFAULT NULL,
  `offer_price` int(11) DEFAULT NULL,
  `sale` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `in_stock` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` int(11) DEFAULT NULL,
  `categories` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories_id` int(11) DEFAULT NULL,
  `review` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `juniorscientists`
--

CREATE TABLE `juniorscientists` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actual_price` int(11) DEFAULT NULL,
  `offer_price` int(11) DEFAULT NULL,
  `sale` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `in_stock` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` int(11) DEFAULT NULL,
  `categories` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories_id` int(11) DEFAULT NULL,
  `review` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kidscanrecycle`
--

CREATE TABLE `kidscanrecycle` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actual_price` int(11) DEFAULT NULL,
  `offer_price` int(11) DEFAULT NULL,
  `sale` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `in_stock` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` int(11) DEFAULT NULL,
  `categories` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories_id` int(11) DEFAULT NULL,
  `review` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kidscanrecycle`
--

INSERT INTO `kidscanrecycle` (`id`, `book_title`, `book_path`, `thumb_img`, `product_img`, `product_details`, `actual_price`, `offer_price`, `sale`, `in_stock`, `sku`, `categories`, `tags`, `description`, `additional_info`, `categories_id`, `review`, `created_at`, `updated_at`) VALUES
(1, 'Kids Can Keep Air Clean', 'book_146.pdf', 'thumb_146.jpg', NULL, 'Kids-Can-Air-Clean', 240, 145, 'Yes', 'yes', 146, 'Kids-Can-Air-Clean', 'Kids-Can-Air-Clean', 'Kids-Can-Air-Clean', 'Kids-Can-Air-Clean', 1, '0', NULL, '2020-08-10 12:48:11'),
(2, 'Kids Can Clean Up Trash', 'book_415.pdf', 'thumb_415.jpg', NULL, 'kids-can-clean-up-trash', 240, 145, 'Yes', '1000', 415, 'Habits and Essentials, Picture Books', 'Kids Can Clean up Trash', 'Level 3 guided reader that teaches kids the importance of cleaning up trash and the impact that has on keeping the earth clean.', 'Weight: 9.6 g, Dimensions: 8.25 × 8.25 × 4 cm', 1, '0', NULL, '2020-08-10 12:45:33'),
(14, 'Title', 'book_1312.pdf', 'thumb_1312.jpeg', NULL, 'Details', 200, 100, 'No', 'yes', 1312, 'category', 'tags', 'asda', 'asdasd', 1, '0', '2020-08-10 12:08:47', '2020-08-10 12:47:57'),
(15, 'Kids Can Keep Water Clean', 'E:\\xampp\\tmp\\phpC646.tmp', 'thumb_417.jpeg', NULL, 'Age : 3 and up, Series: Language Arts Explorer: Habits and Essentials, No pf Pages: 24 pages, Publisher: Aries Books International. (January 1, 2019), Author: Cecilia Minden, Language: English, Copyright: 2019, Graphics: Full Color Photographs', 240, 154, 'Yes', '1000', 417, 'Habits and Essentials, Picture Books', 'Kids Can Keep Water Clean', 'Level 3 guided reader that helps teach students the importance of keeping water clean and gives practical ideas on things they can do to pitch in.', 'Weight	9.6 g, Dimensions 8.25 × 8.25 × 4 cm', 1, '0', '2020-08-10 12:17:07', '2020-08-10 12:47:45'),
(16, 'Kids Can Recycle', 'E:\\xampp\\tmp\\php2A7D.tmp', 'thumb_418.jpeg', NULL, 'Age : 3 and up, Series: Language Arts Explorer: Habits and Essentials, No pf Pages: 24 pages, Publisher: Aries Books International. (January 1, 2019), Author: Cecilia Minden, Language: English, Copyright: 2019, Graphics: Full Color Photographs', 240, 145, 'Yes', '1000', 418, 'Habits and Essentials, Picture Books, Save the Planet', 'Kids Can Recycle', 'Level 3 guided reader that helps educate young readers on the importance of recycling and what they can do to help protect the earth’s resources.', 'Weight	9.6 g, Dimensions 8.25 × 8.25 × 4 cm', 1, '0', '2020-08-10 12:21:55', '2020-08-10 12:47:34'),
(17, 'Kids Can Reuse', 'E:\\xampp\\tmp\\php6EF1.tmp', 'thumb_419.jpeg', NULL, 'Age : 3 and up, Series: Language Arts Explorer: Habits and Essentials, No pf Pages: 24 pages, Publisher: Aries Books International. (January 1, 2019), Author:Cecilia Minden, Language: English, Copyright: 2019, Graphics: Full Color Photographs', 240, 145, 'Yes', '1000', 419, 'Save the Planet, Habits and Essentials, Picture Books', 'Kids Can Reuse', 'Level 3 guided reader that helps educate young readers on the importance of reusing items and the role that plays in saving the earth’s resources.', 'Weight	9.6 g, Dimensions 8.25 × 8.25 × 4 cm', 1, '0', '2020-08-10 12:24:23', '2020-08-10 12:47:26');

-- --------------------------------------------------------

--
-- Table structure for table `learningonlineetiquette`
--

CREATE TABLE `learningonlineetiquette` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actual_price` int(11) DEFAULT NULL,
  `offer_price` int(11) DEFAULT NULL,
  `sale` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `in_stock` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` int(11) DEFAULT NULL,
  `categories` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories_id` int(11) DEFAULT NULL,
  `review` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `maths`
--

CREATE TABLE `maths` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actual_price` int(11) DEFAULT NULL,
  `offer_price` int(11) DEFAULT NULL,
  `sale` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `in_stock` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` int(11) DEFAULT NULL,
  `categories` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories_id` int(11) DEFAULT NULL,
  `review` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `naturaldisasters`
--

CREATE TABLE `naturaldisasters` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actual_price` int(11) DEFAULT NULL,
  `offer_price` int(11) DEFAULT NULL,
  `sale` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `in_stock` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` int(11) DEFAULT NULL,
  `categories` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories_id` int(11) DEFAULT NULL,
  `review` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('pmrlsivas@gmail.com', '$2y$10$7dvU6A0Yfbx6B7963a/nWO.LghnRLe0x3V9nn6k.XABK5bZ/3GR0i', '2020-08-07 01:45:10');

-- --------------------------------------------------------

--
-- Table structure for table `picturebooks`
--

CREATE TABLE `picturebooks` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actual_price` int(11) DEFAULT NULL,
  `offer_price` int(11) DEFAULT NULL,
  `sale` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `in_stock` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` int(11) DEFAULT NULL,
  `categories` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories_id` int(11) DEFAULT NULL,
  `review` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `planetsseries`
--

CREATE TABLE `planetsseries` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actual_price` int(11) DEFAULT NULL,
  `offer_price` int(11) DEFAULT NULL,
  `sale` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `in_stock` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` int(11) DEFAULT NULL,
  `categories` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories_id` int(11) DEFAULT NULL,
  `review` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `powerup`
--

CREATE TABLE `powerup` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actual_price` int(11) DEFAULT NULL,
  `offer_price` int(11) DEFAULT NULL,
  `sale` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `in_stock` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` int(11) DEFAULT NULL,
  `categories` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories_id` int(11) DEFAULT NULL,
  `review` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `realworldscience`
--

CREATE TABLE `realworldscience` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actual_price` int(11) DEFAULT NULL,
  `offer_price` int(11) DEFAULT NULL,
  `sale` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `in_stock` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` int(11) DEFAULT NULL,
  `categories` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories_id` int(11) DEFAULT NULL,
  `review` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `savetheplanet`
--

CREATE TABLE `savetheplanet` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actual_price` int(11) DEFAULT NULL,
  `offer_price` int(11) DEFAULT NULL,
  `sale` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `in_stock` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` int(11) DEFAULT NULL,
  `categories` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories_id` int(11) DEFAULT NULL,
  `review` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `scienceexplorer`
--

CREATE TABLE `scienceexplorer` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actual_price` int(11) DEFAULT NULL,
  `offer_price` int(11) DEFAULT NULL,
  `sale` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `in_stock` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` int(11) DEFAULT NULL,
  `categories` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories_id` int(11) DEFAULT NULL,
  `review` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siva`
--

CREATE TABLE `siva` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actual_price` int(11) DEFAULT NULL,
  `offer_price` int(11) DEFAULT NULL,
  `sale` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `in_stock` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` int(11) DEFAULT NULL,
  `categories` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories_id` int(11) DEFAULT NULL,
  `review` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siva`
--

INSERT INTO `siva` (`id`, `book_title`, `thumb_img`, `product_img`, `product_details`, `actual_price`, `offer_price`, `sale`, `in_stock`, `sku`, `categories`, `tags`, `description`, `additional_info`, `categories_id`, `review`, `created_at`, `updated_at`) VALUES
(1, 'siva', NULL, NULL, 'safdf', 45, 45, '', '25', 556, 'ssv', 'ssv', 'vsddvbdb', 'vsdvds', 34, 'review text', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `test123`
--

CREATE TABLE `test123` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actual_price` int(11) DEFAULT NULL,
  `offer_price` int(11) DEFAULT NULL,
  `sale` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `in_stock` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` int(11) DEFAULT NULL,
  `categories` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories_id` int(11) DEFAULT NULL,
  `review` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testtest`
--

CREATE TABLE `testtest` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actual_price` int(11) DEFAULT NULL,
  `offer_price` int(11) DEFAULT NULL,
  `sale` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `in_stock` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` int(11) DEFAULT NULL,
  `categories` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories_id` int(11) DEFAULT NULL,
  `review` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testtest`
--

INSERT INTO `testtest` (`id`, `book_title`, `book_path`, `thumb_img`, `product_img`, `product_details`, `actual_price`, `offer_price`, `sale`, `in_stock`, `sku`, `categories`, `tags`, `description`, `additional_info`, `categories_id`, `review`, `created_at`, `updated_at`) VALUES
(1, 'testtest', 'book_151515.pdf', 'thumb_151515.jpeg', NULL, 'Age : 3 and up Series: Language Arts Explorer: Its cool to learn about countries No pf Pages: 32 pages Publisher: Aries Books International. (January 1, 2019) Author: Nancy Robinson Masters Language: English Copyright: 2019 Graphics: Full Color Photographs', 1254, 1200, 'Yes', '1000', 151515, 'chgvhj', 'hgfhvjhv', 'Age : 3 and up Series: Language Arts Explorer: Its cool to learn about countries No pf Pages: 32 pages Publisher: Aries Books International. (January 1, 2019) Author: Nancy Robinson Masters Language: English Copyright: 2019 Graphics: Full Color PhotographsAge : 3 and up Series: Language Arts Explorer: Its cool to learn about countries No pf Pages: 32 pages Publisher: Aries Books International. (January 1, 2019) Author: Nancy Robinson Masters Language: English Copyright: 2019 Graphics: Full Color Photographs', 'kjfs', 33, '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$CuALjOyd7ot1yI.MQHGtwuqKA9visWxdl2kksMsGb9MUtSS0jv6LG', NULL, '2020-07-18 08:13:06', '2020-07-18 08:13:06'),
(2, 'suguna', 'test@test.com', NULL, '$2y$10$Gcklyk23SswOSoApvZsOJ.dFEMUk9p1iezlb40JhTgUWKXzgzk4/y', NULL, '2020-07-23 00:36:09', '2020-07-23 00:36:09'),
(3, 'Siva', 'test@siva.com', NULL, '$2y$10$rWQrV59Oz57dO8jXr7y70es.0l2Lmr/MRB/0FeFQ87nIsRFBc8F0i', NULL, '2020-07-30 03:24:29', '2020-07-30 03:24:29'),
(4, 'siva', 'pmrlsivas@gmail.com', NULL, '$2y$10$WBioae0AEevrIlqWgMKUoe2giDr383SlXytbKSBbkMiv/fLNL2xLi', 'RToEppBI8JSBKmkxTJ3bD2v6ToSmU7eK4EWwgeUjiSQRu0k8MMdr2DuHICKF', '2020-08-03 06:09:21', '2020-08-03 06:09:21'),
(5, 'karthi', 'sdvihbvduhb@gmail.com', NULL, '$2y$10$iIZPyTPGshb82RFt20uJ.uPkKu0e6aUgOLf6BoAfcbUI0SPo2hRDS', NULL, '2020-08-06 20:15:13', '2020-08-06 20:15:13'),
(6, 'Ashwin', 'test@mail.com', NULL, '$2y$10$cjySzNftzNnmPRJ2DHcga.l/BWTSuhR10dpU9AyjNBOXKGgVpBq5q', NULL, '2020-08-10 08:19:29', '2020-08-10 08:19:29');

-- --------------------------------------------------------

--
-- Table structure for table `whatdoesthisdo`
--

CREATE TABLE `whatdoesthisdo` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actual_price` int(11) DEFAULT NULL,
  `offer_price` int(11) DEFAULT NULL,
  `sale` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `in_stock` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` int(11) DEFAULT NULL,
  `categories` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories_id` int(11) DEFAULT NULL,
  `review` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `whatshoudido`
--

CREATE TABLE `whatshoudido` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actual_price` int(11) DEFAULT NULL,
  `offer_price` int(11) DEFAULT NULL,
  `sale` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `in_stock` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` int(11) DEFAULT NULL,
  `categories` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories_id` int(11) DEFAULT NULL,
  `review` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `whatsyourhealthyplate`
--

CREATE TABLE `whatsyourhealthyplate` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actual_price` int(11) DEFAULT NULL,
  `offer_price` int(11) DEFAULT NULL,
  `sale` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `in_stock` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` int(11) DEFAULT NULL,
  `categories` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories_id` int(11) DEFAULT NULL,
  `review` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `whatsyourhealthyplate`
--

INSERT INTO `whatsyourhealthyplate` (`id`, `book_title`, `book_path`, `thumb_img`, `product_img`, `product_details`, `actual_price`, `offer_price`, `sale`, `in_stock`, `sku`, `categories`, `tags`, `description`, `additional_info`, `categories_id`, `review`, `created_at`, `updated_at`) VALUES
(1, 'adsasd', 'E:\\xampp\\tmp\\php1967.tmp', 'E:\\xampp\\tmp\\php19A7.tmp', NULL, 'sddas', 80, 70, 'No', 'yes', 21312, 'asdas', 'ada', 'asdads', 'asd', 2, '0', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `21stcenturylibraryseries`
--
ALTER TABLE `21stcenturylibraryseries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `animalinvaders`
--
ALTER TABLE `animalinvaders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogcommentreplies`
--
ALTER TABLE `blogcommentreplies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogcomments`
--
ALTER TABLE `blogcomments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `charactereducation`
--
ALTER TABLE `charactereducation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coolcareers`
--
ALTER TABLE `coolcareers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farmanimalseries`
--
ALTER TABLE `farmanimalseries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forestseries`
--
ALTER TABLE `forestseries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `globalperspectives`
--
ALTER TABLE `globalperspectives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `globalproducts`
--
ALTER TABLE `globalproducts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `growingplants`
--
ALTER TABLE `growingplants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `healthyforlife`
--
ALTER TABLE `healthyforlife`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `historyseries`
--
ALTER TABLE `historyseries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `howdidthatgettomyhouse`
--
ALTER TABLE `howdidthatgettomyhouse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `howdidthatgettomytable`
--
ALTER TABLE `howdidthatgettomytable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `howdidtheybuildthat`
--
ALTER TABLE `howdidtheybuildthat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `howdoesthatfly`
--
ALTER TABLE `howdoesthatfly`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `howdowelivetogether`
--
ALTER TABLE `howdowelivetogether`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `howtowriteseries`
--
ALTER TABLE `howtowriteseries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itscooltolearnaboutcountries`
--
ALTER TABLE `itscooltolearnaboutcountries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `juniorscientists`
--
ALTER TABLE `juniorscientists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kidscanrecycle`
--
ALTER TABLE `kidscanrecycle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `learningonlineetiquette`
--
ALTER TABLE `learningonlineetiquette`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maths`
--
ALTER TABLE `maths`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `naturaldisasters`
--
ALTER TABLE `naturaldisasters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `picturebooks`
--
ALTER TABLE `picturebooks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `planetsseries`
--
ALTER TABLE `planetsseries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `powerup`
--
ALTER TABLE `powerup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `realworldscience`
--
ALTER TABLE `realworldscience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `savetheplanet`
--
ALTER TABLE `savetheplanet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scienceexplorer`
--
ALTER TABLE `scienceexplorer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siva`
--
ALTER TABLE `siva`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test123`
--
ALTER TABLE `test123`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testtest`
--
ALTER TABLE `testtest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `whatdoesthisdo`
--
ALTER TABLE `whatdoesthisdo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `whatshoudido`
--
ALTER TABLE `whatshoudido`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `whatsyourhealthyplate`
--
ALTER TABLE `whatsyourhealthyplate`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `21stcenturylibraryseries`
--
ALTER TABLE `21stcenturylibraryseries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `animalinvaders`
--
ALTER TABLE `animalinvaders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `blogcommentreplies`
--
ALTER TABLE `blogcommentreplies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `blogcomments`
--
ALTER TABLE `blogcomments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `charactereducation`
--
ALTER TABLE `charactereducation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coolcareers`
--
ALTER TABLE `coolcareers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `farmanimalseries`
--
ALTER TABLE `farmanimalseries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forestseries`
--
ALTER TABLE `forestseries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `globalperspectives`
--
ALTER TABLE `globalperspectives`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `globalproducts`
--
ALTER TABLE `globalproducts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `growingplants`
--
ALTER TABLE `growingplants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `healthyforlife`
--
ALTER TABLE `healthyforlife`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `historyseries`
--
ALTER TABLE `historyseries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `howdidthatgettomyhouse`
--
ALTER TABLE `howdidthatgettomyhouse`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `howdidthatgettomytable`
--
ALTER TABLE `howdidthatgettomytable`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `howdidtheybuildthat`
--
ALTER TABLE `howdidtheybuildthat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `howdoesthatfly`
--
ALTER TABLE `howdoesthatfly`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `howdowelivetogether`
--
ALTER TABLE `howdowelivetogether`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `howtowriteseries`
--
ALTER TABLE `howtowriteseries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `itscooltolearnaboutcountries`
--
ALTER TABLE `itscooltolearnaboutcountries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `juniorscientists`
--
ALTER TABLE `juniorscientists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kidscanrecycle`
--
ALTER TABLE `kidscanrecycle`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `learningonlineetiquette`
--
ALTER TABLE `learningonlineetiquette`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `maths`
--
ALTER TABLE `maths`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `naturaldisasters`
--
ALTER TABLE `naturaldisasters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `picturebooks`
--
ALTER TABLE `picturebooks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `planetsseries`
--
ALTER TABLE `planetsseries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `powerup`
--
ALTER TABLE `powerup`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `realworldscience`
--
ALTER TABLE `realworldscience`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `savetheplanet`
--
ALTER TABLE `savetheplanet`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `scienceexplorer`
--
ALTER TABLE `scienceexplorer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siva`
--
ALTER TABLE `siva`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `test123`
--
ALTER TABLE `test123`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testtest`
--
ALTER TABLE `testtest`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `whatdoesthisdo`
--
ALTER TABLE `whatdoesthisdo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `whatshoudido`
--
ALTER TABLE `whatshoudido`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `whatsyourhealthyplate`
--
ALTER TABLE `whatsyourhealthyplate`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
