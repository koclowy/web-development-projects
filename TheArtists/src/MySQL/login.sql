-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Dec 15, 2024 at 04:37 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `profile_picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`id`, `name`, `profile_picture`) VALUES
(1, 'Gracie Abrams', 'uploads/Gracie Abrams.webp'),
(2, 'Joji', 'uploads/Joji.png'),
(3, 'Billie Eillish', 'uploads/Billie Eillish.webp'),
(4, 'Daniel Caesar', 'uploads/Daniel Caesar (1).jpg'),
(5, 'New Jeans', 'uploads/New Jeans (1).jpg'),
(6, 'Ed Sheeran', 'uploads/Ed Sheeran.jpg'),
(7, 'Ariana Grande', 'uploads/Ariana Grande.webp'),
(8, 'The Weekend', 'uploads/The Weekend.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `id` int(11) NOT NULL,
  `artist_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likedsongs`
--

CREATE TABLE `likedsongs` (
  `id` int(11) NOT NULL,
  `song_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `id` int(11) NOT NULL,
  `song_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `queue`
--

CREATE TABLE `queue` (
  `id` int(11) NOT NULL,
  `song_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `ID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `artist` varchar(255) NOT NULL,
  `album_name` varchar(255) NOT NULL,
  `file_path` longblob NOT NULL,
  `album_art` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`ID`, `title`, `artist`, `album_name`, `file_path`, `album_art`) VALUES
(3, 'That\'s So True', 'Gracie Abrams', 'The Secret of Us (Deluxe)', 0x75706c6f6164732f736f6e67732f546861745f5f5f735f536f5f547275652e6d7033, 'uploads/album_art/The_Secret_of_Us__Deluxe_.jpg'),
(4, 'I Love You, I\'m Sorry', 'Gracie Abrams', 'The Secret of Us (Deluxe)', 0x75706c6f6164732f736f6e67732f495f4c6f76655f596f755f5f495f6d5f536f7272792e6d7033, 'uploads/album_art/The_Secret_of_Us__Deluxe_.jpg'),
(5, 'Run', 'Joji', 'Nectar', 0x75706c6f6164732f736f6e67732f52756e2e6d7033, 'uploads/album_art/Nectar.png'),
(6, 'Die For You', 'Joji', 'Smithereens', 0x75706c6f6164732f736f6e67732f4469655f466f725f596f752e6d7033, 'uploads/album_art/Smithereens.png'),
(7, 'Glimpse of Us', 'Joji', 'Smithereens', 0x75706c6f6164732f736f6e67732f476c696d7073655f6f665f55732e6d7033, 'uploads/album_art/Smithereens.png'),
(8, 'Sanctuary', 'Joji', 'Nectar', 0x75706c6f6164732f736f6e67732f53616e6374756172792e6d7033, 'uploads/album_art/Nectar.png'),
(9, 'SLOW DANCING IN THE DARK', 'Joji', 'Ballads 1', 0x75706c6f6164732f736f6e67732f534c4f575f44414e43494e475f494e5f5448455f4441524b2e6d7033, 'uploads/album_art/Ballads_1.png'),
(10, 'Close To You', 'Gracie Abrams', 'The Secret of Us (Deluxe)', 0x75706c6f6164732f736f6e67732f436c6f73655f546f5f596f752e6d7033, 'uploads/album_art/The_Secret_of_Us__Deluxe_.jpg'),
(11, 'I miss you, I\'m sorry', 'Gracie Abrams', 'minor', 0x75706c6f6164732f736f6e67732f495f6d6973735f796f755f5f495f5f5f6d5f736f7272792e6d7033, 'uploads/album_art/Minor.jpg'),
(12, 'I know it won\'t work', 'Gracie Abrams', 'Good Riddance (Deluxe)', 0x75706c6f6164732f736f6e67732f495f6b6e6f775f69745f776f6e5f745f776f726b2e6d7033, 'uploads/album_art/Good_Riddance.jpg'),
(13, 'Hype Boy', 'New Jeans', 'New Jeans', 0x75706c6f6164732f736f6e67732f487970655f426f792e6d7033, 'uploads/album_art/New_Jeans.jpg'),
(14, 'Cookie', 'New Jeans', 'New Jeans', 0x75706c6f6164732f736f6e67732f436f6f6b69652e6d7033, 'uploads/album_art/New_Jeans.jpg'),
(15, 'Attention', 'New Jeans', 'New Jeans', 0x75706c6f6164732f736f6e67732f417474656e74696f6e2e6d7033, 'uploads/album_art/New_Jeans.jpg'),
(16, 'Ditto', 'New Jeans', 'Ditto', 0x75706c6f6164732f736f6e67732f446974746f2e6d7033, 'uploads/album_art/Ditto.png'),
(17, 'OMG', 'New Jeans', 'OMG', 0x75706c6f6164732f736f6e67732f4f4d472e6d7033, 'uploads/album_art/OMG.jpg'),
(18, 'Best Part (feat. H.E.R.)', 'Daniel Caesar', 'Freudian', 0x75706c6f6164732f736f6e67732f426573745f506172745f5f666561742e5f482e452e522e5f2e6d7033, 'uploads/album_art/Freudian.jpg'),
(19, 'Get You (feat. Kali Uchis)', 'Daniel Caesar', 'Freudian', 0x75706c6f6164732f736f6e67732f4765745f596f755f5f666561742e5f4b616c695f55636869735f2e6d7033, 'uploads/album_art/Freudian.jpg'),
(20, 'Always', 'Daniel Caesar', 'NEVER ENOUGH', 0x75706c6f6164732f736f6e67732f416c776179732e6d7033, 'uploads/album_art/Never_Enough.png'),
(21, 'Japanese Denim', 'Daniel Caesar', 'Japanese Denim - Single', 0x75706c6f6164732f736f6e67732f4a6170616e6573655f44656e696d2e6d7033, 'uploads/album_art/japanese_denim.jpg'),
(22, 'Superpowers', 'Daniel Caesar', 'NEVER ENOUGH', 0x75706c6f6164732f736f6e67732f5375706572706f776572732e6d7033, 'uploads/album_art/Never_Enough.png'),
(23, 'Happier Than Ever', 'Billie Ellish', 'Happier Than Ever', 0x75706c6f6164732f736f6e67732f486170706965725f5468616e5f457665722e6d7033, 'uploads/album_art/Happier_Than_Ever.jpg'),
(24, 'WILDFLOWER', 'Billie Ellish', 'HIT ME HARD AND SOFT', 0x75706c6f6164732f736f6e67732f57494c44464c4f5745522e6d7033, 'uploads/album_art/HIT_ME_HARD_AND_SOFT.jpg'),
(25, 'L’AMOUR DE MA VIE', 'Billie Ellish', 'HIT ME HARD AND SOFT', 0x75706c6f6164732f736f6e67732f4c5f5f5f414d4f55525f44455f4d415f5649452e6d7033, 'uploads/album_art/HIT_ME_HARD_AND_SOFT.jpg'),
(26, 'when the party\'s over', 'Billie Ellish', 'WHEN WE ALL FALL ASLEEP, WHERE DO WE GO?', 0x75706c6f6164732f736f6e67732f7768656e5f7468655f70617274795f735f6f7665722e6d7033, 'uploads/album_art/WHEN_WE_ALL_FALL_ASLEEP__WHERE_DO_WE_GO.jpg'),
(29, 'bury a friend', 'Billie Ellish', 'WHEN WE ALL FALL ASLEEP, WHERE DO WE GO?', 0x75706c6f6164732f736f6e67732f627572795f615f667269656e642e6d7033, 'uploads/album_art/WHEN_WE_ALL_FALL_ASLEEP__WHERE_DO_WE_GO.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(10) NOT NULL,
  `fName` varchar(50) NOT NULL,
  `lName` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `PhoneNo` varchar(25) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `fName`, `lName`, `Email`, `PhoneNo`, `Password`) VALUES
(1, 'Chloe', 'Tee', 'chloetee2012@gmail.com', '0124806665', 'dell7191'),
(2, 'Qiyean', 'Hng', 'qiyeanhng@gmail.com', '0108323717', 'dell7191'),
(3, 'user1', 'testing', 'user1@gmail.com', '0108323717', 'user1'),
(4, 'user2', 'testing', 'user2@gmail.com', '0123456789', 'user2'),
(5, 'user3', 'testing', 'user3@gmail.com', '0123456789', 'user3'),
(6, 'user4', 'testing', 'user4@gmail.com', '0123456789', 'user4'),
(7, 'user5', 'testing', 'user5@gmail.com', '0123456789', 'user5'),
(8, 'user6', 'testing', 'user6@gmail.com', '0123456789', 'user6'),
(9, 'user7', 'testing', 'user7@gmail.com', '0123456789', 'user7'),
(10, 'user8', 'testing', 'user8@gmail.com', '0123456789', 'user8'),
(11, 'user9', 'testing', 'user9@gmail.com', '0123456789', 'user9'),
(12, 'user10', 'testing', 'user10@gmail.com', '0123456789', 'user10'),
(13, 'user11', 'testing', 'user11@gmail.com', '0123456789', 'user11'),
(14, 'user12', 'testing', 'user12@gmail.com', '0123456789', 'user12'),
(15, 'user13', 'testing', 'user13@gmail.com', '0123456789', 'user13'),
(16, 'user14', 'testing', 'user14@gmail.com', '0123456789', '$2y$10$R8M.GWNYf7XMj1IfM8fQvOB2C70QkOYwbI66hz2HX/m'),
(17, 'user15', 'testing', 'user15@gmail.com', '0123456789', '$2y$10$jFVJzO8WYMwD8rx6GdIYjuJm13uSPFH6k/f7B8r5eyK'),
(18, 'user16', 'testing', 'user16@gmail.com', '0123456789', 'user16'),
(19, 'user17', 'testing', 'user17@gmail.com', '0123456789', 'user17'),
(20, 'user18', 'testing', 'user18@gmail.com', '0123456789', 'user18'),
(21, 'user19', 'testing', 'user19@gmail.com', '0123456789', '$2y$10$io24M9CH3nbQgiONbqs3zOUGFQkty8Q7DSXMYMSfVCM'),
(22, 'user20', 'testing', 'user20@gmail.com', '0123456789', '$2y$10$iMxT9tIzWaBAf0HqIvPnaecMGD1isgJFuzL3dz8g0mu'),
(23, 'user21', 'testing', 'user21@gmail.com', '0123456789', '$2y$10$K.yZx1iNV.QHV6UH2d04m.kdHerai5xmisobqsCJLgr'),
(24, 'user22', 'testing', 'user22@gmail.com', '0123456789', '$2y$10$QIo5TIFGcjNZWKybOxasVe/HlbMAn8UUgNU1mcWTBFm'),
(25, 'user23', 'testing', 'user23@gmail.com', '0123456789', '$2y$10$OIHFEVCjRQ37MQSK4BZqx.0XCO04RJ4kkAhPogkWhSB'),
(26, 'user24', 'testing', 'user24@gmail.com', '0123456789', 'user24'),
(27, 'user25', 'testing', 'user25@gmail.com', '0123456789', 'user25'),
(28, 'user26', 'testing', 'user26@gmail.com', '0123456789', 'user26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artist_id` (`artist_id`);

--
-- Indexes for table `likedsongs`
--
ALTER TABLE `likedsongs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `queue`
--
ALTER TABLE `queue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=373;

--
-- AUTO_INCREMENT for table `likedsongs`
--
ALTER TABLE `likedsongs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `queue`
--
ALTER TABLE `queue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favourites`
--
ALTER TABLE `favourites`
  ADD CONSTRAINT `favourites_ibfk_1` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
