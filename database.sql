create database liga_futebol;

use liga_futebol;

CREATE TABLE `equipas` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `pontuacao` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
);

CREATE TABLE `jogos` (
  `id` int(11) NOT NULL auto_increment,
  `name_equipa_1` varchar(100) NOT NULL,
  `gols_equipa_1` int(11) NOT NULL,
  `name_equipa_2` varchar(100) NOT NULL,
  `gols_equipa_2` int(11) NOT NULL,
  `data` TIMESTAMP NOT NULL,
  `numero` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
);