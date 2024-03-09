<?php
session_start();

$conexao = new mysqli("localhost", "ygorpn", "72921804", "feras");

if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT email, senha FROM users WHERE email = '$email'";
$resultado = $conexao->query($sql);

if ($resultado->num_rows > 0) {
    $row = $resultado->fetch_assoc();
    if (password_verify($senha, $row['senha'])) {
        $_SESSION['usuario_email'] = $row['email'];
        header("Location: ../pages/clientes.php");
    } else {
        echo "Senha incorreta";
    }
} else {
    echo "Usuário não encontrado";
}

$conexao->close();
?>
