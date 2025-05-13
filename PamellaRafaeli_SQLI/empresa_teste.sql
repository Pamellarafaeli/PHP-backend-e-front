create database empresa_teste;
use empresa_teste;

create table cliente_teste (
id_cliente INT auto_increment primary key,
nome varchar(255) not null,
endereco varchar(255),
telefone varchar(20),
email varchar (255) unique 
);

insert into cliente_teste (nome, endereco, telefone, email) VALUES
('Pamella Rafaeli Neves', 'Rua Kabece 123', '(47) 123456789', 'pamella@teste.com'),
('Leonardo Duarte Souza', 'Rua Schuttel 895', '(47) 98756485', 'leo@teste.com'),
('Amanda Juiz', 'Rua Santa clara', '(11) 456897889', 'amanda_juiz@teste.com');