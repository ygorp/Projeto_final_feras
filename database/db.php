<?php

$conexao = new mysqli("localhost", "ygorpn", "72921804", "feras");

if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}

// Consulta os usuários no banco de dados
$sql = "SELECT idusers, email, senha FROM users";
$resultado = $conexao->query($sql);

?>