-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2023 at 11:32 PM
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
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `reviewId` int(8) NOT NULL,
  `movieId` int(5) NOT NULL,
  `userId` int(4) NOT NULL,
  `reviewDate` date NOT NULL DEFAULT current_timestamp(),
  `review` varchar(800) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`reviewId`, `movieId`, `userId`, `reviewDate`, `review`) VALUES
(1, 1, 1, '2023-03-19', '\"The Godfather\" is widely regarded as one of the greatest films ever made, and for good reason. It tells the story of the Corleone crime family, headed by patriarch Vito Corleone (played by Marlon Brando) and his son Michael (played by Al Pacino), who takes over the family business after his father is shot. The film explores themes of power, loyalty, family, and the American Dream, as Michael navigates the complex world of organized crime.\r\n\r\nThe acting in \"The Godfather\" is superb, with Brando and Pacino both delivering iconic performances. The supporting cast is also excellent, with memorable turns from James Caan, Robert Duvall, and Diane Keaton. The film\'s cinematography, score, and direction are all top-notch, with Coppola expertly crafting a tense, immersive, and emotionally resonant'),
(2, 2, 2, '2023-03-19', 'The film follows a team of skilled thieves, led by Dom Cobb (played by Leonardo DiCaprio), who enter people\'s dreams to steal their subconscious thoughts. Cobb is approached by a wealthy businessman who offers to clear his criminal record in exchange for an impossible task: to implant an idea into the mind of a rival businessman through the process of \"inception.\"\r\n\r\nThe film is a mind-bending exploration of dreams, reality, and the human mind. Nolan\'s direction is masterful, with stunning visual effects and a complex, multi-layered plot that keeps the audience engaged from start to finish. The cast is excellent, with standout performances from DiCaprio, Joseph Gordon-Levitt, and Tom Hardy.\r\n'),
(3, 9, 1, '2023-03-19', 'The film stars Natalie Portman as Nina, a ballerina in a New York City ballet company who becomes obsessed with perfection as she prepares for the lead role in \"Swan Lake.\" As Nina\'s drive for perfection intensifies, her mental state becomes increasingly unstable, blurring the lines between reality and delusion.\r\n\r\nThe film is a haunting exploration of the psychological toll of artistic ambition. Aronofsky\'s direction is masterful, with a dark and foreboding atmosphere that intensifies as the film progresses. The cinematography is striking, with a color palette that shifts from light and airy to dark and ominous, mirroring Nina\'s descent into madness.\r\n\r\nPortman delivers a powerful performance as Nina, capturing the character\'s fragility, passion, and obsession with disturbing accuracy. '),
(4, 13, 1, '2023-03-19', 'The film stars Emma Stone and Ryan Gosling as Mia and Sebastian, two struggling artists in Los Angeles who fall in love while pursuing their dreams. Set against a backdrop of music and dance, \"La La Land\" is a celebration of creativity, passion, and the bittersweet nature of life.\r\n\r\nChazelle\'s direction is masterful, with stunning cinematography, dazzling musical numbers, and a touching, heartfelt story that captures the essence of what it means to chase your dreams. Stone and Gosling have incredible chemistry, with both delivering standout performances that capture the joy and pain of artistic ambition.\r\n\r\nThe film\'s score, composed by Justin Hurwitz, is one of its standout features, with catchy, memorable songs that will stay with you long after the film has ended. ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`reviewId`),
  ADD KEY `movie_FK` (`movieId`),
  ADD KEY `user_FK` (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `reviewId` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `movie_FK` FOREIGN KEY (`movieId`) REFERENCES `movie` (`movieId`),
  ADD CONSTRAINT `user_FK` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
