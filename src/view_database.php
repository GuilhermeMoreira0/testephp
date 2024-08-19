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

// Consulta para obter os dados
$sql = "SELECT * FROM contatos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Exibir os dados
    echo "<table border='1'><tr><th>ID</th><th>Nome</th><th>Sobrenome</th><th>Telefone</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["nome"]. "</td><td>" . $row["sobrenome"]. "</td><td>" . $row["telefone"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 resultados";
}

$conn->close();
?>
