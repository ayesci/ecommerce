-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 20 Mars 2015 à 16:02
-- Version du serveur: 5.5.40-0ubuntu0.14.04.1
-- Version de PHP: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `ecommerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `parent` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=armscii8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent`) VALUES
(1, 'A', 0),
(2, 'B', 0),
(3, 'AA-1', 1),
(4, 'BB', 2),
(5, 'AA-2', 1),
(6, 'C', 0),
(7, 'CC-1', 6);

-- --------------------------------------------------------

--
-- Structure de la table `comm`
--

CREATE TABLE IF NOT EXISTS `comm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` text CHARACTER SET armscii8 NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `title` text CHARACTER SET armscii8 NOT NULL,
  `content` text CHARACTER SET armscii8 NOT NULL,
  `parent` int(11) NOT NULL,
  `note` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `comm`
--

INSERT INTO `comm` (`id`, `author`, `date`, `title`, `content`, `parent`, `note`) VALUES
(4, '1', '2015-03-10 14:18:18', 'Bien', 'bien', 1, 0),
(5, '1', '2015-03-10 14:22:32', 'coucou', 'coucou c''est nous.', 1, 0),
(6, '1', '2015-03-10 14:43:05', 'Excellent', 'Excellent\n', 1, 5);

-- --------------------------------------------------------

--
-- Structure de la table `facturation`
--

CREATE TABLE IF NOT EXISTS `facturation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `nbr_street` int(11) NOT NULL,
  `street` text NOT NULL,
  `postCode` int(11) NOT NULL,
  `city` text NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=armscii8 AUTO_INCREMENT=34 ;

--
-- Contenu de la table `facturation`
--

INSERT INTO `facturation` (`id`, `firstname`, `lastname`, `nbr_street`, `street`, `postCode`, `city`, `user_id`) VALUES
(29, 'Arthur', 'H', 12, 'rue Ren? Clair', 75018, 'PARIS', 0),
(30, 'Arthur', 'H', 12, 'rue Ren? Clair', 75018, 'PARIS', 12),
(31, 'Arthur', 'H', 12, 'rue Ren? Clair', 75018, 'PARIS', 12),
(32, 'Bob', 'Durand', 12, 'rue Ren? Clair', 75018, 'PARIS', 11),
(33, '', '', 0, '', 0, '', 11);

-- --------------------------------------------------------

--
-- Structure de la table `img`
--

CREATE TABLE IF NOT EXISTS `img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `picture` varchar(255) NOT NULL,
  `parent` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `img`
--

