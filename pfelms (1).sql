-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 09 juin 2024 à 14:43
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pfelms`
--

-- --------------------------------------------------------

--
-- Structure de la table `absences`
--

CREATE TABLE `absences` (
  `id` int(255) NOT NULL,
  `affectationclassenseignant_id` int(255) NOT NULL,
  `etudiant_id` int(255) NOT NULL,
  `presence` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `seance` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `absences`
--

INSERT INTO `absences` (`id`, `affectationclassenseignant_id`, `etudiant_id`, `presence`, `date`, `seance`) VALUES
(106, 11, 10, 'Absent', '2024-05-07', 1),
(107, 11, 7, 'Absent', '2024-05-07', 1),
(108, 11, 10, 'Absent', '2024-05-15', 2),
(109, 11, 7, 'Present', '2024-05-15', 2),
(110, 10, 11, 'Absent', '2024-06-09', 1),
(111, 16, 31, 'Absent', '2024-06-02', 1),
(112, 16, 32, 'Present', '2024-06-02', 1),
(113, 16, 31, 'Absent', '2024-06-09', 2),
(114, 16, 32, 'Absent', '2024-06-09', 2);

-- --------------------------------------------------------

--
-- Structure de la table `affectation`
--

CREATE TABLE `affectation` (
  `classe` varchar(80) NOT NULL,
  `semestre` int(11) NOT NULL,
  `matiere` varchar(60) NOT NULL,
  `enseignant_id` int(120) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `affectation`
--

INSERT INTO `affectation` (`classe`, `semestre`, `matiere`, `enseignant_id`, `id`) VALUES
('LAT24', 2, 'mathématique1', 8, 25),
('RST32', 3, 'optique geométrique', 9, 26);

-- --------------------------------------------------------

--
-- Structure de la table `affectationclassenseignants`
--

CREATE TABLE `affectationclassenseignants` (
  `id` int(255) NOT NULL,
  `classe_id` int(255) NOT NULL,
  `enseignant_id` int(255) NOT NULL,
  `matiere_id` int(255) NOT NULL,
  `semestre` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `affectationclassenseignants`
--

INSERT INTO `affectationclassenseignants` (`id`, `classe_id`, `enseignant_id`, `matiere_id`, `semestre`) VALUES
(9, 30, 2, 5, 2),
(10, 31, 3, 5, 2),
(11, 30, 3, 4, 2),
(12, 31, 9, 6, 2),
(13, 32, 3, 7, 5),
(14, 31, 3, 6, 2),
(16, 34, 3, 8, 5);

-- --------------------------------------------------------

--
-- Structure de la table `affectationclassetudiants`
--

CREATE TABLE `affectationclassetudiants` (
  `id` int(255) NOT NULL,
  `classe_id` int(255) NOT NULL,
  `etudiant_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `affectationclassetudiants`
--

INSERT INTO `affectationclassetudiants` (`id`, `classe_id`, `etudiant_id`) VALUES
(23, 31, 11),
(28, 30, 7),
(29, 30, 10),
(30, 34, 31),
(31, 34, 32);

-- --------------------------------------------------------

--
-- Structure de la table `affectationetud`
--

