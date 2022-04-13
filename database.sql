-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 13, 2022 at 02:30 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nbpickup`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `a_id` int(10) UNSIGNED NOT NULL,
  `a_name` varchar(255) DEFAULT NULL,
  `a_alias` varchar(128) DEFAULT NULL COMMENT 'Used for URL links and folder names in nbgrader',
  `a_description` text,
  `a_owner` int(11) UNSIGNED DEFAULT NULL,
  `a_status` int(11) UNSIGNED DEFAULT NULL,
  `a_code_lang` int(11) UNSIGNED DEFAULT NULL,
  `a_lang` varchar(2) NOT NULL DEFAULT 'EN',
  `a_deadline` datetime DEFAULT NULL,
  `a_anonymous_sub` tinyint(1) UNSIGNED DEFAULT '1' COMMENT 'Allow Anonymous Submissions',
  `a_unknown_users` tinyint(1) UNSIGNED DEFAULT '1' COMMENT 'Allow Unassigned Submission',
  `a_public` tinyint(1) NOT NULL DEFAULT '0',
  `a_sub_api` tinyint(1) UNSIGNED NOT NULL DEFAULT '1' COMMENT 'Allow Submissions through API',
  `a_sub_portal` tinyint(1) UNSIGNED NOT NULL DEFAULT '1' COMMENT 'Allow Submissions through web portal',
  `a_sub_email` tinyint(1) UNSIGNED NOT NULL DEFAULT '1' COMMENT 'Allow Submissions through automated email.',
  `a_repo_url` varchar(255) DEFAULT NULL COMMENT 'Repo link for Binder',
  `a_created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `a_updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `a_deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`a_id`, `a_name`, `a_alias`, `a_description`, `a_owner`, `a_status`, `a_code_lang`, `a_lang`, `a_deadline`, `a_anonymous_sub`, `a_unknown_users`, `a_public`, `a_sub_api`, `a_sub_portal`, `a_sub_email`, `a_repo_url`, `a_created_at`, `a_updated_at`, `a_deleted_at`) VALUES
