CREATE TABLE clientescad (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(200) NOT NULL,
    nascimento DATE,
    sexo VARCHAR(10),
    estado_civil VARCHAR(20),
    email VARCHAR(200),
    ddd1 VARCHAR(2),
    telefone1 VARCHAR(9),
    tipo1 VARCHAR(20),
    ddd2 VARCHAR(2),
    telefone2 VARCHAR(9),
    tipo2 VARCHAR(20),
    observacoes TEXT,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);