-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 09, 2021 at 02:41 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `jummmp`
--

-- --------------------------------------------------------

--
-- Table structure for table `cv`
--

CREATE TABLE `cv` (
  `id` int(11) NOT NULL,
  `user_id_id` int(11) NOT NULL,
  `model` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_cv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `short_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cv`
--

INSERT INTO `cv` (`id`, `user_id_id`, `model`, `title`, `job_cv`, `about`, `created_at`, `updated_at`, `short_url`) VALUES
(4, 1, 1, 'CV1', 'Dev WEB', 'lorem ipsum', '2016-01-01 00:00:00', '2016-01-01 00:00:00', ''),
(5, 2, 1, 'cv1', 'DEV WEB2', 'lorem ipsum', '2016-01-01 00:00:00', '2021-04-09 13:57:47', '/user/2/5'),
(8, 2, 3, 'Mon super CV', 'Chercheur', 'hjksdmhgqjkh', '2021-04-08 08:27:57', '2021-04-08 08:27:57', '/user/2/8'),
(9, 3, 1, 'cv Thomas', 'Dev front', 'du front que du front', '2021-04-08 09:58:43', '2021-04-08 09:58:43', 'dsgsqgqs'),
(15, 2, 1, 'Définis le titre de ton cv', 'Inscris ton poste visé', 'Décris ton profil', '2021-04-09 13:31:41', '2021-04-09 13:31:41', '');

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210407084558', '2021-04-07 08:46:50', 73),
('DoctrineMigrations\\Version20210407101755', '2021-04-07 10:18:08', 272),
('DoctrineMigrations\\Version20210408141304', '2021-04-08 14:13:32', 204),
('DoctrineMigrations\\Version20210408145536', '2021-04-08 14:55:48', 180);

-- --------------------------------------------------------

--
-- Table structure for table `hobbies`
--

CREATE TABLE `hobbies` (
  `id` int(11) NOT NULL,
  `user_id_id` int(11) NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hobby_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hobbies`
--

INSERT INTO `hobbies` (`id`, `user_id_id`, `icon`, `hobby_name`) VALUES
(1, 2, 'fas fa-running', 'Running'),
(2, 2, 'fas fa-snowboarding', 'Skate');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skill_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `id` int(11) NOT NULL,
  `user_id_id` int(11) NOT NULL,
  `training_date_from` date NOT NULL,
  `training_date_to` date NOT NULL,
  `diploma_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diploma_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_adress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_code` int(11) NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `last_name`, `first_name`, `avatar`, `street_adress`, `post_code`, `city`, `phone`, `website`) VALUES
(1, 'test@test.com', '[]', '$2y$13$SP1FwP1bJJxwro90v1vRiuwf.9g2.EeRbAjhMwMDnnedh2aWva6lK', 'Martinez', 'Pierre', 'https://randomuser.me/api/portraits/men/0.jpg', '10 rue de la Paix', 33000, 'Bordeaux', '0607070707', 'www.art2mkl.fr'),
(2, 'test1@test.com', '[]', '$2y$13$DPubPdWIOFGrKn3H5zWczeeV72WXE6Kb1aqT9YGAOy6O/WYi9Bon6', 'Martinezz', 'Swanne', 'https://randomuser.me/api/portraits/men/95.jpg', '10 rue de la Paix', 33000, 'Bordeaux', '0612345678', 'www.art2mkl.fr'),
(3, 'test2@test.com', '[]', '$2y$13$Opxe3/YIVESIVG2JN1xmJue2grygkYwQvuJbQUL0GCcTvmtUXE7EG', 'Martinezz', 'Thomas', 'https://randomuser.me/api/portraits/men/81.jpg', '10 rue de la Paix', 33000, 'Bordeaux', '0707070707', 'www.art2mkl.fr');

-- --------------------------------------------------------

--
-- Table structure for table `xp`
--

CREATE TABLE `xp` (
  `id` int(11) NOT NULL,
  `user_id_id` int(11) NOT NULL,
  `job_date_from` date NOT NULL,
  `job_date_to` date NOT NULL,
  `job_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `xp`
--

INSERT INTO `xp` (`id`, `user_id_id`, `job_date_from`, `job_date_to`, `job_name`, `company_name`, `job_location`, `job_description`) VALUES
(1, 2, '2015-10-04', '2021-01-01', 'Developpeur', 'Apple', 'San Diego', 'make crud'),
(2, 2, '2017-01-01', '2021-01-01', 'Formateur', 'Webforce3', 'New York', 'Learning');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cv`
--
ALTER TABLE `cv`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_B66FFE929D86650F` (`user_id_id`);

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `hobbies`
--
ALTER TABLE `hobbies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_38CA341D9D86650F` (`user_id_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D53116709D86650F` (`user_id_id`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D5128A8F9D86650F` (`user_id_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- Indexes for table `xp`
--
ALTER TABLE `xp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_F63A903D9D86650F` (`user_id_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cv`
--
ALTER TABLE `cv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `hobbies`
--
ALTER TABLE `hobbies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `xp`
--
ALTER TABLE `xp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cv`
--
ALTER TABLE `cv`
  ADD CONSTRAINT `FK_B66FFE929D86650F` FOREIGN KEY (`user_id_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `hobbies`
--
ALTER TABLE `hobbies`
  ADD CONSTRAINT `FK_38CA341D9D86650F` FOREIGN KEY (`user_id_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `FK_D53116709D86650F` FOREIGN KEY (`user_id_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `training`
--
ALTER TABLE `training`
  ADD CONSTRAINT `FK_D5128A8F9D86650F` FOREIGN KEY (`user_id_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `xp`
--
ALTER TABLE `xp`
  ADD CONSTRAINT `FK_F63A903D9D86650F` FOREIGN KEY (`user_id_id`) REFERENCES `user` (`id`);
