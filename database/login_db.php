<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "72921804";
$dbname = "sistema_cadastro";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}
?>