-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Sam 17 Décembre 2016 à 22:28
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gsb_frais`
--
DROP DATABASE IF EXISTS `gsb_frais`;
CREATE DATABASE IF NOT EXISTS `gsb_frais` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `gsb_frais`;

-- --------------------------------------------------------

--
-- Structure de la table `etat`
--

CREATE TABLE `Etat` (
  `id` char(2) NOT NULL,
  `libelle` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `etat`
--

INSERT INTO `Etat` (`id`, `libelle`) VALUES
('CL', 'Saisie clôturée'),
('CR', 'Fiche créée, saisie en cours'),
('PA', 'Mise en paiement'),
('RB', 'Remboursée'),
('VA', 'Validée');

-- --------------------------------------------------------

--
-- Structure de la table `fichefrais`
--

CREATE TABLE `FicheFrais` (
  `idVisiteur` char(4) NOT NULL,
  `mois` char(6) NOT NULL,
  `nbJustificatifs` int(11) DEFAULT NULL,
  `montantValide` decimal(10,2) DEFAULT NULL,
  `dateModif` date DEFAULT NULL,
  `idEtat` char(2) DEFAULT 'CR'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `fichefrais`
--

INSERT INTO `FicheFrais` (`idVisiteur`, `mois`, `nbJustificatifs`, `montantValide`, `dateModif`, `idEtat`) VALUES
('a17', '', 0, '0.00', '2016-12-16', 'CR'),
('a17', '201612', NULL, NULL, '2016-12-17', 'RB');

-- --------------------------------------------------------

--
-- Structure de la table `fraisforfait`
--

CREATE TABLE `FraisForfait` (
  `id` char(3) NOT NULL,
  `libelle` char(20) DEFAULT NULL,
  `montant` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `fraisforfait`
--

INSERT INTO `FraisForfait` (`id`, `libelle`, `montant`) VALUES
('ETP', 'Forfait Etape', '110.00'),
('KM', 'Frais Kilométrique', '0.62'),
('NUI', 'Nuitée Hôtel', '80.00'),
('REP', 'Repas Restaurant', '25.00');

-- --------------------------------------------------------

--
-- Structure de la table `lignefraisforfait`
--

CREATE TABLE `LigneFraisForfait` (
  `idVisiteur` char(4) NOT NULL,
  `mois` char(6) NOT NULL,
  `idFraisForfait` char(3) NOT NULL,
  `quantite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `lignefraisforfait`
--

INSERT INTO `LigneFraisForfait` (`idVisiteur`, `mois`, `idFraisForfait`, `quantite`) VALUES
('a17', '201612', 'ETP', 5),
('a17', '201612', 'KM', 5),
('a17', '201612', 'NUI', 5),
('a17', '201612', 'REP', 5);

-- --------------------------------------------------------

--
-- Structure de la table `lignefraishorsforfait`
--

