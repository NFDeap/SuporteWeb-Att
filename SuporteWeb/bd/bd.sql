



/*Criando o Database*/
CREATE DATABASE IF NOT EXISTS suporteweb;

USE suporteweb;


/*Criando a Tabela usuario */
CREATE TABLE IF NOT EXISTS `atm_user` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `nome_usuario` varchar(50) NOT NULL,
  `situacao` boolean NOT NULL DEFAULT FALSE,
  `login` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(100) NOT NULL,
   CONSTRAINT `pk_usuario` PRIMARY KEY (`id_usuario`)
);

insert into atm_user (nome_usuario, situacao, login, email, senha) 
values ('Admin',1,'Admin','teste@teste.com.br','$2y$10$asGC8DjuEFi4g0FqYa6Y1.7wAx4fNfA7VVTQvfTW6c4D1cnYImTLy'); /* senha 12345 */


/*Criando a Tabela lojas */
CREATE TABLE `atm_lojas` (
  `id_loja` int NOT NULL AUTO_INCREMENT,  
  `razao_social` varchar(100) NOT NULL,
  `fantasia` varchar(50) NOT NULL,
  `CNPJ` varchar(18) NOT NULL,
  `franquia` varchar(30) NOT NULL,
   CONSTRAINT `pk_loja` PRIMARY KEY (`id_loja`)   
);

insert into atm_lojas (razao_social, fantasia, CNPJ, franquia)
values ('Teste Razao Social','Teste Fantasia','Teste CNPJ','Teste Franquia');

/*Criando a Tabela Telefone das lojas */
CREATE TABLE IF NOT EXISTS `atm_tel_contato`(
  `id_tel_contato` int NOT NULL AUTO_INCREMENT,
  `id_loja` int NOT NULL,
  `tel_contato` varchar(16) NOT NULL,
  CONSTRAINT `pk_tel_contato` PRIMARY KEY (`id_tel_contato`),
  CONSTRAINT `fk_loja_to_atm_tel_contato` FOREIGN KEY (`id_loja`) REFERENCES `atm_lojas` (`id_loja`)
);

insert into atm_tel_contato (id_loja, tel_contato)
values(1,'(15) 9999-9999');

/*Criando a Tabela Associativa Lojas e Telefones */
CREATE TABLE IF NOT EXISTS `atm_lojas_tel_contato`(
  `id_tel_lojas` int NOT NULL AUTO_INCREMENT,
  `id_tel_contato` int NOT NULL,
  `id_loja` int NOT NULL,
  CONSTRAINT `pk_id_tel_lojas` PRIMARY KEY (`id_tel_lojas`),
  CONSTRAINT `fk_tel_contato_to_lojas_tel_contato` FOREIGN KEY (`id_tel_contato`) REFERENCES `atm_tel_contato` (`id_tel_contato`),
  CONSTRAINT `fk_loja_to_lojas_tel_contato` FOREIGN KEY (`id_loja`) REFERENCES `atm_lojas` (`id_loja`)
);

insert into atm_lojas_tel_contato (id_tel_contato,id_loja)
values(1,1);


/*Criando a Tabela Atendimentos */
CREATE TABLE IF NOT EXISTS `atm_atendimento` (
  `id_atendimento` int NOT NULL AUTO_INCREMENT,
  `id_usuario` int NOT NULL,  
  `id_loja` int NOT NULL,
  `status` boolean NOT NULL DEFAULT FALSE,
  `id_tel_contato` int NOT NULL,
  `ticket_relacionado` varchar(50),
  `nome_cliente` varchar(20),  
  `assunto` varchar(30),
  `descricao_atendimento` varchar(1000),
  `data` timestamp not null default CURRENT_TIMESTAMP,
   CONSTRAINT `pk_atendimento` PRIMARY KEY (`id_atendimento`),
   CONSTRAINT `fk_usuario_to_atendimento` FOREIGN KEY (`id_usuario`) REFERENCES `atm_user` (`id_usuario`),   
   CONSTRAINT `fk_loja_to_atendimento` FOREIGN KEY (`id_loja`) REFERENCES `atm_lojas` (`id_loja`),
   CONSTRAINT `fk_tel_to_atendimento` FOREIGN KEY (`id_tel_contato`) REFERENCES `atm_tel_contato` (`id_tel_contato`)
);
