<?php

$conn = new mysqli("localhost", "ygorpn", "72921804", "feras");

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Recebe os dados do formulário
$nome = $_POST['nome'];
$nascimento = $_POST['nascimento'];
$genero = $_POST['genero'];
$cpf = $_POST['cpf'];
$celular = $_POST['celular'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$status = $_POST['status'];

// Insere os dados no banco de dados
$sql = "INSERT INTO clientes (nome, nascimento, genero, cpf, celular, email, senha, status)
        VALUES ('$nome', '$nascimento', '$genero', '$cpf', '$celular', '$email', '$senha', '$status')";

if ($conn->query($sql) === TRUE) {
    header("Location: ../pages/clientes.php");
} else {
    echo "Erro ao cadastrar: " . $conn->error;
}

// Fecha a conexão com o banco de dados
$conn->close();

?>