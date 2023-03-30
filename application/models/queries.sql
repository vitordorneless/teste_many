
CREATE DATABASE  manyminds;

CREATE TABLE  many_colaborador (
  id int(11) NOT NULL AUTO_INCREMENT,
  nome varchar(150) NOT NULL,
  login varchar(20) NOT NULL,
  CPF varchar(11) NOT NULL,
  pass varchar(130) NOT NULL,
  genero int(11) NOT NULL,
  estado_civil int(11) NOT NULL,
  status int(11) NOT NULL,
  PRIMARY KEY (id)
);

INSERT INTO many_colaborador (id, nome, login, CPF, pass, genero, estado_civil, status) VALUES
	(1, 'vitor dorneles pimentel dada', 'vitordorneles', '00729530043', '39126999a71e4be3762c34de0e40cb3a', 1, 1, 1);

CREATE TABLE many_colaborador_enderecos (
  id int(11) NOT NULL AUTO_INCREMENT,
  id_many_colaborador int(11) DEFAULT 0,
  cep varchar(9) DEFAULT NULL,
  rua varchar(134) DEFAULT NULL,
  numero varchar(8) DEFAULT NULL,
  cidade varchar(64) DEFAULT NULL,
  status int(11) DEFAULT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE  many_fornecedor (
  id int(11) NOT NULL AUTO_INCREMENT,
  nome varchar(150) NOT NULL,
  login varchar(20) NOT NULL,
  CNPJ varchar(14) NOT NULL,
  pass varchar(130) NOT NULL,
  telefone varchar(12) NOT NULL DEFAULT '',
  celular varchar(12) NOT NULL DEFAULT '',
  status int(11) NOT NULL,
  PRIMARY KEY (id) USING BTREE
);

CREATE TABLE  many_itens_pedido_compra (
  id int(11) NOT NULL AUTO_INCREMENT,
  id_pedido int(11) DEFAULT 0,
  id_produto int(11) DEFAULT 0,
  quantidade int(11) DEFAULT 0,
  valor_unitario decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE  many_pedidos_compra (
  id int(11) NOT NULL AUTO_INCREMENT,
  id_pedido int(11) DEFAULT 0,
  id_fornecedor int(11) DEFAULT NULL,
  obs text DEFAULT NULL,
  status int(11) DEFAULT 0,
  PRIMARY KEY (id)
);


CREATE TABLE  many_permissoes (
  id int(11) NOT NULL AUTO_INCREMENT,
  id_many_colaborador int(11) DEFAULT NULL,
  colaborador int(11) DEFAULT NULL,
  endcolaborador int(11) DEFAULT NULL,
  fornecedor int(11) DEFAULT NULL,
  produtos int(11) DEFAULT NULL,
  compras int(11) DEFAULT NULL,
  PRIMARY KEY (id)
);

INSERT INTO many_permissoes (id, id_many_colaborador, colaborador, endcolaborador, fornecedor, produtos, compras) VALUES
	(1, 1, 1, 1, 1, 1, 1);


CREATE TABLE  many_produtos (
  id int(11) NOT NULL AUTO_INCREMENT,
  nome varchar(150) NOT NULL,
  unidade varchar(2) NOT NULL DEFAULT '0',
  valor_unitario decimal(10,2) NOT NULL DEFAULT 0.00,
  id_fornecedor int(11) NOT NULL DEFAULT 0,
  status int(11) NOT NULL,
  PRIMARY KEY (id) USING BTREE
);
