-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour monportfolio
CREATE DATABASE IF NOT EXISTS `monportfolio` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `monportfolio`;

-- Listage de la structure de table monportfolio. admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL DEFAULT '0',
  `password` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table monportfolio.admin : ~1 rows (environ)
DELETE FROM `admin`;
INSERT INTO `admin` (`id`, `user`, `password`) VALUES
	(1, 'alex', 'alex');

-- Listage de la structure de table monportfolio. blog_posts
CREATE TABLE IF NOT EXISTS `blog_posts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `category` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `author` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table monportfolio.blog_posts : ~3 rows (environ)
DELETE FROM `blog_posts`;
INSERT INTO `blog_posts` (`id`, `title`, `category`, `description`, `author`, `created_at`) VALUES
	(1, 'What\'s new in 2022 Tech', 'Technology', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi perferendis molestiae non nemo doloribus. Doloremque, nihil! At ea atque quidem!', 'Jane Doe', '2024-01-20 11:00:00'),
	(2, 'Delicious Food', 'Food', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi perferendis molestiae non nemo doloribus. Doloremque, nihil! At ea atque quidem!', 'Jony Doe', '2024-01-19 14:30:00'),
	(3, 'Race to your heart content', 'Automobile', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi perferendis molestiae non nemo doloribus. Doloremque, nihil! At ea atque quidem!', 'John Doe', '2024-01-18 09:45:00');

-- Listage de la structure de table monportfolio. contact_messages
CREATE TABLE IF NOT EXISTS `contact_messages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `phone` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table monportfolio.contact_messages : ~1 rows (environ)
DELETE FROM `contact_messages`;
INSERT INTO `contact_messages` (`id`, `name`, `email`, `message`, `created_at`, `phone`) VALUES
	(1, 'dzqdq', 'alex.perezac490@gmail.com', 'dqzdqz', '2024-01-20 11:37:10', 'dqzdzqd');

-- Listage de la structure de table monportfolio. experience
CREATE TABLE IF NOT EXISTS `experience` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name_experience` varchar(50) DEFAULT NULL,
  `img_experience` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table monportfolio.experience : ~3 rows (environ)
DELETE FROM `experience`;
INSERT INTO `experience` (`id`, `name_experience`, `img_experience`) VALUES
	(1, 'Stage 2 mois Atout France', 'images/Atouts.png'),
	(2, 'Experience Unity', 'images/unity.png'),
	(3, 'Stage 2 mois service informatique Mairie', 'images/hotels.png');

-- Listage de la structure de table monportfolio. projets
CREATE TABLE IF NOT EXISTS `projets` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name_projets` varchar(50) DEFAULT NULL,
  `img_projets` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table monportfolio.projets : ~3 rows (environ)
DELETE FROM `projets`;
INSERT INTO `projets` (`id`, `name_projets`, `img_projets`) VALUES
	(1, 'Site R6 Packs', 'images/r6_pack.png'),
	(2, 'Site Planning', 'images/r6_pack.png'),
	(3, 'Portfolio', 'images/r6_pack.png');

-- Listage de la structure de table monportfolio. skills
CREATE TABLE IF NOT EXISTS `skills` (
  `id` int NOT NULL AUTO_INCREMENT,
  `skill_name` varchar(255) NOT NULL,
  `niveau` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table monportfolio.skills : ~12 rows (environ)
DELETE FROM `skills`;
INSERT INTO `skills` (`id`, `skill_name`, `niveau`) VALUES
	(1, 'HTML', 'Avancée'),
	(2, 'CSS', 'Intermédiaire'),
	(3, 'Unreal', 'Basique'),
	(4, 'JavaScript', 'Intermédiaire'),
	(5, 'SQL', 'Intermédiaire'),
	(6, 'Unity', 'Intermédiaire'),
	(7, 'PHP', 'Basique'),
	(8, 'NodeJS', 'Intermédiaire'),
	(9, 'JAVA', 'Basique'),
	(10, 'Git', 'Intermédiaire'),
	(11, 'C++', 'Basique'),
	(12, 'Express JS', 'Intermédiaire');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
