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

// Processar o formulário quando submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $telefone = $_POST['telefone'];

    // Preparar e executar a query de inserção
    $stmt = $conn->prepare("INSERT INTO contatos (nome, sobrenome, telefone) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nome, $sobrenome, $telefone);

    if ($stmt->execute()) {
        echo "Dados enviados com sucesso!";
    } else {
        echo "Erro ao enviar dados: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Contato</title>
</head>
<body>
    <h1>Formulário de Contato</h1>
    <form method="post" action="">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="sobrenome">Sobrenome:</label>
        <input type="text" id="sobrenome" name="sobrenome" required><br><br>

        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" required><br><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>
