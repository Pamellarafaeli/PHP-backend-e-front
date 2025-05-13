create database EMPRESA;
use EMPRESA;

create table cliente (
id_cliente int not null auto_increment,
nome varchar(50) not null,
endereco varchar(80) not null,
telefone varchar (20) not null,
email varchar (50)not null,
primary key (id_cliente)
);
INSERT INTO cliente(nome, endereco, telefone, email) VALUES
('João Silva', 'Rua das Flores, 123 - São Paulo/SP', '(11) 98765-4321', 'joao.silva@email.com'),
('Maria Oliveira', 'Av. Paulista, 1000 - São Paulo/SP', '(11) 91234-5678', 'maria.oliveira@email.com'),
('Carlos Souza', 'Rua XV de Novembro, 50 - Curitiba/PR', '(41) 99876-5432', 'carlos.souza@email.com'),
('Ana Santos', 'Av. Brasil, 200 - Rio de Janeiro/RJ', '(21) 98765-1234', 'ana.santos@email.com'),
('Pedro Costa', 'Rua da Praia, 300 - Florianópolis/SC', '(48) 91234-8765', 'pedro.costa@email.com'),
('Juliana Pereira', 'Av. Afonso Pena, 1500 - Belo Horizonte/MG', '(31) 99876-1234', 'juliana.pereira@email.com'),
('Marcos Lima', 'Rua das Palmeiras, 45 - Porto Alegre/RS', '(51) 98765-8765', 'marcos.lima@email.com'),
('Fernanda Rocha', 'Av. Beira Mar, 600 - Fortaleza/CE', '(85) 91234-5678', 'fernanda.rocha@email.com'),
('Ricardo Alves', 'Rua dos Coqueiros, 80 - Salvador/BA', '(71) 99876-5432', 'ricardo.alves@email.com'),
('Patrícia Nunes', 'Av. Tocantins, 1200 - Goiânia/GO', '(62) 98765-1234', 'patricia.nunes@email.com');

create table usuario (
nome varchar (50) default null,
usuario varchar (10) default null,
senha varchar (32) default null,
nivel int default null
);

INSERT INTO usuario (nome, usuario, senha, nivel) VALUES
('Administrador Geral', 'admin', 'senha@123', 1),       -- 1 = Admin
('Gerente Comercial', 'gerente1', 'Gerente@2024', 2),  -- 2 = Gerente
('Supervisor Técnico', 'super1', 'Sup3r!2024', 3),     -- 3 = Supervisor
('Atendente Maria', 'maria.atend', 'M@ria123', 4),     -- 4 = Atendente
('Vendedor João', 'joao.vend', 'J0@oVend', 5),         -- 5 = Vendedor
('Analista Carlos', 'carlos.anal', 'C@rlos789', 6),    -- 6 = Analista
('Assistente Ana', 'ana.assis', 'Ana2024!', 7),        -- 7 = Assistente
('Técnico Pedro', 'pedro.tec', 'P3dr0Tec', 8),         -- 8 = Técnico
('Estagiário Lucas', 'lucas.est', 'Lucas_123', 9),     -- 9 = Estagiário
('Auxiliar Sofia', 'sofia.aux', 'S0f1@Aux', 10);       -- 10 = Auxiliar

select * from cliente;
