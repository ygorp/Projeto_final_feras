<?php

$conexao = new mysqli("localhost", "ygorpn", "72921804", "sistema_cadastro");

if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}

// Consulta os usuários no banco de dados
$sql = "SELECT id, nome, cpf, celular, email, status FROM usuarios";
$resultado = $conexao->query($sql);

?>