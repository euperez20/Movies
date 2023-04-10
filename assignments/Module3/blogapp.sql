-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2023 at 09:19 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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
-- Table structure for table `blogapp`
--

CREATE TABLE `blogapp` (
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id` int(3) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` varchar(1500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogapp`
--

INSERT INTO `blogapp` (`date`, `id`, `title`, `content`) VALUES
('2023-02-02 18:56:03', 1, 'First Post', 'This is my the first manual post that is being created as an example from the database.'),
('2023-02-01 16:40:03', 2, 'First Post', 'This is the second manual post that is being created as an example from the database.'),
('2023-02-01 16:40:03', 3, 'Lorem Ipsum 2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages'),
('2023-02-01 16:40:03', 4, 'Where can I get some?', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary.'),
('2023-02-01 16:40:03', 5, 'Where does it come from?', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bono'),
('2023-02-01 16:40:03', 6, 'What is Lorem Ipsum?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'),
('2023-02-01 17:19:14', 7, 'Get started', 'The fallout from the December travel chaos continues, as the backlog of complaints made to the Canadian Transportation Agency (CTA) keeps growing.\r\n\r\nAs of Jan. 31, there have been 6,395 new complaints made to the agency since Dec. 21. Of these complaints, 2,028 are related to Air Canada, 1,951 are related to WestJet and 761 are related to Sunwing, the CTA told CTV National News on Tuesday.'),
('2023-02-01 19:04:06', 9, 'The standard Lorem Ipsum passage, used since the 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
('2023-02-01 19:23:31', 10, '1914 translation by H. Rackham', 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or '),
('2023-02-03 20:12:42', 19, 'Where can I get some?', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut tellus convallis, egestas diam id, vestibulum orci. Sed ut libero eu risus ultricies tincidunt. Fusce ultricies, magna eu aliquet scelerisque, dolor sem bibendum leo, sit amet pulvinar dui arcu et arcu. Aenean euismod bibendum ligula, in euismod arcu sodales et. Nullam ullamcorper nisi nisl, at imperdiet leo tristique et. Integer placerat sollicitudin odio, fermentum dictum eros fermentum vitae. Curabitur eget orci ut dui semper pulvinar. Etiam tempus tincidunt nisi vitae finibus. Morbi semper sapien eget arcu mattis accumsan. Mauris rhoncus maximus ornare. Ut velit sem, eleifend vel dignissim non, cursus ac tellus. Aenean elit dolor, semper a cursus at, ornare at mauris. Fusce viverra elit porta lectus ornare, quis convallis tellus sagittis. Pellentesque non convallis dolor.\r\n\r\nNulla dignissim, urna non scelerisque aliquam, mauris orci convallis enim, ut vestibulum leo risus et risus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Curabitur in faucibus diam, a facilisis lectus. Proin viverra ac nibh in faucibus. Nulla ultrices varius nunc quis luctus. Suspendisse dui tellus, vulputate sed orci ac, iaculis consequat orci. Quisque a nibh a odio egestas tempor non vitae leo. Aenean convallis arcu enim, nec cursus erat aliquet a. Phasellus id dapibus elit, id tempor eros. Nam tincidunt ligula a ante sodales ultrices. Pellentesque a purus eget tellus fringilla accumsan.'),
('2023-02-03 20:13:42', 20, 'Proin convallis scelerisque lobortis', 'Cras efficitur aliquet ipsum. Suspendisse in congue dui. Morbi egestas venenatis erat sit amet gravida. Nulla vitae porttitor purus, id facilisis ante. Proin facilisis augue vitae risus dictum, sed laoreet mi accumsan. Vivamus ut dui ut diam pharetra sodales at a sapien. Integer vulputate nulla vitae tincidunt luctus. Cras vitae tortor at elit hendrerit gravida ac non lectus. Nunc gravida, urna nec pharetra molestie, libero orci lacinia tortor, sodales volutpat nulla odio non lectus. Sed ac ipsum quis massa tempor placerat viverra sodales massa.\r\n\r\nDonec eleifend, ipsum sit amet rutrum commodo, dolor ipsum consectetur ex, non facilisis tortor quam lobortis quam. Vivamus fringilla iaculis hendrerit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aenean fringilla, risus at pretium iaculis, augue mi vulputate urna, eget fringilla ante ipsum ut nunc. Cras finibus elit dui, eget sodales massa feugiat ut. Fusce sit amet ornare eros. Nulla pharetra pharetra placerat. Sed pulvinar, turpis et scelerisque dignissim, lacus nisl pellentesque dui, eget gravida ligula diam vitae leo. Cras egestas a purus at pretium. Suspendisse efficitur felis volutpat aliquet facilisis.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogapp`
--
ALTER TABLE `blogapp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogapp`
--
ALTER TABLE `blogapp`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
