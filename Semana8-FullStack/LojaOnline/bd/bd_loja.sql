CREATE DATABASE LojaDB;

CREATE TABLE Categoria (
    ID_Categoria INT AUTO_INCREMENT PRIMARY KEY,
    Nome_Categoria VARCHAR(50)
);

CREATE TABLE Produto (
    ID_Produto INT AUTO_INCREMENT PRIMARY KEY,
    Nome VARCHAR(100) NOT NULL,
    Preco DECIMAL NOT NULL,
    ID_Categoria INT,
    Descricao TEXT,
    Foto LONGBLOB,
    FOREIGN KEY (ID_Categoria) REFERENCES Categoria(ID_Categoria)
);

INSERT INTO Categoria (Nome_Categoria) VALUES 
    ('Teclado'),
    ('Mouse'),
    ('Monitor'),
    ('Desktop'),
    ('Laptop'),
    ('Outros');

INSERT INTO Produto (Nome, Preco, ID_Categoria, Descricao) VALUES 
    ('Mouse Gamer RGB', 330, 2, 'Mouse ergonômico com iluminação RGB e 6 botões programáveis.'),
    ('Monitor 24'' Full HD', 899, 3, 'Monitor LED de 24 polegadas com resolução 1920x1080.'),
    ('Teclado Mecânico', 550, 1, 'Teclado com switches azuis e estrutura em alumínio.');

CREATE TABLE Login (
  ID_Usuario INT AUTO_INCREMENT PRIMARY KEY,
  Nome VARCHAR(100) ,
  Email VARCHAR(100) NOT NULL,
  Celular VARCHAR(20),
  User VARCHAR(50) DEFAULT NULL,
  Senha VARCHAR(40) DEFAULT NULL
);

INSERT INTO Login (ID_Usuario, Nome, Email, Celular, User , Senha) VALUES 
    ('1', 'Fulano Silva','fulanosilva@email.com', '(41) 91234-5678', 'fulano.silva', '70b4269b412a8af42b1f7b0d26eceff2');
