CREATE SCHEMA revisaorpg;

CREATE TABLE usuario(
	id INT AUTO_INCREMENT,
    nome varchar(45),
    sobrenome varchar(45),
    username varchar(45),
    email varchar(45),
    senha varchar(45),
    PRIMARY KEY (id));

CREATE TABLE personagem(
	id INT AUTO_INCREMENT,
    id_usuario INT,
    nome varchar(45),
    classe varchar(45),
    raca varchar(45),
    pontosdevida INT,
    alinhamento varchar(45),
    PRIMARY KEY (id),
    FOREIGN KEY (id_usuario) references usuario (id));

CREATE TABLE proficiencias(
	id_personagem INT,
    forca INT,
    destreza INT,
    constituicao INT,
    inteligencia INT,
    sabedoria INT,
	carisma INT,
    FOREIGN KEY (id_personagem) references personagem (id));
    
CREATE TABLE magia(
	id INT AUTO_INCREMENT,
    nome varchar(45),
    PRIMARY KEY (id));
    
CREATE TABLE personagem_magia(
	id_personagem INT,
    id_magia INT,
    nivel INT,
    FOREIGN KEY (id_personagem) references personagem (id),
    FOREIGN KEY (id_magia) references magia (id));

INSERT INTO magia VALUES (0, "Bola de Fogo");
INSERT INTO magia VALUES (0, "Onda Trovejante");
INSERT INTO magia VALUES (0, "Invisibilidade");
INSERT INTO magia VALUES (0, "Palavra Curativa");
INSERT INTO magia VALUES (0, "Aprimorar Habilidade");