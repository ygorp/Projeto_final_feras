<?php
session_start();

if (!isset($_SESSION['usuario_email'])) {
    header("Location: clientes.html");
    exit();
}


include("../database/db.php");
include("../database/conn.php");

if (!empty($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM clientes WHERE idclientes LIKE '%$search%' OR nome LIKE '%%$search' OR cpf LIKE '%$search%' OR celular LIKE '%$search%' OR email LIKE '%$search%' ORDER BY idclientes DESC";
} else {
    $sql = "SELECT * FROM clientes ORDER BY idclientes DESC";
}

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
                <div class="pesquisa">
                    <input type="search" name="pesquisa" id="pesquisa" placeholder="Pesquisar">
                    <button onclick="searchClients()">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg>
                    </button>
                </div>
                <a href="/pages/cad_clientes.php"><i class="fa-solid fa-square-plus"></i></a>
            </div>

            <div class="table_list">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" class="bg-black text-white right">#</th>
                            <th scope="col" class="bg-black text-white">Nome Completo</th>
                            <th scope="col" class="bg-black text-white">CPF</th>
                            <th scope="col" class="bg-black text-white">Celular</th>
                            <th scope="col" class="bg-black text-white">Email</th>
                            <th scope="col" class="bg-black text-white">Status</th>
                            <th scope="col" class="bg-black text-white left">Ações</th>
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
                                <a href='../database/delete_clientes.php?idclientes=$user_data[idclientes]'><i class='fa-solid fa-trash' style='color: red;'></i></a>
                                </td>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <script src="../js/clientes.js"></script>
</body>
</html>