<?php

if (!empty($_GET['idclientes'])) {
    include_once("conn.php");

    $idclientes = $_GET['idclientes'];

    $sqlSelect = "SELECT * FROM clientes WHERE idclientes = $idclientes";

    $result = $conn->query($sqlSelect);

    if ($result->num_rows > 0) {
        $sqlDelete = "DELETE FROM clientes WHERE idclientes = $idclientes";
        $resultDelete = $conn->query($sqlDelete);
        }
    }
    header("Location: ../pages/clientes.php");

?>