INSERT INTO `img` (`id`, `picture`, `parent`) VALUES
(1, 'picture/S19327_01_laydown.jpg', 1),
(2, 'picture/S19327_02_laydown.jpg', 1),
(3, 'picture/S19327_06_standard.jpg', 1),
(4, 'picture/S19327_23_model.jpg', 1),
(5, 'picture/S19327_44_detail.jpg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

CREATE TABLE IF NOT EXISTS `livraison` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` text CHARACTER SET armscii8 NOT NULL,
  `lastname` text CHARACTER SET armscii8 NOT NULL,
  `nbr_street` int(11) NOT NULL,
  `street` text CHARACTER SET armscii8 NOT NULL,
  `postCode` int(11) NOT NULL,
  `city` text CHARACTER SET armscii8 NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Contenu de la table `livraison`
--

INSERT INTO `livraison` (`id`, `firstname`, `lastname`, `nbr_street`, `street`, `postCode`, `city`, `user_id`) VALUES
(29, 'Arthur', 'H', 12, 'rue Ren? Clair', 75018, 'PARIS', 0),
(30, 'Arthur', 'H', 12, 'rue Ren? Clair', 75018, 'PARIS', 12),
(31, 'Arthur', 'H', 12, 'rue Ren? Clair', 75018, 'PARIS', 12),
(32, 'Bob', 'Durand', 12, 'rue Ren? Clair', 75018, 'PARIS', 11),
(33, '', '', 0, '', 0, '', 11);

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE IF NOT EXISTS `panier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_id` text CHARACTER SET armscii8 NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Contenu de la table `panier`
--

INSERT INTO `panier` (`id`, `product_id`, `user_id`, `quantity`) VALUES
(27, 9, '11', 2),
(28, 11, '11', 1),
(29, 13, '11', 1),
(30, 2, '12', 1),
(31, 9, '12', 3),
(32, 13, '12', 1);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_product` varchar(255) NOT NULL,
  `category` varchar(64) NOT NULL,
  `ref` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `owner` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `products`
--

INSERT INTO `products` (`id`, `name_product`, `category`, `ref`, `picture`, `description`, `price`, `owner`) VALUES
(1, 'product1', 'A', '1A', 'picture/musicalive.png', 'Et Epigonus quidem amictu tenus philosophus, ut apparuit, prece frustra temptata, sulcatis lateribus mortisque metu admoto turpi confessione cogitatorum socium, quae nulla erant, fuisse firmavit cum nec vidisset quicquam nec audisset penitus expers forensium rerum; Eusebius vero obiecta fidentius negans, suspensus in eodem gradu constantiae stetit latrocinium illud esse, non iudicium clamans.', 15, 'Dupont'),
(2, 'product2', 'A', '2A', 'picture/eye.png', 'Tantum autem cuique tribuendum, primum quantum ipse efficere possis, deinde etiam quantum ille quem diligas atque adiuves, sustinere. Non enim neque tu possis, quamvis excellas, omnes tuos ad honores amplissimos perducere, ut Scipio P. Rupilium potuit consulem efficere, fratrem eius L. non potuit. Quod si etiam possis quidvis deferre ad alterum, videndum est tamen, quid ille possit sustinere.', 120, 'Martine'),
(3, 'product1', 'B', '1B', 'picture/Gnome.png', 'Nec minus feminae quoque calamitatum participes fuere similium. nam ex hoc quoque sexu peremptae sunt originis altae conplures, adulteriorum flagitiis obnoxiae vel stuprorum. inter quas notiores fuere Claritas et Flaviana, quarum altera cum duceretur ad mortem, indumento, quo vestita erat, abrepto, ne velemen quidem secreto membrorum sufficiens retinere permissa est. ideoque carnifex nefas admisisse convictus inmane, vivus exustus est.', 13, 'Arthur'),
(9, 'product4', 'B', '4B', 'picture/freelancer.png', 'Eodem tempore etiam Hymetii praeclarae indolis viri negotium est actitatum, cuius hunc novimus esse textum. cum Africam pro consule regeret Carthaginiensibus victus inopia iam lassatis, ex horreis Romano populo destinatis frumentum dedit, pauloque postea cum provenisset segetum copia, integre sine ulla restituit mora.', 56, 'Dupont'),
(11, 'product7', 'A', '7A', 'picture/3Wacademy.gif', 'Excogitatum est super his, ut homines quidam ignoti, vilitate ipsa parum cavendi ad colligendos rumores per Antiochiae latera cuncta destinarentur relaturi quae audirent. hi peragranter et dissimulanter honoratorum circulis adsistendo pervadendoque divites domus egentium habitu quicquid noscere poterant vel audire latenter intromissi per posticas in regiam nuntiabant, id observantes conspiratione concordi, ut fingerent quaedam et cognita duplicarent in peius, laudes vero supprimerent Caesaris, quas invitis conpluribus formido malorum inpendentium exprimebat.', 220, 'Dupont'),
(12, 'product5', 'C', '5C', 'picture/life-of-pi-blu-ray-dvd-LOP-068_rgb.jpg', 'Nihil morati post haec militares avidi saepe turbarum adorti sunt Montium primum, qui divertebat in proximo, levi corpore senem atque morbosum, et hirsutis resticulis cruribus eius innexis divaricaturn sine spiramento ullo ad usque praetorium traxere praefec', 125, 'Martine'),
(13, 'product6', 'C', '6A', 'picture/Image.Fond.jpg', '', 15, '');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(13) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `phone`) VALUES
(10, 'victor', '$2y$10$kIErowK9NQOYG7abaqj8mOORYMOoXto1S7bp.Dvw.dMugQGpzOydq', 'victor@email.com', ''),
(11, 'Bob', '$2y$10$POoqagURtHYAD5DNdGIjIOA9A7.2qU7F85GItaRP8SGH99I57Tin6', 'bob@email.com', ''),
(12, 'arthur', '$2y$10$hLZSMkTrlWF11EXgUia9DO80ag.NPZ3ib9gh1tnwm6DL1jeqyfgo.', 'arthur@email.com', '0231456987');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
