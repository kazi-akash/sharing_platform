-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2021 at 01:05 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cmstest`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(27, 'laravel'),
(28, 'html'),
(29, 'css'),
(30, 'js'),
(36, 'php');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(10) NOT NULL,
  `comment_post_id` int(10) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(36, 39, 'root', '', 'Nice Nice', 'approved', '2021-03-06'),
(37, 39, 'root', '', 'Very good', 'approved', '2021-03-06'),
(38, 40, 'root', '', 'awesome........', 'approved', '2021-03-06'),
(39, 40, 'root', '', 'oh nice', 'approved', '2021-03-06'),
(40, 59, 'root', '', 'nice nice..', 'approved', '2021-03-06'),
(41, 60, 'root', '', 'nice nice.. very gd', 'approved', '2021-03-06'),
(42, 76, 'root', '', 'nice nice.. loved it', 'approved', '2021-03-06'),
(43, 84, 'root', '', 'loved it...nice', 'approved', '2021-03-06');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(10) NOT NULL,
  `post_category_id` int(10) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_status` varchar(50) NOT NULL DEFAULT 'block',
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(255) NOT NULL,
  `post_user` varchar(255) NOT NULL,
  `post_views_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_status`, `post_tags`, `post_comment_count`, `post_user`, `post_views_count`) VALUES
