-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 18 Décembre 2015 à 17:09
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `toto`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `idRow` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`idRow`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`idRow`, `name`) VALUES
(1, 'Book'),
(2, 'Music');

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `idRow` int(11) NOT NULL AUTO_INCREMENT,
  `idProduct` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `alt` varchar(255) NOT NULL,
  PRIMARY KEY (`idRow`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Contenu de la table `images`
--

INSERT INTO `images` (`idRow`, `idProduct`, `name`, `alt`) VALUES
(1, 1, 'leCapitalAuXXI.jpg', 'toto'),
(2, 1, 'not-found.png', 'alt'),
(16, 1, 'Desert.jpg', 'titi'),
(25, 5, 'skap-99_0.jpg', 'Skap'),
(26, 5, 'Koala.jpg', 'tata'),
(30, 27, 'Chrysanthemum.jpg', 'flor'),
(31, 27, 'Penguins.jpg', 'pinginos');

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `idRow` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `longDescription` varchar(2000) NOT NULL,
  `price` varchar(25) NOT NULL,
  `idCategory` int(11) NOT NULL,
  PRIMARY KEY (`idRow`),
  KEY `idRow` (`idRow`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Contenu de la table `product`
--

INSERT INTO `product` (`idRow`, `name`, `description`, `longDescription`, `price`, `idCategory`) VALUES
(1, 'Le capital au XXIe siècle', 'La répartition des richesses est l''une des questions les plus vives et les plus débattues aujourd''hui. Mais que sait-on vraiment de son évolution sur le long terme ? La dynamique de l''accumulation du capital engendre-t-elle inévitablement sa concentration toujours plus forte entre quelques mains, comme', 'La répartition des richesses est l''une des questions les plus vives et les plus débattues aujourd''hui. Mais que sait-on vraiment de son évolution sur le long terme ? La dynamique de l''accumulation du capital engendre-t-elle inévitablement sa concentration toujours plus forte entre quelques mains, comme l''a pensé Marx au XIXe siècle ? Ou bien les forces équilibrantes de la croissance, de la concurrence et du progrès technique conduisent-elles spontanément à une réduction des inégalités et à une harmonieuse stabilisation dans les phases avancées du développement, comme l''a cru Kuznets au XXe siècle ? Ce livre tente de répondre à ces questions à partir de données historiques et comparatives beaucoup plus étendues que toutes les études antérieures.\r\nParcourant trois siècles et plus de vingt pays, il offre une perspective inédite sur les tendances à l''oeuvre et un cadre théorique renouvelé pour en comprendre les mécanismes. Dès lors que le taux de rendement du capital dépasse durablement le taux de croissance de la production et du revenu - ce qui était le cas jusqu''au XIXe siècle, et risque fort de redevenir la norme au XXIe siècle -, alors le capitalisme produit mécaniquement des inégalités insoutenables, arbitraires, remettant radicalement en cause les valeurs méritocratiques sur lesquelles se fondent nos sociétés démocratiques.\r\nDes moyens existent pour inverser cette tendance, tout en repoussant les replis nationalistes ou totalitaires, mais la voie est étroite.', '25.00', 1),
(2, 'Le Capital', 'Le Capital aujourd''hui', 'Voici une des oeuvres maîtresses de l''histoire de la pensée. Très nom­breux sont ceux qui connaissent l''existence de ce livre ; beaucoup moins nombreux ceux qui l''ont vraiment lu et étudié. Cela tient non seulement à l''ampleur de la tâche, mais aussi à certaines résistances idéologiques. L''analyse de Marx remet en effet radicalement en cause les idées reçues et les certitudes sur lesquelles sont bâties la société actuelle, mais aussi la vie et la carrière de certains des lecteurs potentiels qui sont intéressés au maintien du système... Pour d''autres lecteurs, par contre, pour les salariés (les «prolétaires», c''est-à-dire tous ceux qui sont contraints de vendre leur force de travail pour vivre), cet ouvrage scientifique qui peut paraître (surtout au début) d''une grande abstraction, est d''une portée concrète immense.\r\nDepuis sa parution, les tentatives de réfutation du Capital n''ont pas manqué, et, plus encore, les déclarations péremptoires annonçant périodiquement que Marx était mort et enterré. Chaque fois, les phases de croissance économique et d''extension de la consommation (qui font pourtant partie du cycle normal du capitalisme) ou les avancées tech­nologiques ont permis à des idéologues d''imaginer qu''ils avaient dé­passé Marx. Mais aujourd''hui, la nouvelle crise du capitalisme (qui fait suite au chant du coq des tenants de la soi-disant «économie de mar­ché» mondialisée qui pensaient en avoir fini pour toujours avec le spectre du communisme et du socialisme) rappelle brutalement que le capitalisme est toujours le capitalisme et qu''il est toujours en proie aux contradictions décrites avec brio par Marx.\r\nAu point qu''on peut aujourd''hui parler d''un «retour de Marx». (Même s''il y a chez beaucoup de commentateurs la tentation d''enfermer Marx dans son cabinet de travail, en oubliant le révolutionnaire qu il a été et en cherchant surtout à l''opposer au mouvement communiste et aux différents courants marxistes qu''il a inspirés).', '1.99', 1),
(3, 'Manifeste du Parti communiste', 'Vous êtes saisis d''horreur parce que nous voulons abolir la propriété privée. Mais, dans votre société actuelle, la propriété privée est abolie pour les neuf dixièmes de ses membres : si cette société existe, c''est précisément parce qu''elle n''existe pas pour ces neuf dixièmes. Vous nous reprochez donc de ', 'Vous êtes saisis d''horreur parce que nous voulons abolir la propriété privée. Mais, dans votre société actuelle, la propriété privée est abolie pour les neuf dixièmes de ses membres : si cette société existe, c''est précisément parce qu''elle n''existe pas pour ces neuf dixièmes. Vous nous reprochez donc de vouloir abolir une forme de propriété qui a pour condition nécessaire que l''immense majorité de la société soit frustrée de toute propriété. En un mot, vous nous accusez de vouloir abolir votre propriété à vous. En vérité, c''est bien ce que nous voulons. " Publié pour la première fois en février 1848 à Londres, le Manifeste de Marx et Engels, à l''écriture si rigoureuse et tranchante, n''a rien perdu de sa vigueur critique ni de son intérêt philosophique.', '3.90', 1),
(4, 'Todo Ska-P', 'etrouvez leurs morceaux les plus emblématiques\r\n+ 11 clips\r\n+ le Live mythique inédit enregistré à la Fête de l''Huma en 2001 !', '5 ans après leur dernier album (écoulé en France à 25 000 exemplaires),\r\nSka-P revient avec leur premier Best Of et avec une nouvelle tournée Européenne', '10.32', 2),
(5, '99%--', 'rien a redire Ã©videmment il faut aimer Ska p et leur musique mais surtout prendre les paroles au 2eme degrÃ©s .Sinon s est super', 'Enfin le nouvel album de ska-p! Excellent, superbes musique et paroles, vous allez adorer! On retrouve toute leur Ã©nergie! Du pur bonheur...', '8.37', 2),
(27, 'Produit Test', 'Voici la description de produit', 'Ici la description longe de produir , pingüinos éàè', '10', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `idRow` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `idRoll` int(11) NOT NULL DEFAULT '2',
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sexe` varchar(25) NOT NULL,
  `date` varchar(25) NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`idRow`),
  UNIQUE KEY `user` (`user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`idRow`, `user`, `pass`, `name`, `idRoll`, `lastName`, `email`, `sexe`, `date`, `address`) VALUES
(1, 'admin', 'admin', 'Admin', 1, '', '', '', '', ''),
(2, 'user', 'user', 'Test user', 2, 'user', 'Test@test.test', '0', '20/20/2015', 'toto');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
