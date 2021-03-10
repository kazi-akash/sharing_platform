-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2021 at 10:30 AM
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
(36, 'php'),
(40, 'mim');

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
(43, 84, 'root', '', 'loved it...nice', 'approved', '2021-03-06'),
(52, 94, 'saitama', '', 'Nise nice', 'approved', '2021-03-08'),
(53, 94, 'saitama', '', 'Thats cool', 'approved', '2021-03-08'),
(54, 94, 'saitama', '', 'amazing', 'approved', '2021-03-08'),
(56, 94, 'talha', '', 'ok I just lived it', 'approved', '2021-03-08'),
(57, 93, 'talha', '', 'love doing code in php', 'approved', '2021-03-08'),
(59, 93, 'akash', '', 'ok thats crazy!!', 'approved', '2021-03-10'),
(60, 84, 'akash', '', 'ok thats crazy!!', 'approved', '2021-03-10'),
(61, 76, 'akash', '', 'ok thats crazy!!', 'approved', '2021-03-10');

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
(39, 36, 'Php', 'asdfas', '2021-03-06', 'valorant-wallpaper-3554x1999.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim non sit temporibus rem laborum odit cupiditate quos voluptatibus eligendi illum, nemo minus magni, numquam placeat maxime maiores obcaecati, commodi modi iure amet dolores sed? Quidem error culpa doloribus maxime obcaecati, autem illo iusto odit sed quisquam fuga nulla odio deserunt? Quo minus ipsa ipsum magnam eligendi ducimus, nobis accusamus qui eius sed dolor atque illo at, culpa nemo temporibus dolore. Error dolores repellendus non autem incidunt, doloribus nulla excepturi consequatur ullam accusamus laborum atque nobis, porro hic repellat corrupti similique tempore impedit culpa animi! Illum, consequatur! Doloremque quia reiciendis voluptatem id! Maxime nihil cum facilis nulla tempore beatae voluptatum ex placeat quaerat quisquam eligendi, ullam amet vero ipsam, quis inventore recusandae. Perspiciatis in dolore quam eius necessitatibus, nam expedita hic voluptates laudantium voluptatum, nihil ea nesciunt animi vero! Odio possimus cumque aut repellendus nobis exercitationem, tempora aliquam in rerum ducimus voluptatem dolores corrupti dicta dolorum eaque illum, esse quibusdam vitae, numquam atque. Maiores nisi atque repellendus repudiandae fugit. Odit animi est, eligendi quos rerum nesciunt eaque laboriosam culpa blanditiis veniam corrupti placeat debitis laborum distinctio fugiat molestias adipisci sit. Ad, eos magni ducimus numquam quasi mollitia ex. Nostrum, porro eveniet?', 'published', 'php', 5, '', 0),
(40, 27, 'laravel', 'asfaf', '2021-03-06', '7486.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim non sit temporibus rem laborum odit cupiditate quos voluptatibus eligendi illum, nemo minus magni, numquam placeat maxime maiores obcaecati, commodi modi iure amet dolores sed? Quidem error culpa doloribus maxime obcaecati, autem illo iusto odit sed quisquam fuga nulla odio deserunt? Quo minus ipsa ipsum magnam eligendi ducimus, nobis accusamus qui eius sed dolor atque illo at, culpa nemo temporibus dolore. Error dolores repellendus non autem incidunt, doloribus nulla excepturi consequatur ullam accusamus laborum atque nobis, porro hic repellat corrupti similique tempore impedit culpa animi! Illum, consequatur! Doloremque quia reiciendis voluptatem id! Maxime nihil cum facilis nulla tempore beatae voluptatum ex placeat quaerat quisquam eligendi, ullam amet vero ipsam, quis inventore recusandae. Perspiciatis in dolore quam eius necessitatibus, nam expedita hic voluptates laudantium voluptatum, nihil ea nesciunt animi vero! Odio possimus cumque aut repellendus nobis exercitationem, tempora aliquam in rerum ducimus voluptatem dolores corrupti dicta dolorum eaque illum, esse quibusdam vitae, numquam atque. Maiores nisi atque repellendus repudiandae fugit. Odit animi est, eligendi quos rerum nesciunt eaque laboriosam culpa blanditiis veniam corrupti placeat debitis laborum distinctio fugiat molestias adipisci sit. Ad, eos magni ducimus numquam quasi mollitia ex. Nostrum, porro eveniet?', 'published', 'framework', 2, '', 0),
(59, 29, 'CSS', 'talha', '2021-03-06', '7486.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim non sit temporibus rem laborum odit cupiditate quos voluptatibus eligendi illum, nemo minus magni, numquam placeat maxime maiores obcaecati, commodi modi iure amet dolores sed? Quidem error culpa doloribus maxime obcaecati, autem illo iusto odit sed quisquam fuga nulla odio deserunt? Quo minus ipsa ipsum magnam eligendi ducimus, nobis accusamus qui eius sed dolor atque illo at, culpa nemo temporibus dolore. Error dolores repellendus non autem incidunt, doloribus nulla excepturi consequatur ullam accusamus laborum atque nobis, porro hic repellat corrupti similique tempore impedit culpa animi! Illum, consequatur! Doloremque quia reiciendis voluptatem id! Maxime nihil cum facilis nulla tempore beatae voluptatum ex placeat quaerat quisquam eligendi, ullam amet vero ipsam, quis inventore recusandae. Perspiciatis in dolore quam eius necessitatibus, nam expedita hic voluptates laudantium voluptatum, nihil ea nesciunt animi vero! Odio possimus cumque aut repellendus nobis exercitationem, tempora aliquam in rerum ducimus voluptatem dolores corrupti dicta dolorum eaque illum, esse quibusdam vitae, numquam atque. Maiores nisi atque repellendus repudiandae fugit. Odit animi est, eligendi quos rerum nesciunt eaque laboriosam culpa blanditiis veniam corrupti placeat debitis laborum distinctio fugiat molestias adipisci sit. Ad, eos magni ducimus numquam quasi mollitia ex. Nostrum, porro eveniet?', 'published', 'javascript   ', 11, '', 0),
(60, 28, 'Html', 'talha', '2021-03-10', 'valorant-wallpaper-3554x1999.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim non sit temporibus rem laborum odit cupiditate quos voluptatibus eligendi illum, nemo minus magni, numquam placeat maxime maiores obcaecati, commodi modi iure amet dolores sed? Quidem error culpa doloribus maxime obcaecati, autem illo iusto odit sed quisquam fuga nulla odio deserunt? Quo minus ipsa ipsum magnam eligendi ducimus, nobis accusamus qui eius sed dolor atque illo at, culpa nemo temporibus dolore. Error dolores repellendus non autem incidunt, doloribus nulla excepturi consequatur ullam accusamus laborum atque nobis, porro hic repellat corrupti similique tempore impedit culpa animi! Illum, consequatur! Doloremque quia reiciendis voluptatem id! Maxime nihil cum facilis nulla tempore beatae voluptatum ex placeat quaerat quisquam eligendi, ullam amet vero ipsam, quis inventore recusandae. Perspiciatis in dolore quam eius necessitatibus, nam expedita hic voluptates laudantium voluptatum, nihil ea nesciunt animi vero! Odio possimus cumque aut repellendus nobis exercitationem, tempora aliquam in rerum ducimus voluptatem dolores corrupti dicta dolorum eaque illum, esse quibusdam vitae, numquam atque. Maiores nisi atque repellendus repudiandae fugit. Odit animi est, eligendi quos rerum nesciunt eaque laboriosam culpa blanditiis veniam corrupti placeat debitis laborum distinctio fugiat molestias adipisci sit. Ad, eos magni ducimus numquam quasi mollitia ex. Nostrum, porro eveniet?', 'published', 'html css', 1, '', 0),
(76, 27, 'Laravel', 'user', '2021-03-06', 'valorant-wallpaper-3554x1999.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim non sit temporibus rem laborum odit cupiditate quos voluptatibus eligendi illum, nemo minus magni, numquam placeat maxime maiores obcaecati, commodi modi iure amet dolores sed? Quidem error culpa doloribus maxime obcaecati, autem illo iusto odit sed quisquam fuga nulla odio deserunt? Quo minus ipsa ipsum magnam eligendi ducimus, nobis accusamus qui eius sed dolor atque illo at, culpa nemo temporibus dolore. Error dolores repellendus non autem incidunt, doloribus nulla excepturi consequatur ullam accusamus laborum atque nobis, porro hic repellat corrupti similique tempore impedit culpa animi! Illum, consequatur! Doloremque quia reiciendis voluptatem id! Maxime nihil cum facilis nulla tempore beatae voluptatum ex placeat quaerat quisquam eligendi, ullam amet vero ipsam, quis inventore recusandae. Perspiciatis in dolore quam eius necessitatibus, nam expedita hic voluptates laudantium voluptatum, nihil ea nesciunt animi vero! Odio possimus cumque aut repellendus nobis exercitationem, tempora aliquam in rerum ducimus voluptatem dolores corrupti dicta dolorum eaque illum, esse quibusdam vitae, numquam atque. Maiores nisi atque repellendus repudiandae fugit. Odit animi est, eligendi quos rerum nesciunt eaque laboriosam culpa blanditiis veniam corrupti placeat debitis laborum distinctio fugiat molestias adipisci sit. Ad, eos magni ducimus numquam quasi mollitia ex. Nostrum, porro eveniet?', 'published', 'laravel, framework      ', 2, '', 0),
(84, 27, 'Lorem', 'user', '2021-03-06', 'spider_man_14-wallpaper-3554x1999.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim non sit temporibus rem laborum odit cupiditate quos voluptatibus eligendi illum, nemo minus magni, numquam placeat maxime maiores obcaecati, commodi modi iure amet dolores sed? Quidem error culpa doloribus maxime obcaecati, autem illo iusto odit sed quisquam fuga nulla odio deserunt? Quo minus ipsa ipsum magnam eligendi ducimus, nobis accusamus qui eius sed dolor atque illo at, culpa nemo temporibus dolore. Error dolores repellendus non autem incidunt, doloribus nulla excepturi consequatur ullam accusamus laborum atque nobis, porro hic repellat corrupti similique tempore impedit culpa animi! Illum, consequatur! Doloremque quia reiciendis voluptatem id! Maxime nihil cum facilis nulla tempore beatae voluptatum ex placeat quaerat quisquam eligendi, ullam amet vero ipsam, quis inventore recusandae. Perspiciatis in dolore quam eius necessitatibus, nam expedita hic voluptates laudantium voluptatum, nihil ea nesciunt animi vero! Odio possimus cumque aut repellendus nobis exercitationem, tempora aliquam in rerum ducimus voluptatem dolores corrupti dicta dolorum eaque illum, esse quibusdam vitae, numquam atque. Maiores nisi atque repellendus repudiandae fugit. Odit animi est, eligendi quos rerum nesciunt eaque laboriosam culpa blanditiis veniam corrupti placeat debitis laborum distinctio fugiat molestias adipisci sit. Ad, eos magni ducimus numquam quasi mollitia ex. Nostrum, porro eveniet?', 'published', 'lorem torem   ', 2, '', 0),
(86, 27, 'SQL', 'root', '2021-03-08', 'valorant-wallpaper-3554x1999.jpg', 'SQL is a standard language for storing, manipulating and retrieving data in databases.\r\n\r\nOur SQL tutorial will teach you how to use SQL in: MySQL, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.\r\n\r\nWith our online SQL editor, you can edit the SQL statements, and click on a button to view the result.\r\n\r\nExample\r\nSELECT * FROM Customers;\r\nClick on the \"Try it Yourself\" button to see how it works.\r\n\r\nSQL Exercises\r\nTest Yourself With Exercises\r\nExercise:\r\nInsert the missing statement to get all the columns from the Customers table.\r\n\r\n * FROM Customers;', 'published', 'sql php            ', 1, '', 0),
(93, 27, 'Why php is the best OOP', 'saitama', '2021-03-08', 'spider_man_14-wallpaper-3554x1999.jpg', 'Low learning costs: PHP’s learning cost is very low, it is the easiest programming language to learn, and the learning cost is 1/10 of C and Java. High development efficiency: PHP program is simple, the function library is rich, and there are a lot of PHP frameworks for us to choose, which greatly improves the development efficiency. Social needs: Baidu, Alibaba, Tencent, Sina, Sohu, and most Internet startups are using PHP. Wide range of uses: PHP is currently used on mainstream websites. In addition, PHP can write command line scripts and even write desktop applications. The competition in the industry is small: the general university does not open this course. Most of the PHP programmers are trained or self-learned, and the market competitiveness is relatively small.', 'published', 'PHP, Framework', 2, '', 0),
(94, 28, 'Why', 'saitama', '2021-03-10', 'valorant-wallpaper-3554x1999.jpg', 'Hypertext Markup Language (HTML) is the standard markup language for documents designed to be displayed in a web browser. It can be assisted by technologies such as Cascading Style Sheets (CSS) and scripting languages such as JavaScript.\r\n\r\nWeb browsers receive HTML documents from a web server or from local storage and render the documents into multimedia web pages. HTML describes the structure of a web page semantically and originally included cues for the appearance of the document.\r\n\r\nHTML elements are the building blocks of HTML pages. With HTML constructs, images and other objects such as interactive forms may be embedded into the rendered page. HTML provides a means to create structured documents by denoting structural semantics for text such as headings, paragraphs, lists, links, quotes and other items. HTML elements are delineated by tags, written using angle brackets. Tags such as directly introduce content into the page. Other tags such as <p> surround and provide information about document text and may include other tags as sub-elements. Browsers do not display the HTML tags, but use them to interpret the content of the page.', 'published', 'html, css      ', 5, '', 0),
(99, 27, 'df', 'talha', '2021-03-10', '7486.jpg', 'sdgsg', 'blocked', 'dsf', 0, '', 0);

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
(115, 'akash', '$2y$10$vfPPW8bOqo6hs/.eGEoPT.pYJdpvPF1Xqo92txejaCIots0UYTSaq', 'Kazi', 'Islam', 'quaziakash@gmail.com', '01703048018', 'male', '1996-12-20', 'user', 'spider_man_14-wallpaper-3554x1999.jpg', ''),
(135, 'lorem', '$2y$10$CiMO46jTTBFYeT3Ue7pwD.4ltBDK3czDFIdXIGAQNepFWFIlND022', 'ok', 'lorem', 'lorem@gmail.com', '01703048018', 'male', '2021-03-09', 'admin', 'spider_man_14-wallpaper-3554x1999.jpg', ''),
(136, 'saitama', '$2y$10$6.Td2sLJsWqkCia8gUtlmem4TuPbmoO4qGEzRWGN2hg/yRx2a.DuO', 'root', 'fgsdgsdg', 'root_tet@emailcom', '01703048018', 'male', '2021-03-25', 'admin', 'spider_man_14-wallpaper-3554x1999.jpg', ''),
(140, 'root', '$2y$10$vaNEUaDCYqVzKbuXuKSLju7pDZJyyrMAL15Hm2a4GW0JhaumpWPBq', 'star', 'hero', 'saitama@gmail.com', '01703048018', 'male', '2021-03-17', 'user', 'spider_man_14-wallpaper-3554x1999.jpg', ''),
(153, 'talha', '$2y$10$Pjx03SWDZts37773wfQKoOepS0Mj4luv..C/drxD8WAOHCK4pyG1C', 'talha', 'talha', 'talha@gmail.com', '01703048018', 'male', '2021-03-10', 'admin', 'valorant-wallpaper-3554x1999.jpg', '');

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
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