(39, 36, 'Php', 'asdfas', '2021-03-06', 'valorant-wallpaper-3554x1999.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim non sit temporibus rem laborum odit cupiditate quos voluptatibus eligendi illum, nemo minus magni, numquam placeat maxime maiores obcaecati, commodi modi iure amet dolores sed? Quidem error culpa doloribus maxime obcaecati, autem illo iusto odit sed quisquam fuga nulla odio deserunt? Quo minus ipsa ipsum magnam eligendi ducimus, nobis accusamus qui eius sed dolor atque illo at, culpa nemo temporibus dolore. Error dolores repellendus non autem incidunt, doloribus nulla excepturi consequatur ullam accusamus laborum atque nobis, porro hic repellat corrupti similique tempore impedit culpa animi! Illum, consequatur! Doloremque quia reiciendis voluptatem id! Maxime nihil cum facilis nulla tempore beatae voluptatum ex placeat quaerat quisquam eligendi, ullam amet vero ipsam, quis inventore recusandae. Perspiciatis in dolore quam eius necessitatibus, nam expedita hic voluptates laudantium voluptatum, nihil ea nesciunt animi vero! Odio possimus cumque aut repellendus nobis exercitationem, tempora aliquam in rerum ducimus voluptatem dolores corrupti dicta dolorum eaque illum, esse quibusdam vitae, numquam atque. Maiores nisi atque repellendus repudiandae fugit. Odit animi est, eligendi quos rerum nesciunt eaque laboriosam culpa blanditiis veniam corrupti placeat debitis laborum distinctio fugiat molestias adipisci sit. Ad, eos magni ducimus numquam quasi mollitia ex. Nostrum, porro eveniet?', 'published', 'php', 2, '', 0),
(40, 27, 'laravel', 'asfaf', '2021-03-06', '7486.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim non sit temporibus rem laborum odit cupiditate quos voluptatibus eligendi illum, nemo minus magni, numquam placeat maxime maiores obcaecati, commodi modi iure amet dolores sed? Quidem error culpa doloribus maxime obcaecati, autem illo iusto odit sed quisquam fuga nulla odio deserunt? Quo minus ipsa ipsum magnam eligendi ducimus, nobis accusamus qui eius sed dolor atque illo at, culpa nemo temporibus dolore. Error dolores repellendus non autem incidunt, doloribus nulla excepturi consequatur ullam accusamus laborum atque nobis, porro hic repellat corrupti similique tempore impedit culpa animi! Illum, consequatur! Doloremque quia reiciendis voluptatem id! Maxime nihil cum facilis nulla tempore beatae voluptatum ex placeat quaerat quisquam eligendi, ullam amet vero ipsam, quis inventore recusandae. Perspiciatis in dolore quam eius necessitatibus, nam expedita hic voluptates laudantium voluptatum, nihil ea nesciunt animi vero! Odio possimus cumque aut repellendus nobis exercitationem, tempora aliquam in rerum ducimus voluptatem dolores corrupti dicta dolorum eaque illum, esse quibusdam vitae, numquam atque. Maiores nisi atque repellendus repudiandae fugit. Odit animi est, eligendi quos rerum nesciunt eaque laboriosam culpa blanditiis veniam corrupti placeat debitis laborum distinctio fugiat molestias adipisci sit. Ad, eos magni ducimus numquam quasi mollitia ex. Nostrum, porro eveniet?', 'published', 'framework', 2, '', 0),
(59, 29, 'CSS', 'talha', '2021-03-06', '7486.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim non sit temporibus rem laborum odit cupiditate quos voluptatibus eligendi illum, nemo minus magni, numquam placeat maxime maiores obcaecati, commodi modi iure amet dolores sed? Quidem error culpa doloribus maxime obcaecati, autem illo iusto odit sed quisquam fuga nulla odio deserunt? Quo minus ipsa ipsum magnam eligendi ducimus, nobis accusamus qui eius sed dolor atque illo at, culpa nemo temporibus dolore. Error dolores repellendus non autem incidunt, doloribus nulla excepturi consequatur ullam accusamus laborum atque nobis, porro hic repellat corrupti similique tempore impedit culpa animi! Illum, consequatur! Doloremque quia reiciendis voluptatem id! Maxime nihil cum facilis nulla tempore beatae voluptatum ex placeat quaerat quisquam eligendi, ullam amet vero ipsam, quis inventore recusandae. Perspiciatis in dolore quam eius necessitatibus, nam expedita hic voluptates laudantium voluptatum, nihil ea nesciunt animi vero! Odio possimus cumque aut repellendus nobis exercitationem, tempora aliquam in rerum ducimus voluptatem dolores corrupti dicta dolorum eaque illum, esse quibusdam vitae, numquam atque. Maiores nisi atque repellendus repudiandae fugit. Odit animi est, eligendi quos rerum nesciunt eaque laboriosam culpa blanditiis veniam corrupti placeat debitis laborum distinctio fugiat molestias adipisci sit. Ad, eos magni ducimus numquam quasi mollitia ex. Nostrum, porro eveniet?', 'published', 'javascript   ', 1, '', 0),
(60, 28, 'Html', 'talha', '2021-03-06', 'valorant-wallpaper-3554x1999.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim non sit temporibus rem laborum odit cupiditate quos voluptatibus eligendi illum, nemo minus magni, numquam placeat maxime maiores obcaecati, commodi modi iure amet dolores sed? Quidem error culpa doloribus maxime obcaecati, autem illo iusto odit sed quisquam fuga nulla odio deserunt? Quo minus ipsa ipsum magnam eligendi ducimus, nobis accusamus qui eius sed dolor atque illo at, culpa nemo temporibus dolore. Error dolores repellendus non autem incidunt, doloribus nulla excepturi consequatur ullam accusamus laborum atque nobis, porro hic repellat corrupti similique tempore impedit culpa animi! Illum, consequatur! Doloremque quia reiciendis voluptatem id! Maxime nihil cum facilis nulla tempore beatae voluptatum ex placeat quaerat quisquam eligendi, ullam amet vero ipsam, quis inventore recusandae. Perspiciatis in dolore quam eius necessitatibus, nam expedita hic voluptates laudantium voluptatum, nihil ea nesciunt animi vero! Odio possimus cumque aut repellendus nobis exercitationem, tempora aliquam in rerum ducimus voluptatem dolores corrupti dicta dolorum eaque illum, esse quibusdam vitae, numquam atque. Maiores nisi atque repellendus repudiandae fugit. Odit animi est, eligendi quos rerum nesciunt eaque laboriosam culpa blanditiis veniam corrupti placeat debitis laborum distinctio fugiat molestias adipisci sit. Ad, eos magni ducimus numquam quasi mollitia ex. Nostrum, porro eveniet?', 'published', 'html css      ', 1, '', 0),
(76, 27, 'Laravel', 'user', '2021-03-06', 'valorant-wallpaper-3554x1999.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim non sit temporibus rem laborum odit cupiditate quos voluptatibus eligendi illum, nemo minus magni, numquam placeat maxime maiores obcaecati, commodi modi iure amet dolores sed? Quidem error culpa doloribus maxime obcaecati, autem illo iusto odit sed quisquam fuga nulla odio deserunt? Quo minus ipsa ipsum magnam eligendi ducimus, nobis accusamus qui eius sed dolor atque illo at, culpa nemo temporibus dolore. Error dolores repellendus non autem incidunt, doloribus nulla excepturi consequatur ullam accusamus laborum atque nobis, porro hic repellat corrupti similique tempore impedit culpa animi! Illum, consequatur! Doloremque quia reiciendis voluptatem id! Maxime nihil cum facilis nulla tempore beatae voluptatum ex placeat quaerat quisquam eligendi, ullam amet vero ipsam, quis inventore recusandae. Perspiciatis in dolore quam eius necessitatibus, nam expedita hic voluptates laudantium voluptatum, nihil ea nesciunt animi vero! Odio possimus cumque aut repellendus nobis exercitationem, tempora aliquam in rerum ducimus voluptatem dolores corrupti dicta dolorum eaque illum, esse quibusdam vitae, numquam atque. Maiores nisi atque repellendus repudiandae fugit. Odit animi est, eligendi quos rerum nesciunt eaque laboriosam culpa blanditiis veniam corrupti placeat debitis laborum distinctio fugiat molestias adipisci sit. Ad, eos magni ducimus numquam quasi mollitia ex. Nostrum, porro eveniet?', 'published', 'laravel, framework      ', 1, '', 0),
(84, 27, 'Lorem', 'user', '2021-03-06', 'spider_man_14-wallpaper-3554x1999.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim non sit temporibus rem laborum odit cupiditate quos voluptatibus eligendi illum, nemo minus magni, numquam placeat maxime maiores obcaecati, commodi modi iure amet dolores sed? Quidem error culpa doloribus maxime obcaecati, autem illo iusto odit sed quisquam fuga nulla odio deserunt? Quo minus ipsa ipsum magnam eligendi ducimus, nobis accusamus qui eius sed dolor atque illo at, culpa nemo temporibus dolore. Error dolores repellendus non autem incidunt, doloribus nulla excepturi consequatur ullam accusamus laborum atque nobis, porro hic repellat corrupti similique tempore impedit culpa animi! Illum, consequatur! Doloremque quia reiciendis voluptatem id! Maxime nihil cum facilis nulla tempore beatae voluptatum ex placeat quaerat quisquam eligendi, ullam amet vero ipsam, quis inventore recusandae. Perspiciatis in dolore quam eius necessitatibus, nam expedita hic voluptates laudantium voluptatum, nihil ea nesciunt animi vero! Odio possimus cumque aut repellendus nobis exercitationem, tempora aliquam in rerum ducimus voluptatem dolores corrupti dicta dolorum eaque illum, esse quibusdam vitae, numquam atque. Maiores nisi atque repellendus repudiandae fugit. Odit animi est, eligendi quos rerum nesciunt eaque laboriosam culpa blanditiis veniam corrupti placeat debitis laborum distinctio fugiat molestias adipisci sit. Ad, eos magni ducimus numquam quasi mollitia ex. Nostrum, porro eveniet?', 'published', 'lorem torem   ', 1, '', 0),
(86, 27, 'SQL', 'root', '2021-03-06', 'valorant-wallpaper-3554x1999.jpg', 'SQL is a standard language for storing, manipulating and retrieving data in databases.\r\n\r\nOur SQL tutorial will teach you how to use SQL in: MySQL, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.\r\n\r\nWith our online SQL editor, you can edit the SQL statements, and click on a button to view the result.\r\n\r\nExample\r\nSELECT * FROM Customers;\r\nClick on the \"Try it Yourself\" button to see how it works.\r\n\r\nSQL Exercises\r\nTest Yourself With Exercises\r\nExercise:\r\nInsert the missing statement to get all the columns from the Customers table.\r\n\r\n * FROM Customers;', 'published', 'sql php      ', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `randSalt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `email`, `mobile`, `gender`, `dob`, `user_role`, `user_image`, `randSalt`) VALUES
(19, 'user', '00000', 'akash', 'asdfa', 'asdfdsf@gmalil.com', '01703048018', 'female', '2021-03-11', 'user', 'spider_man_14-wallpaper-3554x1999.jpg', ''),
(21, 'class=&quot;form-control&quot;', '$2y$10$Z6PtBRVUYL9iWL37iMzZ8.Z2pGq0BqSZVDftCfO6y4pTnNsGtz1B6', 'done', 'eone', 'sdfdsf@gmail.com', '01703048018', 'male', '2021-03-08', 'admin', '', ''),
(115, 'akash', '$2y$10$9rp8DKB7lZ9B4D6upX0AiurtbwN7OeEHIn1NAsTObt.UDwoXqF6LO', 'Kazi Sajedul', 'Islam', 'quaziakash@gmail.com', '01703048018', 'male', '1996-12-20', 'admin', 'imageedit_3_8832215206.png', ''),
(135, 'lorem', '$2y$10$URGze1uhp4ca5AdySyXCtecqnOp81AY8ZP2b671M/O7vhmkXmWnV6', 'ok', 'asdfasf', 'sdfdsf@gmail.com', '01703048018', 'male', '2021-03-09', 'admin', 'spider_man_14-wallpaper-3554x1999.jpg', ''),
(136, 'root', '$2y$10$pm0AV4j.GXWrbzoWjxyiuONP526vqW9L5SHwZDlv6iYypXhm8QL56', 'root', 'fgsdgsdg', 'root_tet@emailcom', '01703048018', 'male', '2021-03-25', 'admin', '', ''),
(138, 'talha', '$2y$10$5BKg9Ut/QG2HlndtsbGmdO.7yCDpvp/LI629dpXFd1RynHJDRF5Ra', 'tal', 'hafiz', 'taha@gmail.com', '01703048018', 'male', '2021-03-03', 'admin', '', ''),
(140, 'saitama', '$2y$10$bUck9a41aX3Zz5TP/FAMiuMPv2rAPE0jFcYupBKZvlezJ3wMuF9JG', 'One', 'Punch', 'omp@gmail.com', '01703048018', 'male', '2021-03-17', 'user', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
