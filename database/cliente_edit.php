<?php

    include_once 'conn.php';

    if (isset($_POST['update'])) {
        $id = $_POST['idclientes'];
        $nome = $_POST['nome'];
        $nascimento = $_POST['nascimento'];
        $genero = $_POST['genero'];
        $cpf = $_POST['cpf'];
        $celular = $_POST['celular'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $status = $_POST['status'];

        $sqlUpdate = "UPDATE clientes SET nome='$nome', nascimento='$nascimento', genero='$genero', cpf='$cpf', celular='$celular', email='$email', senha='$senha', status='$status' WHERE idclientes='$id'";

        $result = $conn->query($sqlUpdate);
    } else {
        header("Location: ../pages/clientes.php");
    }
?>