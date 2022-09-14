-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 07 nov. 2021 à 10:18
-- Version du serveur :  8.0.21
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `mat_ad` varchar(90) NOT NULL,
  `nom_ad` varchar(100) NOT NULL,
  `prenom_ad` varchar(255) NOT NULL,
  `adresse` varchar(80) NOT NULL,
  `sexe_ad` varchar(90) NOT NULL,
  `pwd` varchar(70) NOT NULL,
  PRIMARY KEY (`mat_ad`(70)),
  UNIQUE KEY `adresse` (`adresse`(70))
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`mat_ad`, `nom_ad`, `prenom_ad`, `adresse`, `sexe_ad`, `pwd`) VALUES
('balloadmin', 'ballo', 'ibrahim', 'allahballo@hotmail.com', 'homme', 'ballo'),
('admin01', 'sudo ballo ', 'sudo ibrahim ', 'allahballoadmin15@gmail.com', 'homme', 'admin'),
('ballo07', 'ballo', 'aminata', 'allahballo@gmail.com', 'Femme', 'ballo');

-- --------------------------------------------------------

--
-- Structure de la table `document`
--

DROP TABLE IF EXISTS `document`;
CREATE TABLE IF NOT EXISTS `document` (
  `code_doc` varchar(60) NOT NULL,
  `titre_doc` varchar(195) NOT NULL,
  `nbpage` int NOT NULL,
  `auteur_doc` varchar(160) NOT NULL,
  `nbex` int DEFAULT NULL,
  `image_doc` varchar(130) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `descr_doc` varchar(10000) DEFAULT NULL,
  PRIMARY KEY (`code_doc`),
  UNIQUE KEY `codedoc_UNIQUE` (`code_doc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `document`
--

INSERT INTO `document` (`code_doc`, `titre_doc`, `nbpage`, `auteur_doc`, `nbex`, `image_doc`, `descr_doc`) VALUES
('amour_ref_secret_am_afri 01', 'le secret de l\'amour à l\'africaine', 140, 'nsekuye evzimana', 25, '../images/amour/le_secret_am.jfif', '										le livre a l\'image de l\'afrique										'),
('conte_coumba_mamadou_samb01', 'coumba l\'orpheline', 125, 'Mamadou samb', 55, '../images/conte/coumba_ct.jfif', 'une orpheline devenu reine en pays manding'),
('conte_michel_oceloi_01', 'kirikou et la sorcière', 90, 'michel oceloi', 40, '../images/conte/kirikou_ct.jfif', 'kirikou le petit courageux '),
('doc_hgt9', 'tout', 3455, '9kdfgnnjmgf', 456, '../images/amour/passion_cannelle_am.jfif', 'ok je vois'),
('doc_hgt9458', 'le monde pleure', 659, 'test', 996, '../images/amour/sorcelerie_am.JFIF', 'youri'),
('inf.reseau', 'reseau informatique', 659, 'jose', 23, '../images/informatique/reseaux_inf.JFIF', 'maitriser les reseaux informatiques en premiere place'),
('inf_administration012', 'administration reseau sous linux', 234, 'Oreli', 36, '../images/informatique/linux_inf.jfif', 'un livre pour apprendre a administrer un reseau sous linux '),
('inf_hacking01', 'Hacking et contre-hacking', 200, 'roger A.Grimes', 12, '../images/informatique/hack_inf.jfif', 'un livre les devenir experts en hacking'),
('plo029', 'lundi', 659, 'hugo boss', 38, '../images/politique/argent_politique.JFIF', 'wdwd'),
('ploObama', 'audace d\'espoir', 300, 'barack obama', 20, '../images/politique/audace_pol.JFIF', 'un livre a son image'),
('sport_vaudou_soccer_01', 'VAUDOU SOCCCER', 60, 'l\'auteur n\'est enregistré', 24, '../images/sport/voudou_scocer_sp.JFIF', 'la magie dans le football africain');

-- --------------------------------------------------------

--
-- Structure de la table `emprunter`
--

DROP TABLE IF EXISTS `emprunter`;
CREATE TABLE IF NOT EXISTS `emprunter` (
  `PERSONNE_mat_pers` varchar(60) NOT NULL,
  `PERSONNE_GROUPE_code_grp` varchar(60) NOT NULL,
  `DOCUMENT_code_doc` varchar(60) NOT NULL,
  `date_sortie` date DEFAULT NULL,
  `date_retour` date DEFAULT NULL,
  PRIMARY KEY (`PERSONNE_mat_pers`,`PERSONNE_GROUPE_code_grp`,`DOCUMENT_code_doc`),
  KEY `fk_PERSONNE_has_DOCUMENT_DOCUMENT1_idx` (`DOCUMENT_code_doc`),
  KEY `fk_PERSONNE_has_DOCUMENT_PERSONNE1_idx` (`PERSONNE_mat_pers`,`PERSONNE_GROUPE_code_grp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `emprunter`
--

INSERT INTO `emprunter` (`PERSONNE_mat_pers`, `PERSONNE_GROUPE_code_grp`, `DOCUMENT_code_doc`, `date_sortie`, `date_retour`) VALUES
('               0934person56', 'groupe08', 'amour_ref_secret_am_afri 01', '2021-05-12', '0000-00-00'),
('               0934person56', 'groupe08', 'conte_coumba_mamadou_samb01', '2021-05-08', '2021-05-26'),
('ballo09', '03livre', 'amour_ref_secret_am_afri 01', '2021-05-06', '2021-05-06'),
('ballo09', '03livre', 'conte_coumba_mamadou_samb01', '2021-05-06', '2021-05-06'),
('ballo09', '03livre', 'conte_michel_oceloi_01', '2021-05-06', '0000-00-00'),
('ballo09', '03livre', 'doc_hgt9458', '2021-05-06', '0000-00-00'),
('ballo09', '03livre', 'inf_administration012', '2021-05-06', '0000-00-00'),
('heri', '03livre', 'inf_administration012', '2021-05-31', '0000-00-00'),
('jayo', '03livre', 'inf.reseau', '2021-05-28', '0000-00-00'),
('jule09', '01livre', 'doc_hgt9458', '2021-04-20', '0000-00-00'),
('jule09', '01livre', 'inf.reseau', '2021-04-20', NULL),
('jule09', '01livre', 'plo029', '2020-04-21', '2021-04-28'),
('user013', 'groupe08', 'amour_ref_secret_am_afri 01', '2021-05-31', '2021-05-31'),
('user013', 'groupe08', 'doc_hgt9', '2021-05-17', '2021-05-28'),
('user013', 'groupe08', 'inf_administration012', '2021-05-28', '2021-06-06'),
('user08', '04livre', 'amour_ref_secret_am_afri 01', '2021-04-27', '2021-04-27'),
('user08', '04livre', 'doc_hgt9', '2021-05-31', '0000-00-00'),
('user08', '04livre', 'doc_hgt9458', '2021-06-20', '0000-00-00'),
('user08', '04livre', 'inf.reseau', '2021-04-22', '2021-04-27'),
('user08', '04livre', 'inf_administration012', '2021-04-29', '0000-00-00'),
('user08', '04livre', 'inf_hacking01', '2021-04-29', '0000-00-00'),
('user08', '04livre', 'plo029', '2021-05-29', '0000-00-00'),
('user08', '04livre', 'ploObama', '2021-04-27', '2021-04-28'),
('user08', '04livre', 'sport_vaudou_soccer_01', '2021-05-18', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

DROP TABLE IF EXISTS `genre`;
CREATE TABLE IF NOT EXISTS `genre` (
  `type` varchar(130) NOT NULL,
  `dossier` varchar(255) NOT NULL,
  PRIMARY KEY (`type`(70)),
  UNIQUE KEY `dossier` (`dossier`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `genre`
--

INSERT INTO `genre` (`type`, `dossier`) VALUES
('politique', '../images/politique/'),
('amour', '../images/amour/'),
('informatique', '../images/informatique/'),
('conte', '../images/conte/'),
('autre', '../images/autre/'),
('jeux', '../images/jeux/'),
('islam', '../images/islam'),
('sport', '../images/sport');

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

DROP TABLE IF EXISTS `groupe`;
CREATE TABLE IF NOT EXISTS `groupe` (
  `code_grp` varchar(60) NOT NULL,
  `libelle_grp` varchar(300) NOT NULL,
  PRIMARY KEY (`code_grp`),
  UNIQUE KEY `codedoc_UNIQUE` (`code_grp`),
  UNIQUE KEY `libelledoc_UNIQUE` (`libelle_grp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `groupe`
--

INSERT INTO `groupe` (`code_grp`, `libelle_grp`) VALUES
('04livre', 'enfants'),
('01livre', 'jeunesse'),
('islam01', 'le groupe islamique '),
('groupe08', 'littéraire'),
('03livre', 'scientifique');

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

DROP TABLE IF EXISTS `personne`;
CREATE TABLE IF NOT EXISTS `personne` (
  `mat_pers` varchar(60) NOT NULL,
  `nom_pers` varchar(105) NOT NULL,
  `prenom_pers` varchar(190) NOT NULL,
  `email_pers` varchar(100) NOT NULL,
  `tel_pers` varchar(60) NOT NULL,
  `sexe_pers` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `photo_pers` varchar(500) DEFAULT NULL,
  `GROUPE_code_grp` varchar(60) NOT NULL,
  `pwd` varchar(130) NOT NULL,
  PRIMARY KEY (`mat_pers`,`GROUPE_code_grp`),
  UNIQUE KEY `matpers_UNIQUE` (`mat_pers`),
  KEY `fk_PERSONNE_GROUPE_idx` (`GROUPE_code_grp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`mat_pers`, `nom_pers`, `prenom_pers`, `email_pers`, `tel_pers`, `sexe_pers`, `photo_pers`, `GROUPE_code_grp`, `pwd`) VALUES
('               0934person56', '               jojo boss ', '               boris foka', '               jojboris34@gmai.com', '               763457 6734634673', 'Homme', '               C:fakepathagendrix.JPG', 'groupe08', 'boris'),
('  0098pers', ' kati', ' loko', 'katiloko@gmail.com', '  4346765645322', 'Femme', '  r4wadr3qfq3f34cc34f', '04livre', ''),
('  personn43', '  junior modification', '  kaba', '  kabajunior@gmail.com', '  736 9389 09239', 'Homme', '  C:fakepathagendrix.JPG', '01livre', ''),
(' perso898978', ' junior08', ' kaba', ' kabajunior@gmail.com', ' 736 9389 09239', 'Homme', ' C:fakepathagendrix.JPG', '01livre', ''),
('ballo09', 'ballo', 'ibrahim', 'ibrahimballo@gmail.com', '0777131204', 'Homme', 'aucune image choisie', '03livre', 'ballo'),
('brice06', 'fofana', 'brice', 'fofan@gmail.com', '225 7789 098 87', 'Homme', 'C:fakepathCapture7.PNG', '04livre', 'brice'),
('brico012', 'gnaore', ' brice brico', 'bricognawa@gmail.com', '2347589425', 'Homme', 'aucune image choisie', '03livre', '$affiche_pers[\'pwd\']'),
('fofana35', 'fofana', 'dioplii', 'fofanadiopli@hotmail.com', '234567890', 'Homme', 'aucune image choisie', '01livre', 'fofana'),
('heri', 'gogo', 'franck', 'gogofranck@gmail.com', '0777131204', 'Homme', 'aucune image choisie', '03livre', 'heri'),
('jayo', 'jayo', 'aicha', 'aichajaiyeola98@gkail.com', '0140829783', 'Femme', 'aucune image choisie', '03livre', '40829783'),
('jule09', 'jule', 'kouakaou', 'julekaoi@gmail.com', '2389048859', 'Homme', 'aucune image choisie', '01livre', 'jule'),
('us9ikopsprer', 'userudo098NOMx', 'useudo098PRENOMkl', 'useretudxcxsds98@GMAIL.COM', '09983487934', 'Femme', 'aucune image choisie', '04livre', 'USER'),
('user013', 'nomuser ballo', ' prenomuser', 'usermon@gmail.com', '7709887623', 'Homme', 'aucune image choisie', 'groupe08', '$affiche_pers[\'pwd\']'),
('user08', 'DLKSFKLD', 'VERGTR', 'EG5EYTHBHGB', '43467656453', 'homme', 'DFDZERFRF', '04livre', 'USER'),
('user09ikopsp', 'userudo098NOMx', 'useudo098PRENOMkl', 'useretudxcxo098@GMAIL.COM', '099893783', 'Femme', 'Femme', '04livre', 'USER'),
('USER23', 'FUN', 'DEFUI', 'IUUIEIU@jhhdf.com', '5677689897', 'Homme', 'aucune image choisie', 'groupe08', 'user'),
('user30', 'jule', ' henri patirck', 'EG5EYTHBHGBDEF@gnj.com', '4346909535', 'Homme', 'aucune image choisie', '04livre', '$affiche_pers[\'pwd\']'),
('USER546', 'DLKSDLPLL;LDFUSER546', 'VERDLJKDFUSER546', 'EG5EYVFVKJJLDKJDUSER546', '43467667683548', 'homme', 'DFDZERFRFUSER546', '04livre', 'USER'),
('usernan', 'koijoi', 'yao', 'koijoiyao@gmail.com', '010432568', 'Homme', 'aucune image choisie', 'groupe08', 'usernan'),
('usernO', 'nomuser ballo', 'yao', 'userinscrisprenomuserinscris@gmail.com', '7890456787', 'Homme', 'aucune image choisie', '01livre', 'USER'),
('userps09', 'userpseudo098NOM', 'userpseudo098PRENOM', 'EG5EYVFV3783', '4367623545', 'Homme', 'DFDZERFRFUSER46', '04livre', 'USER'),
('userPSEUDO', 'DLKSDLPLL;LDF', 'VERDLJKDF', 'EG5EYVFVKJJLDKJD', '43467667683', 'homme', 'DFDZERFRF', '04livre', 'USER'),
('userpseudonew', 'userpseudoNOM', 'userpseudoPRENOM', 'EG5EYVFVK893783', '43467667623545', 'Femme', 'DFDZERFRFUSER546', '04livre', 'USER');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `emprunter`
--
ALTER TABLE `emprunter`
  ADD CONSTRAINT `fk_PERSONNE_has_DOCUMENT_DOCUMENT1` FOREIGN KEY (`DOCUMENT_code_doc`) REFERENCES `document` (`code_doc`),
  ADD CONSTRAINT `fk_PERSONNE_has_DOCUMENT_PERSONNE1` FOREIGN KEY (`PERSONNE_mat_pers`,`PERSONNE_GROUPE_code_grp`) REFERENCES `personne` (`mat_pers`, `GROUPE_code_grp`);

--
-- Contraintes pour la table `personne`
--
ALTER TABLE `personne`
  ADD CONSTRAINT `fk_PERSONNE_GROUPE` FOREIGN KEY (`GROUPE_code_grp`) REFERENCES `groupe` (`code_grp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
