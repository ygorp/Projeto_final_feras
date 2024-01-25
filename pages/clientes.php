<?php
session_start();

if (!isset($_SESSION['usuario_email'])) {
    header("Location: clientes.html");
    exit();
}


include("../database/db.php");

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes - Feras</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/css/clientes.css">

</head>
<body>
    <header class="topo_clientes">
        <div class="logo">
            <img src="/img/logo.png" alt="Logo feras da tecnologia">
        </div>

        <div class="usuario">
            <?php echo $_SESSION['usuario_email'];?>
            <img src="/img/logo.png" alt="">

            <a href="../database/processar_logout.php">Sair</a>
        </div>
    </header>

    <main>
        <div class="secao">
        <i class="fa-solid fa-user"></i> <p>Clientes</p>
        </div>

        <div class="cliente_list">
            <div class="titulo_btn">
                <h1>Clientes</h1>
                <a href="/pages/cad_clientes.php"><i class="fa-solid fa-square-plus"></i></a>
            </div>

            <table>
                <tr>
                    <td>Nome Completo</td>
                    <td>CPF</td>
                    <td>Celular</td>
                    <td>Email</td>
                    <td>Status</td>
                    <td>Ação</td>
                </tr>

                <?php
                    // Exibe os usuários na tabela
                    while ($row = $resultado->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['nome']}</td>";
                        echo "<td>{$row['cpf']}</td>";
                        echo "<td>{$row['celular']}</td>";
                        echo "<td>{$row['email']}</td>";
                        echo "<td>{$row['status']}</td>";
                        echo "<td><button onclick=\"realizarAcao({$row['id']})\">Realizar Ação</button></td>";
                        echo "</tr>";
                    }
                ?>
            </table>
        </div>
    </main>
</body>
</html>