{\rtf1\ansi\ansicpg1252\cocoartf1343\cocoasubrtf140
{\fonttbl\f0\fswiss\fcharset0 Helvetica;}
{\colortbl;\red255\green255\blue255;}
\paperw11900\paperh16840\margl1440\margr1440\vieww10800\viewh8400\viewkind0
\pard\tx566\tx1133\tx1700\tx2267\tx2834\tx3401\tx3968\tx4535\tx5102\tx5669\tx6236\tx6803\pardirnatural

\f0\fs24 \cf0 -- phpMyAdmin SQL Dump\
-- version 4.2.10\
-- http://www.phpmyadmin.net\
--\
-- Client :  localhost:8889\
-- G\'e9n\'e9r\'e9 le :  Mar 10 F\'e9vrier 2015 \'e0 14:38\
-- Version du serveur :  5.5.38\
-- Version de PHP :  5.6.2\
\
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";\
SET time_zone = "+00:00";\
\
--\
-- Base de donn\'e9es :  `zikon`\
--\
\
-- --------------------------------------------------------\
\
--\
-- Structure de la table `comptesutilisateurs`\
--\
\
CREATE TABLE `comptesutilisateurs` (\
`id` int(254) NOT NULL,\
  `nom` varchar(15) NOT NULL,\
  `prenom` varchar(15) NOT NULL,\
  `login` varchar(15) NOT NULL,\
  `password` varchar(15) NOT NULL\
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;\
\
--\
-- Contenu de la table `comptesutilisateurs`\
--\
\
INSERT INTO `comptesutilisateurs` (`id`, `nom`, `prenom`, `login`, `password`) VALUES\
(1, 'a', 'a', 'a', '0'),\
(2, 'a', 'a', 'a', '0'),\
(3, 'h', 'g', 'g', '0'),\
(4, 'h', 'g', 'g', '0'),\
(5, 'h', 'g', 'g', '0'),\
(6, '', '', '', ''),\
(7, 'aazz', 'aazz', 'aazz', 'aazz'),\
(8, 'aazz', '', '', ''),\
(9, 'bradai', 'hazem', 'bradai.hazem@gm', 'isimsfaxA1'),\
(10, 'bradai', 'hazem', 'bradai.hazem@gm', 'isimsfaxA1'),\
(11, 'bradai', 'hazem', 'bradai.hazem@gm', 'isimsfaxA1'),\
(12, 'bradai', 'hazem', 'bradai.hazem@gm', 'isimsfaxA1'),\
(13, 'bradai', 'hazem', 'bradai.hazem@gm', 'isimsfaxA1'),\
(14, 'bradai', 'hazem', 'bradai.hazem@gm', 'isimsfaxA1'),\
(15, 'bradai', 'hazem', 'bradai.hazem@gm', 'isimsfaxA1'),\
(16, 'bradai', 'hazem', 'bradai.hazem@gm', 'isimsfaxA1'),\
(17, 'bradai', 'hazem', 'bradai.hazem@gm', 'isimsfaxA1'),\
(18, 'bradai', 'hazem', 'bradai.hazem@gm', 'isimsfaxA1'),\
(19, 'bradai', 'hazem', 'bradai.hazem@gm', 'isimsfaxA1'),\
(20, 'bradai', 'hazem', 'bradai.hazem@gm', 'isimsfaxA1'),\
(21, 'bradai', 'hazem', 'bradai.hazem@gm', 'isimsfaxA1'),\
(22, 'azeazegggg', 'azeaz', 'azeazeazaz', 'azeazeza'),\
(23, 'azeazegggg', 'azeaz', 'azeazeazaz', 'azeazeza');\
\
--\
-- Index pour les tables export\'e9es\
--\
\
--\
-- Index pour la table `comptesutilisateurs`\
--\
ALTER TABLE `comptesutilisateurs`\
 ADD PRIMARY KEY (`id`);\
\
--\
-- AUTO_INCREMENT pour les tables export\'e9es\
--\
\
--\
-- AUTO_INCREMENT pour la table `comptesutilisateurs`\
--\
ALTER TABLE `comptesutilisateurs`\
MODIFY `id` int(254) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;}