<?php

if (!empty($_GET['idclientes'])) {
    include_once("conn.php");

    $idclientes = $_GET['idclientes'];

    $sqlSelect = "SELECT * FROM clientes WHERE idclientes = $idclientes";

    $result = $conn->query($sqlSelect);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $nome = $row['nome'];
            $nascimento = $row['nascimento'];
            $genero = $row['genero'];
            $cpf = $row['cpf'];
            $celular = $row['celular'];
            $email = $row['email'];
            $senha = $row['senha'];
            $status = $row['status'];
        }
    } else {
        header("Location: ../pages/clientes.php");
    }
}


?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes - Feras</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
                <a href="/pages/clientes.php"><i class="fa-solid fa-circle-chevron-left"></i></a>
            </div>

            <div class="container_cad">
                <div class="content_cad">
                    <div class="titulo_cad">
                        <h1>Ver</h1>
                    </div>

                    <div class="form_cad">
                        <form action="/database/processar_cadastro_cliente.php" method="post">
                            <div class="row">
                                <div class="col">
                                    <label for="nome">Nome completo</label>
                                    <input type="text" id="nome" name="nome" class="form-control" placeholder="Ygor Pacheco" aria-label="First name">
                                </div>
                                <div class="col">
                                    <label for="nascimento">Data de nascimento</label>
                                    <input type="text" id="nascimento" name="nascimento" class="form-control" placeholder="07/02/1992" aria-label="Last name">
                                </div>
                                <div class="col">
                                    <label for="genero" class="form-label">Gênero</label>
                                    <select id="genero" name="genero" class="form-select">
                                    <option selected>Selecione</option>
                                    <option value="feminino">Feminino</option>
                                    <option value="masculino">Masculino</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="cpf">CPF</label>
                                    <input type="text" id="cpf" name="cpf" class="form-control" placeholder="133.018.543-45" aria-label="Last name">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label for="celular">Celular</label>
                                    <input type="text" id="celular" name="celular" class="form-control" placeholder="(27) 9 9999-889" aria-label="First name">
                                </div>
                                <div class="col">
                                    <label for="email">E-mail</label>
                                    <input type="text" id="email" name="email" class="form-control" placeholder="ygor@email.com.br" aria-label="Last name">
                                </div>
                                <div class="col">
                                    <label for="senha">Senha</label>
                                    <input type="password" id="senha" name="senha" class="form-control" placeholder="************" aria-label="Last name">
                                </div>
                                <div class="col">
                                <label for="status" class="form-label">Status</label>
                                    <select id="status" name="status" class="form-select">
                                    <option selected>Selecione</option>
                                    <option value="ativo">Ativo</option>
                                    <option value="inativo">Inativo</option>
                                    </select>
                                </div>
                            </div>

                            <input type="submit" value="Salvar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>