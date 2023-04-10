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
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `movieId` int(5) NOT NULL,
  `title` varchar(100) NOT NULL,
  `categoryId` int(3) NOT NULL,
  `description` varchar(200) NOT NULL,
  `director` varchar(50) NOT NULL,
  `cast` varchar(500) NOT NULL,
  `ranking` int(1) DEFAULT NULL,
  `releaseYear` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Table to storage movies';

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`movieId`, `title`, `categoryId`, `description`, `director`, `cast`, `ranking`, `releaseYear`) VALUES
(1, 'The Godfather', 2, 'A powerful Mafia family in New York City fights to maintain its hold on the criminal underworld. Directed by Francis Ford Coppola.', 'Francis Ford Coppola', 'Marlon Brando, Al Pacino, James Caan, Robert Duvall. ', NULL, 1972),
(2, 'Inception', 5, 'This science-fiction thriller follows a team of thieves who enter people\'s dreams to steal their secrets.', 'Christopher Nolan', 'Leonardo DiCaprio, Joseph Gordon-Levitt, Ellen Page, and Tom Hardy', NULL, 2010),
(3, 'The Shawshank Redemption', 2, 'A man is sentenced to life in prison for a crime he didn\'t commit and befriends a fellow inmate while trying to survive.', 'Frank Darabont', 'Tim Robbins, Morgan Freeman, Bob Gunton, William Sadler.', NULL, 1994),
(4, 'The Dark Knight', 1, 'Batman fights against his nemesis, the Joker, in a battle for the soul of Gotham City', ' Christopher Nolan', 'Cast: Christian Bale, Heath Ledger, Aaron Eckhart, Gary Oldman', NULL, 2008),
(5, 'Titanic', 2, 'A wealthy woman falls in love with a poor artist aboard the ill-fated ship on its maiden voyage. ', 'James Cameron', 'Leonardo DiCaprio, Kate Winslet, Billy Zane, Kathy Bates.', NULL, 1997),
(6, 'Forrest Gump', 3, 'A simple man with a low IQ accomplishes great things and influences several historic events in the United States. ', ' Robert Zemeckis', 'Tom Hanks, Robin Wright, Gary Sinise, Sally Field', NULL, 1995),
(7, 'The Social Network', 2, 'This biographical drama tells the story of the creation of Facebook by Mark Zuckerberg. ', 'David Fincher', 'Jesse Eisenberg, Andrew Garfield, and Justin Timberlake', NULL, 2010),
(8, 'The King\'s Speech', 2, 'historical drama tells the story of King George VI of Britain and his struggle to overcome his stammer.', 'Tom Hooper', 'Colin Firth, Geoffrey Rush, and Helena Bonham Carter.', NULL, 2010),
(9, 'Black Swan', 6, 'The psychological thriller follows a ballerina who becomes increasingly unhinged as she prepares for a big performance. ', 'Darren Aronofsky', 'Natalie Portman, Mila Kunis, and Vincent Cassel', NULL, 2010),
(11, 'Gravity', 5, 'This science-fiction thriller follows two astronauts stranded in space after their shuttle is destroyed. ', 'Alfonso Cuaron', 'Sandra Bullock and George Clooney.', NULL, 2013),
(12, 'Interstellar', 5, 'This science-fiction film follows a group of astronauts who travel through a wormhole in search of a new home for humanity. ', 'Christopher Nolan', 'Matthew McConaughey, Anne Hathaway, and Jessica Chastain.', NULL, 2014),
(13, 'La La Land', 10, 'This romantic musical comedy-drama follows a struggling actress and a jazz musician as they pursue their dreams in Los Angeles.', 'Damien Chazelle', 'Emma Stone and Ryan Gosling', NULL, 2016),
(14, 'Moonlight', 2, 'his coming-of-age drama tells the story of a young black man growing up in Miami.', 'Barry Jenkins', 'Trevante Rhodes, André Holland, and Mahershala Ali', NULL, 2016),
(15, 'Black Panther', 1, 'This superhero film tells the story of T\'Challa, the king of Wakanda, who must defend his nation from enemies both within and without. ', 'Ryan Coogler', 'Chadwick Boseman, Michael B. Jordan, and Lupita Nyong\'o', NULL, 2018),
(16, 'A Star is Born', 1, 'This musical romantic drama follows a seasoned musician who falls in love with a younger singer and helps launch her career. ', 'Bradley Cooper ', 'Bradley Cooper and Lady Gaga', NULL, 2018);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`movieId`),
  ADD KEY `category_FK` (`categoryId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `movieId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movie`
--
ALTER TABLE `movie`
  ADD CONSTRAINT `category_FK` FOREIGN KEY (`categoryId`) REFERENCES `category` (`categoryId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
