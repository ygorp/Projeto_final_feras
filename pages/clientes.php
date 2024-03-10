<?php
session_start();

if (!isset($_SESSION['usuario_email'])) {
    header("Location: clientes.html");
    exit();
}


include("../database/db.php");
include("../database/conn.php");

$sql = "SELECT * FROM clientes ORDER BY idclientes DESC";
$result = $conn->query($sql);

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes - Feras</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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

            <div class="table_list">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome Completo</th>
                            <th scope="col">CPF</th>
                            <th scope="col">Celular</th>
                            <th scope="col">Email</th>
                            <th scope="col">Status</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($user_data = mysqli_fetch_assoc($result))
                            {
                                echo "<tr>";
                                echo "<td>".$user_data['idclientes']."</td>";
                                echo "<td>".$user_data['nome']."</td>";
                                echo "<td>".$user_data['cpf']."</td>";
                                echo "<td>".$user_data['celular']."</td>";
                                echo "<td>".$user_data['email']."</td>";
                                echo "<td>".$user_data['status']."</td>";
                                echo "<td>
                                <a href='../database/edit_clientes.php?idclientes=$user_data[idclientes]'><i class='fa-solid fa-pencil'></i></a>
                                <a href='delete_clientes.php?idclientes=$user_data[idclientes]'><i class='fa-solid fa-trash'></i></a>
                                </td>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>