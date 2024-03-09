<?php
$conexao = new mysqli("localhost", "ygorpn", "72921804", "feras");

if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}

$email = $_POST['email'];
$senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);

$sql = "INSERT INTO users (email, senha) VALUES ('$email', '$senha')";

if ($conexao->query($sql) === TRUE) {
    header("Location: ../index.php");
} else {
    echo "Erro ao cadastrar: " . $conexao->error;
}

$conexao->close();
?>