(18, 'My Python Class', 'my-python-class', '', 1, NULL, 1, 'EN', '0000-00-00 00:00:00', 1, 1, 0, 1, 1, 1, NULL, '2022-02-16 13:36:05', '2022-02-16 13:36:05', NULL),
(19, 'Python Intro', 'python-intro', '', 1, NULL, 1, 'EN', '0000-00-00 00:00:00', 1, 1, 0, 1, 1, 1, 'https://gist.github.com/jjur/8e73520ae05fefd782f5305d3dea5742', '2022-02-21 04:00:44', '2022-04-03 10:44:01', NULL),
(20, 'Introduction to Python', 'introduction-to-python', '', 1, NULL, 1, 'EN', '0000-00-00 00:00:00', 1, 1, 0, 1, 1, 1, 'https://gist.github.com/jjur/8e73520ae05fefd782f5305d3dea5742', '2022-02-21 14:08:08', '2022-02-21 14:23:19', NULL),
(21, 'Amazing sun', 'amazing-sun', '', 8, NULL, 1, 'EN', '0000-00-00 00:00:00', 1, 1, 0, 1, 1, 1, NULL, '2022-03-12 05:06:44', '2022-03-12 05:06:44', NULL),
(22, 'test 2', 'test-2', 'sldkjflsdf', 9, NULL, 1, 'EN', '0000-00-00 00:00:00', 1, 1, 0, 1, 1, 1, NULL, '2022-03-12 23:34:03', '2022-03-12 23:34:03', NULL),
(23, 'Introduction to Python 2022', 'introduction-to-python-2022', '', 1, NULL, 1, 'EN', '0000-00-00 00:00:00', 1, 1, 0, 1, 1, 1, NULL, '2022-04-03 11:01:52', '2022-04-03 11:01:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `f_id` int(11) UNSIGNED NOT NULL,
  `f_hash` varchar(64) DEFAULT NULL,
  `f_filename_internal` varchar(128) DEFAULT NULL,
  `f_filename_original` varchar(128) DEFAULT NULL,
  `f_filepath` varchar(255) DEFAULT NULL,
  `f_filesize` int(11) NOT NULL,
  `f_owner` int(11) UNSIGNED DEFAULT NULL,
  `f_alias` varchar(128) DEFAULT NULL,
  `f_created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `f_updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `f_deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `file_assignments`
--

CREATE TABLE `file_assignments` (
  `id` int(11) UNSIGNED NOT NULL,
  `file` int(11) UNSIGNED DEFAULT NULL,
  `assignment` int(11) UNSIGNED DEFAULT NULL,
  `private` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Only instructor can see private files'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `file_submission`
--

CREATE TABLE `file_submission` (
  `id` int(11) UNSIGNED NOT NULL,
  `file` int(11) UNSIGNED NOT NULL,
  `submission` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gradebooks`
--

CREATE TABLE `gradebooks` (
  `g_id` int(11) UNSIGNED NOT NULL,
  `g_assignment` int(11) UNSIGNED DEFAULT NULL,
  `g_file` int(11) UNSIGNED DEFAULT NULL,
  `g_stats_assignments` int(11) DEFAULT NULL COMMENT 'Number of assignments stored in the gradebook',
  `g_stats_students` int(11) DEFAULT NULL COMMENT 'Number of students stored in the gradebook',
  `g_created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `g_updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `g_deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `g_id` int(10) UNSIGNED NOT NULL,
  `g_submission` int(10) UNSIGNED NOT NULL,
  `g_score` decimal(11,1) DEFAULT NULL,
  `g_metadata` text,
  `g_created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `g_updated_at` datetime DEFAULT NULL,
  `g_deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'user', ''),
(2, 'admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `s_id` int(11) UNSIGNED NOT NULL,
  `s_assignment` int(11) UNSIGNED DEFAULT NULL,
  `s_user` int(11) UNSIGNED DEFAULT NULL,
  `s_sub_method` varchar(64) NOT NULL COMMENT 'Submission method',
  `s_created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `s_updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `s_deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `t_id` int(11) UNSIGNED NOT NULL,
  `t_token` varchar(128) NOT NULL,
  `t_assignment` int(11) UNSIGNED DEFAULT NULL,
  `t_user` int(11) UNSIGNED DEFAULT NULL,
  `t_created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `t_updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `t_deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$12$BE19dS2CK2rOzzHQmlijie0SEgPQrBbx9UbG107NqdEi3XYcvkVdO', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1649220641, 1, 'Admin', 'istrator', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`a_id`),
  ADD KEY `assingment_user` (`a_owner`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`f_id`),
  ADD KEY `f_owner` (`f_owner`);

--
-- Indexes for table `file_assignments`
--
ALTER TABLE `file_assignments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `file` (`file`),
  ADD KEY `assignment` (`assignment`);

--
-- Indexes for table `file_submission`
--
ALTER TABLE `file_submission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `file` (`file`),
  ADD KEY `submissions` (`submission`);

--
-- Indexes for table `gradebooks`
--
ALTER TABLE `gradebooks`
  ADD PRIMARY KEY (`g_id`),
  ADD KEY `g_assignment` (`g_assignment`),
  ADD KEY `g_file` (`g_file`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`g_id`),
  ADD KEY `g_submission` (`g_submission`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `s_user` (`s_user`),
  ADD KEY `s_assignment` (`s_assignment`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `t_token` (`t_token`),
  ADD KEY `tokens_ibfk_1` (`t_user`),
  ADD KEY `t_assignment` (`t_assignment`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `a_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `f_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `file_assignments`
--
ALTER TABLE `file_assignments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `file_submission`
--
ALTER TABLE `file_submission`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gradebooks`
--
ALTER TABLE `gradebooks`
  MODIFY `g_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `g_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `s_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `t_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignments`
--
ALTER TABLE `assignments`
  ADD CONSTRAINT `assingment_user` FOREIGN KEY (`a_owner`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_1` FOREIGN KEY (`f_owner`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `file_assignments`
--
ALTER TABLE `file_assignments`
  ADD CONSTRAINT `file_assignments_ibfk_1` FOREIGN KEY (`assignment`) REFERENCES `assignments` (`a_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `file_assignments_ibfk_2` FOREIGN KEY (`file`) REFERENCES `files` (`f_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `file_submission`
--
ALTER TABLE `file_submission`
  ADD CONSTRAINT `file_submission_ibfk_1` FOREIGN KEY (`file`) REFERENCES `files` (`f_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `file_submission_ibfk_2` FOREIGN KEY (`submission`) REFERENCES `submissions` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gradebooks`
--
ALTER TABLE `gradebooks`
  ADD CONSTRAINT `gradebooks_ibfk_1` FOREIGN KEY (`g_assignment`) REFERENCES `assignments` (`a_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gradebooks_ibfk_2` FOREIGN KEY (`g_file`) REFERENCES `files` (`f_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `grades_ibfk_1` FOREIGN KEY (`g_submission`) REFERENCES `submissions` (`s_id`);

--
-- Constraints for table `submissions`
--
ALTER TABLE `submissions`
  ADD CONSTRAINT `submissions_ibfk_1` FOREIGN KEY (`s_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `submissions_ibfk_2` FOREIGN KEY (`s_assignment`) REFERENCES `assignments` (`a_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tokens`
--
ALTER TABLE `tokens`
  ADD CONSTRAINT `tokens_ibfk_1` FOREIGN KEY (`t_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tokens_ibfk_2` FOREIGN KEY (`t_assignment`) REFERENCES `assignments` (`a_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
