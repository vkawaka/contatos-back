/**
Esse arquivo contêm o script do banco de dados necessário para o funcionamento do projeto. Data de início: 19/02.
*/

CREATE SCHEMA alphacodecontatos;
USE alphacodecontatos;

CREATE TABLE `tbl_contatos`(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(200) NOT NULL UNIQUE,
    telefone VARCHAR(15),
    data_nasc DATE NOT NULL,
    profissao VARCHAR(186) NOT NULL,
    celular VARCHAR(15) NOT NULL
)