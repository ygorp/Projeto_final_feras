<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "72921804";
$dbname = "sistema_cadastro";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Recebe os dados do formulário
$email = $_POST['email'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

// Insere os dados no banco de dados
$sql = "INSERT INTO usuarios (email, senha) VALUES ('$email', '$senha')";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
} else {
    echo "Erro ao cadastrar: " . $conn->error;
}

$conn->close();
?>
