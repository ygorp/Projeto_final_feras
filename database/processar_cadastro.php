<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Conectar ao banco de dados SQLite usando PDO
        $conn = new PDO('sqlite:sistema_ponto.db');

        // Definir o modo de erro do PDO para exceções
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Obter os dados do formulário
        $email = $_POST['email'];
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Hash da senha

        // Preparar a consulta SQL
        $stmt = $conn->prepare("INSERT INTO usuarios (email, senha) VALUES (:email, :senha)");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);

        // Executar a consulta
        $result = $stmt->execute();

        // Verificar se o cadastro foi bem-sucedido
        if ($result) {
            header("Location: index.php");
        } else {
            echo "Erro ao cadastrar usuário.";
        }

        // Fechar a conexão com o banco de dados
        $conn = null;
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>
