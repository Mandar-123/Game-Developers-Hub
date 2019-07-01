-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2018 at 10:28 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gamewebsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `link`
--

CREATE TABLE `link` (
  `email` varchar(255) NOT NULL,
  `link` varchar(1000) NOT NULL,
  `des` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `link`
--

INSERT INTO `link` (`email`, `link`, `des`) VALUES
('vik@gmail.com', 'https://www.dropbox.com/mandar', 'My Projects on dropbox'),
('mandar@gmail.com', 'hi.com', 'hi'),
('hat@sala.com', 'awfawfawf', 'asfa');

-- --------------------------------------------------------

--
-- Table structure for table `projectdetails`
--

CREATE TABLE `projectdetails` (
  `email` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `devdet` varchar(255) NOT NULL,
  `publicavail` varchar(255) NOT NULL,
  `dev` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projectdetails`
--

INSERT INTO `projectdetails` (`email`, `genre`, `name`, `description`, `devdet`, `publicavail`, `dev`) VALUES
('balajichettiar7@gmail.com', '', '', '', '', 'No', ''),
('c@def.com', '', '', '', '', 'No', ''),
('hat@sala.com', '', '', '', '', 'No', ''),
('kartik@gmail.com', 'Horror', 'Zombie Attack', 'This game is a fps game with various levels to explore in an open world envoirnment.', 'Beta Mode', 'Yes', ''),
('kumbharrohit71@gmail.com', '', '', '', '', 'No', ''),
('mandar@gmail.com', 'Adventure', 'The Forest', 'FPS game with multiplayer support and a lot of combat and action', 'Halfway through development', 'No', 'Sound engineer,Game Tester,UI Designer,Writer,'),
('rs@gmail.com', 'Shooter', 'aaa', 'sasfasf', 'asf', 'Yes', 'Game Programmer,Level Designer,'),
('sanket@g.com', 'Sports', 'Racer Tournament 3D', 'This is an racing game which is currently under devlopment.', 'Testing Phase', 'Yes', 'Game Animator,UI Designer,Character Modeler,'),
('vik@gmail.com', 'Role-Playing Game', 'BattleGround 4D', 'This is an role playing game placed in times of WW2.With a good wepons system,and combat power', 'The project is in the initial stage of development', 'Yes', '');

-- --------------------------------------------------------

--
-- Table structure for table `projectlink`
--

CREATE TABLE `projectlink` (
  `email` varchar(255) NOT NULL,
  `link` varchar(1000) NOT NULL,
  `des` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projectlink`
--

INSERT INTO `projectlink` (`email`, `link`, `des`) VALUES
('mandar@gmail.com', 'http://www.survivetheforest.com', 'Game Page'),
('sanket@g.com', 'https://www/dropbox.com', 'Dropbox Link'),
('mandar@gmail.com', 'as.com', 'My Game'),
('rs@gmail.com', 'asas', 'asas');

-- --------------------------------------------------------

--
-- Table structure for table `projectvideo`
--

CREATE TABLE `projectvideo` (
  `email` varchar(255) NOT NULL,
  `src` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projectvideo`
--

INSERT INTO `projectvideo` (`email`, `src`) VALUES
('mandar@gmail.com', 'https://www.youtube.com/embed/KSnmAIW2xo8'),
('mandar@gmail.com', 'https://www.youtube.com/embed/O3b4tMRhQiA'),
('sanket@g.com', 'https://www.youtube.com/embed/OT2c9kHZog4');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `email` varchar(255) NOT NULL,
  `mainskill` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `edu` varchar(255) NOT NULL,
  `exp` varchar(255) NOT NULL,
  `otherskills` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`email`, `mainskill`, `about`, `edu`, `exp`, `otherskills`) VALUES
('balajichettiar7@gmail.com', '', '', '', '', ''),
('c@def.com', '', '', '', '', ''),
('hat@sala.com', '', '', '', '', ''),
('kartik@gmail.com', 'UI Designer', 'I like to see creativity we see around us and would like to implement it in game development', 'Animation B.Tech in   from FX school', '2 years of experience in UI design', 'Blender,FMod,Game Studio,HTML,iClone,'),
('kumbharrohit71@gmail.com', '', '', '', '', 'Cinema 4D,DAZ 3D,iClone,Visual Basic,'),
('mandar@gmail.com', 'Game Programmer', 'I am an indie game developer with an interest in programming and logic', 'BE Computer', 'Internship as junior Game developer at an mobile', 'Game Studio,C++,FMod,Flash,DirectX,Autodesk 3ds Max,HTML,'),
('rs@gmail.com', '', '', '', '', ''),
('sanket@g.com', 'Sound engineer', 'I am a sound engineer with interest in game development', 'BE Electronics', 'Junior Sound Eng. GD dame devs.', 'Leadwerks,Java,Autodesk 3ds Max,Game Maker,Ogre,DirectX,CryEngine,'),
('vik@gmail.com', 'Game Artist', 'I am an Graphic Designer with someexperience in animation', 'B.com\r\nDiploma in Graphic Designing', '2 year internship with CA arts', 'Game Maker,Corona,Cinema 4D,iClone,Unreal Engine,Torque3D,jMonkey Game Engine,Game Studio,Autodesk Maya,');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `fn` varchar(255) NOT NULL,
  `ln` varchar(255) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phn` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `work` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`fn`, `ln`, `gender`, `email`, `phn`, `dob`, `state`, `city`, `pass`, `work`) VALUES
('balaji', 'chettiar', '', 'balajichettiar7@gmail.com', '7208332676', '1997-12-30', 'Maharashtra', 'Mumbai City', '$2y$10$KzhcS4pzEYvUu1lQFwA57O3rvp0odkwRuW1G.aF230wi824FZSWjW', 'No'),
('A', 'B', '', 'c@def.com', '123', '1997-12-13', 'Andaman & Nicobar Islands', 'Nicobars', '$2y$10$mVQTW5132LXL0XwOEr43OeaXYBoim9TSAjNhtn4tQWWK60cSyOjcK', 'No'),
('Hat', 'Sala', '', 'hat@sala.com', '1231231231', '1997-12-12', 'Dadra & Nagar Haveli', 'Dadra and Nagar Haveli', '$2y$10$QP5ay89.4x7wT.tcsbEul.BBlAz6xFg80X7iKywEgmcokvlzkw6iO', 'No'),
('Kartik', 'Lakade', 'm', 'kartik@gmail.com', '9564878456', '1997-12-12', 'Himachal Pradesh', 'Lahaul & Spiti', '$2y$10$cJ64CFvWrpHfEMF1mCfPUO6X4.efEESZHby3B98uf318EeN7YWmOy', 'No'),
('R', 'K', 'm', 'kumbharrohit71@gmail.com', '7219469422', '1997-10-11', 'Maharashtra', 'Mumbai City', '$2y$10$IDz3YfcPdvtYf0dWmbeJ/eD3lEZfWCzpJRkeS1lzTD8HCfeE74sXu', 'Yes'),
('M', 'D', 'm', 'mandar@gmail.com', '9664805593', '1997-09-03', 'Maharashtra', 'Mumbai City', '$2y$10$vSOXqNnPPGM4npz0kk0qyeqK3XVMK6vegZPkyCADOP42tOo8KMUwS', 'Yes'),
('rohit', 'sharma', 'm', 'rs@gmail.com', '9589856452', '1212-12-12', 'Jammu & Kashmir', 'Rajouri', '$2y$10$a9GPNSOSad8EYzXuoPqooOV9kwxwP4yrSGUAlfYi42AMCY15GtLUq', 'No'),
('Sanket', 'Sutar', 'm', 'sanket@g.com', '9648751569', '1997-05-12', 'Gujarat', 'Kheda', '$2y$10$higrcrujY2JLoVetm0QK3eE3EdcsXIRXyapimLsVqMT6tuylZOnE.', 'No'),
('V', 'D', 'm', 'vik@gmail.com', '9564851245', '1997-03-16', 'Dadra & Nagar Haveli', 'Dadra and Nagar Haveli', '$2y$10$fmYvWUpKB/0siAjosYXb.uxD.iPDkGVAp4krSDRBbSHMulS42cO8W', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `email` varchar(255) NOT NULL,
  `src` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`email`, `src`) VALUES
('mandar@gmail.com', 'https://www.youtube.com/embed/0irvkkrNosQ'),
('vik@gmail.com', 'https://www.youtube.com/embed/dh4PnMKfFRw');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projectdetails`
--
ALTER TABLE `projectdetails`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `projectvideo`
--
ALTER TABLE `projectvideo`
  ADD UNIQUE KEY `uq_pv` (`email`,`src`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD UNIQUE KEY `uq_video` (`email`,`src`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
