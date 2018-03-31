-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Lun 26 Mars 2018 à 14:53
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `portfolio_bibliotheque`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(10) NOT NULL,
  `pseudo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `commentaire` text COLLATE utf8_unicode_ci NOT NULL,
  `livre_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `pseudo`, `commentaire`, `livre_id`) VALUES
(1, 'VV', 'yeh', 5),
(2, 'VV', 'rgez', 5),
(3, 'VV', 'uihe', 5),
(4, 'VV', 'rio', 5),
(5, 'A', 'HFE', 5),
(6, 'A', 'HYEU', 5),
(7, 'A', 'UGIKE', 5),
(8, 'A', 'Apud has gentes.', 1),
(9, 'A', 'Quarum exordiens initium ab Assyriis ad Nili cataractas porrigitur et confinia Blemmyarum.', 1),
(10, 'B', 'Omnes pari sorte sunt bellatores seminudi coloratis sagulis pube tenus amicti', 1),
(11, 'B', 'In tranquillis vel turbidis rebus', 1),
(12, 'B', 'Nec eorum quisquam aliquando stivam.', 4),
(13, 'B', 'Adprehendit vel arborem colit aut arva subigendo quaeritat victum.', 7),
(14, 'B', 'Sed errant semper per spatia longe.', 10),
(15, 'B', 'Lateque distenta sine lare sine sedibus fixis aut legibus.', 2),
(16, 'd', 'Ateque distenta sine lare sine sedibus fixis aut legibus.', 7),
(17, 'd', 'Nec idem perferunt diutius caelum aut tractus unius soli illis umquam.', 7),
(18, 'd', 'Placet.', 7),
(19, 'd', 'Utque proeliorum periti rectores primo catervas densas opponunt et fortes, deinde leves armaturas.', 6),
(20, 'ss', 'Post iaculatores ultimasque subsidiales acies, si fors adegerit, iuvaturas.', 6),
(21, 's', 'Ita praepositis urbanae familiae suspensae digerentibus sollicite.', 6),
(22, 's', 'Quos insignes.', 6),
(23, 's', 'Data castrensi iuxta.', 6);

-- --------------------------------------------------------

--
-- Structure de la table `emprunts`
--

