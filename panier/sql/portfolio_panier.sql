-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Lun 26 Mars 2018 à 14:50
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `portfolio_panier`
--

-- --------------------------------------------------------

--
-- Structure de la table `achats`
--

CREATE TABLE `achats` (
  `id` int(10) NOT NULL,
  `pseudo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `achats` text COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `achats`
--

INSERT INTO `achats` (`id`, `pseudo`, `achats`, `date`) VALUES
(1, 'aha', 'O:8:"stdClass":4:{s:3:"nom";s:20:"ordinateur portable1";s:4:"prix";s:3:"500";s:5:"image";s:11:"laptop1.jpg";s:8:"quantity";i:4;}', '2017-11-28 15:09:00'),
(2, 'aha', 'O:8:"stdClass":4:{s:3:"nom";s:20:"ordinateur portable2";s:4:"prix";s:3:"550";s:5:"image";s:11:"laptop2.jpg";s:8:"quantity";i:2;}', '2017-11-28 15:09:00'),
(3, 'aha', 'O:8:"stdClass":4:{s:3:"nom";s:7:"iPhone1";s:4:"prix";s:3:"800";s:5:"image";s:11:"iphone1.jpg";s:8:"quantity";i:2;}', '2017-11-28 22:27:11'),
(4, 'aha', 'O:8:"stdClass":4:{s:3:"nom";s:16:"boeuf bourguigon";s:4:"prix";s:1:"8";s:5:"image";s:21:"boeuf-bourguignon.jpg";s:8:"quantity";i:4;}', '2017-12-24 13:48:32'),
(5, 'aha', 'O:8:"stdClass":4:{s:3:"nom";s:16:"boeuf bourguigon";s:4:"prix";s:1:"8";s:5:"image";s:21:"boeuf-bourguignon.jpg";s:8:"quantity";i:3;}', '2017-12-24 13:54:55'),
(6, 'voea', 'O:8:"stdClass":4:{s:3:"nom";s:16:"boeuf bourguigon";s:4:"prix";s:1:"8";s:5:"image";s:21:"boeuf-bourguignon.jpg";s:8:"quantity";i:1;}', '2017-12-24 13:57:21');

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(5) NOT NULL,
  `nom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `prix` int(100) NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id`, `nom`, `prix`, `image`, `description`) VALUES
(1, 'ordinateur portable1', 500, 'laptop1.jpg', 'Quam ob rem cave Catoni anteponas ne istum quidem ipsum, quem Apollo, ut ais, sapientissimum iudicavit; huius enim facta, illius dicta laudantur. De me autem, ut iam cum utroque vestrum loquar, sic habetote.'),
(2, 'ordinateur portable2', 550, 'laptop2.jpg', 'Batnae municipium in Anthemusia conditum Macedonum manu priscorum ab Euphrate flumine brevi spatio disparatur, refertum mercatoribus opulentis, ubi annua sollemnitate prope Septembris initium mensis ad nundinas magna promiscuae fortunae convenit multitudo ad commercanda quae Indi mittunt et Seres aliaque plurima vehi terra marique consueta.'),
(3, 'camera', 700, 'camera.jpg', 'Quibus occurrere bene pertinax miles explicatis ordinibus parans hastisque feriens scuta qui habitus iram pugnantium concitat et dolorem proximos iam gestu terrebat sed eum in certamen alacriter consurgentem revocavere ductores rati intempestivum anceps subire certamen cum haut longe muri distarent, quorum tutela securitas poterat in solido locari cunctorum.'),
(4, 'iMac', 1800, 'iMac.jpg', 'Iamque non umbratis fallaciis res agebatur, sed qua palatium est extra muros, armatis omne circumdedit. ingressusque obscuro iam die, ablatis regiis indumentis Caesarem tunica texit et paludamento communi, eum post haec nihil passurum velut mandato principis iurandi crebritate confirmans et statim inquit exsurge et inopinum carpento privato inpositum ad Histriam duxit prope oppidum Polam, ubi quondam peremptum Constantini filium accepimus Crispum.'),
(5, 'iPhone1', 800, 'iphone1.jpg', 'Post haec Gallus Hierapolim profecturus ut expeditioni specie tenus adesset, Antiochensi plebi suppliciter obsecranti ut inediae dispelleret metum, quae per multas difficilisque causas adfore iam sperabatur, non ut mos est principibus, quorum diffusa potestas localibus subinde medetur aerumnis, disponi quicquam statuit vel ex provinciis alimenta transferri conterminis, sed consularem Syriae Theophilum prope adstantem ultima metuenti multitudini dedit id adsidue replicando quod invito rectore nullus egere poterit victu.'),
(6, 'iPhone2', 900, 'iphone2.jpg', 'Erat autem diritatis eius hoc quoque indicium nec obscurum nec latens, quod ludicris cruentis delectabatur et in circo sex vel septem aliquotiens vetitis certaminibus pugilum vicissim se concidentium perfusorumque sanguine specie ut lucratus ingentia laetabatur.'),
(7, 'Voiture', 21000, 'car.png', 'vroumm!'),
(8, 'boeuf bourguigon', 8, 'boeuf-bourguignon.jpg', 'Du bon boeuf ,mijot&eacute;.');

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `id` int(11) NOT NULL,
  `gender` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pseudo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `newsletter` tinyint(1) NOT NULL,
  `argent` int(100) NOT NULL,
  `statut` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date` int(100) DEFAULT NULL,
  `token` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `membres`
--

INSERT INTO `membres` (`id`, `gender`, `pseudo`, `email`, `password`, `newsletter`, `argent`, `statut`, `date`, `token`) VALUES
(3, 'Femme', 'voea', 'v@gmail.com', '2395a39cd8db2543f2b248dee57d93a17f253f30', 1, 9992, 'membre', NULL, NULL),
(4, 'Femme', 'aha', 'a@gmail.com', '70c881d4a26984ddce795f6f71817c9cf4480e79', 1, 5244, 'administrateur', NULL, NULL),
(7, 'Femme', 'ddrf', 'd@gmail.com', 'c1c93f88d273660be5358cd4ee2df2c2f3f0e8e7', 1, 10000, 'membre', NULL, NULL),
(8, 'Homme', 'voy', 'b@gmail.com', '614e00a6cf5e0a27838ec055ff89e945f681054f', 1, 10000, 'membre', NULL, NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `achats`
--
ALTER TABLE `achats`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `achats`
--
ALTER TABLE `achats`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
