<?php

// Informações de conexão com o banco de dados
$servername = "localhost"; // Geralmente é localhost
$username = "seu_usuario"; // Seu nome de usuário do MySQL
$password = "sua_senha";   // Sua senha do MySQL
$dbname = "seu_banco_de_dados"; // O nome do seu banco de dados

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Coletar os dados do formulário (usando $_GET pois o método do formulário é GET)
$nome = isset($_GET['nome']) ? $_GET['nome'] : '';
$nascimento = isset($_GET['nascimento']) ? $_GET['nascimento'] : null;
$sexo = isset($_GET['sexo']) ? $_GET['sexo'] : null;
$estadoCivil = isset($_GET['estadoCivil']) ? $_GET['estadoCivil'] : null;
$email = isset($_GET['email']) ? $_GET['email'] : '';
$ddd1 = isset($_GET['ddd1']) ? $_GET['ddd1'] : null;
$telefone1 = isset($_GET['telefone1']) ? $_GET['telefone1'] : null;
$tipo1 = isset($_GET['tipo1']) ? $_GET['tipo1'] : null;
$ddd2 = isset($_GET['ddd2']) ? $_GET['ddd2'] : null;
$telefone2 = isset($_GET['telefone2']) ? $_GET['telefone2'] : null;
$tipo2 = isset($_GET['tipo2']) ? $_GET['tipo2'] : null;
$obs = isset($_GET['obs']) ? $_GET['obs'] : null;

// Preparar a query SQL para inserir os dados
$sql = "INSERT INTO clientes (nome, nascimento, sexo, estado_civil, email, ddd1, telefone1, tipo1, ddd2, telefone2, tipo2, observacoes)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Preparar a declaração SQL
$stmt = $conn->prepare($sql);

// Vincular os parâmetros
$stmt->bind_param("ssssssssssss", $nome, $nascimento, $sexo, $estadoCivil, $email, $ddd1, $telefone1, $tipo1, $ddd2, $telefone2, $tipo2, $obs);

// Executar a query
if ($stmt->execute()) {
    echo "Cadastro realizado com sucesso!";
} else {
    echo "Erro ao cadastrar: " . $stmt->error;
}

// Fechar a declaração e a conexão
$stmt->close();
$conn->close();

?>