CREATE TABLE `emprunts` (
  `id` int(10) NOT NULL,
  `pseudo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `livre_id` int(10) NOT NULL,
  `date_depart` int(100) NOT NULL,
  `date_fin` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `emprunts`
--

INSERT INTO `emprunts` (`id`, `pseudo`, `livre_id`, `date_depart`, `date_fin`) VALUES
(48, 'TT', 4, 1520456552, 1523048552);

-- --------------------------------------------------------

--
-- Structure de la table `inscrits`
--

CREATE TABLE `inscrits` (
  `id` int(10) NOT NULL,
  `pseudo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(512) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `inscrits`
--

INSERT INTO `inscrits` (`id`, `pseudo`, `email`, `password`) VALUES
(1, 'A', 'A@gmail.com', '6dcd4ce23d88e2ee9568ba546c007c63d9131c1b'),
(2, 'B', 'B@gmail.com', 'ae4f281df5a5d0ff3cad6371f76d5c29b6d953ec'),
(3, 'd', 'd@gmail.com', '3c363836cf4e16666669a25da280a1865c2d2874'),
(4, 'e', 'e@gmail.com', '58e6b3a414a1e090dfc6029add0f3555ccba127f'),
(5, 'VV', 'V@gmail.com', 'c9ee5681d3c59f7541c27a38b67edf46259e187b'),
(7, 'ss', 'ss@gmail.com', 'c1c93f88d273660be5358cd4ee2df2c2f3f0e8e7'),
(8, 's', 's@gmail.com', 'a0f1490a20d0211c997b44bc357e1972deab8ae3'),
(9, 'TT', 'T@gmail.com', 'c2c53d66948214258a26ca9ca845d7ac0c17f8e7'),
(10, 'U', 'U@gmail.com', 'b2c7c0caa10a0cca5ea7d69e54018ae0c0389dd6');

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

CREATE TABLE `livres` (
  `id` int(10) NOT NULL,
  `titre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `auteur` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` int(10) NOT NULL,
  `url` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `livres`
--

INSERT INTO `livres` (`id`, `titre`, `auteur`, `nombre`, `url`) VALUES
(1, 'Scribe (La)', 'Antonio Garrido', 1, 'http://extranet.editis.com/it-yonixweb/IMAGES/PC/P3/9782258078154.JPG'),
(2, 'Lecteur de cadavres (Le)', 'Antonio Garrido', 5, 'https://images-na.ssl-images-amazon.com/images/I/91HaO8LOQqL.jpg'),
(3, 'Dernier paradis (Le)', 'Antonio Garrido', 11, 'https://images-na.ssl-images-amazon.com/images/I/51w2Dduxu0L._SX328_BO1,204,203,200_.jpg'),
(4, 'Deluge', 'Stephen Baxter', 2, 'http://extranet.editis.com/it-yonixweb/IMAGES/PC/P3/9782258079236.JPG'),
(5, 'Derniere Experience (La)', 'Annelie Wendeberg', 39, 'http://extranet.editis.com/it-yonixweb/IMAGES/PC/P3/9782258136960.JPG'),
(6, 'Reve de Galilee (Le)', 'Kim Stanley Robinson', 2, 'http://extranet.editis.com/it-yonixweb/IMAGES/PC/P3/9782258084803.JPG'),
(7, 'Promesse de Noel', 'Nora Roberts', 8, 'https://www.babelio.com/couv/11777_950513.jpeg'),
(8, 'Trois soeurs (Les)', 'Nora Roberts', 1, 'https://decitre.di-static.com/img/200x303/nora-roberts-les-trois-soeurs-integrale/9782290076286FS.gif'),
(9, 'Sous les flocons', 'Nora Roberts', 0, 'https://images-na.ssl-images-amazon.com/images/I/81SOfUS60AL.jpg'),
(10, 'Ombres dans la rue (Des)', 'Susan Hill', 3, 'http://extranet.editis.com/it-yonixweb/IMAGES/RL/P3/9782221125465.JPG');

-- --------------------------------------------------------

--
-- Structure de la table `vote`
--

CREATE TABLE `vote` (
  `id` int(10) NOT NULL,
  `pseudo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `likes` tinyint(1) NOT NULL,
  `dislikes` tinyint(1) NOT NULL,
  `livre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `vote`
--

INSERT INTO `vote` (`id`, `pseudo`, `likes`, `dislikes`, `livre_id`) VALUES
(1, 'A', 1, 0, 5),
(2, 'VV', 0, 1, 5),
(3, 'A', 1, 0, 8),
(5, 'A', 1, 0, 7),
(6, 'VV', 1, 0, 7),
(7, 'd', 1, 0, 8),
(8, 'd', 1, 0, 9),
(9, 'd', 1, 0, 7),
(10, 'd', 0, 1, 1),
(11, 'd', 1, 0, 3),
(12, 'e', 1, 0, 5),
(13, 'e', 1, 0, 7),
(14, 'e', 1, 0, 6),
(15, 'e', 0, 1, 9),
(16, 'e', 1, 0, 3),
(17, 'e', 1, 0, 8);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `livre_id` (`livre_id`);

--
-- Index pour la table `emprunts`
--
ALTER TABLE `emprunts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `inscrits`
--
ALTER TABLE `inscrits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `livres`
--
ALTER TABLE `livres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`id`),
  ADD KEY `livre_id` (`livre_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT pour la table `emprunts`
--
ALTER TABLE `emprunts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT pour la table `inscrits`
--
ALTER TABLE `inscrits`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `livres`
--
ALTER TABLE `livres`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `vote`
--
ALTER TABLE `vote`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `com` FOREIGN KEY (`livre_id`) REFERENCES `livres` (`id`);

--
-- Contraintes pour la table `vote`
--
ALTER TABLE `vote`
  ADD CONSTRAINT `vote` FOREIGN KEY (`livre_id`) REFERENCES `livres` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
