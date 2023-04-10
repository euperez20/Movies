-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 09, 2023 at 01:14 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `serverside`
--

-- --------------------------------------------------------

--
-- Table structure for table `myblogg`
--

CREATE TABLE `myblogg` (
  `title` varchar(200) NOT NULL,
  `id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `myblogg`
--

INSERT INTO `myblogg` (`title`, `id`, `date`, `content`) VALUES
('Childhood dream', 2, '2023-02-08 05:16:15', 'I have been studying for webstack development for almost a year and I had previous knowledge in other computing languages. I wish to become a senior web developer within next 5 years.'),
('Fav Hobby', 4, '2023-02-09 11:42:26', 'My favourite hobby is watching TV. Whenever I have free time, I love watching Television. It never obstructs my studies. Hobbies help us to expand our knowledge, and it teaches us several things. First, I like to finish all my school homework and then start watching TV. This lightens my mood and sparks up the excitement inside me, as it increases my curiosity about the world. Watching different useful stuff on TV enhances my knowledge horizons and gives me lots of joy. It is a good habit because watching TV escorts a lot of knowledge in various fields. There are several channels on TV, which represent worldwide affairs. I watch the news and I like channels, such as animal planet, discovery channel or another informative channel. These channels increase my curiosity and encourage me to learn about different aspects of life. I interestingly watch a cartoon network that provides me with creative and new ideas to make cartoons and arts. Some of my favourite comics are Mr.Bean, Tom and Jerry, Scooby-Doo and many more. Many art-themed cartoons, like The Pink Panther and SpongeBob, inspire me to draw them. Primarily, the artworks of comics attract me and inspire me to decorate my scrapbooks with their figures.My parents praise my hobby, and they are also happy when they see me watching national and international news and several events on the TV. Moreover, they feel proud when they listen to the news update from me. \r\n\r\nNow, I study in class with two and eight years old girls. Creating jokes, sitting idle and spending time roaming around is unproductive, according to my parents. My parents made sure that I developed my hobbies from childhood. Therefore, they encouraged me to create some good habits. \r\n\r\nWatching TV in a proper way gives you so many important roles. It helps us to make something creative. It provides us with knowledge about different places, their cultures, climatic conditions and especially their history. Furthermore, it widens our imagination by showing imaginary characters from the Disney World and Jungle Book.  '),
('Favourite Game', 5, '2023-02-09 09:33:58', 'My favourite video game is Fifa 23 and my favourite sport is football.'),
('About Myself', 6, '2023-02-09 09:35:03', 'I am Shudipto and I am currently studying in Red River College(RRC). I am current enrolled in Full stack web development.'),
('Lorem Ipsum 123', 7, '2023-02-09 11:57:23', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eget metus nec dolor finibus consequat. Pellentesque scelerisque posuere elementum. Aenean ac ullamcorper massa, vel ultrices augue. Sed quis eros quis justo accumsan pellentesque sed eu est. Nulla dictum maximus nunc, eget tincidunt risus pharetra sit amet. Aliquam auctor dui vitae dolor dapibus volutpat. Sed sodales feugiat consectetur. Aliquam eu gravida diam. Maecenas interdum, velit eget vestibulum consectetur, odio est dictum magna, a ultricies tellus tortor at ligula.\r\n\r\nDonec semper libero et eros convallis porttitor. Fusce dui tortor, tincidunt eu odio et, porttitor molestie metus. Cras blandit mi ut leo varius vehicula. Morbi viverra orci sit amet felis pretium bibendum. Nullam ut ultrices justo. Etiam tincidunt ante ex, id consequat nisl imperdiet ut. Vivamus fringilla magna semper suscipit pretium.\r\n\r\nInteger ac augue nec quam vulputate placerat. In ut orci arcu. Donec sed enim dolor. Praesent eleifend elit ac metus eleifend iaculis. Nam a auctor ipsum, sed aliquam purus. Integer varius est nec dui sagittis, id dapibus arcu consectetur. Etiam ac quam eget lectus sollicitudin dapibus. Pellentesque vulputate elit a sagittis congue. Pellentesque tincidunt diam in nibh dignissim aliquet vitae vitae turpis.\r\n\r\nMorbi dictum vitae elit et porta. In eleifend iaculis lacinia. Fusce sit amet libero id tortor tincidunt scelerisque et non purus. Cras dictum maximus imperdiet. Morbi dapibus ante vitae metus commodo, nec fringilla augue fringilla. Pellentesque auctor leo rhoncus, finibus.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `myblogg`
--
ALTER TABLE `myblogg`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `myblogg`
--
ALTER TABLE `myblogg`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
