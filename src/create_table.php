<?php
$servername = "db";
$username = "myuser";
$password = "mypassword";
$database = "mydatabase";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $database);

// Verificar a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL para criar a tabela
$sql = "CREATE TABLE contatos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    sobrenome VARCHAR(255) NOT NULL,
    telefone VARCHAR(20) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table 'contatos' created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
