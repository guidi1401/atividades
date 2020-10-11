create database taxonomia;
use taxonomia;

CREATE TABLE `familia` (
  `id_familia` int(11) auto_increment,
  `nome` varchar(100),
  `nome_cientifico` varchar(100),
  primary key (id_familia)
);

CREATE TABLE `genero` (
  `id_genero` int(11) auto_increment,
  `nome_cientifico` varchar(100),
  `cod_familia` int(11),
  primary key (id_genero),
  foreign key (cod_familia) references familia(id_familia)
);

CREATE TABLE `especie` (
  `id_especie` int(11) auto_increment,
  `nome` varchar(100),
  `nome_cientifico` varchar(100),
  `cod_genero` int(11),
  primary key (id_especie),
  foreign key (cod_genero) references genero(id_genero)
);

INSERT INTO `familia` (`id_familia`, `nome`, `nome_cientifico`) VALUES
(0, 'Teste a', 'Teste a'),
(1, 'Canídeos', 'canidae'),
(2, 'Felinos', 'Felidae');

INSERT INTO `genero` (`id_genero`, `nome_cientifico`, `cod_familia`) VALUES
(0, 'Teste A', 0),
(1, 'Canis', 1),
(2, 'Cerdocyon', 1),
(3, 'Panthera', 2);

INSERT INTO `especie` (`id_especie`, `nome`, `nome_cientifico`, `cod_genero`) VALUES
(0, 'Teste A', 'Teste A', 0),
(1, 'Cachorro', 'Canis lupus familiaris', 1),
(2, 'Leão', 'Panthera leo', 3),
(3, 'Tigre', 'Panthera tigris', 3),
(4, 'Lobo', 'Canis lupus lupus', 1),
(5, 'Cachorro do Mato', 'Cerdocyon thous', 2),
(6, 'Leopardo', 'Panthera pardus', 3),
(7, 'Onça Pintada', 'Panthera onca', 3);
