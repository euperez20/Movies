-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2023 at 04:15 PM
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
('2023-02-03 20:12:42', 19, 'Where can I get some?', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut tellus convallis, egestas diam id, vestibulum orci. Sed ut libero eu risus ultricies tincidunt. Fusce ultricies, magna eu aliquet scelerisque, dolor sem bibendum leo, sit amet pulvinar dui arcu et arcu. Aenean euismod bibendum ligula, in euismod arcu sodales et. Nullam ullamcorper nisi nisl, at imperdiet leo tristique et. Integer placerat sollicitudin odio, fermentum dictum eros fermentum vitae. Curabitur eget orci ut dui semper pulvinar. Etiam tempus tincidunt nisi vitae finibus. Morbi semper sapien eget arcu mattis accumsan. Mauris rhoncus maximus ornare. Ut velit sem, eleifend vel dignissim non, cursus ac tellus. Aenean elit dolor, semper a cursus at, ornare at mauris. Fusce viverra elit porta lectus ornare, quis convallis tellus sagittis. Pellentesque non convallis dolor.\r\n\r\nNulla dignissim, urna non scelerisque aliquam, mauris orci convallis enim, ut vestibulum leo risus et risus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Curabitur in faucibus diam, a facilisis lectus. Proin viverra ac nibh in faucibus. Nulla ultrices varius nunc quis luctus. Suspendisse dui tellus, vulputate sed orci ac, iaculis consequat orci. Quisque a nibh a odio egestas tempor non vitae leo. Aenean convallis arcu enim, nec cursus erat aliquet a. Phasellus id dapibus elit, id tempor eros. Nam tincidunt ligula a ante sodales ultrices. Pellentesque a purus eget tellus fringilla accumsan.');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryId` int(3) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `name`) VALUES
(1, 'Action'),
(8, 'Animation'),
(3, 'Comedy'),
(7, 'Documentary'),
(2, 'Drama'),
(11, 'Fantasy'),
(6, 'Horror'),
(12, 'Maria'),
(10, 'Musical'),
(14, 'Musical Comedy'),
(13, 'Prueba'),
(4, 'Romance'),
(5, 'Science Fiction'),
(15, 'stuff');

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
  `releaseYear` int(4) NOT NULL,
  `movieImage` varchar(900) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Table to storage movies';

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`movieId`, `title`, `categoryId`, `description`, `director`, `cast`, `ranking`, `releaseYear`, `movieImage`) VALUES
(1, 'The Godfather', 2, 'A powerful Mafia family in New York City fights to maintain its hold on the criminal underworld. Directed by Francis Ford Coppola.', 'Francis Ford Coppola', 'Marlon Brando, Al Pacino, James Caan, Robert Duvall. ', 0, 1972, 'The Godfather.jpg'),
(2, 'Inception', 5, 'This science-fiction thriller follows a team of thieves who enter people\'s dreams to steal their secrets.', 'Christopher Nolan', 'Leonardo DiCaprio, Joseph Gordon-Levitt, Ellen Page, and Tom Hardy.', 0, 2010, 'inception.jpg'),
(3, 'The Shawshank Redemption', 2, 'A man is sentenced to life in prison for a crime he didn\'t commit and befriends a fellow inmate while trying to survive.', 'Frank Darabont', 'Tim Robbins, Morgan Freeman, Bob Gunton, William Sadler.', 0, 1994, 'The Shawshank Redemption.jpg'),
(4, 'The Dark Knight', 1, 'Batman fights against his nemesis, the Joker, in a battle for the soul of Gotham City', ' Christopher Nolan', 'Cast: Christian Bale, Heath Ledger, Aaron Eckhart, Gary Oldman', 0, 2008, 'dark night.jpg'),
(5, 'Titanic', 2, 'A wealthy woman falls in love with a poor artist aboard the ill-fated ship on its maiden voyage. ', 'James Cameron', 'Leonardo DiCaprio, Kate Winslet, Billy Zane, Kathy Bates.', 0, 1997, 'titanic.jpg'),
(6, 'Forrest Gump', 3, 'A simple man with a low IQ accomplishes great things and influences several historic events in the United States. ', ' Robert Zemeckis', 'Tom Hanks, Robin Wright, Gary Sinise, Sally Field', 0, 1995, 'Forrest Gump.jpg'),
(7, 'The Social Network', 2, 'This biographical drama tells the story of the creation of Facebook by Mark Zuckerberg. ', 'David Fincher', 'Jesse Eisenberg, Andrew Garfield, and Justin Timberlake', 0, 2010, 'SocialNetwork.jpg'),
(8, 'The King\'s Speech', 2, 'historical drama tells the story of King George VI of Britain and his struggle to overcome his stammer.', 'Tom Hooper', 'Colin Firth, Geoffrey Rush, and Helena Bonham Carter.', 0, 2010, 'king speach.jpg'),
(9, 'Black Swan', 6, 'The psychological thriller follows a ballerina who becomes increasingly unhinged as she prepares for a big performance. ', 'Darren Aronofsky', 'Natalie Portman, Mila Kunis, and Vincent Cassel', 0, 2010, 'blackswan.jpg'),
(11, 'Gravity', 5, 'This science-fiction thriller follows two astronauts stranded in space after their shuttle is destroyed. ', 'Alfonso Cuaron', 'Sandra Bullock and George Clooney.', 0, 2013, 'Gravity_Poster.jpg'),
(12, 'Interstellar', 5, 'This science-fiction film follows a group of astronauts who travel through a wormhole in search of a new home for humanity. ', 'Christopher Nolan', 'Matthew McConaughey, Anne Hathaway, and Jessica Chastain.', 0, 2014, 'interstellar.jpg'),
(13, 'La La Land', 10, 'This romantic musical comedy-drama follows a struggling actress and a jazz musician as they pursue their dreams in Los Angeles.', 'Damien Chazelle', 'Emma Stone and Ryan Gosling', 0, 2016, 'lalalan.png'),
(14, 'Moonlight', 2, 'his coming-of-age drama tells the story of a young black man growing up in Miami.', 'Barry Jenkins', 'Trevante Rhodes, André Holland, and Mahershala Ali', 0, 2016, 'Moonlight_2016.png'),
(16, 'A Star is Born', 11, 'This musical romantic drama follows a seasoned musician who falls in love with a younger singer and helps launch her career. ', 'Bradley Cooper', 'Bradley Cooper and Lady Gaga', 5, 2023, ''),
(38, 'afasd', 1, 'asdfasdf', '', '', NULL, 0, '3example.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `myblogg`
--

CREATE TABLE `myblogg` (
  `title` varchar(200) NOT NULL,
  `id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `myblogg`
--

INSERT INTO `myblogg` (`title`, `id`, `date`, `content`) VALUES
('Childhood dream', 2, '2023-02-08 05:16:15', 'I have been studying for webstack development for almost a year and I had previous knowledge in other computing languages. I wish to become a senior web developer within next 5 years.'),
('Fav Hobby', 4, '2023-02-09 11:42:26', 'My favourite hobby is watching TV. Whenever I have free time, I love watching Television. It never obstructs my studies. Hobbies help us to expand our knowledge, and it teaches us several things. First, I like to finish all my school homework and then start watching TV. This lightens my mood and sparks up the excitement inside me, as it increases my curiosity about the world. Watching different useful stuff on TV enhances my knowledge horizons and gives me lots of joy. It is a good habit because watching TV escorts a lot of knowledge in various fields. There are several channels on TV, which represent worldwide affairs. I watch the news and I like channels, such as animal planet, discovery channel or another informative channel. These channels increase my curiosity and encourage me to learn about different aspects of life. I interestingly watch a cartoon network that provides me with creative and new ideas to make cartoons and arts. Some of my favourite comics are Mr.Bean, Tom and Jerry, Scooby-Doo and many more. Many art-themed cartoons, like The Pink Panther and SpongeBob, inspire me to draw them. Primarily, the artworks of comics attract me and inspire me to decorate my scrapbooks with their figures.My parents praise my hobby, and they are also happy when they see me watching national and international news and several events on the TV. Moreover, they feel proud when they listen to the news update from me. \r\n\r\nNow, I study in class with two and eight years old girls. Creating jokes, sitting idle and spending time roaming around is unproductive, according to my parents. My parents made sure that I developed my hobbies from childhood. Therefore, they encouraged me to create some good habits. \r\n\r\nWatching TV in a proper way gives you so many important roles. It helps us to make something creative. It provides us with knowledge about different places, their cultures, climatic conditions and especially their history. Furthermore, it widens our imagination by showing imaginary characters from the Disney World and Jungle Book.  '),
('Favourite Game', 5, '2023-02-09 09:33:58', 'My favourite video game is Fifa 23 and my favourite sport is football.'),
('About Myself', 6, '2023-02-09 09:35:03', 'I am Shudipto and I am currently studying in Red River College(RRC). I am current enrolled in Full stack web development.'),
('Lorem Ipsum 123', 7, '2023-02-09 11:57:23', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eget metus nec dolor finibus consequat. Pellentesque scelerisque posuere elementum. Aenean ac ullamcorper massa, vel ultrices augue. Sed quis eros quis justo accumsan pellentesque sed eu est. Nulla dictum maximus nunc, eget tincidunt risus pharetra sit amet. Aliquam auctor dui vitae dolor dapibus volutpat. Sed sodales feugiat consectetur. Aliquam eu gravida diam. Maecenas interdum, velit eget vestibulum consectetur, odio est dictum magna, a ultricies tellus tortor at ligula.\r\n\r\nDonec semper libero et eros convallis porttitor. Fusce dui tortor, tincidunt eu odio et, porttitor molestie metus. Cras blandit mi ut leo varius vehicula. Morbi viverra orci sit amet felis pretium bibendum. Nullam ut ultrices justo. Etiam tincidunt ante ex, id consequat nisl imperdiet ut. Vivamus fringilla magna semper suscipit pretium.\r\n\r\nInteger ac augue nec quam vulputate placerat. In ut orci arcu. Donec sed enim dolor. Praesent eleifend elit ac metus eleifend iaculis. Nam a auctor ipsum, sed aliquam purus. Integer varius est nec dui sagittis, id dapibus arcu consectetur. Etiam ac quam eget lectus sollicitudin dapibus. Pellentesque vulputate elit a sagittis congue. Pellentesque tincidunt diam in nibh dignissim aliquet vitae vitae turpis.\r\n\r\nMorbi dictum vitae elit et porta. In eleifend iaculis lacinia. Fusce sit amet libero id tortor tincidunt scelerisque et non purus. Cras dictum maximus imperdiet. Morbi dapibus ante vitae metus commodo, nec fringilla augue fringilla. Pellentesque auctor leo rhoncus, finibus.'),
('Test Eunice', 28, '2023-02-09 14:40:53', 'lkjhdfsla  lkjdsalkj lsd lsk kl aoisad ilskj dspksd sd \r\n  apsalik asp asrlj awlkd ap oifdsjopijlsafd dspsjewipor3-93r -03e po[ew -w -iw3- -0iew-0iq  d alkj dslkj   po lsdfhjokdsa  lidsjfoksa adsojh  oidwjfoi pweoaJPIA  P PO WRPIUG RWPO P; W PIW POWAREIKOI GRW [ITWQ PIRWGOIUJFGR  [POIGWR[OIAER P0WRIUGRWOJG JHASI PORWEJP GAFPAO;IUGSFA9GRSWI  P[GRW   GRPAWGR  -9WGRO IGWAR[;PORGWAI-OGARWI-9GFS GPRWIGRW-OAGWR I GWA[0IOKGRW[OIPAGERF WR[0PIGRW-0[WRG [\r\n[PIR[PGER -]ERIGER]-W 9EGRI FIN'),
('SS', 30, '2023-02-09 14:44:55', 'SAS');

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `id` int(11) NOT NULL,
  `author` varchar(30) NOT NULL,
  `content` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`id`, `author`, `content`) VALUES
(1, 'Eunice', 'Perez'),
(2, 'Eunice', 'Perez'),
(3, 'Maria Perez', 'Test de Eu'),
(4, 'Rene Navarrete', 'Test of content'),
(5, 'John Smith', 'Test no 6 Insert');

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
(4, 13, 1, '2023-03-19', 'The film stars Emma Stone and Ryan Gosling as Mia and Sebastian, two struggling artists in Los Angeles who fall in love while pursuing their dreams. Set against a backdrop of music and dance, \"La La Land\" is a celebration of creativity, passion, and the bittersweet nature of life.\r\n\r\nChazelle\'s direction is masterful, with stunning cinematography, dazzling musical numbers, and a touching, heartfelt story that captures the essence of what it means to chase your dreams. Stone and Gosling have incredible chemistry, with both delivering standout performances that capture the joy and pain of artistic ambition.\r\n\r\nThe film\'s score, composed by Justin Hurwitz, is one of its standout features, with catchy, memorable songs that will stay with you long after the film has ended. '),
(5, 9, 2, '2023-03-20', 'The film is a haunting exploration of the psychological toll of artistic ambition. Aronofsky\'s direction is masterful, with a dark and foreboding atmosphere that intensifies as the film progresses. The cinematography is striking, with a color palette that shifts from light and airy to dark and ominous, mirroring Nina\'s descent into madness. ');

-- --------------------------------------------------------

--
-- Table structure for table `tweets`
--

CREATE TABLE `tweets` (
  `id` int(11) NOT NULL,
  `status` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tweets`
--

INSERT INTO `tweets` (`id`, `status`) VALUES
(6, 'Manual Insert tweet'),
(10, 'Prueba insert No 10 without ID'),
(11, 'posting without id'),
(14, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec volutpat, odio non mollis rutrum, justo orci bibendum ante, et viverra lacus '),
(15, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec volutpat, odio non mollis rutrum, justo orci bibendum ante, et viverra lacus'),
(20, 'This is a new tweet'),
(23, 'Nam ac mattis nisi. Sed feugiat neque nunc, vitae fermentum mauris tincidunt a. '),
(24, 'Nam semper lacus mi, vel lobortis ue et enim convallis tristique sit amet in enim. Nulla euismod finibus nibh.'),
(25, 'Final Test');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(4) NOT NULL,
  `firstName` varchar(15) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `firstName`, `lastName`, `email`, `password`, `role`) VALUES
(1, 'Eunice', 'Perez', 'eunice@gmail.com', '123456', 'ADMIN'),
(2, 'Smith', 'Laura', 'laura@gmail.com', '123123', 'USER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogapp`
--
ALTER TABLE `blogapp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`),
  ADD UNIQUE KEY `categoryIndex` (`name`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`movieId`),
  ADD KEY `category_FK` (`categoryId`);

--
-- Indexes for table `myblogg`
--
ALTER TABLE `myblogg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`reviewId`),
  ADD KEY `movie_FK` (`movieId`),
  ADD KEY `user_FK` (`userId`);

--
-- Indexes for table `tweets`
--
ALTER TABLE `tweets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogapp`
--
ALTER TABLE `blogapp`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `movieId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `myblogg`
--
ALTER TABLE `myblogg`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `reviewId` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tweets`
--
ALTER TABLE `tweets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movie`
--
ALTER TABLE `movie`
  ADD CONSTRAINT `category_FK` FOREIGN KEY (`categoryId`) REFERENCES `category` (`categoryId`);

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
