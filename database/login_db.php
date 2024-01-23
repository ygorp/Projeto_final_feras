<?php

// Conectar ao banco de dados
$servername = "localhost";
$username = "root";
$password = "72921804";
$dbname = "sistema_cadastro";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar se a conexão foi bem-sucedida
if (!$conn) {
    die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
}

// Recuperar dados do formulário
$email = $_POST["email"];
$senha = $_POST["senha"];

// Consultar o banco de dados para verificar as credenciais
$sql = "SELECT idcadastro, nome, senha FROM usuarios WHERE email = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $email);

if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_store_result($stmt);
    
    if (mysqli_stmt_num_rows($stmt) == 1) {
        mysqli_stmt_bind_result($stmt, $id, $nome, $senha_hash);
        mysqli_stmt_fetch($stmt);
        
        // Verificar a senha
        if (password_verify($senha, $senha_hash)) {
            // Autenticação bem-sucedida, redirecionar para a página de perfil
            session_start();
            $_SESSION["id"] = $id;
            $_SESSION["nome"] = $nome;
            header("Location: /pages/clientes.php");
        } else {
            echo "Senha incorreta.";
        }
    } else {
        echo "Email não encontrado.";
    }
} else {
    echo "Erro ao consultar o banco de dados: " . mysqli_error($conn);
}

// Fechar a conexão com o banco de dados
mysqli_close($conn);
?>