CREATE TABLE `affectationetud` (
  `id` int(11) NOT NULL,
  `etudiant_id` varchar(60) NOT NULL,
  `semestre` int(11) NOT NULL,
  `classe` varchar(60) NOT NULL,
  `specialite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

CREATE TABLE `annonces` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `annonces`
--

INSERT INTO `annonces` (`id`, `user_id`, `titre`, `contenu`, `date`) VALUES
(1, 3, 'Formation en Développement Mobile avec Flutter', ' Nous sommes ravis d\'annoncer une nouvelle formation en Développement Mobile utilisant Flutter ! Cette formation est conçue pour vous fournir les compétences nécessaires pour créer des applications mobiles performantes et attrayantes avec Flutter, le SDK open-source de Google.\nDate : jj/mm/yyyy\nLieu : dep STIC\nNe manquez pas cette opportunité de développer vos compétences en développement mobile avec Flutter et de faire avancer votre carrière. Pour vous inscrire, veuillez remplir ce formulaire [lien]', '2024-06-02'),
(2, 1, 'Article par admin', 'Cette formation est conçue pour vous fournir les compétences nécessaires pour créer des applications mobiles performantes et attrayantes.\nDate : jj/mm/yyyy\nLien : dep STIC\nNe manquez pas cette opportunité de développer vos compétences en développement mobile et de faire avancer votre carrière. Pour vous inscrire veuillez remplir ce formulaire [lien].', '2024-06-02'),
(4, 3, 'Formation en Développement Mobile', 'Contenuu de test ..', '2024-06-02'),
(6, 3, 'Formation Python : Développement de Compétences en Programmation', 'python est largement utilisé dans divers domaines tels que le développement web, l\'analyse de données, l\'intelligence artificielle, l\'automatisation, etc. Cette formation vous permettra de comprendre les concepts fondamentaux de Python et de développer des compétences pratiques pour créer des applications robustes et efficaces.\nPour vous inscrire à notre formation Python, veuillez remplir le formulaire suivant : [lien].\nNe manquez pas cette opportunité de développer vos compétences en programmation avec Python et de prendre votre carrière au prochain niveau !\nDate : jj/mm/yyyy\nLieu : dep STIC', '2024-06-02'),
(7, 1, 'Annonce de test par admin', 'admiiiiiiiiiiinnn rani', '2024-06-02');

-- --------------------------------------------------------

--
-- Structure de la table `class`
--

CREATE TABLE `class` (
  `nom` varchar(30) NOT NULL,
  `semestre` int(3) NOT NULL,
  `specialite_id` int(20) NOT NULL,
  `id` int(11) NOT NULL,
  `AU` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `class`
--

INSERT INTO `class` (`nom`, `semestre`, `specialite_id`, `id`, `AU`) VALUES
('Class1', 3, 1, 30, '2024-04-19'),
('Class2', 2, 3, 31, '2024-04-19'),
('SR5', 5, 2, 32, '2024-04-25'),
('RST5', 5, 3, 34, '2024-06-09');

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `id` int(255) NOT NULL,
  `affectationclassenseignant_id` int(255) NOT NULL,
  `courfile` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`id`, `affectationclassenseignant_id`, `courfile`, `titre`, `date`, `user_id`) VALUES
(2, 11, '1715544543.pdf', 'cour debut', '2024-05-12', 3),
(3, 11, '1715812935.pdf', 'cour 1', '2024-05-15', 3);

-- --------------------------------------------------------

--
-- Structure de la table `demandes`
--

CREATE TABLE `demandes` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `sujet` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` date NOT NULL,
  `etat` varchar(255) NOT NULL,
  `salle_id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `demandes`
--

INSERT INTO `demandes` (`id`, `user_id`, `sujet`, `message`, `date`, `etat`, `salle_id`) VALUES
(1, 3, 'Avis d\'avancement', 'aaaaaa', '2024-05-12', 'En attente\n', NULL),
(2, 3, 'Formation', 'Formation CCNA', '2024-06-02', 'accepté', 7),
(3, 3, 'Avis de rattrappage', 'Demande envoyé vers amour hello', '2024-06-02', 'accepté', 11);

-- --------------------------------------------------------

--
-- Structure de la table `emplois`
--

CREATE TABLE `emplois` (
  `id` int(255) NOT NULL,
  `salle_id` int(255) NOT NULL,
  `affectationclassenseignant_id` int(255) NOT NULL,
  `seance_id` int(255) NOT NULL,
  `jour_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `emplois`
--

INSERT INTO `emplois` (`id`, `salle_id`, `affectationclassenseignant_id`, `seance_id`, `jour_id`) VALUES
(9, 3, 11, 1, 1),
(10, 3, 11, 2, 1),
(12, 4, 11, 3, 1),
(13, 3, 11, 1, 2),
(14, 5, 9, 2, 2),
(15, 10, 9, 4, 1),
(16, 13, 10, 3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `enseignant`
--

CREATE TABLE `enseignant` (
  `numcin` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `specialite` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `enseignant`
--

INSERT INTO `enseignant` (`numcin`, `nom`, `prenom`, `specialite`, `email`) VALUES
(12345678, 'ayman', 'fterich', 'informatique', 'aymanfterich@gmail.com'),
(14789654, 'sana', 'ben hmida', 'informatique', 'sanabenhmida@yahoo.fr'),
(15487589, 'sameh', 'ben hmida', 'informatique', 'benhmidasameh@gmail.com'),
(15487965, 'WALID', 'LOUHICHI', 'INFORMATIQUE', 'louhichiwalid@yahoo.fr'),
(15623547, 'zakia', 'jallali', 'telecom', 'zakiajallali@gmail.com'),
(23245612, 'Mohamed EL HEDI', 'EL HAJJEJ', 'INFORMATIQUE', 'elhajjejm@gmail.com'),
(36323534, 'manel', 'harizi', 'Français', 'hrizimanel@gmail.com'),
(54789652, 'sarra', 'ben chaabane', 'informatique', 'sarrabenchaabane@gmail.com'),
(54879632, 'awatef', 'chniguir', 'télécommunication', 'awatefch@gmail.com'),
(98653214, 'aida', 'zaier', 'informatique', 'aidazair@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `numcin` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `specialite` varchar(20) NOT NULL,
  `classe` varchar(10) DEFAULT NULL,
  `semestre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`numcin`, `nom`, `prenom`, `email`, `specialite`, `classe`, `semestre`) VALUES
(12345678, 'Nesrine', 'GUEFRESH', 'guefnesrine991@gmail.com', 'SR', NULL, 4),
(14587956, 'omar', 'zidi', 'omarzidi@gmail.com', 'RST', NULL, 3),
(14784512, 'jemai', 'ikbel', 'jemaiikbel@gmail.com', 'SR', NULL, 3),
(21245879, 'amira', 'zidi', 'zidiamira@gmail.com', 'SR', '', 5),
(45896532, 'guefresh', 'yasmine', 'guefreshyasmine@gmail.com', 'TC', NULL, 1),
(54568978, 'zidi', 'oumayma', 'zidioumayma@gmail.com', 'RST', NULL, 3);

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `jours`
--

CREATE TABLE `jours` (
  `id` int(255) NOT NULL,
  `jour` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `jours`
--

INSERT INTO `jours` (`id`, `jour`) VALUES
(1, 'lundi'),
(2, 'mardi'),
(3, 'mercredi'),
(4, 'jeudi'),
(5, 'vendredi'),
(6, 'samedi');

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE `matiere` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `specialite_id` int(10) NOT NULL,
  `nbrheure` int(11) NOT NULL,
  `coeff` float NOT NULL,
  `ue` varchar(50) NOT NULL,
  `codeue` varchar(50) NOT NULL,
  `semestre` int(11) NOT NULL,
  `nature` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `matiere`
--

INSERT INTO `matiere` (`id`, `nom`, `specialite_id`, `nbrheure`, `coeff`, `ue`, `codeue`, `semestre`, `nature`, `type`) VALUES
(4, 'Architecture et système', 1, 2, 1, 'Programmation et systèmes', 'UEF130', 3, 'cours', 'obligatoire'),
(5, 'optique geométrique', 3, 20, 1.5, 'uef200', 'uef21457', 2, 'tp', 'obligatoire'),
(6, 'programmation python', 3, 15, 1, 'uef100', 'uef1457', 2, 'tp', 'obligatoire'),
(7, 'Algorithme', 2, 20, 2, 'ue20', 'uef12', 5, 'tp', 'optionnel'),
(8, 'bd', 3, 12, 2, 'uef150', 'uef150', 5, 'tp', 'Optionnel');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(255) NOT NULL,
  `enseignant_id` int(255) NOT NULL,
  `etudiant_id` int(255) NOT NULL,
  `sujet` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `enseignant_id`, `etudiant_id`, `sujet`, `message`, `date`) VALUES
(1, 3, 10, 'Sujet 1', 'Message du sujet 1', '2024-06-07 16:46:52'),
(2, 8, 28, 'Sujet 2', 'message2', '2024-06-08 17:39:31');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

CREATE TABLE `notes` (
  `id` int(255) NOT NULL,
  `affectationclassenseignant_id` int(255) NOT NULL,
  `etudiant_id` int(255) NOT NULL,
  `note_ds` float DEFAULT NULL,
  `note_examen` float DEFAULT NULL,
  `date_note` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `notes`
--

INSERT INTO `notes` (`id`, `affectationclassenseignant_id`, `etudiant_id`, `note_ds`, `note_examen`, `date_note`) VALUES
(16, 11, 10, 12, 17, '2024-05-11'),
(17, 11, 7, 11, 16, '2024-05-11');

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `salles`
--

CREATE TABLE `salles` (
  `id` int(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `salles`
--

INSERT INTO `salles` (`id`, `nom`, `position`) VALUES
(1, 'salle1', '1ere etage'),
(2, 'salle2', 'salle2'),
(3, 'salle3', 'salle3'),
(4, 'salle4', 'salle4'),
(5, 'salle5', 'salle5'),
(6, 'salle6', 'salle6'),
(7, 'salle7', 'salle7'),
(8, 'salle8', 'salle8'),
(9, 'salle9', 'salle9'),
(10, 'salle10', 'salle10'),
(11, 'salle11', 'salle11'),
(12, 'salle12', 'salle12'),
(13, 'salle13', 'salle13'),
(14, 'salle4', 'salle14');

-- --------------------------------------------------------

--
-- Structure de la table `seances`
--

CREATE TABLE `seances` (
  `id` int(255) NOT NULL,
  `heure` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `seances`
--

INSERT INTO `seances` (`id`, `heure`) VALUES
(1, '08h15 - 9h45'),
(2, '10h00 - 11h30'),
(3, '11h30 - 13h00'),
(4, '15h00 - 16h30'),
(5, '16h30 - 18h00');

-- --------------------------------------------------------

--
-- Structure de la table `specialite`
--

CREATE TABLE `specialite` (
  `id` int(11) NOT NULL,
  `specialitem` varchar(60) NOT NULL,
  `designation` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `specialite`
--

INSERT INTO `specialite` (`id`, `specialitem`, `designation`) VALUES
(1, 'TC', 'LAT'),
(2, 'SR', 'SR'),
(3, 'RST', 'RST');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_institutionnel` varchar(255) DEFAULT NULL,
  `semestre` int(255) DEFAULT NULL,
  `sexe` varchar(255) NOT NULL,
  `numcin` int(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `usertype` varchar(255) NOT NULL,
  `specialite_enseignant` varchar(255) DEFAULT NULL,
  `specialite_id` int(255) DEFAULT NULL,
  `etat` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_institutionnel`, `semestre`, `sexe`, `numcin`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `usertype`, `specialite_enseignant`, `specialite_id`, `etat`, `image`) VALUES
(1, 'admin', 'admin@admin.com', NULL, NULL, '', 20132101, NULL, '$2y$12$mHRH5gcDdq9qbUwuzsPz.Or/JGbosuP5tci1/a2jpc8ObBVjeR4R.', NULL, NULL, '2024-05-07 17:39:04', 'admin', NULL, 1, 'false', NULL),
(2, 'elhajjejmm', 'elhajjejm@gmail.com', 'elhajjejm@gmail.com', 3, '', 54515412, NULL, '$2y$10$Rc4DMRYRh.qmEf7VzIjr2uPMN/IdBeVrBzcVP0GuJ1tQ226caW4dK', NULL, NULL, '2024-04-24 12:00:29', 'enseignant', 'IA', 2, 'true', NULL),
(3, 'louhichi walid', 'louhichiwalid@yahoo.fr', NULL, 3, 'homme', 2012020, NULL, '$2y$12$oZuyayqWJ2nI69MeetQtS.CJ20xIx.I08HCmwuNYWrQ8wEPxtggTC', NULL, NULL, '2024-06-09 07:23:04', 'enseignant', 'Programmation web', NULL, 'false', '1717924984.png'),
(7, 'zidi amira', 'zidiamira290@gmail.com', NULL, 3, '', 10212331, NULL, '$2y$10$gidhLyTLLSmT25rxaqkd6OaHUplhiECCGdeyQ0KPAzOwLeGeYF35y', NULL, NULL, NULL, 'etudiant', NULL, 1, 'true', NULL),
(8, 'aida', 'aidazair@gmail.com', NULL, 2, '', 14512014, NULL, '$2y$12$Xh5/RLuRk5BPJoiSoCslXO/LoKkSiHMUKsn88omVTl4pIZI./AjIq', NULL, '2024-04-13 09:44:19', '2024-04-13 09:44:19', 'enseignant', NULL, 1, 'true', NULL),
(9, 'zakia', 'zakiajallali@gmail.com', NULL, 2, '', 10231215, NULL, '$2y$12$zEG3BvFDYIgDEDMXnwKdYup2EoLrSQkDNVGr7RPcfRnqaQE9VNk5C', NULL, '2024-04-13 09:47:39', '2024-04-13 09:47:39', 'enseignant', NULL, 1, 'true', NULL),
(10, 'asma asma', 'etudiant1@gmail.com', 'etudiant1@gmail.com', 3, 'homme', 12341312, NULL, '$2y$12$9U20tHO58rzrQrUmkJtfZeqPu7zazgnloStT3NOUxOXJ9Y1ZIsNAO', NULL, '2024-04-19 09:07:05', '2024-06-07 09:34:11', 'etudiant', NULL, 1, 'false', '1717759830.jfif'),
(11, 'etudiant 2', 'etudiant2@gmail.com', 'etudiant2@gmail.com', 2, '', 10214251, NULL, '$2y$12$Eb5Dz1yesoNTYS6tj3Xw4uLw2mwu0/dLZzNv1wC77OKMryn7jDsfO', NULL, '2024-04-24 13:02:52', '2024-04-24 13:02:52', 'etudiant', NULL, 3, 'true', NULL),
(28, 'aaa aa', 'aa@gmail.com', 'aa@gmail.com', 2, 'femme', 12345678, NULL, '$2y$12$Q0KkB/oqW15kn0s4OSotquhvSyZBlYZxlbrg1jVc5ZF7uTia7TZJG', NULL, '2024-06-08 07:31:27', '2024-06-08 07:35:03', 'etudiant', NULL, 2, 'false', NULL),
(31, 'etudiant 3', 'etudiant3@gmail.com', 'etudiant3@gmail.com', 5, 'femme', 14214232, NULL, '$2y$12$L/iZiKsGoWAYKHt2m/fhx.AskRLV8BSz3V/GUmJ5mutfzbDY6O0T6', NULL, '2024-06-09 10:22:14', '2024-06-09 10:23:12', 'etudiant', NULL, 3, 'false', NULL),
(32, 'etudiant 4', 'etudiant4@gmail.com', 'etudiant4@gmail.com', 5, 'homme', 10412341, NULL, '$2y$12$CUu/vE4L/TC69fOckqCws.UXt1VyNzoNJWVVPpPuRrT1O05SOWgEi', NULL, '2024-06-09 10:24:12', '2024-06-09 10:24:49', 'etudiant', NULL, 3, 'false', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `absences`
--
ALTER TABLE `absences`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `affectation`
--
ALTER TABLE `affectation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `affectationclassenseignants`
--
ALTER TABLE `affectationclassenseignants`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `affectationclassetudiants`
--
ALTER TABLE `affectationclassetudiants`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `affectationetud`
--
ALTER TABLE `affectationetud`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `demandes`
--
ALTER TABLE `demandes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `emplois`
--
ALTER TABLE `emplois`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `enseignant`
--
ALTER TABLE `enseignant`
  ADD PRIMARY KEY (`numcin`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`numcin`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `jours`
--
ALTER TABLE `jours`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `salles`
--
ALTER TABLE `salles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `seances`
--
ALTER TABLE `seances`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `specialite`
--
ALTER TABLE `specialite`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `absences`
--
ALTER TABLE `absences`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT pour la table `affectation`
--
ALTER TABLE `affectation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `affectationclassenseignants`
--
ALTER TABLE `affectationclassenseignants`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `affectationclassetudiants`
--
ALTER TABLE `affectationclassetudiants`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `affectationetud`
--
ALTER TABLE `affectationetud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `annonces`
--
ALTER TABLE `annonces`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `demandes`
--
ALTER TABLE `demandes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `emplois`
--
ALTER TABLE `emplois`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `jours`
--
ALTER TABLE `jours`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `matiere`
--
ALTER TABLE `matiere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `salles`
--
ALTER TABLE `salles`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `seances`
--
ALTER TABLE `seances`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `specialite`
--
ALTER TABLE `specialite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