CREATE TABLE `LigneFraisHorsForfait` (
  `id` int(11) NOT NULL,
  `idVisiteur` char(4) NOT NULL,
  `mois` char(6) NOT NULL,
  `libelle` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `montant` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `Utilisateur` (
  `id` char(4) NOT NULL,
  `role` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `Utilisateur` (`id`, `role`) VALUES
('a131', 'Visiteur'),
('a17', 'Visiteur'),
('a55', 'Visiteur'),
('a93', 'Visiteur'),
('b13', 'Visiteur'),
('b16', 'Visiteur'),
('b19', 'Visiteur'),
('b25', 'Visiteur'),
('b28', 'Visiteur'),
('b34', 'Visiteur'),
('b4', 'Visiteur'),
('b50', 'Visiteur'),
('b59', 'Visiteur'),
('c14', 'Visiteur'),
('c3', 'Visiteur'),
('c54', 'Visiteur'),
('d13', 'Visiteur'),
('d51', 'Visiteur'),
('e22', 'Visiteur'),
('e24', 'Visiteur'),
('e39', 'Visiteur'),
('e49', 'Visiteur'),
('e5', 'Visiteur'),
('e52', 'Visiteur'),
('f21', 'Visiteur'),
('f39', 'Visiteur'),
('f4', 'Visiteur'),
('z13', 'Comptable');

-- --------------------------------------------------------

--
-- Structure de la table `visiteur`
--

CREATE TABLE `Visiteur` (
  `id` char(4) NOT NULL,
  `nom` char(30) DEFAULT NULL,
  `prenom` char(30) DEFAULT NULL,
  `login` char(20) DEFAULT NULL,
  `mdp` char(255) DEFAULT NULL,
  `adresse` char(30) DEFAULT NULL,
  `cp` char(5) DEFAULT NULL,
  `ville` char(30) DEFAULT NULL,
  `dateEmbauche` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `visiteur`
--

INSERT INTO `Visiteur` (`id`, `nom`, `prenom`, `login`, `mdp`, `adresse`, `cp`, `ville`, `dateEmbauche`) VALUES
('a131', 'Villechalane', 'Louis', 'lvillachane', 'jux7g', '8 rue des Charmes', '46000', 'Cahors', '2005-12-21'),
('a17', 'Andre', 'David', 'dandre', 'oppg5', '1 rue Petit', '46200', 'Lalbenque', '1998-11-23'),
('a55', 'Bedos', 'Christian', 'cbedos', 'gmhxd', '1 rue Peranud', '46250', 'Montcuq', '1995-01-12'),
('a93', 'Tusseau', 'Louis', 'ltusseau', 'ktp3s', '22 rue des Ternes', '46123', 'Gramat', '2000-05-01'),
('b13', 'Bentot', 'Pascal', 'pbentot', 'doyw1', '11 allée des Cerises', '46512', 'Bessines', '1992-07-09'),
('b16', 'Bioret', 'Luc', 'lbioret', 'hrjfs', '1 Avenue gambetta', '46000', 'Cahors', '1998-05-11'),
('b19', 'Bunisset', 'Francis', 'fbunisset', '4vbnd', '10 rue des Perles', '93100', 'Montreuil', '1987-10-21'),
('b25', 'Bunisset', 'Denise', 'dbunisset', 's1y1r', '23 rue Manin', '75019', 'paris', '2010-12-05'),
('b28', 'Cacheux', 'Bernard', 'bcacheux', 'uf7r3', '114 rue Blanche', '75017', 'Paris', '2009-11-12'),
('b34', 'Cadic', 'Eric', 'ecadic', '6u8dc', '123 avenue de la République', '75011', 'Paris', '2008-09-23'),
('b4', 'Charoze', 'Catherine', 'ccharoze', 'u817o', '100 rue Petit', '75019', 'Paris', '2005-11-12'),
('b50', 'Clepkens', 'Christophe', 'cclepkens', 'bw1us', '12 allée des Anges', '93230', 'Romainville', '2003-08-11'),
('b59', 'Cottin', 'Vincenne', 'vcottin', '2hoh9', '36 rue Des Roches', '93100', 'Monteuil', '2001-11-18'),
('c14', 'Daburon', 'François', 'fdaburon', '7oqpv', '13 rue de Chanzy', '94000', 'Créteil', '2002-02-11'),
('c3', 'De', 'Philippe', 'pde', 'gk9kx', '13 rue Barthes', '94000', 'Créteil', '2010-12-14'),
('c54', 'Debelle', 'Michel', 'mdebelle', 'od5rt', '181 avenue Barbusse', '93210', 'Rosny', '2006-11-23'),
('d13', 'Debelle', 'Jeanne', 'jdebelle', 'nvwqq', '134 allée des Joncs', '44000', 'Nantes', '2000-05-11'),
('d51', 'Debroise', 'Michel', 'mdebroise', 'sghkb', '2 Bld Jourdain', '44000', 'Nantes', '2001-04-17'),
('e22', 'Desmarquest', 'Nathalie', 'ndesmarquest', 'f1fob', '14 Place d Arc', '45000', 'Orléans', '2005-11-12'),
('e24', 'Desnost', 'Pierre', 'pdesnost', '4k2o5', '16 avenue des Cèdres', '23200', 'Guéret', '2001-02-05'),
('e39', 'Dudouit', 'Frédéric', 'fdudouit', '44im8', '18 rue de l église', '23120', 'GrandBourg', '2000-08-01'),
('e49', 'Duncombe', 'Claude', 'cduncombe', 'qf77j', '19 rue de la tour', '23100', 'La souteraine', '1987-10-10'),
('e5', 'Enault-Pascreau', 'Céline', 'cenault', 'y2qdu', '25 place de la gare', '23200', 'Gueret', '1995-09-01'),
('e52', 'Eynde', 'Valérie', 'veynde', 'i7sn3', '3 Grand Place', '13015', 'Marseille', '1999-11-01'),
('f21', 'Finck', 'Jacques', 'jfinck', 'mpb3t', '10 avenue du Prado', '13002', 'Marseille', '2001-11-10'),
('f39', 'Frémont', 'Fernande', 'ffremont', 'xs5tq', '4 route de la mer', '13012', 'Allauh', '1998-10-01'),
('f4', 'Gest', 'Alain', 'agest', 'dywvt', '30 avenue de la mer', '13025', 'Berre', '1985-11-01');

-- --------------------------------------------------------

--
-- Structure de la table `comptable`
--

CREATE TABLE `Comptable` (
  `id` char(4) NOT NULL,
  `nom` char(30) DEFAULT NULL,
  `prenom` char(30) DEFAULT NULL,
  `login` char(20) DEFAULT NULL,
  `mdp` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `comptable`
--

INSERT INTO `Comptable` (`id`, `nom`, `prenom`, `login`, `mdp`) VALUES
('z13', 'Dubois', 'Dominique', 'ddubois', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE `Fournisseur` (
  `id` char(4) NOT NULL,
  `nom` char(30) DEFAULT NULL,
  `adresse` char(30) DEFAULT NULL,
  `cp` char(5) DEFAULT NULL,
  `ville` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `comptable`
--

INSERT INTO `Fournisseur` (`id`, `nom`, `adresse`, `cp`, `ville`) VALUES
('1', 'Medicamos', '4 Rue Schoch', '67042', 'Strasbourg'),
('2', 'Perixomus', '2 Rue du Doubs', '67000', 'Strasbourg');


-- --------------------------------------------------------

--
-- Structure de la table `médicament`
--

CREATE TABLE `Medicament` (
  `id` int(11) NOT NULL,
  `libelle` varchar(100) DEFAULT NULL,
  `composition` varchar(255) DEFAULT NULL,
  `effets` varchar(255) DEFAULT NULL,
  `posologie` varchar(255) DEFAULT NULL,
  `prix` float DEFAULT NULL,
  `tauxRemboursement` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `médicament`
--

INSERT INTO `Medicament` (`id`, `libelle`, `composition`, `effets`, `posologie`, `prix`, `tauxRemboursement`) VALUES
('1', 'Codoliprane', 'Codéine, paracétamol', 'Somnolence', '1g 4x par jour', '1.59', '65'),
('2', 'Gaviscon', 'Alginate de sodium, carbonate de calcium', 'Constipation', '1 sachet 3-4x par jour', '1.53', '15'),
('3', 'Smecta', 'Diosmectite, glucose', 'Flatulences', '6 sachets par jour', '6.39', '30'),
('4', 'Ginkor', 'Ginkgo biloba, heptaminol chloryhdrate', 'Maux de tête', '2 gélules par jour', '1.59', '0'),
('5', 'Stablon', 'Tianeptine sodique', 'Tachycardie', '1 comprimé 3x par jour', '7.06', '65');

-- --------------------------------------------------------

--
-- Structure de la table `commander`
--

CREATE TABLE `Commander` (
  `id` int(11) NOT NULL,
  `idComptable` char(4) DEFAULT NULL,
  `idMedicament` int(11) DEFAULT NULL,
  `idFournisseur` char(4) DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  `montant` float DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commander`
--

INSERT INTO `Commander` (`id`, `idComptable`, `idMedicament`, `idFournisseur`, `quantite`, `montant`, `date`) VALUES
('1', 'z13', '2', '1', '12', '18.36', NOW());


--
-- Index pour les tables exportées
--

--
-- Index pour la table `etat`
--
ALTER TABLE `Etat`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fichefrais`
--
ALTER TABLE `FicheFrais`
  ADD PRIMARY KEY (`idVisiteur`,`mois`),
  ADD KEY `idEtat` (`idEtat`);

--
-- Index pour la table `fraisforfait`
--
ALTER TABLE `FraisForfait`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `lignefraisforfait`
--
ALTER TABLE `LigneFraisForfait`
  ADD PRIMARY KEY (`idVisiteur`,`mois`,`idFraisForfait`),
  ADD KEY `idFraisForfait` (`idFraisForfait`);

--
-- Index pour la table `lignefraishorsforfait`
--
ALTER TABLE `LigneFraisHorsForfait`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idVisiteur` (`idVisiteur`,`mois`);

--
-- Index pour la table `visiteur`
--
ALTER TABLE `Visiteur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comptable`
--
ALTER TABLE `Comptable`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--

ALTER TABLE `Utilisateur`
   ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `Fournisseur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `médicament`
--

ALTER TABLE `Medicament`
   ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commander`
--

ALTER TABLE `Commander`
   ADD PRIMARY KEY (`id`, `idComptable`, `idMedicament`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `lignefraishorsforfait`
--
ALTER TABLE `LigneFraisHorsForfait`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `médicament`
--
ALTER TABLE `Medicament`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `commander`
--
ALTER TABLE `Commander`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `visiteur`
--
ALTER TABLE `Visiteur`
  ADD CONSTRAINT `visiteur_ibfk_1` FOREIGN KEY (`id`) REFERENCES `Utilisateur` (`id`);

--
-- Contraintes pour la table `comptable`
--
ALTER TABLE `Comptable`
 ADD CONSTRAINT `comptable_ibfk_1` FOREIGN KEY (`id`) REFERENCES `Utilisateur` (`id`);

--
-- Contraintes pour la table `commander`
--
ALTER TABLE `Commander`
  ADD CONSTRAINT `commander_ibfk_1` FOREIGN KEY (`idComptable`) REFERENCES `Comptable` (`id`),
  ADD CONSTRAINT `commander_ibfk_2` FOREIGN KEY (`idMedicament`) REFERENCES `Medicament` (`id`),
  ADD CONSTRAINT `commander_ibfk_3` FOREIGN KEY (`idFournisseur`) REFERENCES `Fournisseur` (`id`);

--
-- Contraintes pour la table `fichefrais`
--
ALTER TABLE `FicheFrais`
  ADD CONSTRAINT `fichefrais_ibfk_1` FOREIGN KEY (`idEtat`) REFERENCES `Etat` (`id`),
  ADD CONSTRAINT `fichefrais_ibfk_2` FOREIGN KEY (`idVisiteur`) REFERENCES `Visiteur` (`id`);

--
-- Contraintes pour la table `lignefraisforfait`
--
ALTER TABLE `LigneFraisForfait`
  ADD CONSTRAINT `lignefraisforfait_ibfk_1` FOREIGN KEY (`idVisiteur`,`mois`) REFERENCES `FicheFrais` (`idVisiteur`, `mois`),
  ADD CONSTRAINT `lignefraisforfait_ibfk_2` FOREIGN KEY (`idFraisForfait`) REFERENCES `FraisForfait` (`id`);

--
-- Contraintes pour la table `lignefraishorsforfait`
--
ALTER TABLE `LigneFraisHorsForfait`
  ADD CONSTRAINT `lignefraishorsforfait_ibfk_1` FOREIGN KEY (`idVisiteur`,`mois`) REFERENCES `FicheFrais` (`idVisiteur`, `mois`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
